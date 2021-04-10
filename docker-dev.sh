docker-compose down
docker network create web
docker-compose up -d --build
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan migrate:install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan make:auth
docker exec app php artisan vendor:publish --tag=lighthouse-schema
docker exec app php artisan lighthouse:ide-helper
