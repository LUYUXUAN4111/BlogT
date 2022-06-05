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
    @php
        $user = unserialize(session("user"));
    @endphp
    @if(!$user)
        <script>
            location.href = "{{asset('/')}}"
        </script>
    @endif
        <form action="{{asset("/user/update")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container border-1 secondary border" style="padding: 30px;width: 500px;margin-top: 50px;background: white">
            <div class="mb-3">
                <div style="display: flex;justify-content: center">
                    <img width="200px" height="200px" src="{{asset($user->getIcon())}}" alt="" id="change" class="text-center border border-secondary" style="border-radius: 50%">
                </div>
                <br>
                <input class="form-control" type="file" id="formFile" name="icon"
                       onchange="imgChange(this)"
                       accept="image/png,image/gif,image/jpeg"/>
            </div>
            @error('name')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <input type="text" class="form-control"  name="name" placeholder="ニックネーム" value="{{$user->getName()}}" style="">
                <label  class="col-form-label-sm"></label>
            </div>
            @error('email')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            @error('password')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
            <div class="mb-3 row">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="info" style="height: 100px">{{$user->getInfo()}}</textarea>
                    <label for="floatingTextarea2"></label>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$user->getId()}}">
            <button type="submit" class="btn btn-primary row">Submit</button>
        </div>
    </form>
<script>
    function imgChange(img) {
        // 生成一个文件读取的对象
        const reader = new FileReader();
        reader.onload = function (ev) {
            // base64码
            let imgFile =ev.target.result;//或e.target都是一样的
            document.querySelector("#change").src= ev.target.result;
        }
        //发起异步读取文件请求，读取结果为data:url的字符串形式，
        reader.readAsDataURL(img.files[0]);
    }
</script>
</body>
</html>
