###
#
###

---


---

```
project-root/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   ├── Requests/
│   │   └── Kernel.php
│   └── Providers/
├── bootstrap/
│   └── app.php
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeds/
├── public/
│   ├── css/
│   ├── js/
│   ├── index.php
│   └── .htaccess
├── resources/
│   ├── lang/
│   ├── views/
│   │   ├── layouts/
│   │   └── welcome.blade.php
│   └── assets/
├── routes/
│   ├── web.php
│   └── api.php
├── storage/
│   ├── app/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
├── tests/
├── vendor/
├── .env
├── artisan
├── composer.json
├── composer.lock
├── package.json
└── webpack.mix.js

```
---

ルートホルダにLaravelをインストールし、`index.html`をホストする方法を以下に示します。これには、以下の手順が含まれます。

1. **Laravelのインストール**
2. **静的ファイル（`index.html`）の配置**
3. **Laravelの設定**

### 1. Laravelのインストール

まず、Laravelをインストールします。

#### 前提条件:
- PHP（バージョン 7.3以上）
- Composer（PHP用のパッケージ管理ツール）

#### 手順:
1. **プロジェクトディレクトリの作成と移動**
   ```bash
   mkdir myapp
   cd myapp
   ```

2. **Composerを使用してLaravelをインストール**
   ```bash
   composer create-project --prefer-dist laravel/laravel .
   ```

### 2. 静的ファイル（`index.html`）の配置

次に、`index.html`をLaravelプロジェクトのパブリックディレクトリに配置します。

1. **`index.html`を作成または配置**
   - `public`ディレクトリの中に`index.html`を置きます。
     ```bash
     echo "<!DOCTYPE html><html><head><title>My App</title></head><body><h1>Hello World</h1></body></html>" > public/index.html
     ```

### 3. Laravelの設定

Laravelが`index.html`をホストできるように、ルート設定を行います。

1. **ルートを設定**
   - `routes/web.php`を編集し、ルートを設定します。
     ```php
     Route::get('/', function () {
         return file_get_contents(public_path('index.html'));
     });
     ```

これにより、`http://your-domain.com/`にアクセスすると、`public/index.html`が表示されます。

### 動作確認

最後に、Laravel開発サーバーを起動し、動作を確認します。

```bash
php artisan serve
```

ブラウザで `http://localhost:8000` にアクセスして、`index.html`が表示されることを確認します。

### まとめ

以上の手順で、ルートフォルダにLaravelをインストールし、`index.html`をホストすることができます。これにより、Laravelのフレームワークを使用して簡単に静的なHTMLファイルをサーブできます。

---
