<h1>RESTful-API-booking-with-laravel</h1>
<p><strong>1. Clone Project:</strong><br> git clone https://github.com/cipriantifui/RESTful-API-booking-with-laravel.git</p>
<p><strong>2. Composer install:</strong><br> composer install</p>
<p><strong>3. Run project:</strong><br> php artisan serve</p>
<p><strong>4. Create database booking:</strong><br> php artisan mysql:createdb booking</p>
<p><strong>5. Migrations:</strong><br> php artisan migrate</p>
<p><strong>6. Seeders:</strong><br> php artisan db:seed</p>

<h4>User route</h4>  
GET	/api/users index
POST /api/users store
GET	/api/users/{user} show
PUT /api/users/{user} update
DELETE /api/users/{user} delete

<h4>Trip route</h4>  
GET	/api/trips index
GET	/api/trips/search search
POST /api/trips store
GET	/api/trips/{slug} show
PUT /api/trips/{trip} update
DELETE /api/trips/{trip} delete

<h4>Booking route</h4>  
GET	/api/reservations index
POST /api/reservations store
GET	/api/reservations/{booking} show
PUT /api/reservations/{booking} update
DELETE /api/reservations/{booking} delete

<h4>Authenticate route</h4>  
POST /api/register
POST /api/authenticate

