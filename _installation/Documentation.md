# Documentation of PhpSkeletonMvc

### About

Php Skeleton Mvc is a very basic PHP framework. It has been coded for simple PHP applications. In this framework you can add external libraries by using composer. The PHP dependency of this framework is 5.3 and it uses psr-0 autoloading standards. It is easy to change the structure of the framework according to your needs. 

### The File Structure

    ```
	--app
	  --config.php
	--bin
	--src
	  --DefaultApp
	    --Controller
	      --indexController.php
	    --View
	      --Layout
	        --header.php
	        --footer.php
	      --index.php
	  --PhpSkeletonMvc
	    --Core
	      --BaseController.php
	      --Bootstrap.php
	      --Database.php
	      --View.php
	    --Component
	      --Redirect.php
	      --Session.php
	--index.php
	--composer.json
	--.htaccess

    ```

### Algorithm

The url rewrite rule in `.htaccess` file. Converts the coming url to call module, controllers, methods and sends parameters.

The url rewrite rule of '.htaccess' works like this:

From
`http://host:port/{module_name}/{controller_name}/{method_name}/{parameter}/{parameter}`

To
`http://host:port/index.php?url={module_name}/{controller_name}/{method_name}/{parameter}/{parameter}`

url of DefaultApp module which is already exist in framework.

`http://host:port/defaultapp/index/index`

So the request goes to `index.php` file. In this file we include the config file which has the configuration constants: `app/config.php`

And it triggers the bootstrap class from `src/PhpSkeletonMvc/Core/Bootstrap.php`.

The Bootstrap Class checks if url has any parameter. If not, gets the default module, controller and method from config. If yes, checks if hte module exist, and calls the method of controller and sends the parameters.






