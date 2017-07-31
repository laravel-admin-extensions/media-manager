laravel-admin-ext/media-manager
===============================

Media manager for `local` disk.


## Installation

```
$ composer require laravel-admin-ext/media-manager -vvv

```

Open `app/Providers/AppServiceProvider.php`, and call the `MediaManager::boot` method within the `boot` method:

```php
<?php

namespace App\Providers;

use Encore\Admin\Media\MediaManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        MediaManager::boot();
    }
}
```

At last run: 

```
$ php artisan admin:import media-manager
```

Add a disk 

Finally open `http://localhost/admin/media`.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
