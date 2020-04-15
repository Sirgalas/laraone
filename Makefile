include .env

container_php       = app
container_db        = db
container_server    = webserver

#############################################
###                                       ###
###   MakeFile for Laravel Crash Course   ###
###                                       ###
#############################################

composer_dep: #install composer dependency >> ./vendors
	@docker run --rm -v $(CURDIR):/app composer install

laravel_install: #Create new Laravel project
	@docker-compose exec $(container_php) composer create-project --prefer-dist laravel/laravel app


ownership: #Set ownership
	@sudo chown $(USER):$(USER) . -R

#####################################
###                               ###
###       Work in containers      ###
###                               ###
#####################################

up: #start docker containers @docker-compose up -d
	@docker-compose up -d

down: #stop docker containers
	@docker-compose down

show: #show docker's containers
	@sudo docker ps

connect_app: #Connect to APP container
	@docker-compose exec $(container_php) bash

connect_db: #Connect to DB container
	@docker-compose exec $(container_db) bash

connect_server: #Connect to container_server container
	@docker-compose exec $(container_server) /bin/sh

run_server: #Run laravel dev server
	@docker-compose exec $(container_php) php app/artisan serve --port=8086 --host=0.0.0.0

route_list: #Show all route
	@docker-compose exec $(container_php) php artisan route:list


vendor: # composer install
	@docker-compose  exec  $(container_php) -u www -w /www/laravel app composer install

node_modules: # npm install
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel node npm install

watch: # npm run watch
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel node npm run watch

key: # gen application key
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php artisan key:generate

fresh: # refresh the database and run all database seeds
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php artisan migrate:fresh --seed

composer_dump: # composer dump-autoload
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app composer dump-autoload

test: # run all tests
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php vendor/bin/phpunit

create_controller: # create controller name=[controllerName]
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php artisan make:controller $(name)

create_model: # create model name=[modelName]
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php artisan make:model Models/$(name) -m

create_seeder: # create seeder name=[seederName]
	@docker-compose -f ${DOCKER_CONFIG} exec -u www -w /www/laravel app php artisan make:seeder $(name)TableSeeder
