@extends('layouts.app')

@section('content')
<div>
    <center>
        <h1>My Video</h1>
    </center>
</div>
<div id="wrapper" style="text-align:center">
    @if(Auth::check())
    <center>
        <table border='1'>
            <th>nameVideo</th>
            <th>action</th>
            @foreach($list as $keys=>$item)

            <tr>
                <td>
                    <video width="100px" height="50px" controls="controls">
                        <source src="videos/{!!$item->nameVideo!!}" type="video/mp4">
                    </video><br>
                    {!!$item->nameVideo!!}
                </td>
                <td><a href="delete/{!!$item->id!!}"> delete</a></td>
            </tr>

            @endforeach
        </table>
    </center>
    <br>
    <div>
        <p>Upload</p>
        <form action='upload' method='post' enctype='multipart/form-data'>
            @csrf
            <input type='file' name="video">
            <input type=submit value="add">

        </form>
    </div>
    <div>
        @if(count($errors) > 0)
        <strong>lỗi roài</strong>
        <ul>
            @foreach($errors ->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    @endif
</div>
@endsection