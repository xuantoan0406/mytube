<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
</head>

<body>

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
</body>

</html>