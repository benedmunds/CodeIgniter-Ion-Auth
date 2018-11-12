Installing Ion Auth.
===================================

Before installing, please check that you are meeting the minimum server requirements.

There are different ways to install this package.


> 1. With composer

```shell
$ composer require https://github.com/benedmunds/CodeIgniter-Ion-Auth:dev-4
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
Then just run the appropriate SQL file or if you prefere, use the migration file (in Database/Migrations/).

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
