docker-compose build nginx
docker-compose build db
docker-compose build app
docker-compose up -d
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
npm install
npm run development