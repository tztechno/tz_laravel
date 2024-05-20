
cd my-laravel-app

"documents"というディレクトリをプロジェクトの「public」ディレクトリ内に作成します。

"documents"ディレクトリに、Topページで表示したいMarkdownファイルを追加します。例えば、"top_page.md"というファイルを追加します。


routes/web.phpファイルを編集
Route::get('/', 'DocumentController@index');

###################################

cd my-laravel-app
php artisan make:controller DocumentController

Controller [app/Http/Controllers/DocumentController.php] created successfully.  

内容全編集 DocumentController.php
Controller.phpの編集はまだ 

resources/viewsディレクトリ内にtop_page.blade.phpというファイルを作成します。

mdのhtml化

cd my-laravel-app

composer require league/commonmark

composer require graham-campbell/markdown

No security vulnerability advisories found.
Using version ^15.2 for graham-campbell/markdown


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

----

## ホルダ内のファイルに対してリンクが自動生成
## documentとしては,html,phpは表示可能
## mdはmarkdownタグ,htmlタグが無効
## 編集機能はないので、VSCを使うこと



