alias docker-up='docker-compose up -d'
alias docker-down='docker-compose down -v --remove-orphans'
alias docker-stop='docker-compose stop'
alias docker-ps='docker-compose ps'
alias phpunit='docker-compose run --rm php-fpm vendor/bin/phpunit'
alias php='docker-compose exec php-fpm php'
alias mysql='docker exec -it mysql-db-tratato bash'
alias php-artisan='docker-compose exec php-fpm php artisan'
alias php-bash='docker-compose exec php-fpm bash'