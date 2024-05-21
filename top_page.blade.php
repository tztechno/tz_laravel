<!DOCTYPE html>
<html>
<head>
    <title>Document List</title>
</head>
<body>
    <h1>Document List</h1>
    <ul>
        @foreach ($documents as $document)
            @php
                // 拡張子を含むファイル名を取得
                $fullFileName = $document->getFilename();
            @endphp
            <li><a href="{{ route('document.show', ['document' => $fullFileName]) }}">{{ $fullFileName }}</a></li>
        @endforeach
    </ul>
</body>
</html>
