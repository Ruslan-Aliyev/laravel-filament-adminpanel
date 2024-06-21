# Laravel Filament Admin Panel

https://filamentphp.com/docs/3.x/panels/installation

```
composer require filament/filament
php artisan filament:install --panels
```

Change `/admin` pathname at `app/Providers/Filament/AdminPanelProvider.php`

https://www.youtube.com/watch?v=FzouTDRx9KU

`php artisan migrate:fresh --seed`

Modify `App\Models\User.php`

`php artisan serve `

Visit http://localhost:8000/backoffice

## Permissions

- https://filamentphp.com/docs/3.x/panels/installation#allowing-users-to-access-a-panel
- https://www.youtube.com/watch?v=bF04VPI68sg
    - https://spatie.be/docs/laravel-permission/v6/installation-laravel
    - https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage

```
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Add the `hasRoles` trait to `User` model.

In seeder, create an admin:
```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    	...
        $admin = User::factory()->create([
            'name' => 'Shop Keeper',
            'email' => 'keeper@shop.com',
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $admin->assignRole($adminRole);
    }
```

In `User`, re-adjust:
```php
public function canAccessPanel(Panel $panel): bool
{
    return $this->hasRole('admin');
}
```

## Generate table (list view) and form using Table and Form Builders

- https://www.youtube.com/watch?v=3J0LUnAg9zc
    - https://filamentphp.com/docs/3.x/panels/getting-started#introducing-resources
    - https://filamentphp.com/docs/3.x/panels/getting-started#introducing-relation-managers
- https://filamentphp.com/docs/3.x/panels/resources/getting-started

Create a user table based on the existing `User` model: `php artisan make:filament-resource User --generate`

# Other tutorials

- https://www.youtube.com/watch?v=wGu8lgaK_v8
- https://www.youtube.com/watch?v=ujUhXLVqOO0
