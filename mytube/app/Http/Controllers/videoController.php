<?php

namespace App\Http\Controllers;

use App\Http\Requests\upload;
use Illuminate\Http\Request;
use App\ListVideo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use TeamTNT\TNTSearch\TNTSearch;
use Laravel\Scout\Searchable;

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

        $addSearchIndex = ListVideo::where('nameVideo', $videos)->get();
        $addSearchIndex->searchable();
        if ($dbVideo)
            return redirect('listVideo');

        else
            return 'lỗi rồi';
    }
    public function listVideo()
    {
        $list = DB::table('Videos')->get();
        return view('mytube/listVideo', ['list' => $list]);
    }
    public function search(request $rq)
    {
        // $list = DB::table('Videos')->where('nameUser', 'like', '%' . $rq->search . '%')
        //     ->orWhere('nameVideo', 'like', '%' . $rq->search . '%')->get();
        // $list = App\ListVideo::search($keyword)->get()
        //     ->map(function ($row) use ($keyword) {
        //         $row->nameVideo = preg_replace('/(' . $keyword . ')/i', "<b>$0</b>", $row->nameVideo);
        //         return $row;
        //     });
        // dd($list);
        $keyword = $rq->search;
        $list = App\ListVideo::search($keyword)->get();
        $tnt = new TNTSearch;
        $list = $list->map(function ($article) use ($keyword, $tnt) {
            $article->nameVideo = $tnt->highlight($article->nameVideo, $keyword, 'b');
            return $article;
        });

        return view("mytube/listVideo", ['list' => $list]);
    }
    public function delete($id)
    {
        $list = DB::table('Videos')->where('id', $id)->delete();
        return redirect('update');
    }
}
