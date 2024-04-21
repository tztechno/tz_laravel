# tz_laravel

---

% php -v
PHP 8.3.4 (cli) (built: Mar 12 2024 23:42:26) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.3.4, Copyright (c) Zend Technologies
    with Zend OPcache v8.3.4, Copyright (c), by Zend Technologies

---

Laravelプロジェクトの基本的なフォルダ構造は以下のようになります：

```
your_project/
├── app/                   # アプリケーションのコード
│   ├── Console/           # アプリケーションのコンソールコマンド
│   ├── Exceptions/        # 例外クラス
│   ├── Http/              # コントローラ、ミドルウェア、リクエスト、ルート
│   │   ├── Controllers/   # コントローラ
│   │   ├── Middleware/    # ミドルウェア
│   │   ├── Requests/      # フォームリクエスト
│   │   └── Kernel.php     # HTTPカーネル
│   ├── Providers/         # サービスプロバイダ
│   └── ...
├── bootstrap/             # アプリケーションの起動と自動ローディング
├── config/                # アプリケーションの設定ファイル
├── database/              # データベース関連
│   ├── factories/         # モデルファクトリ
│   ├── migrations/        # データベースマイグレーション
│   └── seeds/             # データベースシード
├── public/                # パブリックアクセス可能なファイル (エントリポイント)
├── resources/             # アプリケーションのリソース
│   ├── lang/              # 言語ファイル
│   ├── views/             # ビューファイル (Bladeテンプレート)
│   └── ...
├── routes/                # ルーティング
├── storage/               # アプリケーションのログ、キャッシュ、セッション
├── tests/                 # テスト関連
├── vendor/                # Composerによって管理されるパッケージ
├── .env                   # 環境設定ファイル
├── .env.example           # 環境設定ファイルの例
├── artisan                # LaravelのCLIツール
├── composer.json          # Composer依存関係
├── phpunit.xml            # PHPUnit設定
└── ...
```

各フォルダ/ファイルの役割は以下の通りです：

app/: アプリケーションのコードが含まれるディレクトリです。コントローラ、ミドルウェア、リクエスト、例外、コンソールコマンドなどがここにあります。

bootstrap/: アプリケーションの起動と自動ローディングに関連するファイルが含まれます。

config/: アプリケーションの設定ファイルが格納されます。

database/: データベース関連のファイルが含まれます。マイグレーション、ファクトリ、シードがここにあります。

public/: パブリックにアクセス可能なファイルがここに置かれます。ウェブサーバーの公開ディレクトリとして機能します。

resources/: アプリケーションのリソースファイルがここに置かれます。ビュー (Bladeテンプレート) や言語ファイルが含まれます。

routes/: アプリケーションのルーティングファイルがここにあります。

storage/: アプリケーションが生成するログ、キャッシュ、セッションファイルがここに格納されます。

tests/: アプリケーションのテストファイルがここにあります。

vendor/: Composerによって管理されるパッケージがここにインストールされます。

.env: 環境設定ファイルです。アプリケーションの設定や環境変数が定義されます。

artisan: LaravelのCLIツールです。コマンドラインからタスクを実行します。

composer.json: Composerの依存関係が定義されたJSONファイルです。

phpunit.xml: PHPUnitの設定ファイルです。

---
コマンドラインから<br/>
% cd hello-laravel<br/>
% php artisan serve

  INFO  Server running on [http: //127.0.0.1:8000].  
  Press Ctrl+C to stop the server

chromeから<br/>
http: //127.0.0.1:8000/hello

終了する時command＋Q
