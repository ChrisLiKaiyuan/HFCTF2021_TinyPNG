<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>TinyPng</h1>
<h2>input your png file path that you want to compress</h2>

<form action="/index.php/image" method="post">
    <input type="text" name="image">
    <input type="submit">
</form>
@if ($filePath = Session::get('image_name'))
    <p>Your file store at: {{ $filePath }}}</p>
@endif

@if (count($errors) > 0)
    <h2>
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </h2>
@endif
</body>
</html>
