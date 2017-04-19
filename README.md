# Ion Auth 2
### The future of authentication
by [Ben Edmunds](http://benedmunds.com)

Redux Auth 2 had a lot of potential.  It's lightweight, simple, and clean,
but had a ton of bugs and was missing some key features.  So we refactored
the code and added new features.

This version drops any backwards compatibility and makes things even more
awesome then you could expect.


## Support
If you use this to further your career, or put money in your pocket, and would like to support the project please consider a [moral license](https://www.morallicense.com/benedmunds/ion-auth).


## Documentation
Documentation is located at http://benedmunds.com/ion_auth/

## Installation
Just copy the files from this package to the corresponding folder in your
application folder.  For example, copy Ion_auth/config/ion_auth.php to
application/config/ion_auth.php

You can also copy the libraries and models directories into your third_party/ion_auth folder.  For example, copy  to /application/third_party/ion_auth/.  The directory structure would be:

    controllers/Auth.php
    views/
    third_party/ion_auth/libraries/Ion_auth.php
    third_party/ion_auth/libraries/Bcrypt.php
    third_party/ion_auth/models/Ion_auth_model.php


Then in your controller add the package path and load the library like normal

	$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
	$this->load->library('ion_auth’);



### CodeIgniter Version 2 Compatibility
CodeIgniter v2 requires the class file names to be lowercase.  In order to support this follow the standard installation procedures and then either rename the following files or create symlinks

	models/Ion_auth_model.php         =>   models/ion_auth_model.php
	controllers/Auth.php              =>   controllers/auth.php

### Relational DB Setup
Then just run the appropriate SQL file (if you're using migrations you can
get the migrations from JD here:
https://github.com/iamfiscus/codeigniter-ion-auth-migration).

## Usage
In the package you will find example usage code in the controllers and views
folders.  The example code isn't the most beautiful code you'll ever see but
it'll show you how to use the library and it's nice and generic so it doesn't
require a MY_controller or anything else.

### Default Login
Username: admin@admin.com
Password: password


### Important
It is highly recommended that you use encrypted database sessions for security!


### Optimization
It is recommended that you add your identity column as a unique index.


### Options
Time Based One-Time Password (TOTP) -
There is a Time Based One-Time Password (TOTP) implementation compatible with Google Authenticator available. Feature branch maintained by [biscofil](https://github.com/biscofil) and is available at [https://github.com/benedmunds/CodeIgniter-Ion-Auth/tree/otp](https://github.com/benedmunds/CodeIgniter-Ion-Auth/tree/otp)



Feel free to send me an email if you have any problems.


Thanks,
-Ben Edmunds
 ben.edmunds@gmail.com
 @benedmunds
