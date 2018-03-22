Upgrading Ion Auth.
===================================

### Upgrading from a former revision of Ion Auth 3

 1. Download the [latest Ion Auth 3 revision](http://github.com/benedmunds/CodeIgniter-Ion-Auth/zipball/3)
 2. Overwrite "libraries/ion_auth.php" and "models/ion_auth_model.php" with the new versions.
 3. Overwrite "language/*" with the news versions.
 4. Check "config/ion_auth.php" for evolution.

### Upgrading from Ion Auth 2

This is a bit more complex, depending on your configuration.

 1. Perform an upgrade as describe above
 2. Check "config/ion_auth.php", the following options were modified:
    - For the **Hash Method** part:
        - `hash_method` now only accepts `bcrypt` or `argon2`
        (`sha1` is no longer supported for security considerations, see note below)
        - `default_rounds` is modified to `bcrypt_default_cost`
        - `random_rounds`, `min_rounds`, `max_rounds` and `salt_prefix` are removed
        - `bcrypt_admin_cost`, `argon2_default_params` and `argon2_admin_params` are added
    - For the **Cookie options** part:
        - `random_identity_cookie_name` is removed
    - The **Forgot Password Complete Email Template** part is completely removed
        - `email_forgot_password_complete` is removed
    - The **Salt options** part is completely removed
        - `salt_length` and `store_salt` are removed
 3. Run the SQL migration file according to your environment:
    - MySQL: [sql/migrating_from_ionauth2/migrate.sql](sql/migrating_from_ionauth2/migrate.sql)
    - postgreSQL: [sql/migrating_from_ionauth2/migrate.postgre.sql](sql/migrating_from_ionauth2/migrate.postgre.sql)
    - SQL Server: [sql/migrating_from_ionauth2/migrate.mssql.sql](sql/migrating_from_ionauth2/migrate.mssql.sql)
 4. If you were not using the SHA1 hash method, you may also drop the `salt` column
    from the `users` table in your database

**Migrating from SHA1**

If you were using the `sha1` hash method in Ion Auth 2, this method is no longer supported.
The SHA1 is known to be insecure for password hashing, and should not be used.

However, fear not! The transition should actually be pretty smooth for you and your users.
After upgrading to Ion Auth 3, any user logging in your application will be migrated to the
new hashing method. This is completely transparent.

You can monitor it by looking in your database at the password field. Any field not starting
with the dollar '$' sign is an old SHA1-based password.

After a while, you may want to invalidate any old user still having a SHA1-based hashed password.
