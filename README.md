<h1>RESTful-API-booking-with-laravel</h1>
<p><strong>1. Clone Project:</strong><br> git clone https://github.com/cipriantifui/RESTful-API-booking-with-laravel.git</p>
<p><strong>2. Composer install:</strong><br> composer install</p>
<p><strong>3. Run project:</strong><br> php artisan serve</p>
<p><strong>4. Create database booking:</strong><br> php artisan mysql:createdb booking</p>
<p><strong>5. Migrations:</strong><br> php artisan migrate</p>
<p><strong>6. Seeders:</strong><br> php artisan db:seed</p>

<h4>User route</h4>  
GET	/api/users index <br>
POST /api/users store <br>
GET	/api/users/{user} show <br>
PUT /api/users/{user} update <br>
DELETE /api/users/{user} delete <br>

<h4>Trip route</h4>  
GET	/api/trips index <br>
GET	/api/trips/search search <br>
POST /api/trips store <br>
GET	/api/trips/{slug} show <br>
PUT /api/trips/{trip} update <br>
DELETE /api/trips/{trip} delete <br>

<h4>Booking route</h4>  
GET	/api/reservations index <br>
POST /api/reservations store <br>
GET	/api/reservations/{booking} show <br>
PUT /api/reservations/{booking} update <br>
DELETE /api/reservations/{booking} delete <br>

<h4>Authenticate route</h4>  
POST /api/register <br>
POST /api/authenticate <br>

