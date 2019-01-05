# Roles Permissions Laravel (RPL)
A stater kit with Roles and Permissions implementation on Laravel 5.7

### Install
1. To use it just clone the repo and composer install.
2. `cp .env.example .env`
3. Update the database credentials in `.env`
4. run `php artisan key:generate`
5. To test the app run `php artisan db:seed`, our [interactive seeder](http://www.qcode.in/advance-interactive-database-seeding-in-laravel/) will take care of everything.

### Add a new Resource
1. Create desired resource by running 
 ```bash
## Create Comment model with migration and resource controller
php artisan make:model Comment -mcr
```
2. Register route for it.
```php
Route::group( ['middleware' => ['auth']], function() {
    ...
    Route::resource('comments', 'CommentController');
});
```

3. Now implement your controllers methods and use the `Authorizable` trait
```php
use App\Authorizable;

class CommentController extends Controller
{
    use Authorizable;
    ...
```

4. Now add the permissions for this new `Comment` model.
```bash
php artisan auth:permission Comment
```

That's it, you have added new resource controller which have full access control by laravel permissions.
 
 ### auth:permission command
 This command can be user to add or remove permission for a given model
 
 ```bash
## add permission
php artisan auth:permission Comment

## remove permissions
php artisan auth:permission Comment --remove
```

Checkout the official [laravel-permission package dock](https://github.com/spatie/laravel-permission) for more info.

### Author
Created by [QCode.in](http://www.qcode.in)

## License

[MIT license](http://opensource.org/licenses/MIT).
