<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/077546e81b.js" crossorigin="anonymous"></script>
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    <script src="https://cdn.tiny.cloud/1/a9o4h0visdt7c5ngs9jzzw6mqlhgns1lveaq6ykdvv6c5nr0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'#editor',
            menubar:false
        })
    </script>
</head>
<body>
    <div class="container-fluid" id="main" role="main">
        @include('includes.nav')
        @if(Request::segment(1) == '')
            @include('includes.header')
        @endif
        
        @guest
            @include('includes.login-modal')
        @endguest

        <div class="row py-3" id="main" style="max-width: 100%;">
            <div class="col-md-3"">

                @include('includes.aside')   
            </div>
            <div class="col-md-9">

                @yield('content')
            </div>
        </div>
 
    </div>
    
    <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
</body>
@include('includes.footer')
</html>