<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>TinyPng</h1>
<h2>Upload your png file that you want to compress</h2>
<!--TODO: Fix some bugs in /image -->
<form action="/" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit">Upload</input>
</form>

@if ($message = Session::get('success'))
    @if ($filePath = Session::get('file'))
        <p>{{ $message }}</p>
        <p>Your file store at: {{ $filePath }}</p>
    @endif
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
