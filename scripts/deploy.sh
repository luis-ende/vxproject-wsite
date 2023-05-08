#!/bin/bash

./vendor/bin/sail php artisan migrate:fresh
./vendor/bin/sail php artisan db:seed
./vendor/bin/sail php artisan vx:generate-user-token 1