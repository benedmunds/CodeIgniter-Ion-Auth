Installing Ion Auth 4.x
===================================

Before installing, please check that you are meeting the minimum server requirements.
Ion Auth 4 needs CodeIgniter 4.x and PHP 7.1.

There are different ways to install this package.


> 1. With composer

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

> 2. With Git:

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

> 3. Download the archive, and move folder from this package to the root folder:

```shell
CI 4.x                           # → Root Directory
├── app/
├── ion-auth/               # → Ion-auth directory
├── public
├──...
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'YOUR-ION_AUTH-FOLDER',
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
    // ...
}

```

### Relational DB Setup
Then use the migration file (in Database/Migrations/).
```
$ php spark migrate:latest -n IonAuth
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
	$routes->get('/', 'Auth::index');
	$routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
});
```
