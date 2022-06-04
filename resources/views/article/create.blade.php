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
    <title>Document</title>
</head>
<body>
    @include('header')
    <div class="position-relative">
        <div class="page-container position-absolute top-0 start-50 translate-middle-x">
            <div class="container" style="padding: 0px;margin: 0px">
                <div class="row">
                    <div class="col-6 text-start " >
                        <input type="text" class="form-control" id="inputPassword">
                    </div>
                    <div class="col-3">
                        <select class="form-select" aria-label="Default select example" name="category[]">
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
                    <div  class="col-3 text-end">
                        <button type="button" class="btn btn-primary">アップロード</button>
                    </div>

                </div>
            </div>
            <div class="page-left">
                <demo-menu></demo-menu>
            </div>
            <div class="page-right">
                <div style="border: 1px solid #ccc;width:1000px;height: auto">
                    <div id="editor-toolbar" style="border-bottom: 1px solid #ccc;width: 100%;"></div>
                    <div id="editor-text-area"  style="min-height: 600px;;width: 100%;"></div>
                </div>
            </div>
    </div>
    </div>
    <script src="{{asset("js/article/editor.js")}}"></script>
    <script src="{{asset("js/article/create.js")}}"></script>
</body>
</html>
