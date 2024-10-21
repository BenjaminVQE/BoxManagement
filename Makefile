containerName = "box-management-container"
isContainerRunning := $(shell docker ps | grep $(containerName) > /dev/null 2>&1 && echo 1)

user := $(shell id -u)
group := $(shell id -g)

DOCKER :=
DOCKER_COMPOSE := USER_ID=$(user) GROUP_ID=$(group) docker-compose

ifeq ($(isContainerRunning), 1)
	DOCKER := @docker exec -t -u $(user):$(group) $(containerName) php
	DOCKER_COMPOSE := USER_ID=$(user) GROUP_ID=$(group) docker-compose
	DOCKER_TEST := @docker exec -t -u $(user):$(group) $(containerName) APP_ENV=test php
endif

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