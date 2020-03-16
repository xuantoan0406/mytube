<?php

namespace App\Http\Controllers;

use App\Http\Requests\upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $list = DB::table('Videos')->where('nameUser', 'like', '%' . $rq->search . '%')
            ->orWhere('nameVideo', 'like', '%' . $rq->search . '%')->get();
        return view("mytube/listVideo", ['list' => $list]);
    }
    public function delete($id)
    {
        $list = DB::table('Videos')->where('id', $id)->delete();
        return redirect('update');
    }
}
