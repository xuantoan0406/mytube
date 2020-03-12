<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>

<body>
    <div>
        @foreach($list as $keys=>$item)
        <table>
            <tr>
                <td>
                    <video width="320px" height="240px" controls="controls">
                        <source src="videos/{!!$item->nameVideo!!}" type="video/mp4">
                    </video>
                </td>
            </tr>
        </table>
        @endforeach
    </div>
</body>

</html>