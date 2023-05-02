<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{--  Select2  --}}
    <link rel="stylesheet" href={{ asset("plugins/select2/css/select2.min.css") }}>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css")}}>
    {{--  Summernote  --}}
    <link rel="stylesheet" href={{asset("plugins/summernote/summernote-bs4.min.css")}}>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<div class="col-md-3">
    <form action="{{ route('myauth.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
{{--            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        @error('email')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{route('myauth.registration')}}"><button type="submit" class="btn btn-primary">Registration</button></a>
    <a href="#" {{ auth()->check() ? '' : 'hidden'}}>Like</a>
{{--    <a href="#" hidden>Like</a>--}}
</div>
</div>
</body>
</html>





