<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use TeamTNT\TNTSearch\TNTSearch;


class VueVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::get();
    }
    public function kqSearch()
    {
        return view('learnJs');
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
        return response([
            'kqSearch' => $list
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vueMytube/list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameUser = Auth::user()->name;
        $nameVideo = $request->file->getClientOriginalName();
        $request->file->move(public_path('videos'), $nameVideo);
        $dbVideo = Video::create([
            'nameUser' => $nameUser,
            'nameVideo' => $nameVideo
        ]);
        // $addSearchIndex = ListVideo::find($nameVideo)->get();
        // $addSearchIndex->searchable();
        return response([
            'videoxxx' => $dbVideo
        ]);
    }
    public function upload(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = DB::table('Videos')->where('id', $id)->get();
        $nameVideo = $video[0]->nameVideo;
        File::delete(public_path("videos/$nameVideo"));
        Video::find($id)->delete();
        return response([
            'result' => 'success'
        ], 200);
    }
}
