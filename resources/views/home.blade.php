<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    </head>
    <body>
    @if (Auth::guest())
        <div class="login"><a href="{{ route('login') }}">login</a></div>
        <div class="register"><a href="{{ route('register') }}">register</a></div>
    @elseif (Auth::user()->role == 0)
        @php
            header("Location: " . URL::to('/'), true, 302);
            exit();
        @endphp
    @elseif (Auth::user()->role == 1)
        <div class="register"><a href="{{ url('profile') }}">Hello {{ Auth::user()->name }}</a></div>
        {{ Auth::user()->username }} <br>
        {{ Auth::user()->password }}
        <div class="login"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        Hello {{ Auth::user()->name }}, its home!<br>

        <h4>Data Pengguna</h4>
        @foreach ($user as $us => $vp)
        ID: {{$vp->id}} <br>
        Nama Pengguna: {{$vp->name}} <br>
        Username: {{$vp->username}} <br>
        No_HP: {{$vp->no_handphone}} <br>
        Role: {{$vp->role}} <br>
        <hr><br>
        @endforeach
    @endif
    </body>
</html>