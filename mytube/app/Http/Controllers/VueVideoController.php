<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListVideo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Auth;

class VueVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ListVideo::get();
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
        $dbVideo = ListVideo::create([
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
        $video = ListVideo::find($id);
        $video->delete();
        return response([
            'result' => 'success'
        ], 200);
    }
}
