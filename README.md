# Hotel Reservation App
### Welcome to the Hotel Reservation App repository
The main feature of this app is the ability to view available rooms, reserve room(s), view reservations and delete reservations.
New users can be created and used to log in and access the main page.

## Features and Technologies
- Laravel 10.x API backend
- Eloquent ORM
- MySQL database server
- Vite with React
- Protected routes for both backend and frontend
- Containerization with Docker

## To get started with the Hotel Reservation App

### You can run the Hotel Reservation App

First clone the repository

### With Docker
You will need Docker

### You will also need to change the .env.example files into .env before proceeding in both frontend and backend folders!

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
Included in the seeder is a user account

This account has the e-mail (used to log in)
```sh
test@example.com
```
And password
```sh
password!
```

You can access the frontend page at
```sh
https://localhost:3000
```
