<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DI</title>
</head>
<body style="background: grey">
    <p>{{ $post }}</p><br>
    <p>{{ $post->title }}</p><br>
    <p>{{ $post->category_id }}</p><br>
    <p>{{ $post->text }}</p><br>
    <hr>
    <p>{{ $post->category()->get() }}</p><br>
{{--    <p>{{ $post->category->name }}</p><br>--}}
{{--    <p>{{ $post->category }}</p><br>--}}

    {{--    <p>{{ $post->userLikes }}</p><br>--}}
{{--    <p>{{ $post->post_comment }}</p><br>--}}
    <hr>
{{--    @dd($post)--}}
</body>
</html>
