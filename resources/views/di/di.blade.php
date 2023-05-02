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
    <h1>DI TEST</h1>
    <h1>Static</h1>
    <pre>
            {{ print_r($data['static']) }}
    </pre>
    <h1>Post</h1>
        <pre>
            {{ print_r($data['post']->title) }}
        </pre>
    <h1>Category</h1>
    <pre>
            {{ print_r($data['category']->name) }}
    </pre>
</body>
</html>
