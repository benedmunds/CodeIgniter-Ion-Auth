Installing Ion Auth.
===================================

Before installing, please check that you are meeting the minimum server requirements.

There are different ways to install this package.


> 1. With composer

```shell
$ composer config repositories.ionAuth vcs git@github.com:benedmunds/CodeIgniter-Ion-Auth.git
$ composer require benedmunds/CodeIgniter-Ion-Auth:4.0.3
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
CI                          # → Root Directory
├── application/
├── ion-auth/               # → Ion-auth directory
├── public
├──...
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'YOUR-ION_AUTH-FOLDER',
```

---

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
	$routes->get('forgot_password', 'Auth::forgot_password');
});
```
