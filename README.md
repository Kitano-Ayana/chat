# chat
チャットAPIサービス

## 主要ミドルウェアとバージョン

### API
php: 8.1.2（laravel: 9.4.1）

## ローカル開発環境構築
### Docker構築

# Dockerコンテナビルド
docker-compose build
# Dockerコンテナをバックグラウンド起動（仮想サーバ起動）
docker-compose up -d
# APIコンテナでPHPライブラリをインストール
docker-compose exec api composer install
# APIコンテナでLaravelの環境変数を設定
docker-compose exec api cp .env.example .env
# APIコンテナでLaravelのアプリケーションキーを設定
docker-compose exec api php artisan key:generate


##
-i