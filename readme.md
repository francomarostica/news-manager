https://mega.nz/#!JpgihAjY!blNTb4PKHtVr4_PYx_vYpnfiX2YR8dL2ZW8_z7XqKWY

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## About NewsManager

News manager is an app in development for news management writted in PHP with the framework Laravel 5.8

You can access to the demo at http://newsmanager.cloure.com

Also can access with distinct roles in the pdc
<br/>
<b>User credentials</b>
<br/>Username: user@example.com
<br/>Password: test123456

<b>Admin credentials</b>
<br/>Username: admin@example.com
<br/>Password: test123456

Any question, suggest, job, etc feel free to contact me at fdmarostica84@gmail.com

# Features

- Listing articles with categories (Front end)
- Show articles (Front end)
- Add, List, delete, edit articles and categories (based in roles)
- Real Time messages using laravel websockets as pusher service

# Task to do

- Secure WS Services
- Add module to manage ads
- Login with social networks

# Requirements

- An operating system that works ie (Linux, MacOS, Windows)
- PHP >= 7.1.3 installed
- npm >= 6 installed
- MySQL/MariaDB Server
- Composer installed

# How to use/install

- Clone the repository using the following command: git clone http://github.com/fmarostica/news-manager
- Open the project directory and type composer install
- type npm install
- type artisan key:generate
- Change the .env.example file to .env and fill with your DB credentials and DBName
- Create the DB on mysql
- You can create DB structure typing php artisan migrate (under the project folder)
- Optionally you can seed/fill with example data typing php artisan db:seed
- Aditionally you need to start the WS Server typing php ws/ws.php in your news-manager project folder

# changelog

## 2019-03-14
- Improvements on websockets using laravel websockets as a pusher service

## 2019-03-14
- Added WS Services
- Added testing module

## 2019-03-13
- Improvements on jQurey AJAX routes
- Separated API from PANEL
- Added AJAX functions
- API can be tested used postman or another RESTFul tester

## 2019-03-12
- Created CRUD modules for the control panel
- Deployed in a production server at http://newsmanager.cloure.com

## 2019-03-11
- Added role based functions
