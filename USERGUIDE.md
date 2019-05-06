<details>

| **Author Info** | **Class Functions** |
|-----------------|-----------------|
| -   [Ben Edmunds](http://benedmunds.com) | -   [login()](#login)
| -   [GitHub](https://github.com/benedmunds) | -   [logout()](#logout)
| **Basic Info** | -   [register()](#register)
| -   [License](#license) | -   [createUser()](#createUser)
| -   [GitHub Repo](https://github.com/benedmunds/CodeIgniter-Ion-Auth) | -   [update()](#update)
| **Introduction** | -   [updateUser()](#updateUser)
| -   [Server requirements](#requirements) | -   [deleteUser()](#deleteUser)
| -   [Installation](#install) | -   [forgottenPassword()](#forgottenPassword)
| -   [Upgrading](#upgrade) | -   [forgottenPasswordCheck()](#forgottenPasswordCheck)
| -   [Loading the Library](#loading) | -   [loggedIn()](#loggedIn)
| **Configuration** | -   [isAdmin()](#isAdmin)
| -   [Config Options](#use_config) | -   [inGroup()](#inGroup)
| **Miscellaneous** | -   [usernameCheck()](#usernameCheck)
| -   [Cheatsheet](#cheatsheet) | -   [emailCheck()](#emailCheck)
| | -   [identityCheck()](#identityCheck)
| | -   [isMaxLoginAttemptsExceeded()](#isMaxLoginAttemptsExceeded)
| | -   [getAttemptsNum()](#getAttemptsNum)
| | -   [increaseLoginAttempts()](#increaseLoginAttempts)
| | -   [clearLoginAttempts()](#clearLoginAttempts)
| | -   [user()](#user)
| | -   [users()](#users)
| | -   [group()](#group)
| | -   [groups()](#groups)
| | -   [getUsersGroups()](#getUsersGroups)
| | -   [addToGroup()](#addToGroup)
| | -   [removeFromGroup()](#removeFromGroup)
| | -   [createGroup()](#createGroup)
| | -   [updateGroup()](#updateGroup)
| | -   [deleteGroup()](#deleteGroup)
| | -   [messages()](#messages)
| | -   [messagesArray()](#messagesArray)
| | -   [setMessageTemplate()](#setMessageTemplate)
| | -   [errors()](#errors)
| | -   [errorsArray()](#errorsArray)
| | -   [triggerEvents()](#triggerEvents)
| | -   [setHook()](#setHook)
<summary>
Toggle Table of Contents
</summary>
</details>

Documentation > Author: [Ben Edmunds](http://benedmunds.com)

------------------------------------------------------------
[Ion Auth 4](http://benedmunds.com/ion_auth)  ›  Documentation
------------------------------------------------------------

Ion Auth
========

Ion Auth is a simple and lightweight authentication library for the CodeIgniter framework

License
-------

Ion Auth is released under the Apache License v2.0. You can read the license here: [http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Server requirements
-------------------

Ion Auth 4 needs **CodeIgniter 4** and **PHP**≥**7.2**.

Installation
------------

1.  Download the latest version: [https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/4](https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/4)
2.  Copy the files from this package to the correspoding folder in your application folder. For example, copy IonAuth/Config/IonAuth.php to app/Config/IonAuth.php.
3.  You can also copy the entire directory structure into your ThirdParty/ folder. For example, copy everything to app/ThirdParty/IonAuth/
4.  Use the migration file (in Database/Migrations/)

    ```console
    $ php spark migrate:latest -n IonAuth
    ```

5.  Insert default datas (Don't forget to set Config\\Migrations:enabled to true.) Windows :

    ```console
    $ php spark db:seed IonAuth\Database\Seeds\IonAuthSeeder
    ```

    Linux :

    ```console
    $ php spark db:seed IonAuth\\Database\\Seeds\\IonAuthSeeder
    ```

The default login is:

-   Email: admin@admin.com
-   Password: password

Upgrading
---------

1.  Download the latest version: [https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/4](https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/4)
2.  Overwrite Libraries/IonAuth.php and Models/IonAuthModel.php with the new versions.
3.  Overwrite Languages/\* with the news versions.
4.  Check Config/IonAuth.php for evolution.

Upgrading from Ion Auth 2? Check the UPGRADING.md file in the package.

Loading Ion Auth
----------------

You load Ion Auth just like any other library:

```php
$ionAuth = new \IonAuth\Libraries\IonAuth();
```

You can also autoload the library.

Configuration Options
---------------------

Ion Auth is extremely configurable.

To change configuration options simply edit the Config/IonAuth.php file or pass an array when loading the library.

### Tables

-   **`tables['groups']`** Default is 'groups'  
     The table name to use for the groups table.
-   **`tables['users']`** Default is 'users'  
     The table name to use for the users table.
-   **`tables['users_groups']`** Default is 'users\_groups'  
     The table name to use for the users groups table.
-   **`tables['login_attempts']`** Default is 'login\_attempts'  
     The table name to use for the login attempts table.
-   **`join['users']`** Default is 'user\_id'  
     Users table column you want to join WITH.
-   **`join['groups']`** Default is 'group\_id'  
     Group table column you want to join WITH.

### Hash method

-   **`hashMethod`** Default is 'bcrypt'  
     The method to hash the password before storing in database. You can choose between bcrypt (from PHP 5.3) or argon2 (from PHP 7.2)  
     Argon2 is recommended by expert (it is actually the [winner of the Password Hashing Competition](https://password-hashing.net)).  
     Passwords are automatically salted before hashing (everything is stored in the same 'password' column).  
     For more information, check the [password\_hash function help](http://php.net/manual/en/function.password-hash.php).
-   **Bcrypt-specific options:**
    -   **`bcryptDefaultCost`** Default is 10  
         This defines how strong the encryption will be.  
         However, higher the cost, longer it will take to hash (CPU usage). So adjust this based on your server hardware.
    -   **`bcryptAdminCost`** Default is 12  
         Same as bcryptDefaultCost, but for users in the admin group.  
         It is recommended to have a stronger hashing for administrators.

    You should benchmark your server to find the best cost value. It is recommended to have a hash taking at least 100ms (500ms for administrators).  
     This can be done easily with this [little script for bcrypt](https://gist.github.com/Indigo744/24062e07477e937a279bc97b378c3402).  
     It is not recommended (in 2018) to use a value less than 10.
-   **Argon2-specific options:**
    -   **`argon2DefaultParams`** Default is **`['memory_cost' => 1 << 12, 'time_cost' => 2, 'threads' => 2]`**  
         This is an array containing the options for the Argon2 algorithm. The following keys can be set:  
         **`['memory_cost']`**: Maximum memory (in kBytes) that may be used to compute the Argon2 hash. The spec recommends setting the memory cost to a power of 2.  
         **`['time_cost']`**: Number of iterations (used to tune the running time independently of the memory size). This defines how strong the encryption will be.  
         **`['threads']`**: Number of threads to use for computing the Argon2 hash. The spec recommends setting the memory cost to a power of 2.
    -   **`argon2AdminParams`** Default is **`['memory_cost' => 1 << 14, 'time_cost' => 4, 'threads' => 2]`**  
         Same as argon2DefaultParams, but for users in the admin group.  
         It is recommended to have a stronger hashing for administrators.

    You should benchmark your server to find the best parameters. It is recommended to have a hash taking at least 100ms (500ms for administrators).  
     This can be done easily with this [little script for argon2](https://gist.github.com/Indigo744/e92356282eb808b94d08d9cc6e37884c).  
     The argon2 algorithm doesn't have *bad parameters* (even with time\_cost at 1) but remember that longer the hashing, stronger the security.

### Authentication options

-   **`siteTitle`**  
     The title of your site, used for email.
-   **`adminEmail`** Default is 'admin@example.com'  
     Your administrator email address.
-   **`defaultGroup`** Default is 'members'  
     Name of the default user group.
-   **`adminGroup`** Default is 'admin'  
     Name of the admin group.
-   **`identity`** Default is 'email'  
     Column to use for uniquely identifing user/logging in/etc. Usual choices are 'email' OR 'username', but any unique key from your table can be used as identity.  
     IMPORTANT: If you are changing it from the default (email), update the UNIQUE constraint in your DB.
-   **`minPasswordLength`** Default is '8'  
     Minimum length of passwords.  
     This minimum is not enforced directly by the library.  
     The controller should define a validation rule to enforce it.  
     See the Auth controller for an example implementation.  

     Additional note: the library will fail for empty password or password size above 4096 bytes.  
     This is an arbitrary (long) value to protect against DOS attack.
-   **`emailActivation`** Default is 'false'  
     TRUE or FALSE. Sets whether to require email activation or not.
-   **`manualActivation`** Default is 'false'  
     TRUE or FALSE. Sets whether to require manual activation (probably by an admin user) or not.
-   **`rememberUsers`** Default is 'true'  
     true or false. Sets whether to enable 'remember me' functionality or not.
-   **`userExpire`** Default is '86500'  
     Sets how long to remember the user for in seconds. Set to zero for no expiration.
-   **`userExtendonLogin`** Default is 'false'  
     TRUE or FALSE. Extend the users session expiration on login.
-   **`trackLoginAttempts`** Default is 'false'  
     Track the number of failed login attempts for each user or ip (see trackLoginIpAddress option).
-   **`trackLoginIpAddress`** Default is 'true'  
     Track login attempts by IP Address, if FALSE will track based on identity.
-   **`maximumLoginAttempts`** Default is 3  
     Set the maximum number of failed login attempts. This maximum is not enforced by the library, but is used by \$this-\>ionAuth-\>isMaxLoginAttemptsExceeded(). The controller should check this function and act appropriately. If set to 0, there is no maximum.
-   **`forgotPasswordExpiration`** Default is 1800  
     Number of seconds before a forgot password request expires. If set to 0, requests will not expire.  
     30 minutes to 1 hour are good values (enough for a user to receive the email and reset its password).  
     You should not set a value too high (or 0), as it could lead to security issue!
-   **`recheckTimer`** Default is 0  
     The number of seconds after which the session is checked again against database to see if the user still exists and is active.  
     Leave 0 if you don't want session recheck. if you really think you need to recheck the session against database, we would recommend a higher value, as this would affect performance.

### Cookie options

-   **`rememberCookieName`** Default is 'remember\_code'  
     Cookie name for the "Remember me" feature.

### Email options

-   **`emailType`** Default us 'html'  
     Email content type.

### Templates options

-   **`emailTemplates`** Default is 'auth/email/'  
     Folder where the email view templates are stored.
-   **`emailActivate`** Default is 'activate.tpl.php'  
     Filname of the email activation view template.
-   **`emailForgotPassword`** Default is 'forgot\_password.tpl.php'  
     Filname of the forgot password email view template.

### Errors and Messages Templates

-   **`templates['errors']['list']`** Default is specified in 'Config/Validation.php'
     Template for list errors.  
     *Doc: [https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html\#customizing-error-display](https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html#customizing-error-display)*
-   **`templates['messages']['list']`** Default is 'IonAuth\\Views\\Messages\\list'  
     Template for list messages.
-   **`templates['messages']['single']`** Default is 'IonAuth\\Views\\Messages\\single'  
     Template for single message.

Class Function Reference
========================

**`NOTE:`** `Methods available in the model are called through the controller using PHP5 magic. You should never use IonAuthModel->method() in your applications.`

login()
-------

``` {.f}
login(string $identity, string $password, bool $remember=false): bool
```

Logs the user into the system.

**Parameters**

1.  **`identity`** - string REQUIRED. Username, email or any unique value in your users table, depending on your configuration.
2.  **`password`** - string REQUIRED.
3.  **`remember`** - boolean OPTIONAL. TRUE sets the user to be remembered if enabled in the configuration.

**Return**

-   boolean. TRUE if the user was successfully logged in FALSE if the user was not logged in.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$password = '12345678';
$remember = TRUE; // remember the user
$this->ionAuth->login($identity, $password, $remember);
```

logout()
--------

``` {.f}
logout(): bool
```

Logs the user out of the system.

**Usage**

```php
$this->ionAuth->logout();
```

register()
----------

``` {.f}
register(string $identity, string $password, string $email, array $additionalData=[], array $groups=[])
```

Register (create) a new user.

**Parameters**

1.  **`identity`** - string REQUIRED. This must be the value that uniquely identifies the user when he is registered. If you chose "email" as \$config['identity'] in the configuration file, you must put the email of the new user.
2.  **`password`** - string REQUIRED.
3.  **`email`** - string REQUIRED.
4.  **`additionalData`** - multidimensional array OPTIONAL.
5.  **`groups`** - array OPTIONAL. If not passed the default group name set in the config will be used.

**Return**

-   mixed. The ID of the user if the user was successfully created, FALSE if the user was not created.

**Usage**

```php
$username = 'benedmunds';
$password = '12345678';
$email = 'ben.edmunds@gmail.com';
$additional_data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);
$group = array('1'); // Sets user to admin.

$this->ionAuth->register($username, $password, $email, $additional_data, $group);
```   

createUser()
------------

``` {.f}
createUser()
```

createUser is an alternate method for [register()](#register) method.

update()
--------

``` {.f}
update(int $id, array $data): bool
```

Update a user.

**Parameters**

1.  **`id`** - integer REQUIRED.
2.  **`data`** - multidimensional array REQUIRED.

**Return**

-   boolean. TRUE if the user was successfully updated FALSE if the user was not updated.

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
    'password' => '123456789',
    );

$this->ionAuth->update($id, $data);
```

updateUser()
------------

``` {.f}
updateUser(): bool
```

updateUser() is an alternate method for [update()](#update) method.

deleteUser()
------------

``` {.f}
deleteUser(int $id): bool
```

Delete a user.

**Parameters**

1.  **`id`** - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was successfully deleted FALSE if the user was not deleted.

**Usage**

```php
$id = 12;
$this->ionAuth->deleteUser($id);
```

forgottenPassword()
-------------------

``` {.f}
forgottenPassword(string $identity)
```

Resets a users password by emailing the user a reset code.

**Parameters**

1.  **`identity`** - string REQUIRED. (as defined in Config/IonAuth.php)

**Return**

-   boolean. TRUE if the users password was successfully reset FALSE if the users password was not reset.

**Usage**

This example assumes you have 'email' selected as the identity in Config/IonAuth.php

```php
//Working code for this example is in the example Auth controller in the github repo
function forgot_password()
{
    $this->validation->setRule('email', 'Email Address', 'required');

    if ($this->validation->run() == false) {
        //setup the input
        $this->data['email'] = array(
            'name'    => 'email',
            'id'      => 'email',
        );

        //set any errors and display the form
        $this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->flashdata('message');
        return view('auth/forgot_password', $this->data);
    }
    else {
        //run the forgotten password method to email an activation code to the user
        $forgotten = $this->ionAuth->forgottenPassword($this->request->getPost('email'));

        if ($forgotten)
        {
            //if there were no errors
            $this->session->setFlashdata('message', $this->ionAuth->messages());
            return redirect()->to("auth/login"); //we should display a confirmation page here instead of the login page
        }
        else
        {
            $this->session->setFlashdata('message', $this->ionAuth->errors());
            return redirect()->to("auth/forgot_password");
        }
    }
}
```

forgottenPasswordCheck()
------------------------

``` {.f}
forgottenPasswordCheck(string $code)
```

Check to see if the forgotten password code is valid.

**Parameters**

1.  **`code`** - string REQUIRED.

**Return**

-   object / bool. Returns the user record if valid, return FALSE if invalid.

**Usage**

```php
$user = $this->ionAuth->forgottenPasswordCheck($code);
if ($user)
{
    //display the password reset form
}
```       

loggedIn()
----------

``` {.f}
loggedIn(): bool
```

Check to see if a user is logged in.

**Return**

-   boolean. TRUE if the user is logged in FALSE if the user is not logged in.

**Usage**

```php
if (!$this->ionAuth->loggedIn())
{
    return redirect()->to('auth/login');
}
```       

isAdmin()
---------

``` {.f}
isAdmin(int $id=0): bool
```

Check to see if the currently logged in user is an admin.

**Parameters**

1.  **`id`** - integer OPTIONAL. If a user id is not passed the id of the currently logged in user will be used.

**Return**

-   boolean. TRUE if the user is an admin FALSE if the user is not an admin.

**Usage**

```php
if (!$this->ionAuth->isAdmin())
{
    $this->session->markAsFlashdata('message', 'You must be an admin to view this page');
    redirect()->to('welcome/index');
}
```
        

inGroup()
---------

``` {.f}
inGroup($checkGroup, int $id=0, bool $checkAll=false): bool
```

Check to see if a user is in a group(s).

**Parameters**

1.  **`checkGroup`** - string REQUIRED. Integer or array of strings and integers.
2.  **`id`** - integer OPTIONAL. If a user id is not passed the id of the currently logged in user will be used.
3.  **`checkAll`** - boolean OPTIONAL. Whether to check if user is in all groups, or in any group.

**Return**

-   boolean. TRUE if the user is in all or any (based on passed param), FALSE otherwise.

**Usage**

```php
# single group (by name)
$group = 'gangstas';
if (!$this->ionAuth->inGroup($group))
{
    $this->session->markAsFlashdata('message', 'You must be a gangsta to view this page');
    redirect()->to('welcome/index');
}

# single group (by id)
$group = 1;
if (!$this->ionAuth->inGroup($group))
{
    $this->session->markAsFlashdata('message', 'You must be part of the group 1 to view this page');
    redirect()->to('welcome/index');
}

# multiple groups (by name)
$group = array('gangstas', 'hoodrats');
if (!$this->ionAuth->inGroup($group))
{
    $this->session->markAsFlashdata('message', 'You must be a gangsta OR a hoodrat to view this page');
    redirect()->to('welcome/index');
}

# multiple groups (by id)
$group = array(1, 2);
if (!$this->ionAuth->inGroup($group))
{
    $this->session->markAsFlashdata('message', 'You must be a part of group 1 or 2 to view this page');
    redirect()->to('welcome/index');
}

# multiple groups (by id and name)
$group = array('gangstas', 2);
if (!$this->ionAuth->inGroup($group))
{
    $this->session->markAsFlashdata('message', 'You must be a part of the gangstas or group 2');
    redirect()->to('welcome/index');
}

# multiple groups (by id) and check if all exist
$group = array(1, 2);
if (!$this->ionAuth->inGroup($group, false, true))
{
    $this->session->markAsFlashdata('message', 'You must be a part of group 1 and 2 to view this page');
    redirect()->to('welcome/index');
}
```
        

usernameCheck()
---------------

``` {.f}
usernameCheck(string $username): bool
```

Check to see if the username is already registered.

**Parameters**

1.  **`username`** - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not registered.

**Usage**

```php
//This is a lame example but it works.  Usually you would use this method with form_validation.
$username = $this->input->post('username');
$password = $this->input->post('password');
$email = $this->input->post('email');
$additional_data = array(
    'first_name' => $this->input->post('first_name'),
    'last_name' => $this->input->post('last_name'),
);

if (!$this->ionAuth->usernameCheck($username))
{
    $group_name = 'users';
    $this->ionAuth->register($username, $password, $email, $additional_data, $group_name);
}
```

emailCheck()
------------

``` {.f}
emailCheck(string $email=''): bool
```

Check to see if the email is already registered.

**Parameters**

1.  **`email`** - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not registered.

**Usage**

```php
//This is a lame example but it works.  Usually you would use this method with form_validation.
$username = $this->input->post('username');
$password = $this->input->post('password');
$email = $this->input->post('email');
$additional_data = array(
    'first_name' => $this->input->post('first_name'),
    'last_name' => $this->input->post('last_name'),
);

if (!$this->ionAuth->emailCheck($email))
{
    $group_name = 'users';
    $this->ionAuth->register($username, $password, $email, $additional_data, $group_name);
}
```

identityCheck()
---------------

``` {.f}
identityCheck(string $identity=''): bool
```

Check to see if the identity is already registered.

**Parameters**

1.  **`identity`** - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not registered.

**Usage**

```php
//This is a lame example but it works.
$user = $this->ionAuth->user();
$data = array(
    'identity' => $this->input->post('identity'),
    'first_name' => $this->input->post('first_name'),
    'last_name' => $this->input->post('last_name'),
);

if ($data['identity'] === $user->username || $data['identity'] === $user->email || $this->ionAuth->identityCheck($data['identity']) === FALSE)
{
    $this->ionAuth->updateUser($user->id, $data)
}
```

isMaxLoginAttemptsExceeded()
----------------------------

``` {.f}
isMaxLoginAttemptsExceeded(string $identity, $ipAddress=null): bool
```

If login attempt tracking is enabled, checks to see if the number of failed login attempts for this identity or ip address has been exceeded. The controller must call this method and take any necessary actions. Login attempt limits are not enforced in the library.

**Parameters**

1.  **`identity`** - string REQUIRED.
2.  **`ipAddress`** - OPTIONAL.

**Return**

-   boolean. TRUE if maximumLoginAttempts is exceeded FALSE if not or if login attempts not tracked.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
if ($this->ionAuth->isMaxLoginAttemptsExceeded($identity))
{
    $this->session->markAsFlashdata('message', 'You have too many login attempts');
    redirect()->to('welcome/index');
}
```       

getAttemptsNum()
----------------

``` {.f}
getAttemptsNum(string $identity, $ipAddress=null): int
```

Returns the number of failed login attempts for this identity or ip address.

**Parameters**

1.  **`identity`** - string REQUIRED.

**Return**

-   integer. The number of failed login attempts for this identity or ip address.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$num_attempts = $this->ionAuth->getAttemptsNum($identity);
```  

increaseLoginAttempts()
-----------------------

``` {.f}
increaseLoginAttempts(string $identity): bool
```

If login attempt tracking is enabled, records another failed login attempt for this identity or ip address. This method is automatically called during the login() method if the login failed.

**Parameters**

1.  **`identity`** - string REQUIRED.

**Return**

-   boolean.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$password = '12345678';
if ($this->ionAuth->login($identity, $password) == FALSE)
{
    $this->ionAuth->increaseLoginAttempts($identity);
}
```       

clearLoginAttempts()
--------------------

``` {.f}
clearLoginAttempts(string $identity, int $oldAttemptsAxpirePeriod=86400, $ipAddress = null): bool
```

Clears all failed login attempt records for this identity or this ip address. This method is automatically called during the login() method if the login succeded.

**Parameters**

1.  **`identity`** - string REQUIRED.
2.  **`oldAttemptsAxpirePeriod`** - integer. OPTIONAL.
3.  **`ipAddress`** - OPTIONAL.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$password = '12345678';

if ($this->ionAuth->login($identity, $password) == TRUE)
{
    $this->ionAuth->clearLoginAttempts($identity);
}
```       

user()
------

``` {.f}
user(int $id=0): self
```

Get a user.

**Parameters**

1.  **`id`** - integer OPTIONAL. If a user id is not passed the id of the currently logged in user will be used.

**Return**

-   model object

**Usage**

```php
$user = $this->ionAuth->user()->row();
echo $user->email;
```

**Output**

```php
stdClass Object (
    [id] => 1
    [ip_address] => 127.0.0.1
    [username] => administrator
    [password] => 59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4
    [email] => admin@admin.com
    [activation_code] => 19e181f2ccc2a7ea58a2c0aa2b69f4355e636ef4
    [forgotten_password_code] => 81dce1d0bc2c10fbdec7a87f1ff299ed7e4c9e4a
    [remember_code] => 9d029802e28cd9c768e8e62277c0df49ec65c48c
    [created_on] => 1268889823
    [last_login] => 1279464628
    [active] => 0
    [first_name] => Admin
    [last_name] => Account
    [company] => Some Corporation
    [phone] => (123)456-7890
)
```    

users()
-------

``` {.f}
users($groups=null): self
```

Get the users.

**Parameters**

1.  **`groups`** - array OPTIONAL. Group names, or group IDs and names. If an array of group ids, of group names, or of group ids and names are passed (or a single group id or name) this will return the users in those groups.

**Return**

-   model object

**Usage**

```php
// get all users
$users = $this->ionAuth->users()->result();
```

```php
// get users from group with id of '1'
$users = $this->ionAuth->users(1)->result();
```

```php
// get users from 'members' group
$users = $this->ionAuth->users('members')->result();
```

```php
// get users from 'admin' and 'members' group
$users = $this->ionAuth->users(array('admin', 'members'))->result();
```

```php
// get users from 'admin' group, 'members' group and group with id '4'
$users = $this->ionAuth->users(array('admin', 4, 'members'))->result();
```

```php
// get users from group with id of '1'
$users = $this->ionAuth->users(1)->result();
```

```php
// get users from 'members' group
$users = $this->ionAuth->users('members')->result();
```

```php
// get users from 'admin' and 'members' group
$users = $this->ionAuth->users(array('admin', 'members'))->result();
```

```php
// get users from 'admin' group, 'members' group and group with id '4'
$users = $this->ionAuth->users(array('admin', 4 ,'members'))->result();
```

group()
-------

``` {.f}
group(int $id=0)
```

Get a group.

**Parameters**

1.  **`id`** - integer REQUIRED.

**Return**

-   object

**Usage**

```php
$groupId = 2;
$group = $this->ionAuth->group($groupId)->result();
```   

groups()
--------

``` {.f}
groups()
```

Get the groups.

**Return**

-   array of objects

**Usage**

```php
$groups = $this->ionAuth->groups()->result();
```   

messages()
----------

``` {.f}
messages(): string
```

Get messages.

**Return**

-   string

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);

if ($this->ionAuth->updateUser($id, $data))
{
    $messages = $this->ionAuth->messages();
    echo $messages;
}
else
{
    $errors = $this->ionAuth->errors();
    echo $errors;
}
```     

messagesArray()
---------------

``` {.f}
messagesArray(bool $langify=true): array
```

Get messages as an array.

**Parameters**

1.  **`langify`** - boolean OPTIONAL. TRUE means that the messages will be langified.

**Return**

-   array

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);

if ($this->ionAuth->updateUser($id, $data))
{
    $messages = $this->ionAuth->messagesArray();
    foreach ($messages as $message)
    {
        echo $message;
    }
}
else
{
    $errors = $this->ionAuth->errorsArray();
    foreach ($errors as $error)
    {
        echo $error;
    }
}
```       

getUsersGroups()
----------------

``` {.f}
getUsersGroups(int $id=0)
```

Get all groups a user is part of.

**Parameters**

1.  **`id`** - integer OPTIONAL. If a user id is not passed the id of the currently logged in user will be used.

**Return**

```php
stdClass Object (
    [id] => 1
    [name] => admins
    [description] => Administrator
)
```       

**Usage**

```php
$user_groups = $this->ionAuth->getUsersGroups($user->id)->result();
```
        

addToGroup()
------------

``` {.f}
addToGroup($groupIds, int $userId=0): int
```

Add user to group

**Parameters**

1.  **`groupIds`** - integer or array REQUIRED.
2.  **`userId`** - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was added to group(s) FALSE if the user is not added to group(s).

**Usage**

```php
// pass an array of group ID's and user ID
$this->ionAuth->addToGroup(array('1', '3', '6'), $userId);

// pass a single ID and user ID
$this->ionAuth->addToGroup(1, $userId);
```

removeFromGroup()
-----------------

``` {.f}
removeFromGroup($groupIds=0, int $userId=0): bool
```

Remove user from group(s)

**Parameters**

1.  **`groupIds`** - NULL, integer or array REQUIRED. NULL will remove the user from all groups.
2.  **`userId`** - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was removed from group(s) FALSE if the user is not removed from group(s).

**Usage**

```php
// pass an array of group ID's and user ID
$groupIds = array('1', '3', '6');
$this->ionAuth->removeFromGroup($groupIds, $userId);

// pass a single ID and user ID
$this->ionAuth->removeFromGroup(1, $userId);

// pass NULL to remove user from all groups
$this->ionAuth->removeFromGroup(NULL, $userId);
```

createGroup()
-------------

``` {.f}
createGroup(string $groupName='', string $groupDescription='', array $additionalData=[])
```

Create a group

**Parameters**

1.  **`groupName`** - string REQUIRED.
2.  **`groupDescription`** - string.
3.  **`additionalData`** - array.

**Return**

-   brand new group\_id if the group was created, false if the group creation failed.

**Usage**

```php
// pass the right arguments and it's done
$group = $this->ionAuth->createGroup('new_test_group', 'This is a test description');

if (! $group)
{
    $viewErrors = $this->ionAuth->messages();
}
else
{
    $newGroupId = $group;
    // do more cool stuff
}
```       

updateGroup()
-------------

``` {.f}
updateGroup(int $groupId, string $groupName='', array $additionalData=[]): bool
```

Update details of a group

**Parameters**

1.  **`groupId`** - integer REQUIRED.
2.  **`groupName`** - string REQUIRED.
3.  **`additionalData`** - array.

**Return**

-   boolean. TRUE if the group was updated, FALSE if the update failed.

**Usage**

```php
// source these things from anywhere you like (eg., a form)
$groupId = 2;
$groupName = 'test_group_changed_name';
$additionalData = array(
    'description' => 'New Description'
);

// pass the right arguments and it's done
$group_update = $this->ionAuth->updateGroup($groupId, $groupName, $additionalData);

if(!$group_update)
{
    $view_errors = $this->ionAuth->messages();
}
else
{
    // do more cool stuff
}
```        

deleteGroup()
-------------

``` {.f}
deleteGroup(int $groupId): bool
```

Remove a group. Removes the group details from the configured 'groups' table. Users belonging to the group are stripped of this status (references to this group are removed from users\_groups), but user data itself remains untouched.

**Parameters**

1.  **`groupId`** - integer REQUIRED.

**Return**

-   boolean. TRUE if the group was deleted, FALSE if the delete failed.

**Usage**

```php
// source this from anywhere you like (eg., a form)
$groupId = 2;

// pass the right arguments and it's done
$groupDelete = $this->ionAuth->deleteGroup($groupId);

if (! $groupDelete)
{
    $viewErrors = $this->ionAuth->messages();
}
else
{
    // do more cool stuff
}
```       

setMessageTemplate()
--------------------

``` {.f}
setMessageTemplate(string $single='', string $list=''): bool
```

Set the message templates.

**Parameters**

1.  **`single`** - string OPTIONAL. Single template.
2.  **`list`** - string OPTIONAL. List template.

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);

if ($this->ionAuth->updateUser($id, $data))
{
    $this->ionAuth->setMessageTemplate('', 'list_message');
    $messages = $this->ionAuth->messages();
    echo $messages;
}
else
{
    $errors = $this->ionAuth->errors();
    echo $errors;
}
```

errors()
--------

``` {.f}
errors(string $template='list'): string
```

Get the errors.

**Parameters**

1.  **`list`** - string OPTIONAL. List template.

**Return**

-   string

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);

if ($this->ionAuth->updateUser($id, $data))
{
    $messages = $this->ionAuth->messages();
    echo $messages;
}
else
{
    $errors = $this->ionAuth->errors();
    echo $errors;
}
```       

errorsArray()
-------------

``` {.f}
errorsArray(bool $langify=true): array
```

Get error messages as an array.

**Return**

-   array

**Parameters**

1.  **`langify`** - boolean OPTIONAL. TRUE means that the error messages will be langified (default TRUE).

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
    );

if ($this->ionAuth->updateUser($id, $data))
{
    $messages = $this->ionAuth->messagesArray();
    foreach ($messages as $message)
    {
        echo $message;
    }
}
else
{
    $errors = $this->ionAuth->errorsArray();
    foreach ($errors as $error)
    {
        echo $error;
    }
}
```
        

setHook()
---------

``` {.f}
setHook(string $event, string $name, string $class, string $method, array $arguments=[]): self
```

Set a single or multiple functions to be called when trigged by triggerEvents(). See an example here: [https://gist.github.com/657de89b26decda2b2fa](https://gist.github.com/657de89b26decda2b2fa)

**Parameters**

1.  **`event`** - string REQUIRED.
2.  **`name`** - string REQUIRED.
3.  **`class`** - string REQUIRED.
4.  **`method`** - string REQUIRED.
5.  **`arguments`** - array OPTIONAL.

**Usage**

```php
<?php

use CodeIgniter\Controller;
use IonAuth\Libraries\IonAuth;

class Accounts extends Controller {

    protected $ionAuth;

    public function __construct()
    {
        $this->ionAuth = new IonAuth();
        // ....

        /**
        *
        * make sure we loaded IonAuth
        * The following does not need to go in __construct() it just needs to be set before
        * you triggerEvents().
        */
        $event = 'socialpush';
        $class = 'Accounts';
        $args = array('this is the content of the message', 'billy');

        $name = 'activate_sendmail';
        $method = 'email';
        $this->ionAuth->setHook($event, $name, $class, $method, $args);

        $name = 'call_Twitter';
        $method = 'twitter';
        $this->ionAuth->setHook($event, $name, $class, $method, $args);

        $name = 'call_MailChimp_API';
        $method = 'mailchimp';
        $this->ionAuth->setHook($event, $name, $class, $method, $args);

        $name = 'call_Facebook_API';
        $method = 'facebook';
        $this->ionAuth->setHook($event, $name, $class, $method, $args);

        $name = 'call_gPlus_API';
        $method = 'gplus';
        $this->ionAuth->setHook($event, $name, $class, $method, $args);
    }

    public function postMessage($one)
    {
        $this->ionAuth->triggerEvents('socialpush');
    }
    public function email($content, $who)
    {
        return true;
    }
    public function twitter($content, $who)
    {
        return true;
    }
    public function mailchimp($content, $who)
    {
        return true;
    }
    public function facebook($content, $who)
    {
        return true;
    }
    public function gplus($content, $who)
    {
        return true;
    }
}
```

triggerEvents()
---------------

``` {.f}
triggerEvents($events): void
```

Call Additional functions to run that were registered with [setHook()](#setHook).

**Parameters**

1.  **`events`** - string or array REQUIRED. Event(s) name.

**Usage**

```php
$this->ionAuth->triggerEvents('socialpush');
```
