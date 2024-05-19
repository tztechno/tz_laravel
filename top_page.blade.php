<!DOCTYPE html>
<html>
<head>
    <title>Document Management System</title>
</head>
<body>
    <h1>Documents</h1>
    <ul>
        @foreach($documents as $document)
            <li><a href="{{ url('documents/' . basename($document)) }}">{{ basename($document) }}</a></li>
        @endforeach
    </ul>
</body>
</html>
