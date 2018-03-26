# Ion Auth 3
### The future of authentication
by [Ben Edmunds](http://benedmunds.com)

Redux Auth 2 had a lot of potential.  It's lightweight, simple, and clean,
but had a ton of bugs and was missing some key features.  So we refactored
the code and added new features.

Ion Auth 2 dropped any backwards compatibility and made things more
awesome.

Ion Auth 3, while not dropping as much backwards compatibility, made things
even more awesome!

## Support
If you use this to further your career, or put money in your pocket, and would like to support the project please consider a [moral license](https://www.morallicense.com/benedmunds/ion-auth).


## Server requirements
Ion Auth 3 needs **CodeIgniter 3** and **PHP 5.6**.
It should work on 5.4 as well, but we strongly advise you NOT to run such old versions of PHP, because of potential security and performance issues.
In this case, you may need [password_compat](https://github.com/ircmaxell/password_compat).

## Documentation
Documentation is located at http://benedmunds.com/ion_auth/

## Supported By
If you want to quickly add secure authentication to PHP apps and APIs, feel free to check out Auth0's PHP SDK and free plan at [auth0.com/overview](https://auth0.com/overview?utm_source=GHsponsor&utm_medium=GHsponsor&utm_campaign=codeigniter-ion-auth&utm_content=auth) <img src="https://camo.githubusercontent.com/a5239b0ec31b7586e445f5057bc857e2193d0adc/687474703a2f2f70617373706f72746a732e6f72672f696d616765732f737570706f727465645f6c6f676f2e737667" alt="" data-canonical-src="http://passportjs.org/images/supported_logo.svg" width="24">

## Upgrading
See [UPGRADING.md](UPGRADING.md) file.

## Installation
See [INSTALLING.md](INSTALLING.md) file.

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


### Options
Time Based One-Time Password (TOTP) -
There is a Time Based One-Time Password (TOTP) implementation compatible with Google Authenticator available. Feature branch maintained by [biscofil](https://github.com/biscofil) and is available at [https://github.com/benedmunds/CodeIgniter-Ion-Auth/tree/otp](https://github.com/benedmunds/CodeIgniter-Ion-Auth/tree/otp)


## For Help
Feel free to open an issue or send me an email if you have any problems.


Thanks,    
-Ben Edmunds       
 ben.edmunds@gmail.com   
 [@benedmunds](http://twitter.com/benedmunds)   
