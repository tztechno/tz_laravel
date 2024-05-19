
cd my-laravel-app

"documents"というディレクトリをプロジェクトの「public」ディレクトリ内に作成します。

"documents"ディレクトリに、Topページで表示したいMarkdownファイルを追加します。例えば、"top_page.md"というファイルを追加します。

php artisan make:controller DocumentController

Controller [app/Http/Controllers/DocumentController.php] created successfully.  

内容全編集 DocumentController.php

resources/viewsディレクトリ内にtop_page.blade.phpというファイルを作成します。

mdのhtml化

cd my-laravel-app
composer require league/commonmark

cd my-laravel-app
php artisan serve

Server running on [http://127.0.0.1:8000].  

Laravelのログは、通常、storage/logs/laravel.logに出力されます。
cd my-laravel-app
tail -f storage/logs/laravel.log

