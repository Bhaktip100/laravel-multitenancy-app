# Laravel Multitenancy
This is a Laravel project with multitenancy functionality that allows multiple tenants (e.g., users, companies) to share the same application while keeping their data isolated.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Bhaktip100/laravel-multitenancy-app.git
   ```
   
2. Install Laravel dependencies:

   ```bash
   composer install
   ```

4. Set up your `.env` file:

   ```bash
   cp .env.example .env
   ```

5. Add Database connection in `.env`

6. Run migrations:

   ```bash
   php artisan migrate
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

---
## Use

1. Run and hit localhost URL: http://127.0.0.1:8000/

2. Register & Login user
   New user will be added in Main DB configured in .env

3. For testing purposes, we'll create a tenant dynamically in tinker
   ```bash
    $ php artisan tinker
    $tenant1 = App\Models\Tenant::create(['id' => 'foo']); // creates new DB named 'tenantfoo'
    $tenant1->domains()->create(['domain' => 'foo.localhost']);

    $tenant2 = App\Models\Tenant::create(['id' => 'bar']);
    $tenant2->domains()->create(['domain' => 'bar.localhost']);
    ```

4. Try to access 'http://foo.localhost' and faced an error
    If you want to access dynamically created tenants, follow the below steps

   ```bash
   a. Open your Apache virtual host configuration file:
       C:\xampp\apache\conf\extra\httpd-vhosts.conf

   b. Add a wildcard subdomain entry:
       <VirtualHost *:80>
            ServerName localhost
            ServerAlias *.localhost
            DocumentRoot "C:/xampp/htdocs/your_laravel_project/public"
        
            <Directory "C:/xampp/htdocs/your_laravel_project/public">
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
   
    c. Restart Apache from the XAMPP control panel.
   ```
    
6. Now, http://foo.localhost will be accessible. You can register user in DB named 'tenantfoo' 
