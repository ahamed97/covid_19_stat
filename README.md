## Installation Steps

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

### Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:


```bash
php artisan migrate
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### Run the console command to fetch covid 19 status to database or schedule a corn job

```
fetch:sl-covid-stat
```

And we're all good to go!

Start up a local development server with `php artisan serve`.

### Run tests

`php artisan test`
