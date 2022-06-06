<link rel="stylesheet" href="{{asset('/bootcss/bootstrap.min.css')}}">
<script src="{{asset('/bootjs/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<header class="p-3 bg-dark text-white fixed-top">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{asset("/")}}" class="nav-link px-2 text-secondary">Home</a></li>
              {{-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>

{{--            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">--}}
{{--              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">--}}
{{--            </form>--}}
            @if (session('user'))
                @php
                    $user = unserialize(session('user'));
                @endphp
                <div class="col-3"></div>
                <div class="col-1">
                    <div class="dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset($user->getIcon())}}" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                            <li><a class="dropdown-item" href="{{asset('article/create')}}">New Article</a></li>
                            <li><a class="dropdown-item" href="{{asset('user/info/'.$user->getId())}}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{asset('/logout')}}">Sign out</a></li>
                        </ul>
                    </div>
                </div>
                @else
                {{-- <a href="{{asset('/signup')}}">サインアップ</a>     --}}

                        <form action="{{asset('/login')}}" method="POST" class="col-2 text-end">
                            <input type="hidden" name="url" value="{{url()->full()}}">
                            @csrf
                            <div class="dropdown">
                                <a class="link-light nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" id="login_b">
                                    Sign-In
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div style="width: 300px;padding: 20px">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="form[email]">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label" >Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="form[pass]">
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary align-self-center">SignIn</button>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </form>
                        <form action="{{asset('/signup')}}" method="get" class="col-2 text-end">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Sign-up</button>
                        </form>
            @endif
          </div>
    </div>
</header>
<div style="top: 100px;width: 1px;height: 100px;position: relative"></div>
<div style="position: fixed;width: 100%;background: #f8f8f8;top: 0px;z-index: -1000" class="h-100"></div>
