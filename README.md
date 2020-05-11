# Laravel JWT auth
`composer require nikservik/laravel-jwt-auth`
`php artisan vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=migrations`
`php artisan migrate`

### Шаблоны емейлов
`php artisan vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=views`

### Локализация
`php artisan vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=translations`