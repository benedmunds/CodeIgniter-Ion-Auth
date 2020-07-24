Upgrading Ion Auth.
===================================

# Upgrading from a former revision of Ion Auth 3

 1. Download the [latest Ion Auth 3 revision](http://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3)
 2. Overwrite "libraries/ion_auth.php" and "models/ion_auth_model.php" with the new versions.
 3. Overwrite "language/*" with the new versions.
 4. Overwrite "controllers/Auth.php" with the new version.  Make sure to integrate this with any custom changes you already have in your previous version.
 5. Check "config/ion_auth.php" for evolution.

# Upgrading from Ion Auth 2

This is a bit more complex, depending on your configuration.

 1. Perform an upgrade as described above
 2. Check `config/ion_auth.php`, some options were modified
    (see list in relevant chapter below)
 3. Run the SQL migration file according to your environment:
    - MySQL: [sql/migrating_from_ionauth2/migrate.sql](sql/migrating_from_ionauth2/migrate.sql)
    - postgreSQL: [sql/migrating_from_ionauth2/migrate.postgre.sql](sql/migrating_from_ionauth2/migrate.postgre.sql)
    - SQL Server: [sql/migrating_from_ionauth2/migrate.mssql.sql](sql/migrating_from_ionauth2/migrate.mssql.sql)
 4. If you were **not** using the SHA1 hash method, you may also drop the `salt` column
    from the `users` table in your database
 5. If you were **using** the SHA1 hash method, please check the relevant chapter below
 6. Check your code for functions modification/removal
    (see list in relevant chapter below)
 7. Ensure your database connection is loaded before loading Ion Auth.

### Options evolution from Ion Auth 2

The config file has changed:

- For the **Hash Method** part:
    - `hash_method` now only accepts `bcrypt` or the newer `argon2` (PHP 7.2)
    (`sha1` is no longer supported for security considerations, see note below)
    - `default_rounds` is modified to `bcrypt_default_cost`
    - `random_rounds`, `min_rounds`, `max_rounds` and `salt_prefix` are removed
    as they don't serve any purpose anymore
    - `argon2_default_params` is added for the Argon2 hash method
    - `bcrypt_admin_cost` and `argon2_admin_params` are added to tweak the hash
    parameters for users in the admin group
- For the **Authentication options** part:
    - `max_password_length` is removed as it is not good practice to limit password's length
- For the **Cookie options** part:
    - `random_identity_cookie_name` is removed as it doesn't serve any purpose anymore
- The **Forgot Password Complete Email Template** part is completely removed because
  the feature doesn't exists anymore due to security issue.
    - `email_forgot_password_complete` is removed
- The **Salt options** part is completely removed due to the removing of the
  SHA1 hash method
    - `salt_length` and `store_salt` are removed

### Functions evolution from Ion Auth 2

Only public functions are listed.

#### Functions modified

```php
Ion_auth_model::hash_password_db($id, $password, $use_sha1_override = FALSE)
/* ... is updated to... */
Ion_auth_model::verify_password($password, $hash_password_db, $identity = NULL)
```

```php
Ion_auth_model::clear_forgotten_password_code($code)
/* ... is updated to... */
Ion_auth_model::clear_forgotten_password_code($identity)
```

```php
Ion_auth_model::hash_password($password, $salt = FALSE, $use_sha1_override = FALSE)
/* ... is updated to... */
Ion_auth_model::hash_password($password, $identity = NULL)
```

```php
Ion_auth_model::remember_user($id)
/* ... is updated to... */
Ion_auth_model::remember_user($identity)
```


#### Public functions removed

```php
Ion_auth_model::forgotten_password_complete($code, $salt = FALSE) // old feature no longer available due to security issue
Ion_auth_model::hash_code($password) // No longer needed
Ion_auth_model::is_time_locked_out($identity, $ip_address = NULL) // Was deprecated, use is_max_login_attempts_exceeded()
Ion_auth_model::salt() // No longer needed
```


#### Public functions added

```php
Ion_auth_model::db()
Ion_auth_model::clear_remember_code($identity)
Ion_auth_model::get_user_by_forgotten_password_code($user_code)
Ion_auth_model::get_user_id_from_identity($identity = '')
Ion_auth_model::rehash_password_if_needed($hash, $identity, $password)
```


### Migrating from SHA1

If you were using the `sha1` hash method in Ion Auth 2, this method is no longer supported.
The SHA1 is known to be insecure for password hashing, and should not be used.

However, fear not! The transition should actually be pretty smooth for you and your users.
After upgrading to Ion Auth 3, any user logging in your application will be migrated to the
new hashing method. This is completely transparent.

You can monitor it by looking in your database at the password field. Any field not starting
with the dollar '$' sign is an old SHA1-based password.

After a while, you may want to invalidate any old user still having a SHA1-based hashed password.
