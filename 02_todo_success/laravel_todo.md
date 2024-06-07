Laravelを使用してToDoリストアプリケーションを作成するための手順を以下に示します。これには、プロジェクトのセットアップ、データベースの設定、モデルとコントローラーの作成、ビューの作成、およびルーティングの設定が含まれます。

### 1. Laravelプロジェクトの作成

まず、Composerを使用して新しいLaravelプロジェクトを作成します。

```bash
composer create-project --prefer-dist laravel/laravel todolist
cd todolist
```

### 2. データベースの設定

`.env`ファイルを編集してデータベース接続情報を設定します。

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todolist
DB_USERNAME=root
DB_PASSWORD=
```

### 3. マイグレーションファイルの作成

ToDoリストのテーブルを作成するためのマイグレーションを作成します。

```bash
php artisan make:migration create_tasks_table
```

生成されたマイグレーションファイルに以下のコードを追加します。

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
```

マイグレーションを実行してデータベースにテーブルを作成します。

```bash
php artisan migrate
```

### 4. モデルとコントローラーの作成

`Task`モデルとリソースコントローラーを作成します。

```bash
php artisan make:model Task -m
php artisan make:controller TaskController --resource
```

モデルのコードを追加します。

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'is_completed',
    ];
}
```

### 5. ルーティングの設定

`routes/web.php`ファイルを編集して、ルーティングを設定します。

```php
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
```

### 6. コントローラーの実装

`TaskController`を編集して、CRUD操作を実装します。

```php
<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                        ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success', 'Task deleted successfully.');
    }
}
```

### 7. ビューの作成

以下のように、ビューを作成します。

#### `resources/views/tasks/index.blade.php`

```html
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
        <td>{{ ++$i }}</td>
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
```

#### `resources/views/tasks/create.blade.php`

```html
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
        <textarea name="description">{{ old('description') }}</textarea>
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
```

#### `resources/views/tasks/edit.blade.php`

```html
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
```

### 8. アプリケーションのテスト

開発サーバーを起動してアプリケーションをテストします。

```bash
php artisan serve
```

ブラウザで`http://localhost:8000/tasks`にアクセスし、ToDoリストアプリケーションの動作を確認します。

これで、基本的なToDoリストアプリケーションが完成です。必要に応じて、デザインの改善や追加機能の実装を行ってください。
