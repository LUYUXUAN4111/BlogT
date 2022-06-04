<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/prism.css")}}">

    <title>Document</title>
</head>
<body>
    @include('header')
    @php
        $user = unserialize(session('user'));
    @endphp
    <div style="display: contents">
        <div class="card" style="width: 300px;padding: 10px;position: fixed;top: 100px;left: 20px">
            <div class="card-title">
                    <a href="#"><img src="{{asset($writer->icon)}}" width="50px" height="50px" style="border-radius: 50%" class="border border-secondary"></a>
                    {{$writer->name}}
            </div>
            <div class="card-body" style="display: contents">
                <h6>{{$writer->info}}</h6>
                @if($viewable==3)
                    <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$writer->id}}','{{$user->getId()}}')" type="button" style="position: relative;margin: auto;width: 100px;display: none">フォロー</button>
                    <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$writer->id}}','{{$user->getId()}}')" type="button" style="position: relative;margin: auto;width: 120px">フォロー解除</button>
                @else
                    <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$writer->id}}','{{$user->getId()}}')" type="button" style="position: relative;margin: auto;width: 100px">フォロー</button>
                    <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$writer->id}}','{{$user->getId()}}')" type="button" style="position: relative;margin: auto;width: 120px;display: none">フォロー解除</button>
                @endif
            </div>
        </div>
        <div id="article" class=" position-absolute start-50 translate-middle-x border border-secondary" style="max-width: 1000px;width: 80%;padding: 30px;margin: 20px;background: white">
            <h1 class="text-center">{{$article->title}}</h1>
            <h6 class="text-end">{{date_format(date_create($article->updated_at),"Y-m-d")}}</h6>
            <hr>
            @php echo $article->article; @endphp
        </div>
    </div>
    <script src="{{asset("js/article/prism.js")}}"></script>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="{{asset("/js/article/detail.js")}}"></script>
    <script>
        function follow(follow,follower) {
            $.ajax({
                url:"{{asset("follow")}}",
                type:"POST",
                data:{"_token": "{{ csrf_token() }}",follow:follow,follower:follower},
                success:function () {
                    document.getElementById("cancel_b").style.display = "block";
                    document.getElementById("follow_b").style.display = "none";
                },
                error:function (msg) {
                    console.log(msg);
                }
            })
        }
        function follow_cancel(follow,follower) {
            $.ajax({
                url:"{{asset("follow_cancel")}}",
                type:"POST",
                data:{"_token": "{{ csrf_token() }}",follow:follow,follower:follower},
                success:function () {
                    document.getElementById("cancel_b").style.display = "none";
                    document.getElementById("follow_b").style.display = "block";
                },
                error:function (msg) {
                    console.log(msg);
                }
            })
        }
    </script>
</body>
</html>
