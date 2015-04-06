#Ion Auth 2
###The future of authentication
by [Ben Edmunds](http://benedmunds.com)

Redux Auth 2 had a lot of potential.  It's lightweight, simple, and clean,
but had a ton of bugs and was missing some key features.  So we refactored
the code and added new features.

This version drops any backwards compatibility and makes things even more
awesome then you could expect.

##Documentation
Documentation is located at http://benedmunds.com/ion_auth/

##Installation
Just copy the files from this package to the corresponding folder in your
application folder.  For example, copy Ion_auth/config/ion_auth.php to
application/config/ion_auth.php.

###CodeIgniter Version 3 Compatibility
CodeIgniter v3 requires the class names to be ucfirst().  In order to support this follow the standard installation procedures and then either rename the following files or create symlinks

	models/ion_auth_model.php         =>   models/Ion_auth_model.php

###Relational DB Setup
Then just run the appropriate SQL file (if you're using migrations you can
get the migrations from JD here:
https://github.com/iamfiscus/codeigniter-ion-auth-migration).

##Usage
In the package you will find example usage code in the controllers and views
folders.  The example code isn't the most beautiful code you'll ever see but
it'll show you how to use the library and it's nice and generic so it doesn't
require a MY_controller or anything else.

###Default Login
Username: admin@admin.com
Password: password


###Important
It is highly recommended that you use encrypted database sessions for security!


###Optimization
It is recommended that you add your identity column as a unique index.



Feel free to send me an email if you have any problems.


Thanks,
-Ben Edmunds
 ben.edmunds@gmail.com
 @benedmunds
