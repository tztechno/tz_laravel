LaravelでデフォルトのデータベースをSQLiteに変更する手順は以下の通りです。

### 1. SQLiteデータベースファイルの作成

プロジェクトのルートディレクトリにSQLiteデータベースファイルを作成します。一般的には`database`ディレクトリに`database.sqlite`ファイルを作成します。

```bash
touch database/database.sqlite
```

### 2. `.env`ファイルの編集

`.env`ファイルを編集して、データベース接続情報をSQLiteに変更します。

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

`DB_DATABASE`には、絶対パスを指定します。例えば、プロジェクトのルートディレクトリに`database`ディレクトリがある場合、以下のようになります。

```dotenv
DB_DATABASE=/path/to/your/project/database/database.sqlite
```

相対パスを使用する場合は以下のようにします：

```dotenv
DB_DATABASE=./database/database.sqlite
```

### 3. データベース設定ファイルの確認

`config/database.php`ファイルを開いて、SQLiteの設定が以下のようになっていることを確認します。

```php
'sqlite' => [
    'driver' => 'sqlite',
    'url' => env('DATABASE_URL'),
    'database' => env('DB_DATABASE', database_path('database.sqlite')),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
],
```

### 4. マイグレーションの実行

SQLiteデータベースにテーブルを作成するために、マイグレーションを実行します。

```bash
php artisan migrate
```

### 5. 動作確認

開発サーバーを起動してアプリケーションをテストします。

```bash
php artisan serve
```

ブラウザで`http://localhost:8000/tasks`にアクセスし、ToDoリストアプリケーションが正しく動作することを確認します。

### まとめ

これで、LaravelプロジェクトのデータベースをSQLiteに変更する手順は完了です。データベースがSQLiteに変更されたことで、プロジェクトはファイルベースのデータベースを使用するようになり、特に開発環境での設定が簡単になります。必要に応じて、さらに機能やデザインを追加してアプリケーションを改善してください。