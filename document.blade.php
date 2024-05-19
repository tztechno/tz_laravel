<!DOCTYPE html>
<html>
<head>
    <title>{{ $filename }}</title>
</head>
<body>
    <h1>{{ $filename }}</h1>
    <div>
        {!! $html !!}
    </div>
    <a href="{{ url('/') }}">Back to list</a>
</body>
</html>

