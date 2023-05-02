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
    <form action="{{ route('myauth.registration.accept') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Login</label>
            <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
            @error('name')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</body>
</html>





