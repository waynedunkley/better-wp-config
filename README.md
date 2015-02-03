# better-wp-config
A better wp-config.php which allows you to define different database credentials based on the location the site is being loaded from. Meaning you can have the same wp-config.php file on all environments, the script detects where the site is being loaded from and defines the database hostname, username, password & database name. 

HOME and SITEURL are also defined based on the environment, temporarily overriding these options in the database Options table. Meaning you don't have to manually go in and change these settings when changing environments. 
ALTHOUGH: It is highly recommended that these database entries are updated when not in development.


