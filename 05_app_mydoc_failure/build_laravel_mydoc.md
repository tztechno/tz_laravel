
---

laravel立ち上げ

composer create-project --prefer-dist laravel/laravel my-laravel-app

cd my-laravel-app

php artisan serve

http://127.0.0.1:8000

以上、laravel立ち上げ

---

md viewers作成、失敗に終わる

web.php 全面書き換え
FileController.php の新規作成
index.blade.php の新規作成

LaravelにはデフォルトでmarkdownをHTMLに変換する Illuminate\Mail\Markdown というクラスが用意されています。

cd my-laravel-app
php artisan config:clear
php artisan cache:clear
php artisan serve

http://127.0.0.1:8000

---
