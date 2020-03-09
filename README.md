<h1>RESTful-API-booking-with-laravel</h1>
<p><strong>1. Clone Project:</strong><br> git clone https://github.com/cipriantifui/RESTful-API-booking-with-laravel.git</p>
<p><strong>2. Composer install:</strong><br> composer install</p>
<p><strong>3. Run project:</strong><br> php artisan serve</p>
<p><strong>4. Create database booking:</strong><br> php artisan mysql:createdb booking</p>
<p><strong>5. Migrations:</strong><br> php artisan migrate</p>
<p><strong>6. Seeders:</strong><br> php artisan db:seed</p>

<h4>User route</h4>  
GET	/api/users <br>
POST /api/users <br>
GET	/api/users/{user} <br>
PUT /api/users/{user} <br>
DELETE /api/users/{user} <br>

<h4>Trip route</h4>  
GET	/api/trips <br>
GET	/api/trips/search <br>
POST /api/trips <br>
GET	/api/trips/{slug} <br>
PUT /api/trips/{trip} <br>
DELETE /api/trips/{trip} <br>

<h4>Booking route</h4>  
GET	/api/reservations <br>
POST /api/reservations <br>
GET	/api/reservations/{booking} <br>
PUT /api/reservations/{booking} <br>
DELETE /api/reservations/{booking} <br>

<h4>Authenticate route</h4>  
POST /api/register <br>
POST /api/authenticate <br>

