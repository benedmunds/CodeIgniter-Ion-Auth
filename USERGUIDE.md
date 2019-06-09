<details>

| **Author Info**                      | **Configuration**                    |
| ------------------------------------ | ------------------------------------ |
| -[Ben Edmunds](http://benedmunds.com)| -[Config Options](#use_config)       |
| -[GitHub](https://github.com/benedmunds)| **Class Functions**               |
| **Basic Info**                       | -   [login()](#login)                |
| -[License](#license)                 | -   [logout()](#logout)              |
| -[GitHub Repo](https://github.com/benedmunds/CodeIgniter-Ion-Auth) | -   [register()](#register) |
| **Introduction**                     | -   [create\_user()](#create_user)   |
| -[Server requirements](#requirements)| -   [update()](#update)              |
| -[Installation](#installation)       | -   [update\_user()](#update_user)   |
| -[Upgrading](#upgrade)               | -   [delete\_user()](#delete_user)   |
| -[Loading the Library](#loading)     | -   [forgotten\_password()](#forgotten_password) |
|                                      | -   [forgotten\_password\_check()](#forgotten_password_check) |
|                                      | -   [logged\_in()](#logged_in)       |
|                                      | -   [is\_admin()](#is_admin)         |
|                                      | -   [in\_group()](#in_group)         |
|                                      | -   [username\_check()](#username_check) |
|                                      | -   [email\_check()](#email_check)   |
|                                      | -   [identity\_check()](#identity_check) |
|                                      | -   [is\_max\_login\_attempts\_exceeded()](#is_max_login_attempts_exceeded) |
|                                      | -   [get\_attempts\_num()](#get_attempts_num) |
|                                      | -   [increase\_login\_attempts()](#increase_login_attempts) |
|                                      | -   [clear\_login\_attempts()](#clear_login_attempts) |
|                                      | -   [user()](#user)                  |
|                                      | -   [users()](#users)                |
|                                      | -   [group()](#group)                |
|                                      | -   [groups()](#groups)              |
|                                      | -   [get\_users\_groups()](#get_users_groups) |
|                                      | -   [add\_to\_group()](#add_to_group) |
|                                      | -   [remove\_from\_group()](#remove_from_group) |
|                                      | -   [create\_group()](#create_group) |
|                                      | -   [update\_group()](#update_group) |
|                                      | -   [delete\_group()](#delete_group) |
|                                      | -   [messages()](#messages)          |
|                                      | -   [messages\_array()](#messages_array) |
|                                      | -   [set\_message\_delimiters()](#set_message_delimiters) |
|                                      | -   [errors()](#errors)              |
|                                      | -   [errors\_array()](#errors_array) |
|                                      | -   [set\_error\_delimiters()](#set_error_delimiters) |
|                                      | -   [trigger\_events()](#trigger_events) |
|                                      | -   [set\_hook()](#set_hook)         |

<summary>
Toggle Table of Contents
</summary>
</details>


  Documentation  ›  Author : [Ben Edmunds](http://benedmunds.com)

  --------------------------------------------------------------
  [Ion Auth](http://benedmunds.com/ion_auth)  ›  Documentation
  --------------------------------------------------------------


Ion Auth
========

Ion Auth is a simple and lightweight authentication library for the
CodeIgniter framework

License
-------

Ion Auth is released under the Apache License v2.0. You can read the
license here:
[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Server requirements
-------------------

Ion Auth 3 needs **CodeIgniter 3** and **PHP 5.6**.\
 It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues.\
 If running an old PHP version, you may need
[password\_compat](https://github.com/ircmaxell/password_compat).

Installation
------------

1.  Download the latest version:
    [https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3](https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3)
2.  Copy the files from this package to the correspoding folder in your
    application folder. For example, copy Ion\_auth/config/ion\_auth.php
    to system/application/config/ion\_auth.php.
3.  You can also copy the entire directory structure into your
    third\_party/ folder. For example, copy everything to
    /application/third\_party/ion\_auth/
4.  Run the appropriate SQL file from the /sql directory.

The default login is:

-   Email: admin@admin.com
-   Password: password

Upgrading
---------

1.  Download the latest version:
    [https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3](https://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3)
2.  Overwrite "libraries/ion\_auth.php" and
    "models/ion\_auth\_model.php" with the new versions.
3.  Overwrite "language/\*" with the news versions.
4.  Check "config/ion\_auth.php" for evolution.

Upgrading from Ion Auth 2? Check the UPGRADING.md file in the package.

Loading Ion Auth
----------------

You load Ion Auth just link any other library:

```php
    $this->load->library('ion_auth');
```

Do make sure to load your database connection first, that can be loaded
manually or autloaded.

You can also autoload the library.

Configuration Options
---------------------

Ion Auth is extremely configurable.

To change configuration options simply edit the config/ion\_auth.php
file or pass an array when loading the library.

### Tables

-   **tables['groups']** Default is 'groups'\
     The table name to use for the groups table.
-   **tables['users']** Default is 'users'\
     The table name to use for the users table.
-   **tables['users\_groups']** Default is 'users\_groups'\
     The table name to use for the users groups table.
-   **tables['login\_attempts']** Default is 'login\_attempts'\
     The table name to use for the login attempts table.
-   **join['users']** Default is 'user\_id'\
     Users table column you want to join WITH.
-   **join['groups']** Default is 'group\_id'\
     Group table column you want to join WITH.

### Hash method

-   **hash\_method** Default is 'bcrypt'\
     The method to hash the password before storing in database. You can
    choose between bcrypt (from PHP 5.3) or argon2 (from PHP 7.2)\
     Argon2 is recommended by expert (it is actually the [winner of the
    Password Hashing Competition](https://password-hashing.net)).\
     Passwords are automatically salted before hashing (everything is
    stored in the same 'password' column).\
     For more information, check the [password\_hash function
    help](http://php.net/manual/en/function.password-hash.php).
-   **Bcrypt-specific options:**\
    -   **bcrypt\_default\_cost** Default is 10\
         This defines how strong the encryption will be.\
         However, higher the cost, longer it will take to hash (CPU
        usage). So adjust this based on your server hardware.
    -   **bcrypt\_admin\_cost** Default is 12\
         Same as bcrypt\_default\_cost, but for users in the admin
        group.\
         It is recommended to have a stronger hashing for
        administrators.

    You should benchmark your server to find the best cost value. It is
    recommended to have a hash taking at least 100ms (500ms for
    administrators).\
     This can be done easily with this [little script for
    bcrypt](https://gist.github.com/Indigo744/24062e07477e937a279bc97b378c3402).\
     It is not recommended (in 2018) to use a value less than 10.
-   **Argon2-specific options:**\
    -   **argon2\_default\_params** Default is ['memory\_cost' =\> 1
        \<\< 12, 'time\_cost' =\> 2, 'threads' =\> 2]\
         This is an array containing the options for the Argon2
        algorithm. The following keys can be set: \
         **['memory\_cost']**: Maximum memory (in kBytes) that may be
        used to compute the Argon2 hash. The spec recommends setting the
        memory cost to a power of 2.\
         **['time\_cost']**: Number of iterations (used to tune the
        running time independently of the memory size). This defines how
        strong the encryption will be.\
         **['threads']**: Number of threads to use for computing the
        Argon2 hash. The spec recommends setting the memory cost to a
        power of 2.
    -   **argon2\_admin\_params** Default is ['memory\_cost' =\> 1 \<\<
        14, 'time\_cost' =\> 4, 'threads' =\> 2]\
         Same as argon2\_default\_params, but for users in the admin
        group.\
         It is recommended to have a stronger hashing for
        administrators.

    You should benchmark your server to find the best parameters. It is
    recommended to have a hash taking at least 100ms (500ms for
    administrators).\
     This can be done easily with this [little script for
    argon2](https://gist.github.com/Indigo744/e92356282eb808b94d08d9cc6e37884c).\
     The argon2 algorithm doesn't have *bad parameters* (even with
    time\_cost at 1) but remember that longer the hashing, stronger the
    security.

### Authentication options

-   **site\_title**\
     The title of your site, used for email.
-   **admin\_email** Default is 'admin@example.com'\
     Your administrator email address.
-   **default\_group** Default is 'members'\
     Name of the default user group.
-   **admin\_group** Default is 'admin'\
     Name of the admin group.
-   **identity** Default is 'email'\
     Column to use for uniquely identifing user/logging in/etc. Usual
    choices are 'email' OR 'username', but any unique key from your
    table can be used as identity.\
     IMPORTANT: If you are changing it from the default (email), update
    the UNIQUE constraint in your DB.
-   **min\_password\_length** Default is '8'\
     Minimum length of passwords.\
     This minimum is not enforced directly by the library.\
     The controller should define a validation rule to enforce it.\
     See the Auth controller for an example implementation.\
    \
     Additional note: the library will fail for empty password or
    password size above 4096 bytes.\
     This is an arbitrary (long) value to protect against DOS attack.
-   **email\_activation** Default is 'false'\
     TRUE or FALSE. Sets whether to require email activation or not.
-   **manual\_activation** Default is 'false'\
     TRUE or FALSE. Sets whether to require manual activation (probably
    by an admin user) or not.
-   **remember\_users** Default is 'true'\
     TRUE or FALSE. Sets whether to enable 'remember me' functionality
    or not.
-   **user\_expire** Default is '86500'\
     Sets how long to remember the user for in seconds. Set to zero for
    no expiration.
-   **user\_extend\_on\_login** Default is 'false'\
     TRUE or FALSE. Extend the users session expiration on login.
-   **track\_login\_attempts** Default is 'false'\
     Track the number of failed login attempts for each user or ip (see
    track\_login\_ip\_address option).
-   **track\_login\_ip\_address** Default is 'true'\
     Track login attempts by IP Address, if FALSE will track based on
    identity.
-   **maximum\_login\_attempts** Default is 3\
     Set the maximum number of failed login attempts. This maximum is
    not enforced by the library, but is used by
    \$this-\>ion\_auth-\>is\_max\_login\_attempts\_exceeded(). The
    controller should check this function and act appropriately. If set
    to 0, there is no maximum.
-   **forgot\_password\_expiration** Default is 1800\
     Number of seconds before a forgot password request expires. If set
    to 0, requests will not expire.\
     30 minutes to 1 hour are good values (enough for a user to receive
    the email and reset its password).\
     You should not set a value too high (or 0), as it could lead to
    security issue!
-   **recheck\_timer** Default is 0\
     The number of seconds after which the session is checked again
    against database to see if the user still exists and is active.\
     Leave 0 if you don't want session recheck. if you really think you
    need to recheck the session against database, we would recommend a
    higher value, as this would affect performance.

### Cookie options

-   **remember\_cookie\_name** Default is 'remember\_code'\
     Cookie name for the "Remember me" feature.

### Email options

-   **email\_type** Default us 'html'\
     Email content type.

### Templates options

-   **email\_templates** Default is 'auth/email/'\
     Folder where the email view templates are stored.
-   **email\_activate** Default is 'activate.tpl.php'\
     Filname of the email activation view template.
-   **email\_forgot\_password** Default is 'forgot\_password.tpl.php'\
     Filname of the forgot password email view template.

### Message Delimiters

-   **message\_start\_delimiter** Default is '\<p\>'\
     Starting delimiter for messages.
-   **message\_end\_delimiter** Default is '\</p\>'\
     Ending delimiter for messages.
-   **error\_start\_delimiter** Default is '\<p\>'\
     Starting delimiter for errors.
-   **error\_end\_delimiter** Default is '\</p\>'\
     Ending delimiter for errors.



Class Function Reference
========================

**NOTE:** Methods available in the model are called through the
controller using PHP5 magic. You should never use
ion\_auth\_model-\>method() in your applications.

login()
-------

Logs the user into the system.

**Parameters**

1.  'Identity' - string REQUIRED. Username, email or any unique value in
    your users table, depending on your configuration.
2.  'Password' - string REQUIRED.
3.  'Remember' - boolean OPTIONAL. TRUE sets the user to be remembered
    if enabled in the configuration.

**Return**

-   boolean. TRUE if the user was successfully logged in FALSE if the
    user was not logged in.

**Usage**

```php
```

        $identity = 'ben.edmunds@gmail.com';
        $password = '12345678';
        $remember = TRUE; // remember the user
        $this->ion_auth->login($identity, $password, $remember);
        



logout()
--------

Logs the user out of the system.

**Usage**
```php
$this->ion_auth->logout();
```

       

register()
----------

Register (create) a new user.

**Parameters**

1.  'Identity' - string REQUIRED. This must be the value that uniquely
    identifies the user when he is registered. If you chose "email" as
    \$config['identity'] in the configuration file, you must put the
    email of the new user.
2.  'Password' - string REQUIRED.
3.  'Email' - string REQUIRED.
4.  'Additional Data' - multidimensional array OPTIONAL.
5.  'Group' - array OPTIONAL. If not passed the default group name set
    in the config will be used.

**Return**

-   mixed. The ID of the user if the user was successfully created,
    FALSE if the user was not created.

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

$this->ion_auth->register($username, $password, $email, $additional_data, $group)
```



create\_user()
--------------

create\_user is an alternate method for [register()](#register) method.



update()
--------

Update a user.

**Parameters**

1.  'Id' - integer REQUIRED.
2.  'Data' - multidimensional array REQUIRED.

**Return**

-   boolean. TRUE if the user was successfully updated FALSE if the user
    was not updated.

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
    'password' => '123456789',
);
$this->ion_auth->update($id, $data)
```

        

update\_user()
--------------

update\_user() is an alternate method for [update()](#update) method.



delete\_user()
--------------

Delete a user.

**Parameters**

1.  'Id' - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was successfully deleted FALSE if the user
    was not deleted.

**Usage**

```php
$id = 12;
$this->ion_auth->delete_user($id)
```

        


forgotten\_password()
---------------------

Resets a users password by emailing the user a reset code.

**Parameters**

1.  'Identity' - string REQUIRED. (as defined in config/ion\_auth.php)

**Return**

-   boolean. TRUE if the users password was successfully reset FALSE if
    the users password was not reset.

**Usage**

- this example assumes you have 'email' selected as the identity in
config/ion\_auth.php

```php
//Working code for this example is in the example Auth controller in the github repo
function forgot_password()
{
    $this->form_validation->set_rules('email', 'Email Address', 'required');
    if ($this->form_validation->run() == false) {
        //setup the input
        $this->data['email'] = array('name'    => 'email',
                                        'id'      => 'email',
                                    );
        //set any errors and display the form
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $this->load->view('auth/forgot_password', $this->data);
    }
    else {
        //run the forgotten password method to email an activation code to the user
        $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

        if ($forgotten) { //if there were no errors
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
        }
        else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }
}
```
    



forgotten\_password\_check()
----------------------------

Check to see if the forgotten password code is valid.

**Parameters**

1.  'Code' - string REQUIRED.

**Return**

-   object / bool. Returns the user record if valid, return FALSE if
    invalid.


**Usage**

```php
$user = $this->ion_auth->forgotten_password_check($code);
if ($user)
{
    //display the password reset form
}
```

        


logged\_in()
------------

Check to see if a user is logged in.

**Return**

-   boolean. TRUE if the user is logged in FALSE if the user is not
    logged in.

**Usage**

```php
if (!$this->ion_auth->logged_in())
{
    redirect('auth/login');
}
```

        


is\_admin()
-----------

Check to see if the currently logged in user is an admin.

**Parameters**

1.  'id' - integer OPTIONAL. If a user id is not passed the id of the
    currently logged in user will be used.

**Return**

-   boolean. TRUE if the user is an admin FALSE if the user is not an
    admin.

**Usage**

```php
if (!$this->ion_auth->is_admin())
{
    $this->session->set_flashdata('message', 'You must be an admin to view this page');
    redirect('welcome/index');
}
```

        


in\_group()
-----------

Check to see if a user is in a group(s).

**Parameters**

1.  'Group ID or Name' - string REQUIRED. Integer or array of strings
    and integers.
2.  'User ID' - integer OPTIONAL. If a user id is not passed the id of
    the currently logged in user will be used.
3.  'Check All' - bool OPTIONAL. Whether to check if user is in all
    groups, or in any group.

**Return**

-   boolean. TRUE if the user is in all or any (based on passed param),
    FALSE otherwise.

**Usage**
```php
```


        

username\_check()
-----------------

Check to see if the username is already registered.

**Parameters**

1.  'Username' - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not
    registered.

**Usage**

```php
# single group (by name)
$group = 'gangstas';
if (!$this->ion_auth->in_group($group))
{
    $this->session->set_flashdata('message', 'You must be a gangsta to view this page');
    redirect('welcome/index');
}

# single group (by id)
$group = 1;
if (!$this->ion_auth->in_group($group))
{
    $this->session->set_flashdata('message', 'You must be part of the group 1 to view this page');
    redirect('welcome/index');
}

# multiple groups (by name)
$group = array('gangstas', 'hoodrats');
if (!$this->ion_auth->in_group($group))
    $this->session->set_flashdata('message', 'You must be a gangsta OR a hoodrat to view this page');
    redirect('welcome/index');
}

# multiple groups (by id)
$group = array(1, 2);
if (!$this->ion_auth->in_group($group))
    $this->session->set_flashdata('message', 'You must be a part of group 1 or 2 to view this page');
    redirect('welcome/index');
}

# multiple groups (by id and name)
$group = array('gangstas', 2);
if (!$this->ion_auth->in_group($group))
    $this->session->set_flashdata('message', 'You must be a part of the gangstas or group 2');
    redirect('welcome/index');
}

# multiple groups (by id) and check if all exist
$group = array(1, 2);
if (!$this->ion_auth->in_group($group, false, true))
    $this->session->set_flashdata('message', 'You must be a part of group 1 and 2 to view this page');
    redirect('welcome/index');
}
```
    


email\_check()
--------------

Check to see if the email is already registered.

**Parameters**

1.  'Email' - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not
    registered.

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
if (!$this->ion_auth->email_check($email))
{
    $group_name = 'users';
    $this->ion_auth->register($username, $password, $email, $additional_data, $group_name)
}
```

    


identity\_check()
-----------------

Check to see if the identity is already registered.

**Parameters**

1.  'Identity' - string REQUIRED.

**Return**

-   boolean. TRUE if the user is registered FALSE if the user is not
    registered.

**Usage**

```php
//This is a lame example but it works.
$user = $this->ion_auth->user();
$data = array(
            'identity' => $this->input->post('identity'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
                );
if ($data['identity'] === $user->username || $data['identity'] === $user->email || $this->ion_auth->identity_check($data['identity']) === FALSE)
{
    $this->ion_auth->update_user($user->id, $data)
}
```
        


is\_max\_login\_attempts\_exceeded()
------------------------------------

If login attempt tracking is enabled, checks to see if the number of
failed login attempts for this identity or ip address has been exceeded.
The controller must call this method and take any necessary actions.
Login attempt limits are not enforced in the library.

**Parameters**

1.  'Identity' - string REQUIRED.

**Return**

-   boolean. TRUE if maximum\_login\_attempts is exceeded FALSE if not
    or if login attempts not tracked.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
if ($this->ion_auth->is_max_login_attempts_exceeded($identity))
{
    $this->session->set_flashdata('message', 'You have too many login attempts');
    redirect('welcome/index');
}
```

        

get\_attempts\_num()
--------------------

Returns the number of failed login attempts for this identity or ip
address.

**Parameters**

1.  'Identity' - string REQUIRED.

**Return**

-   int. The number of failed login attempts for this identity or ip
    address.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$num_attempts = $this->ion_auth->get_attempts_num($identity);
```
    



increase\_login\_attempts()
---------------------------

If login attempt tracking is enabled, records another failed login
attempt for this identity or ip address. This method is automatically
called during the login() method if the login failed.

**Parameters**

1.  'Identity' - string REQUIRED.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$password = '12345678';
if ($this->ion_auth->login($identity, $password) == FALSE) {
    $this->ion_auth->increase_login_attempts($identity)
}
```
        


clear\_login\_attempts()
------------------------

Clears all failed login attempt records for this identity or this ip
address. This method is automatically called during the login() method
if the login succeded.

**Parameters**

1.  'Identity' - string REQUIRED.

**Usage**

```php
$identity = 'ben.edmunds@gmail.com';
$password = '12345678';
if ($this->ion_auth->login($identity, $password) == TRUE) {
    $this->ion_auth->clear_login_attempts($identity)
}
```
        


user()
------

Get a user.

**Parameters**

1.  'Id' - integer OPTIONAL. If a user id is not passed the id of the
    currently logged in user will be used.

**Return**

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
        

**Usage**

```php
$user = $this->ion_auth->user()->row();
echo $user->email;
```
    


users()
-------

Get the users.

**Parameters**

1.  'Group IDs, group names, or group IDs and names' - array OPTIONAL.
    If an array of group ids, of group names, or of group ids and names
    are passed (or a single group id or name) this will return the users
    in those groups.

**Return**

-   model object

**Usage**

```php
$users = $this->ion_auth->users()->result(); // get all users
```
```php
$users = $this->ion_auth->users(1)->result(); // get users from group with id of '1'
```
```php
$users = $this->ion_auth->users('members')->result(); // get users from 'members' group
```
```php
$users = $this->ion_auth->users(array('admin','members'))->result(); // get users from 'admin' and 'members' group
```
```php
$users = $this->ion_auth->users(array('admin',4,'members'))->result(); // get users from 'admin' group, 'members' group and group with id '4'
```
```php
$users = $this->ion_auth->users(1)->result(); // get users from group with id of '1'
```
```php
$users = $this->ion_auth->users('members')->result(); // get users from 'members' group
```
```php
$users = $this->ion_auth->users(array('admin','members'))->result(); // get users from 'admin' and 'members' group
```
```php
$users = $this->ion_auth->users(array('admin',4,'members'))->result(); // get users from 'admin' group, 'members' group and group with id '4'
```

    

group()
-------

Get a group.

**Parameters**

1.  'Id' - integer REQUIRED.

**Return**

-   object

**Usage**

```php
$group_id = 2;
$group = $this->ion_auth->group($group_id)->result();
```
        


groups()
--------

Get the groups.

**Return**

-   array of objects

**Usage**

```php
$groups = $this->ion_auth->groups()->result();
```
        


messages()
----------

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
if ($this->ion_auth->update_user($id, $data))
{
    $messages = $this->ion_auth->messages();
    echo $messages;
}
else
{
    $errors = $this->ion_auth->errors();
    echo $errors;
}    
``` 
        


messages\_array()
-----------------

Get messages as an array.

**Return**

-   array

**Parameters**

1.  'Langify' - boolean OPTIONAL. TRUE means that the messages will be
    langified.

**Usage**

```php
$id = 12;
$data = array(
            'first_name' => 'Ben',
            'last_name' => 'Edmunds',
                );
if ($this->ion_auth->update_user($id, $data))
{
    $messages = $this->ion_auth->messages_array();
    foreach ($messages as $message)
    {
        echo $message;
    }
}
else
{
    $errors = $this->ion_auth->errors_array();
    foreach ($errors as $error)
    {
        echo $error;
    }
}
```
        


get\_users\_groups()
--------------------

Get all groups a user is part of.

**Parameters**

1.  'Id' - integer OPTIONAL. If a user id is not passed the id of the
    currently logged in user will be used.

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
$user_groups = $this->ion_auth->get_users_groups($user->id)->result();
```
        


add\_to\_group()
----------------

Add user to group

**Parameters**

1.  'Group\_id' - integer or array REQUIRED.
2.  'User\_id' - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was added to group(s) FALSE if the user is
    not added to group(s).

**Usage**

```php
// pass an array of group ID's and user ID
$this->ion_auth->add_to_group(array('1', '3', '6'), $user_id);

// pass a single ID and user ID
$this->ion_auth->add_to_group(1, $user_id);
```



remove\_from\_group()
---------------------

Remove user from group(s)

**Parameters**

1.  'Group\_id' - NULL, integer or array REQUIRED. NULL will remove the
    user from all groups.
2.  'User\_id' - integer REQUIRED.

**Return**

-   boolean. TRUE if the user was removed from group(s) FALSE if the
    user is not removed from group(s).

**Usage**

```php
// pass an array of group ID's and user ID
$this->ion_auth->remove_from_group(array('1', '3', '6'), $user_id);

// pass a single ID and user ID
$this->ion_auth->remove_from_group(1, $user_id);

// pass NULL to remove user from all groups
$this->ion_auth->remove_from_group(NULL, $user_id);
```
       


create\_group()
---------------

Create a group

**Parameters**

1.  'group\_name' - string REQUIRED.
2.  'group\_description' - string.

**Return**

-   brand new group\_id if the group was created, FALSE if the group
    creation failed.

**Usage**

```php
// pass the right arguments and it's done
$group = $this->ion_auth->create_group('new_test_group', 'This is a test description');

if(!$group)
{
    $view_errors = $this->ion_auth->messages();
}
else
{
    $new_group_id = $group;
    // do more cool stuff
}
```
        


update\_group()
---------------

Update details of a group

**Parameters**

1.  'group\_id' - int REQUIRED.
2.  'group\_name' - string REQUIRED.
3.  'additional\_data' - array.

**Return**

-   boolean. TRUE if the group was updated, FALSE if the update failed.

**Usage**

```php
// source these things from anywhere you like (eg., a form)
$group_id = 2;
$group_name = 'test_group_changed_name';
$additional_data = array(
    'description' => 'New Description'
);

// pass the right arguments and it's done
$group_update = $this->ion_auth->update_group($group_id, $group_name, $additional_data);

if(!$group_update)
{
    $view_errors = $this->ion_auth->messages();
}
else
{
    // do more cool stuff
}
```
        


delete\_group()
---------------

Remove a group. Removes the group details from the configured 'groups'
table. Users belonging to the group are stripped of this status
(references to this group are removed from users\_groups), but user data
itself remains untouched.

**Parameters**

1.  'group\_id' - int REQUIRED.

**Return**

-   boolean. TRUE if the group was deleted, FALSE if the delete failed.

**Usage**

```php
// source this from anywhere you like (eg., a form)
$group_id = 2;

// pass the right arguments and it's done
$group_delete = $this->ion_auth->delete_group($group_id);

if(!$group_delete)
{
    $view_errors = $this->ion_auth->messages();
}
else
{
    // do more cool stuff
}
```
        


set\_message\_delimiters()
--------------------------

Set the message delimiters.

**Parameters**

1.  'Start Delimiter' - string REQUIRED.
2.  'End Delimiter' - string REQUIRED.

**Usage**

```php
$id = 12;
$data = array(
            'first_name' => 'Ben',
            'last_name' => 'Edmunds',
                );
if ($this->ion_auth->update_user($id, $data))
{
    $this->ion_auth->set_message_delimiters('<p><strong>','</strong></p>');
    $messages = $this->ion_auth->messages();
    echo $messages;
}
else
{
    $this->ion_auth->set_error_delimiters('<p><strong>','</strong></p>');
    $errors = $this->ion_auth->errors();
    echo $errors;
}        
```


errors()
--------

Get the errors.

**Return**

-   string

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);
if ($this->ion_auth->update_user($id, $data))
{
    $messages = $this->ion_auth->messages();
    echo $messages;
}
else
{
    $errors = $this->ion_auth->errors();
    echo $errors;
}
```
        


errors\_array()
---------------

Get error messages as an array.

**Return**

-   array

**Parameters**

1.  'Langify' - boolean OPTIONAL. TRUE means that the error messages
    will be langified.

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);
if ($this->ion_auth->update_user($id, $data))
{
    $messages = $this->ion_auth->messages_array();
    foreach ($messages as $message)
    {
        echo $message;
    }
}
else
{
    $errors = $this->ion_auth->errors_array();
    foreach ($errors as $error)
    {
        echo $error;
    }
}
```


set\_error\_delimiters()
------------------------

Set the error delimiters.

**Parameters**

1.  'Start Delimiter' - string REQUIRED.
2.  'End Delimiter' - string REQUIRED.

**Usage**

```php
$id = 12;
$data = array(
    'first_name' => 'Ben',
    'last_name' => 'Edmunds',
);
if ($this->ion_auth->update_user($id, $data))
{
    $this->ion_auth->set_message_delimiters('<p><strong>','</strong></p>');
    $messages = $this->ion_auth->messages();
    echo $messages;
}
else
{
    $this->ion_auth->set_error_delimiters('<p><strong>','</strong></p>');
    $errors = $this->ion_auth->errors();
    echo $errors;
}
```
            

set\_hook()
-----------

Set a single or multiple functions to be called when trigged by
trigger\_events(). See an example here:
[https://gist.github.com/657de89b26decda2b2fa](https://gist.github.com/657de89b26decda2b2fa)

**Parameters**

1.  'Event' - string REQUIRED.
2.  'Name' - string REQUIRED.
3.  'Class' - string REQUIRED.
4.  'Method' - string REQUIRED.
5.  'Arguments' - Array OPTIONAL.

**Usage**

```php
class Accounts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        /*
        make sure we loaded ion_auth2
        The following does not need to go in __construct() it just needs to be set before
        you trigger_events().
        */
        $event = 'socialpush';
        $class = 'Accounts';
        $args = array('this is the content of the message', 'billy');

        $name = 'activate_sendmail';
        $method = 'email';
        $this->ion_auth->set_hook($event, $name, $class, $method, $args);
        $name = 'call_Twitter';
        $method = 'twitter';
        $this->ion_auth->set_hook($event, $name, $class, $method, $args);
        $name = 'call_MailChimp_API';
        $method = 'mailchimp';
        $this->ion_auth->set_hook($event, $name, $class, $method, $args);
        $name = 'call_Facebook_API';
        $method = 'facebook';
        $this->ion_auth->set_hook($event, $name, $class, $method, $args);
        $name = 'call_gPlus_API';
        $method = 'gplus';
        $this->ion_auth->set_hook($event, $name, $class, $method, $args);
    }

    public function Post_Message($one)
    {
        $this->ion_auth->trigger_events('socialpush');
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
        


trigger\_events()
-----------------

Call Additional functions to run that were registered with
[set\_hook()](#set_hook).

**Parameters**

1.  'Name' - String or Array REQUIRED.

**Usage**

```php
$this->ion_auth->trigger_events('socialpush');
```
       
