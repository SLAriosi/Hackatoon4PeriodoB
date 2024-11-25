# Setting Up a Laravel Development Environment with Docker and Docker Compose
## Instructions -
https://medium.com/@murilolivorato/setting-up-a-laravel-development-environment-with-docker-and-docker-compose-a-step-by-step-5e37670ae640

## Run those commands to use the sistem
- docker-compose up -d --build
- docker-compose run --rm artisan migrate

## Run those commands to create new migrations / models
- docker-compose run --rm artisan make:model Ambiente --migration
- docker-compose run --rm artisan make:migration add_cargo_to_users_table --table=users
- docker-compose run --rm artisan make:seeder UserSeeder

## Run those commands to run all seeders
- docker-compose run --rm artisan db:seed