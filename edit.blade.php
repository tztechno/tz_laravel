<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

<h1>Edit Task</h1>

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

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <strong>Title:</strong>
        <input type="text" name="title" value="{{ $task->title }}">
    </div>
    <div>
        <strong>Description:</strong>
        <textarea name="description">{{ $task->description }}</textarea>
    </div>
    <div>
        <strong>Is Completed:</strong>
        <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>

</form>

</body>
</html>
