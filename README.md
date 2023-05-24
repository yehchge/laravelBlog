Laravel Version: 9.52.7
PHP Version: 8.2.6
DB Name: Laravel10

This is My Laravel Study Code

## Install

- git clone git@github.com:xxx/laravelBlog.git
- $ cd laravelBlog
- $ composer install
- $ cp .env.example .env
- edit .env DB config
- $ php artisan key:generate
- $ php artisan migrate

## About test command & syntax

```bash
$ composer require laravel/ui --dev
$ php artisan ui vue --auth
$ npm install && npm run dev
$ php artisan make:migration create_posts_table
# Update xxxx_xx_xx_xxxxxx_create_posts_table.php
```

```php
Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
```

```bash
$ php artisan migrate
$ php artisan make:factory MemberFactory
$ php artisan make:seeder MembersTableSeeder
$ php artisan make:seeder PostsTableSeeder
$ php artisan make:seeder UsersTableSeeder
$ php artisan db:seed
$ php artisan make:model Members
$ php artisan key:generate
$ php artisan make:controller PostsController --resource
$ php artisan 
$ composer install
$ php artisan migrate
$ php artisan serve
$ php artisan make:migration create_members_table
$ php artisan make:migration create_datas_table
$ php artisan make:migration create_notes_table
$ php artisan migrate:refresh --seed
```

[http://127.0.0.1:8000/](http://127.0.0.1:8000/)
[http://127.0.0.1:8000/contactUs](http://127.0.0.1:8000/contactUs)
[http://127.0.0.1:8000/dicts](http://127.0.0.1:8000/dicts)
[http://127.0.0.1:8000/posts](http://127.0.0.1:8000/posts)
[http://127.0.0.1:8000/tasks](http://127.0.0.1:8000/tasks)
[http://127.0.0.1:8000/articles](http://127.0.0.1:8000/articles)
[http://127.0.0.1:8000/blogs](http://127.0.0.1:8000/blogs)


Ref:
使用 Old Route:
https://www.amitmerchant.com/use-Laravel7-style-controller-route-definitions-in-Laravel-8/


Tasks:

- step 1:
```bash
$ php artisan make:migration create_tasks_table --create=tasks
```

- step 2:
update xxxx_xx_xx_xxxxxx_create_tasks_table.php

- step 3:
```bash
$ php artisan migrate
```

- step 4:
update routes/web.php

- step 5:
```bash
$ php artisan make:controller TaskController --resource --model=Task
```
- step 6:
update app/Models/Task.php

- step 7:
update app/Http/Controllers/TaskController.php

- step 8:
generate blade files. resources/views/tasks/...  
errors.blade.php,  
index.blade.php,  
layout.blade.php  

============================================

Articles: (no auth)

- step 1:
```bash
$ php artisan make:migration create_articles_table --create=articles
```

- step 2:
update xxxx_xx_xx_xxxxxx_create_articles_table.php

- step 3:
```bash
$ php artisan migrate
```

- step 4:
update routes/web.php

step 5:
```bash
$ php artisan make:controller ArticleController --resource --model=Article
```

- step 6:
update app/Models/Article.php

- step 7:
update app/Http/Controllers/ArticleController.php

- step 8:
generate blade files. resources/views/articles/...  
create.blade.php,  
edit.blade.php,  
index.blade.php,  
layout.blade.php,  
show.blade.php  

============================================

Blogs:

- step 1:
```bash
$ php artisan make:migration create_blogs_table --create=blogs
```

- step 2:
update xxxx_xx_xx_xxxxxx_create_blogs_table.php

- step 3:
```bash
$ php artisan migrate
```

- step 4:
update routes/web.php

- step 5:
```bash
$ php artisan make:controller BlogController --resource --model=Blog
```

- step 6:
update app/Models/Blog.php

- step 7:
update app/Http/Controllers/BlogController.php

- step 8:
generate blade files. resources/views/blogs/...  
dashboard.blade.php,  
edit.blade.php,  
help.blade.php,  
index.blade.php,  
layout.blade.php,  
login.blade.php,  
note.blade.php,  
user.blade.php,  
user_edit.blade.php  

============================================

Products:

- step 1:
```bash
$ php artisan make:migration create_products_table --create=products
```

- step 2:
update xxxx_xx_xx_xxxxxx_create_products_table.php

- step 3:
```bash
$ php artisan migrate
```

- step 4:
update routes/web.php

- step 5:
```bash
$ php artisan make:controller ProductController --resource --model=Product
```

- step 6:
update app/Models/Product.php

- step 7:
update app/Http/Controllers/ProductController.php

- step 8:
generate blade files. resources/views/products/...  
create.blade.php,  
edit.blade.php,  
index.blade.php,  
layout.blade.php,  
show.blade.php  
