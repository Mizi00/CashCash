# Makefile for Laravel project

# Install dependencies
install:
	composer install
	npm install
	npm install sass
	copy .env.example .env
	php artisan key:generate

# Run development server
serve:
	php artisan serve

# Run tests
test:
	php artisan test

# Compile assets
assets:
	npm run dev

# Run migrations and seeders
db:
	php artisan migrate --seed

# Run refresh migrations ans seeders
dbrefresh:
	php artisan migrate:fresh --seed