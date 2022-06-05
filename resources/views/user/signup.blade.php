<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/bootcss/bootstrap.min.css')}}">
    <script src="{{asset('/bootjs/bootstrap.bundle.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{asset("/")}}" class="nav-link px-2 text-secondary">Home</a></li>
                {{-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>
        </div>
    </div>
</header>
    <form action="{{asset("/signupToDB")}}" method="POST">
        @csrf
        <div class="container border-1 secondary border" style="padding: 30px;width: 500px;margin-top: 50px">
            @error('name')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <input type="text" class="form-control"  name="name" placeholder="ニックネーム" value="{{old("name")}}">
                <label  class="col-form-label-sm"></label>
            </div>
            @error('email')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="メールアドレス" value="{{old("email")}}">
                <label  class="col-form-label-sm"></label>
            </div>
            @error('password')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="パスワード">
                <label  class="col-form-label-sm">8文字以上、20文字以下英数字</label>
            </div>
            @error('password_c')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_c" placeholder="パスワード（確認）">
                <label  class="col-form-label-sm"></label>
            </div>
            <button type="submit" class="btn btn-primary row">Submit</button>
        </div>
    </form>
</body>
</html>
