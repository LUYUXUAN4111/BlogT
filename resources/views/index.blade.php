<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('header')
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    welcome!
    <br>
    @if (session('user'))
        @php
            $user = unserialize(session('user'));            
        @endphp        
        {{$user->getName()}}
        <a href="{{asset('/logout')}}">ログアウト</a>
    @else
    <a href="{{asset('/signup')}}">サインアップ</a>    
    <form action="{{asset('/login')}}" method="POST">
            @csrf
            <input type="email" name="form[email]">
            <br>
            <input type="password" name="form[pass]">
            <br>
            <button>GO</button>
        </form>        
    @endif --}}
</body>
</html>