# Laravel JWT auth
`composer require nikservik/laravel-jwt-auth`
`vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=migrations`
`php artisan migrate`

### Шаблоны емейлов
`vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=views`

### Локализация
`vendor:publish --provider="Nikservik\LaravelJwtAuth\LaravelJwtAuthServiceProvider" --tag=translations`