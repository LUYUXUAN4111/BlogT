<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/prism.css")}}">

    <title>{{$article->title}}</title>
</head>
<body>
    @include('header')
    @php
        $user = unserialize(session('user'));
    @endphp
    <div style="display:grid ;grid-template-columns: 300px auto;position: relative;left: 10%">
        <div>
            <div class="card" style="width: 300px;padding: 10px;position: sticky;top: 70px;left: 20pxd;margin-top: 20px">
                <div class="card-title">
                    <a href="{{asset('user/info/'.$writer->id)}}"><img src="{{asset($writer->icon)}}" width="50px" height="50px" style="border-radius: 50%" class="border border-secondary"></a>
                    {{$writer->name}}
                </div>
                <div class="card-body" style="display: contents">
                    <h6>{{$writer->info}}</h6>
                    @if($writer->id!=($user?$user->getId():null))
                        @if($viewable==3)
                            <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$writer->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 100px;display: none">フォロー</button>
                            <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$writer->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 120px">フォロー解除</button>
                        @else
                            <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$writer->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 100px">フォロー</button>
                            <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$writer->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 120px;display: none">フォロー解除</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div id="article" class=" border border-secondary" style="max-width: 1000px;width: 80%;padding: 30px;margin: 20px;background: white;word-break: break-word">
            <h1 class="text-center">{{$article->title}}</h1>
            <h6 class="text-end">{{date_format(date_create($article->updated_at),"Y-m-d")}}</h6>
            <hr>
            @if($viewable==2)
            <h3 class="text-center">この記事は投稿者のフォロワーのみ見られます。</h3>
            @else
            @php echo $article->article; @endphp
            @endif
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3 text-center" style="z-index: 11;width: 200px">
        <div id="followToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong>フォローした！</strong>
            </div>
        </div>
        <div id="cancelToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <strong>フォロー解除した！</strong>
            </div>
        </div>
    </div>
    <script src="{{asset("js/article/prism.js")}}"></script>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="{{asset("/js/article/detail.js")}}"></script>
    <script>
        function follow(follow,follower) {
            if (follower==-1){
                alert("まずはログインしてください");
            }else{
                $.ajax({
                    url:"{{asset("follow")}}",
                    type:"POST",
                    data:{"_token": "{{ csrf_token() }}",follow:follow,follower:follower},
                    success:function () {
                        if ({{$viewable}}==2){
                            location.reload();
                        }
                        document.getElementById("cancel_b").style.display = "block";
                        document.getElementById("follow_b").style.display = "none";
                        let toastLiveExample = document.getElementById('followToast')
                        let toast = new bootstrap.Toast(toastLiveExample);
                        toast.show()
                    },
                    error:function (msg) {
                        console.log(msg);
                    }
                })
            }
        }
        function follow_cancel(follow,follower) {
            $.ajax({
                url:"{{asset("follow_cancel")}}",
                type:"POST",
                data:{"_token": "{{ csrf_token() }}",follow:follow,follower:follower},
                success:function () {
                    if ({{$viewable}}==3){
                        location.reload();
                    }
                    document.getElementById("cancel_b").style.display = "none";
                    document.getElementById("follow_b").style.display = "block";
                    let toastLiveExample = document.getElementById('cancelToast')
                    let toast = new bootstrap.Toast(toastLiveExample);
                    toast.show()
                },
                error:function (msg) {
                    console.log(msg);
                }
            })
        }
    </script>
</body>
</html>
