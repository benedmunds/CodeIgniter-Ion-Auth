Installing Ion Auth 4.x
===================================

Before installing, please check that you are meeting the minimum server requirements.
Ion Auth 4 needs CodeIgniter 4.x, PHP 7.1 and Composer.

> For using the library, you should install with Composer

For an existing composer project:
```shell
$ composer config minimum-stability dev
$ composer config repositories.ionAuth vcs git@github.com:benedmunds/CodeIgniter-Ion-Auth.git
$ composer require benedmunds/CodeIgniter-Ion-Auth:4.x-dev
```

For a new project:
```shell
$ composer init
$ composer config minimum-stability dev
$ composer config repositories.ionAuth vcs git@github.com:benedmunds/CodeIgniter-Ion-Auth.git
$ composer require benedmunds/CodeIgniter-Ion-Auth:4.x-dev
```
---

> For developing against the library, you can use git directly
```shell
my-project$ git clone https://github.com/benedmunds/CodeIgniter-Ion-Auth.git
my-project$ cd CodeIgniter-Ion-Auth
CodeIgniter-Ion-Auth$ git checkout 4
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'CodeIgniter-Ion-Auth',
```

---

### Configuration
Once installed, maybe, you need to configure IonAuth library.
In your application, perform the following setup:
Create IonAuth.php in your Config directory :
```php
<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
    // set your specific config
    // public $siteTitle                = 'Example.com';       // Site Title, example.com
    // public $adminEmail               = 'admin@example.com'; // Admin Email, admin@example.com
    // public $emailTemplates           = 'App\\Views\\auth\\email\\';
    // ...
}

```

### Relational DB Setup
Then use the migration file (in Database/Migrations/).
```
$ php spark migrate -n IonAuth
```
Don't forget to set Config\Migrations:enabled to true.

You can also use the seeds file to insert default datas:
Windows :
```
$ php spark db:seed IonAuth\Database\Seeds\IonAuthSeeder
```
Linux :
```
$ php spark db:seed IonAuth\\Database\\Seeds\\IonAuthSeeder
```

---

### Use it
The most convenient way is to create a new controller like this :
```php
<?php namespace App\Controllers;

class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */
    // protected $viewsFolder = 'auth';
}
```
You can also add routes configs in 'Config\Routes.php':
```php
$routes->group('auth', ['namespace' => 'IonAuth\Controllers'], function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
	// $routes->get('/', 'Auth::index');
	// $routes->add('create_user', 'Auth::create_user');
	// $routes->add('edit_user/(:num)', 'Auth::edit_user/$1');
	// $routes->add('create_group', 'Auth::create_group');
	// $routes->get('activate/(:num)', 'Auth::activate/$1');
	// $routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2');
	// $routes->add('deactivate/(:num)', 'Auth::deactivate/$1');
	// $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
	// $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
	// ...
});
```
