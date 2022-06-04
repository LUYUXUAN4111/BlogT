<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{asset("/signupToDB")}}" method="POST">
        @csrf
        @error('name')
            {{$message}}
        @enderror
        <input type="text" name="name" value="{{old('name')}}">
        <br>
        @error('email')
            {{$message}}        
        @enderror
        <input type="text" name="email" value="{{old('email')}}">
        <br>
        @error('password')
            {{$message}}        
        @enderror
        <input type="text" name="password" id="password" value="{{old('password')}}">
        <br>
        <input type="text" id="password_re">    
        <br>
        <button>send</button>
    </form>
</body>
</html>