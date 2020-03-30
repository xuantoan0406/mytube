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

        <div id="bar">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logins') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('registers'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registers') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a><br>
                        <a class="dropdown-item" href="update">update</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
        <div id="search">
            <center>
                <div class="user-dashboard">
                    <form method="post" action="searchs">
                        @csrf
                        <input placeholder="Search" name="search" />
                        <button type="submit">Search</button>
                    </form>
                </div>
            </center>
        </div>
        <div id="content">
            <div id="tivi">
                <video width="100%" height="100%" controls="controls">
                    <source src="videos/q.mp4" type="video/mp4">
                </video>
            </div>
            <div id="space"></div>
            <div id="cmt"> cmt</div>
        </div>
        <div id="list">
            @foreach($list as $keys=>$item)
            <table>
                <tr>
                    <td>
                        <video width="150px" height="80px" controls="controls">
                            <source src="/videos/{!!strip_tags($item->nameVideo,'b')!!}" type="video/mp4">
                        </video><br>
                    </td>
                    <td>
                        {!!$item->nameVideo!!}
                    </td>
                </tr>
            </table>
            @endforeach
        </div>


    </div>
</body>

</html>