# Trading Platform
This repository contains the code for the whitelabel trading platform. 

The platform is build with the following technologies:
* Laravel (PHP Framework)
* Bootstrap (CSS / Sass Framework)
* VueJS (Javascript Framework)
* Laravel Nova (Admin Panel - Customized)

Next to these technologies, we also implement the following API's and services
* IEX (Real-Time stock information)
* Bugsnag (Error Management)


## Installation

### Step 1
Copy `.env.example` to `.env` and update the values based on your settings

### Step 2
Install composer and node modules
```
composer install
npm install
```

### Step 3
Compile assets
```
npm run watch
```
or for production
```
npm run prod
```

### Step 4
Configure database. First you need to create the tables
```
php artisan migrate
```
### Step 5
Import the NYSE stocks
```
php artisan iex:import-stocks
```

Then import the LSE stocks (These are manually set in the lse-stocks.csv file)
```
php artisan lse:import-stocks
```

### Step 6
Setup your first manager account by inserting a row in the users table. You can leave the password empty.
After the row is saved, run the following command to generate a password
```
php artisan user:set-password
```

### Step 7
Set the first highlighted stocks and widget stocks. At least 1 stocks should be highlighted and enabled for the widget to load the platform.

You can set these by setting the `highlighted` or `widget` columns in the `stocks` table to `1`. You can have up to 4 stocks as highlighted.

After changing these values, run `php artisan cache:clear` to clear the cache

### Step 8
Link storage
```
php artisan storage:link
```

## Admin Panel
The admin panel is built on Laravel Nova and is accessible via the `/admin` route.

#### Important: Do not update Laravel nova or the `/nova` folder!
This version of Laravel Nova is customized to auto-fill the transaction fields based on the url. When updating Laravel Nova, this will be removed.
