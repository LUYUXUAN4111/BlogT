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
        $user = unserialize(session('user'));
    @endphp
    <div class="card" style="width: 300px;padding: 10px;position: fixed;top: 100px;left: 20px">
        <div class="card-title">
            <img src="{{asset($owner->icon)}}" width="50px" height="50px" style="border-radius: 50%" class="border border-secondary">
            {{$owner->name}}
        </div>
        <div class="card-body" style="display: contents">
            <h6>{{$owner->info}}</h6>
            @if(!$is_owner)
                @if($follow)
                    <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$owner->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 100px;display: none">フォロー</button>
                    <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$owner->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 120px">フォロー解除</button>
                @else
                    <button class="btn btn-outline-secondary text-center" id="follow_b" onclick="follow('{{$owner->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 100px">フォロー</button>
                    <button class="btn btn-outline-danger text-center" id="cancel_b" onclick="follow_cancel('{{$owner->id}}','{{$user?$user->getId():-1}}')" type="button" style="position: relative;margin: auto;width: 120px;display: none">フォロー解除</button>
                @endif
            @else
                <div class="text-end">
                    <a href="{{asset("user/edit")}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <div class="position-absolute start-50 translate-middle-x w-50">
        @foreach($articles as $article)
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-body">
                        <a class="link-dark" href="{{asset('article/detail/'.$article->id)}}" target="_blank">
                            {{$article->title}}
                        </a>
                    </h3>
                    <div class="container">
                        <div class="row">
                            <div class="text-start col">
                                {{$article->category}}
                            </div>
                            <div class="text-end col">
                                {{$article->updated_at}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
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
