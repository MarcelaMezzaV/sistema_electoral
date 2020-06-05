<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/avatar_up.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style_avatar_up.css')}}">
          <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="content-header ">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sistema electoral</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        
                            @if (Route::has('login'))
                                
                                    @auth
                                    <li class="breadcrumb-item active">
                                        <a href="{{ url('/home') }}">Home</a>
                                    </li>    
                                    @else
                                        {{--<a href="{{ route('login') }}">Login</a>--}}
                                        <li class="breadcrumb-item active">
                                            @include('users.modalLogin')
                                        </li>    
                                        {{--para no mostrar el link a register ya que solo autenticados podran--}}
                                        @if (Route::has('register'))
                                        <li class="breadcrumb-item active">
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>    
                                        @endif
                                    @endauth
                               
                            @endif
                        
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            
            <div class="content">
                @yield('content')
            </div>
        </div>
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    </body>
</html>
