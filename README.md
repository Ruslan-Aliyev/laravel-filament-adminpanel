https://filamentphp.com/docs/3.x/panels/installation

composer require filament/filament
php artisan filament:install --panels
Change /admin pathname at app/Providers/Filament/AdminPanelProvider.php
php artisan migrate

https://www.youtube.com/watch?v=FzouTDRx9KU

Modify App\Models\User.php https://filamentphp.com/docs/3.x/panels/installation#allowing-users-to-access-a-panel
php artisan serve 
Visit http://localhost:8000/backoffice

- https://www.youtube.com/watch?v=bF04VPI68sg
    - https://spatie.be/docs/laravel-permission/v6/installation-laravel
    - https://spatie.be/docs/laravel-permission/v6/basic-usage/basic-usage

composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

Add hasRoles trait to User model

In seeder: create an admin

...
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

In User, re-adjust:
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }

- https://www.youtube.com/watch?v=3J0LUnAg9zc
    - https://filamentphp.com/docs/3.x/panels/getting-started#introducing-resources

    - https://filamentphp.com/docs/3.x/panels/getting-started#introducing-relation-managers


---

https://filamentphp.com/docs/3.x/panels/resources/getting-started

php artisan make:filament-resource User --generate
