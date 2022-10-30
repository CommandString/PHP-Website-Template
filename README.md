# PHP Website Template

# Setting up the template
1. [Create a repository with this template](https://github.com/CommandString/PHP-Website-Template/generate) then `git pull` the template into a directory of your choice.
2. Copy `/private/env.example.js` to `/private/env.json`
3. Add values to `env.json`
	```json
	{
	    // ...
	    "cookies": {
	        "passphrase": "", // insert 32+ alphanumeric string here, you can use a password generator to generate a string
	        "method": "" // check open_ssl_get_cipher_methods(), I usually use AES-256-CTR
	    }
	}
	```
	* If you setup the mysql environment variables, open `/public/index.php` and uncomment lines `36-42` to create a connection to your database.
	* If you setup the cookie environment variables, open `/public/index.php` and uncomment line `31` to create a Cookie driver.

# Test Configuration
1. Open your terminal of choice and cd into `/public` then `php -S 127.0.0.1:8000 index.php`
2. Open your browser and go to http://127.0.0.1:8000, you should see `Welcome to the start of your new website!`
	* If you don't receive an output, check your terminal for any error messages. If you're unable to resolve the issue please [open an issue](https://github.com/CommandString/PHP-Website-Template/issues/new)

# File Structure
| Folder Path | Description |
|:-| :-|
| /public 						| Files that can be accessed directly, also this should be the document root
| /public/assets 			| Public assets
| /public/assets/img 	| Images
| /public/assets/css 	| Cascading Style Sheets
| /public/assets/js  	| Javascript
| /private 						| Files that cannot be accessed directly
| /private/routes 		| Route declarations and handlers
| /private/views  		| Templates and pages

# Learning Resources
[CommandString/Router](https://github.com/CommandString/router)
[CommandString/Cookies](https://github.com/CommandString/cookies)
[CommandString/Pdo](https://github.com/CommandString/pdo)
[Twig/Twig](https://twig.symfony.com/doc/3.x/)
