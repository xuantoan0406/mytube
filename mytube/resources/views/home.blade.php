@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        <h1>Upload</h1>
                        <form action='upload' method='post' enctype='multipart/form-data'>
                            @csrf
                            <input type='text' name='name' value="{{Auth::user()->name}}"><br>
                            <input type='file' name="file">
                            <input type=submit value="add">

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection