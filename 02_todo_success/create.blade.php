<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>

<h1>Create New Task</h1>

@if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div>
        <strong>Title:</strong>
        <input type="text" name="title" value="{{ old('title') }}">
    </div>
    <div>
        <strong>Description:</strong>
        <textarea name="description">{{ old('description') }}"></textarea>
    </div>
    <div>
        <strong>Is Completed:</strong>
        <input type="checkbox" name="is_completed">
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>

</form>

</body>
</html>
