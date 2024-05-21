# USE parsedown for view markdown but failure

cd my-laravel-app

"documents"というディレクトリをプロジェクトの「public」ディレクトリ内に作成します。

"documents"ディレクトリに、Topページで表示したいMarkdownファイルを追加します。
例えば、"top_page.md"というファイルを追加します。

routes/web.phpファイルを編集
Route::get('/', 'DocumentController@index');

cd my-laravel-app
php artisan make:controller DocumentController

Controller [app/Http/Controllers/DocumentController.php] created successfully.  

内容全編集 DocumentController.php
Controller.phpの編集はまだ 

resources/viewsディレクトリ内にtop_page.blade.phpというファイルを作成します。

cd my-laravel-app

composer require league/commonmark
composer remove league/commonmark

composer require graham-campbell/markdown
composer remove graham-campbell/markdown

composer require cebe/markdown
composer remove cebe/markdown

composer require spatie/laravel-markdown
composer remove spatie/laravel-markdown

USE parsedown
composer require erusev/parsedown


cd my-laravel-app
php artisan serve

Server running on [http://127.0.0.1:8000].  

Laravelのログは、通常、storage/logs/laravel.logに出力されます。

cd my-laravel-app
tail -f storage/logs/laravel.log


cd my-laravel-app
composer dump-autoload


cd my-laravel-app
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan serve

Server running on [http://127.0.0.1:8000].  
