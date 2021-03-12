## About Project

- Implements a simple api to get movies list with
  * Laravel-7.0
  * Laravel-Json-Api
  * Docker
  * Eloquent models
  
- Frontend with VueJs
- unlimited scroll with search, list/grid style, per_page option

## Requirements
- Docker version 20.10.2
- npm version 6.9.0
- Composer version 2.0.9
- PHP version 7.2

## Steps to setup local environment

- Open the project root in terminal
- Run the following commands
    1. docker-compose up -d
    2. composer install
    3. docker-compose exec app php artisan key:generate
    4. docker-compose exec app php artisan cache:clear
    5. docker-compose exec app php artisan config:clear
    6. docker-compose exec app php artisan migrate
    7. docker-compose exec app php artisan db:seed
    8. npm install
    9. npm run development
    11. docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)
        * Access the movies list with
        * http://server_domain_or_IP (ip address of **nginx** container)

  
- the above steps will create 3 docker containers

    1. app for php
    2. db for mysql
        - Host: ip address for nginx container
        - User: root
        - Password: password
    3. nginx for webserver
  
- Some usefull commands
  1. docker exec -it -u root app /bin/bash (root access to php container)
  2. docker exec -it app /bin/bash (access as user 'shoaib')
  3. docker exec -it -u root db /bin/bash (root access to mysql container)
  
## Files for the Frontend

- webpack.min.js to compile the js files
- resources/views/movie/index.blade.php template for the list of movies
- VueJs Components for the frontend
  * resources/js/components/movies.js
  * resources/js/components/movies-list.js

## Files for Json-api
- app/JsonApi
- routes/api.php