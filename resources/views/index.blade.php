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
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card" style="width: 250px;left: 30px;position: fixed;top: 80px">
        <ul class="list-group list-group-flush">
            @foreach($category as $c)
                <li class="list-group-item container">
                    <a href="#" class="dropdown-item">
                    <div class="row">
                            <div class="text-start col">{{$c->category}}</div>
                            <small class="text-end col">{{$c->c}}</small>
                    </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="position-absolute start-50 translate-middle-x w-50">
    @foreach($articles as $article)
        <div class="card w-100">
            <div class="card-body">
                <h6 class="card-title">
                    <a href="{{asset('user/info/'.$article['user_id'])}}" style="text-decoration: none">
                        <img src="{{asset($article['icon'])}}" width="40px" height="40px" style="border-radius: 50%" class="border border-dark">
                    </a>
                    {{$article['name']}}
                </h6>
                <h3 class="card-body">
                    <a class="link-dark" href="{{asset('article/detail/'.$article['article_id'])}}" target="_blank">
                        {{$article['title']}}
                    </a>
                </h3>
                <div class="container">
                    <div class="row">
                        <div class="text-start col">
                            {{$article['category']}}
                        </div>
                        <div class="text-end col">
                            {{$article['date']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endforeach
    </div>
</body>
</html>
