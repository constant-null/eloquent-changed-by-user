# Saving last user changed database record for Eloquent models (Laravel 5)

> Please be aware that this trait uses `Auth` facade
> and expects it to implement `Illuminate\Contracts\Auth\Guard` contract

## Installation
This trait can be installed via [composer](http://getcomposer.org/). Just add following to your `composer.json` file:

```json
{
    "require": {
        "constant-null/eloquent-changed-by": "~0.1"
    }
}
```

and then run:

```
$ composer update
```

To start using this trait you need import it to Eloquent model


```php
<?php

use ConstantNull\Eloquent\Support\ChangedByUser;
use Illuminate\Database\Eloquent\Model;

class SomeModel extends Model
{
    use ChangedByUser;

    /* Rest part of the your class */
}
```

and add column to database in which user id will be stored. Like this for example:

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BestMigrationEver extends Migration
{

    public function up()
    {
        Schema::table('some_table', function(Blueprint $table) {
            $table->integer('changed_by')->nullable();
        });
    }
```
How you can see in example, by default column name for user id is `changed_by`, but it can be easily changed by specifying constant CHANGED_BY in your class body.

For example i want this column name to be 'last_user_id':

```php
<?php

use ConstantNull\Eloquent\Support\ChangedByUser;
use Illuminate\Database\Eloquent\Model;

class SomeModel extends Model
{
    use ChangedByUser;

    const CHANGED_BY = 'last_user_id';

    /* Rest part of the your class */
}
```

Thats all!
