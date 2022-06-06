<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/prism.css")}}">
    <script src="{{asset("js/article/index.js")}}"></script>
    <script src="{{asset("js/article/prism.js")}}"></script>
    <title>新しい記事</title>
</head>
<body>
    @include('header')
    <div class="position-relative">
        <div class="page-container position-absolute top-0 start-50 translate-middle-x">
            <div class="container" style="padding: 0px;margin: 0px">
                <form action="{{asset("/article/insertToDB")}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6 text-start " >
                            <input type="text" class="form-control" id="inputPassword" placeholder="タイトル" name="title" required>
                        </div>
                        <div class="col-2 text-center">
                            <select class="form-select" aria-label="Default select example" name="category" required>
                                <option selected disabled>カテゴリー</option>
                                <option value="PHP">PHP</option>
                                <option value="Laravel">Laravel</option>
                                <option value="MySQL">MySQL</option>
                                <option value="Linux">Linux</option>
                                <option value="JavaScript">JavaScript</option>
                                <option value="Jquery">Jquery</option>
                                <option value="HTML5">HTML5</option>
                                <option value="CSS">CSS</option>
                            </select>
                        </div>
                        <div class="col-2 text-center">
                            <select class="form-select" aria-label="Default select example" name="viewable">
                                <option value="1" selected>公開</option>
                                <option value="2">フォロワーのみ</option>
                                <option value="0">非公開</option>
                            </select>
                        </div>
                        <input type="hidden" name="article" id="article">
                        @php
                            $user = unserialize(session('user'))
                        @endphp
                        <input type="hidden" name="user_id" value="{{$user->getId()}}">
                        <div  class="col-2 text-end">
                            <button type="submit" class="btn btn-primary">アップロード</button>
                        </div>

                    </div>
                </form>
            </div>
            <br>
            <div class="page-left">
                <demo-menu></demo-menu>
            </div>
            <div class="page-right">
                <div style="border: 1px solid #ccc;width:1000px;height: auto">
                    <div id="editor-toolbar" style="border-bottom: 1px solid #ccc;width: 100%;border-bottom: 1px solid #ccc;width: 100%;position: sticky;top: 80px;z-index: 100;"></div>
                    <div id="editor-text-area"  style="min-height: 600px;;width: 100%;margin-bottom: 200px"></div>
                </div>
            </div>
    </div>
    </div>
    <script src="{{asset("js/article/editor.js")}}"></script>
    <script src="{{asset("js/article/create.js")}}"></script>
</body>
</html>
