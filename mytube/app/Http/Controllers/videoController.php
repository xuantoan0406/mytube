<?php

namespace App\Http\Controllers;

use App\Http\Requests\upload;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use TeamTNT\TNTSearch\TNTSearch;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\File;

class videoController extends Controller
{
    public function upload(upload $rq)
    {
        $videos = $rq->file('video')->getClientOriginalName();
        $rq->video->move(public_path('videos'), $videos);
        $dbVideo = DB::table('Videos')->insert([
            'nameUser' => Auth::user()->name,
            'nameVideo' => $videos
        ]);

        $addSearchIndex = Video::where('nameVideo', $videos)->get();
        $addSearchIndex->searchable();
        if ($dbVideo)
            return redirect('listVideo');

        else
            return view('update');
    }
    public function listVideo()
    {
        $list = DB::table('Videos')->get();
        return view('mytube/listVideo', ['list' => $list]);
    }
    public function search(request $rq)
    {

        $keyword = $rq->search;
        $list = Video::search($keyword)->get();
        $tnt = new TNTSearch;
        $list = $list->map(function ($article) use ($keyword, $tnt) {
            $article->nameVideo = $tnt->highlight($article->nameVideo, $keyword, 'b');
            return $article;
        });

        return view("mytube/listVideo", ['list' => $list]);
    }
    public function delete($id)
    {
        $video = DB::table('Videos')->where('id', $id)->get();
        $nameVideo = $video[0]->nameVideo;
        File::delete(public_path("videos/$nameVideo"));
        DB::table('Videos')->where('id', $id)->delete();
        return redirect('update');
    }
}
