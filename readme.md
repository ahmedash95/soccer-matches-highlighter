# Soccer Matches Highlighter

### Requirements

* PHP 5.6 > 
* MySQL
* NodeJs
* Redis



### INSTALL

install app dependencies

``` 
composer install 
```

install js dependecies packages

```
npm install
```

### Config App

**Note: make your .env file and set your database confguration and set BROADCAST_DRIVER=redis**

Run Migrations with Seeds

```
php artisan migrate && php artisan db:seed
```


### Run App

* In the first tab : ``` node socket.js ```
* In the second tab run : ``` redis-server --port 3001 ```
* In the third one run : ``` php artisan serv ```

Then visit http://localhost:8000 and enjoy using this simple app








