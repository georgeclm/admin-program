
# Admin Program Website

## To use the template

1. **Clone the Repository**
```bash
git clone https://github.com/georgeclm/admin-program.git
cd admin-program
composer install
npm install
copy .env.example .env
```

2. **Open ```.env``` and then set the database as your system configuration**
```
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Install The Website and the database**
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

4. **Run the website**
```bash
php artisan serve
```
4. **Run the website**
Visit 127.0.0.1

### Account that is inside the seed
	
**Default Account**
- Email: test@test.com
- Password: 123456789

------------
