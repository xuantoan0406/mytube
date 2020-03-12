<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class videoController extends Controller
{
    public function upload(Request $rq)
    {
        $videos = $rq->file('video')->getClientOriginalName();
        $rq->video->move(public_path('videos'), $videos);
        $dbVideo = DB::table('Videos')->insert([
            'nameUser' => $rq->name,
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
}
