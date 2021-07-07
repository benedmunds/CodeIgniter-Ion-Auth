Ion Auth Changelog
===================================

## xx Octobre 2018 - Ion Auth 4

- **General:**
	- Migration from CodeIgniter 3 to CodeIgniter 4
 - **New server requirements:**
    - Drop CodeIgniter 3 support
    - Drop PHP < 7.1 support

## xx March 2018 - Ion Auth 3

 - **General:**
    - No longer work for empty password or password above 4096 bytes (DOS protection)
 - **New server requirements:**
    - Drop CodeIgniter 2 support
    - Drop PHP < 5.6 support
 - **Updated password hashing methods:**
    - Drop SHA1 support (but support seamless migration from SHA1-based installation)
    - Drop internal Bcrypt library (now uses built-in PHP functions)
    - Add argon2 support (PHP > 7.2)
    - Implements password automatic rehashing on login if needed (e.g. when hashing parameters changed)
 - **Updated config values:**
    - Higher default hashing parameters (e.g. higher cost for bcrypt)
    - Allows different hashing parameters for admins
    - Remove `random_rounds` bcrypt feature
    - Better default value for `forgotPasswordExpiration`
 - **Updated features:**
     - Update _Remember me_ feature for more security
     - Update _Password Reset_ feature for more security
     - Update _User activation_ feature for more security
 - **Removed features:**
    - Remove `forgotten_password_complete` feature
