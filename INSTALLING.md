Installing Ion Auth.
===================================

Before installing, please check that you are meeting the minimum server requirements.

There are 3 ways to install this package.

> 1. Move folder from this package to the root folder:

```shell
CI                          # → Root Directory
└── application/
├── ion-auth/               # → Ion-auth directory
├── public
├──...
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'YOUR-ION_AUTH-FOLDER',
```

---

> 2. With Git:

```shell
my-project$ git clone https://github.com/benedmunds/CodeIgniter-Ion-Auth.git
my-project$ git checkout 4
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'Code-Igniter-Ion-Auth',
```
CI                          # → Root Directory
└── application/
├── ion-auth/               # → Ion-auth directory
├── public
├──...
```
Then in your Config/Autoload.php, add this :
```php
'IonAuth' => ROOTPATH . 'YOUR-ION_AUTH-FOLDER',
```


---


> 3. Install it with composer

```shell
$ composer require https://github.com/benedmunds/CodeIgniter-Ion-Auth:dev-4
```

---

### Relational DB Setup
Then just run the appropriate SQL file (if you're using migrations you can
get the migrations from JD here:
https://github.com/iamfiscus/codeigniter-ion-auth-migration).

---

### Use it
The most conveniant way is to create a new controller like this :
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
