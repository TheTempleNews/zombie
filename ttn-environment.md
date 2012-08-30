# How To Set Up A Local Environment

### Developed for The Temple News

===

*Based roughly on [this page](http://codex.wordpress.org/Moving_WordPress#Moving_WordPress_Multisite) in the Codex *

*Using WP.org's suggested MySQL Search and Replace tool by David Coveney: http://interconnectit.com/124/search-and-replace-for-wordpress-databases/*

===

1. Backup DB with phpmyadmin. Make sure there's a timestamp.

* `/temple-news.com/html/` files pulled from FTP server into `~/Sites/temple-news.com/temple-news.dev`

* Append __`/etc/hosts`__ file to provide domains/subdomains where `~/Sites/temple-news.com/temple-news.dev` is root:
		
			# ~/Sites/ hostnames
			127.0.0.1 temple-news.dev
			127.0.0.1 broadandcecil.temple-news.dev
			127.0.0.1 alumni.temple-news.dev
			127.0.0.1 thecherry.temple-news.dev
		
* Uncomment line 623 in __`/etc/apache2/httpd.conf`__ to include virtual hosts config file:
							
			...
			# Real-time info on requests and configuration
			#Include /private/etc/apache2/extra/httpd-info.conf

			# Virtual hosts
			Include /private/etc/apache2/extra/httpd-vhosts.conf

			# Local access to the Apache HTTP Server Manual
			Include /private/etc/apache2/extra/httpd-manual.conf
			...

* Append Apache virtual hosts file: __/etc/apache2/extra/httpd-vhosts.conf__ :
		
			...
			<VirtualHost *:80>
				DocumentRoot "/Users/montchr/Sites/temple-news.com/temple-news.dev"
				ServerName temple-news.dev
			</VirtualHost>

			<VirtualHost *:80>
				DocumentRoot "/Users/montchr/Sites/temple-news.com/temple-news.dev"
				ServerName broadandcecil.temple-news.dev
			</VirtualHost>

			<VirtualHost *:80>
				DocumentRoot "/Users/montchr/Sites/temple-news.com/temple-news.dev"
				ServerName alumni.temple-news.dev
			</VirtualHost>

			<VirtualHost *:80>
				DocumentRoot "/Users/montchr/Sites/temple-news.com/temple-news.dev"
				ServerName thecherry.temple-news.dev
			</VirtualHost>
		
		
* Make sure MAMP settings are correct.
		  
	Default Apache, MySQL ports 80, 3306.
	  
	PHP 5.3.6.
  
	Apache document root `/Users/montchr/Sites/temple-news.com/temple-news.dev`
	  
	__*Apache port MUST be set to 80 (default) or else multisite will not work.*__
	
* Make sure PHP will allow for large SQL file input:

		...
		upload_max_filesize = 600M
		...
		post_max_size = 600M
		…	
		memory_limit = 512M
		…
	
		
* Just to be safe, use the `$cfg['UploadDir']` feature in __`/Applications/MAMP/bin/phpMyAdmin/config.inc.php`__ line 530. Specify a directory like 'upload' in the single-quotes, then create that directory in the phpMyAdmin directory. Put the SQL file in there.
		
* `max_allowed_packet` must be increased. Replace the contents of /Applications/MAMP/bin/startMysql.sh with the following code:
		
		# /bin/sh
		/Applications/MAMP/Library/bin/mysqld_safe --port=3306 --max_allowed_packet=268435456 --socket=/Applications/MAMP/tmp/mysql/mysql.sock --lower_case_table_names=0 --pid-file=/Applications/MAMP/tmp/mysql/mysql.pid --log-error=/Applications/MAMP/logs/mysql_error_log &
		
		
	Thanks to this snippet of code: http://snipplr.com/view.php?codeview&id=65272
	
* Import SQL file from temple-news.com backup ( db name = "db30295_wpmu" ) to new db "temple-news". If using the UploadDir feature, select from the dropdown. Else, browse for file. If import times out, just upload again and it should continue.

* Edit `wp-config.php` db info to match the new db info:
		
			...
			// ** MySQL settings ** //
			//define('WP_CACHE', true); //Added by WP-Cache Manager
			define('DB_NAME', 'temple-news');    // The name of the database
			define('DB_USER', 'root');     // Your MySQL username
			define('DB_PASSWORD', 'root'); // ...and password
			define('DB_HOST', 'temple-news.dev');    // 99% chance you won't need to change this value
			define('DB_CHARSET', 'utf8');
			define('DB_COLLATE', '');
			define('VHOST', 'yes');
			...
		

* Go to http://interconnectit.com/124/search-and-replace-for-wordpress-databases/ and extract the PHP file to the root installation directory (should be ~/Sites/temple-news.com/temple-news.dev). Rename it to replace.php or something like that. *__NEVER EVER EVER put this on a live server! Doom will likely ensue.__*

	* Load up the replace.php file. At this point, you should be able to get there by typing "temple-news.dev/replace.php" in the address bar.		
	* Leave the pre-populate box checked and make sure the information looks correct.
		
	* On the next screen, make sure "Leave GUID column unchanged?" is checked and that all tables are selected. Continue.
		
	* Search for __temple-news.com__ and replace with **temple-news.dev**. Give it some time and don't navigate away from the page.
		
	* You might get some error messages like:

		`"wp_2_silas_flickr_cache" has no primary key, manual change needed on row 43.`

		and

		`"wp_signups" has no primary key, manual change needed on row 1.`
		
		But as far as I can tell, these aren't of much consequence.
		
* .htaccess has given me problems in the past when starting local development. The solution seems to be just copying it from one environment to the next. So always save the previous environment to refer to and try to replicate. Or, here, try this:

		RewriteEngine On
		RewriteBase /
		
		
		#uploaded files
		RewriteRule ^(.*/)?files/$ index.php [L]
		RewriteRule ^(.*/)?files/(.*) wp-includes/ms-files.php?file=$2 [L]
		
		RewriteCond %{REQUEST_FILENAME} -f [OR]
		RewriteCond %{REQUEST_FILENAME} -d
		RewriteRule . - [L]
		RewriteRule  ^([_0-9a-zA-Z-]+/)?(wp-.*) $2 [L]
		RewriteRule  ^([_0-9a-zA-Z-]+/)?(.*\.php)$ $2 [L]
		RewriteRule . index.php [L]
		
		AddHandler php5-script .php
		
		# BEGIN WordPress
		<IfModule mod_rewrite.c>
		RewriteEngine On
		RewriteBase /
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . /index.php [L]
		</IfModule>
		
		# END WordPress


* All done! Have a beer.