# Wordpress Boilerplate Config
This is what I start with for my wp-config.php file setup in [WordPress](http://wordpress.org) installations.

Props to [Mark Jaquith](https://github.com/markjaquith) and [Ashfame](https://github.com/ashfame) for big chunks of this bizniss.

## Why
Overall we tighten up the file and make comment a little more succint. We also pull database connection settings out of `wp-config.php` and the public web directory. On the (hopefully) rare occasion that the web server serves php files as plain text, our database settings aren't exposed. That's nice.

Making the database settings more modular also allows us to have environment-specific settings (local, dev, staging, and production) without worrying about changes to the rest of the config file staying in sync. 

Once nice advantage is that you you can track `wp-config.php` in a git repositiory and not worry about changing settings on each environment you deploy to. 

If you find this useful and make improvements, feel free to contribute. 

### What’s happening here?

We'll be loading database connection parameters into `wp-config.php` that‘s based on a method I learned about from [Mark Jaquith](https://github.com/markjaquith).

A few things are happening:

1. Based on whether or not files with particular names exist, `wp-config.php` sets a constant stating which environment we're using. We'll use this in conditionals farther down.
2. Next, we load the database connection info itself. Well...to connect to the database.
3. Lastly, depending on which environment is set, we control debug mode and bug logging. More debugging and logging in local and dev, less in staging, none in production.

### Setup

`wp-config.php` lives where it usually would. In the root of your WordPress installation.

The database settings live in a separate file outside of the public web directory. I use a separate directory named `config` one level above the web root. If you need/want it somewhere else, you'll need to update the path in `wp-config.php`. (It's the DB_`CREDENTIALS_PATH` constant.)

So, to use my setup you'll have something like this:

`
config/               -- config directory
    local-config.php  -- the local database connection settings
web_directory/        -- the web root (typically, public_html, www, etc.)
	index.php         -- WordPress index file
	wp-admin/
    wp-config.php     -- the main config file
    more WP files     -- the rest of the WordPress install
`

The script is set up to look for one of the following:
 * `local-config.php`       -- for local development
 * `dev-config.php`         -- another dev environment, typically not local
 * `staging-config.php`     -- staging environment
 * `production-config.php`  -- the production environment

**Note:** It's simplest if you only have one of these present in a given environment. I have my git repositories ignore  all of these and track `wp-config.php`. 

Of course, you'll want to set your own unique keys and salts. There are also a few other things that are commented out which may or may not be useful for you you circumstances. I use them often enough to included in my boilerplate.