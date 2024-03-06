# Hotel Reservation App
### Welcome to the Hotel Reservation App repository
The main feature of this app is the ability to view available rooms, reserve room(s), view reservations and delete reservations.

## Features and Technologies
- Laravel 10.x API backend
- Eloquent ORM
- MySQL database server
- Vite with React
- Protected routes for both backend and frontend
- Containerization with Docker

## To get started with the Hotel Reservation App

### You can run the Hotel Reservation App

With Docker

First clone the repository

### With Docker
You will need Docker

Navigate to: .\hotel-reservation-php

Then type in the terminal
```sh
docker-compose build
```

Once the building finishes start the containers by typing in the terminal
```sh
docker-compose up -d
```

Allow some time for the MySQL container to start then run the migration with the seeder with
```sh
docker-compose exec api php artisan migrate --seed
```
