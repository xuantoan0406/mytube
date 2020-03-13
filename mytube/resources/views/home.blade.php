@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="seach"> seach </div>
    <div id="tivi"> tivi</div>

    <div id="list">
        @if(Auth::check())
        @foreach($list as $keys=>$item)
        <table>
            <tr>
                <td>
                    <video width="100px" height="50px" controls="controls">
                        <source src="videos/{!!$item->nameVideo!!}" type="video/mp4">
                    </video><br>
                    {!!$item->nameVideo!!}
                </td>
            </tr>
        </table>
        @endforeach
        @endif
    </div>

    <div id="cmt"> cmt</div>
</div>

<!-- <div class="card-body">
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
                            <input type='file' name="video">
                            <input type=submit value="add">

                        </form>
                    </div> -->
@endsection