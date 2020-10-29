### fast start
clone, composer install, cd to project derectory ...

```
touch database/database.sqlite
cp -n .env.example .env|| true
php artisan key:gen --ansi
php artisan migrate:fresh --seed
```
### Launch localhost
``` make run```

### Run tests
`` make test ``

```
   PASS  Tests\Unit\ExampleTest
  ✓ basic test

   PASS  Tests\Feature\ExampleTest
  ✓ basic test

   PASS  Tests\Feature\Http\Controllers\CategoryControllerTest
  ✓ index behaves as expected
  ✓ store saves
  ✓ show behaves as expected
  ✓ update behaves as expected
  ✓ destroy deletes and responds with

   PASS  Tests\Feature\Http\Controllers\PageControllerTest
  ✓ index behaves as expected
  ✓ store saves
  ✓ show behaves as expected
  ✓ update behaves as expected
  ✓ destroy deletes and responds with
  