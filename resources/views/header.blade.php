<link rel="stylesheet" href="{{asset('/bootcss/bootstrap.min.css')}}">
<script src="{{asset('/bootjs/bootstrap.bundle.min.js')}}"></script>
<header class="p-3 bg-dark text-white">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{asset("/")}}" class="nav-link px-2 text-secondary">Home</a></li>
              {{-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
            @if (session('user'))
                @php
                    $user = unserialize(session('user'));            
                @endphp        
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset("/img/icon/default.png")}}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{asset('/logout')}}">Sign out</a></li>
                    </ul>
                </div>
                @else
                {{-- <a href="{{asset('/signup')}}">サインアップ</a>     --}}
                    <div class="text-end">                        
                        <form action="{{asset('/login')}}" method="POST">
                            @csrf
                            <ul class="">
                                <li class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><input class="dropdown-item" type="email" name="form[email]"></li>
                                    <li><input class="dropdown-item" type="email" name="form[pass]"></li>
                                    <li><button class="dropdown-item" >GO</button></li>
                                    </ul>
                                </li>
                                </ul>                            
                        </form>        
                        <button type="button" class="btn btn-warning">Sign-up</button>
                      </div>                              
            @endif                
          </div>
    </div>
</header>
