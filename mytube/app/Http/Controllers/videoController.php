<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class videoController extends Controller
{
    public function upload(Request $rq)
    {
        $video = $rq->file->getClientOriginalName();
        $rq->file->move(public_path('videos'), $video);
        $dbVideo = DB::table('Videos')->insert([
            'nameUser' => $rq->name,
            'nameVideo' => $rq->file
        ]);
        if ($dbVideo)
            return 'ok';

        else
            return 'lỗi rồi';
    }
    public function listVideo()
    {
        $list = DB::table('Videos');
        return view('mytube/listVideo', ['list' => $list]);
    }
}
