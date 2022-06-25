Laravel Version: 9.18.0
PHP Version: 8.1.7
DB Name: LaravelDB

This is My Laravel Study Code

$ composer require laravel/ui --dev
$ php artisan ui vue --auth
$ npm install && npm run dev
$ php artisan make:migration create_posts_table
Update xxxx_xx_xx_xxxxxx_create_posts_table.php
```
Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
```
$ php artisan migrate
$ php artisan make:seeder PostsTableSeeder
$ php artisan make:seeder UsersTableSeeder
$ php artisan db:seed
$ php artisan key:generate
$ php artisan make:controller PostsController --resource
$ php artisan 
$ composer install
$ php artisan migrate
$ php artisan serve

http://127.0.0.1:8000/
http://127.0.0.1:8000/contactUs



Ref:
使用 Old Route:
https://www.amitmerchant.com/use-Laravel7-style-controller-route-definitions-in-Laravel-8/
