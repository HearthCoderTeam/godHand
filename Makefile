dc-path=./deployment
dc-env=${dc-path}/.env

include ${dc-env}
export

dc := docker compose --env-file=${dc-env} --file=${dc-path}/docker-compose.yml

up:
	@${dc} up -d
	@echo " Containers is up!"

down:
	@${dc} down -v --remove-orphans
	@echo " Containers is down!"

php:
	@${dc} exec -it php-godhand bash
