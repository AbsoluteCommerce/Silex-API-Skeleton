# Skeleton Project for Absolute Silex API
This README contains all of the steps to get started with Absolute Silex API.
Please complete each step in order and don't skip any to avoid unwanted surprises.

# Installation
Absolute Silex API uses `Composer`_ for package dependencies.
To get started, type the following command in your terminal replacing `path/to/install` with your desired location.

```
composer create-project absolute/silex-api-skeleton path/to/install
```

# Summary
We will start with a short reference of what goes where.
Read on to find out more information about each of these items.

- the entry point for the application is `./web/index.php`
- `./data/api.php` determines the routing, parameters, models and documentation for your API
- Client specific or third party configuration should be added to `./config/default.php`
- Environment specific configuration should be added to `./config/local.php`
- Auto-generated goes in `./generated` but should NOT be modified manually
- Business logic belongs in `./src/Resource` for your own specific implementation
- Test cases belong in `./tests` and can be built up as your project grows
- `./bin/console` contains CLI commands, feel free to register your own client specific commands too

# Web Server Configuration
Generally speaking all requests should be routed through `web/index.php`.
Depending on where your API requests will come from, you might also need to cater for CORS.

For example an nginx configuration might look something like this:

```
server {
    listen 80 default_server;
    server_name acme.silex.api;
    
    charset utf-8;
    root /var/www/web;
    index index.php index.html;
    
    location / {
        # CORS pre-flight. see https://fetch.spec.whatwg.org/#cors-request
        if ($request_method = 'OPTIONS') {
            add_header 'Access-Control-Allow-Origin' '*' 'always';
            add_header 'Access-Control-Allow-Methods' 'GET,POST,PUT,PATCH,DELETE,OPTIONS' 'always';
            add_header 'Access-Control-Allow-Headers' 'Accept,Content-Type,Authorization,Origin,api_key' 'always';
            add_header 'Access-Control-Max-Age' 86400;
            add_header 'Content-Length' 0;
            return 204;
        }
        
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        # CORS headers. see https://fetch.spec.whatwg.org/#cors-request
        add_header 'Access-Control-Allow-Origin' '*' 'always';
        add_header 'Access-Control-Allow-Methods' 'GET,POST,PUT,PATCH,DELETE,OPTIONS' 'always';
        add_header 'Access-Control-Allow-Headers' 'Accept,Content-Type,Authorization,Origin,api_key' 'always';
        
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass your-PHP-service:9000;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

# Application Configuration
Configuration of your API can be found in `./config` directory.
You can add your own credentials in here also for any third party integrations you might have.

The `./config/default.php` file is where you would find all default values,
and `./config/local.php` is where you would add environment specific overrides.
For example on your Production instance you might have a different integration
username and password than you would on Development instances, which can be
added to the `./config/local.php` file and different per environment.

Copy `./config/local.php.dist` to `./config/local.php` to get started,
overriding any values from `./config/default.php` as you wish.

Note: `./config/local.php` should NOT be added to your Version Control System.

# Automated Code Generation
You will notice an empty directory has been included with this project, `./generation`.

In the command line, run the following:

```
./bin/console absolute:silexapi:generation ./data/api.php
```

Now take a look at the `./generation` folder again and you will see it has been populated with various files.
These files are automatically generated based on the data in `./data/api.php`, ensuring your documentation always matches your implementation.
This is the main selling-point of Absolute Silex API as maintaining API endpoints, parameters and models can be a time-intensive task.

Feel free to make changes in `./data/api.php`, and even move the file elsewhere if you wish, and start building up your own API.

Note: the contents of `./generation` *SHOULD* be committed to your Version Control System.

# Business Logic
The generated code in `./generation` is only interfaces and boilerplate code, you of course need to write the actual logic yourself.
Take a look in the `./src/Resource` folder, where you will see an implementation of each of these interfaces.
If you were to add an integration with a third party data provider, it is within this folder that you would add your code.

If you take a look at `./src/Resource/Customer` you will notice that only 'CustomerGet' has been implemented,
and in the `./data/api.php` there is reference to four other methods. To save time you can have Absolute Silex API automatically generate
the missing implementations. Any existing code in `./src/Resource` will not be replaced.

```
./bin/console absolute:silexapi:generation ./data/api.php --implement-resources
```

On running the above, you should now see a basic implementation in place for each of the Customer methods.

# API Documentation (Swagger)
With any API it is vital that the documentation remain up to date with the implementation,
so with Absolute Silex API this is also handled automatically from your `./data/api.php` file.

In your web browser, visit http://acme.silex.api/swagger/index.html (replacing 'acme.silex.api' with your own domain)
and you will see all of your API endpoints available for testing.
Open up one of the test endpoints and click the 'Try it out' button and the Swagger UI will make a real API request to your endpoint.

You should now see a 401 response code from your API with the message 'Unauthorized'.

# Authentication
Absolute Silex API comes with some basic authentication out of the box.
You may want to add your own more sophisticated authentication and authorization within your `./src/Resource` implementation.

This skeleton project has a default username and password of 'username' and 'password' respectively.
In the top right of the Swaggger UI you can click the 'Authorize' button and enter your username and password.
Subsequent requests to your API should now give the expected response.

# Automated Tests
Some example test cases have been included, these can be run from the root of your project with:

```
php vendor/phpunit/phpunit/phpunit
```

Feel free to build out the test suite to add your own client specific cases.

# Questions?
If you are not sure of anything or would like to discuss a feature request or potential bug,
feel free to submit your own Pull Request or get in touch with us at https://absolutecommerce.co.uk/contact
