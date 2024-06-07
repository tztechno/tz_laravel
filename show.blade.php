<!DOCTYPE html>
<html>
<head>
    <title>Show Task</title>
</head>
<body>

<h1>{{ $task->title }}</h1>

<p>{{ $task->description }}</p>

<p>{{ $task->is_completed ? 'Completed' : 'Not Completed' }}</p>

<a href="{{ route('tasks.index') }}">Back</a>

</body>
</html>
