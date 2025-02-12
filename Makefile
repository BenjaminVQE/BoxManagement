containerName = "box-management-container"

DOCKER :=
DOCKER_COMPOSE := docker-compose

dc-up:
	$(DOCKER_COMPOSE) up -d

#Create controller laravel
controller:
	$(DOCKER_COMPOSE) exec php php artisan make:controller

#Create model laravel
model:
	$(DOCKER_COMPOSE) exec php php artisan make:model

#Create migration laravel
migration:
	$(DOCKER_COMPOSE) exec php php artisan make:migration

#Create factory laravel
factory:
	$(DOCKER_COMPOSE) exec php php artisan make:factory	

#Drop/Create and seed Database
freshS:
	$(DOCKER_COMPOSE) exec php php artisan migrate:fresh --seed