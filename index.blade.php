<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>
</head>
<body>

<h1>ToDo List</h1>

<a href="{{ route('tasks.create') }}">Create New Task</a>

@if ($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif

<table>
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Description</th>
        <th>Is Completed</th>
        <th>Action</th>
    </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->is_completed ? 'Yes' : 'No' }}</td>
        <td>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                <a href="{{ route('tasks.show', $task->id) }}">Show</a>
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
