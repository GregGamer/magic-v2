npm install
npm run dev
composer install
cp .env.example .env
php artisan key:generate

composer require laravel/sail --dev
php artisan sail:install
sail up -d
sail artisan migrate:fresh --seed
