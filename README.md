# Optimizely Canvas PHP SDK
A PHP Software Development Kit for use with Optimizely Canvas. See http://developers.optimizely.com/canvas/ for detailed documentation on Optimizely Canvas.

## Installation
Download `auth.php` into your project and `require` it in your code:

```php
require_once './auth.php';
```

Change the `$CLIENT_SECRET` variable in `auth.php` to your registered application's client secret (https://app.optimizely.com/accountsettings/apps/developers)

## Usage
`auth.php` outputs an object called `$CONTEXT` that contains the following:

```php
{"context":
    {"user":
        {"email": "jon@optimizely.com"},
     "environment":
         {"current_account": 123456,
          "current_project": 78910},
     "client":
         {"access_token": "abcdefg1234543",
          "token_type": "bearer",
          "expires_in": 7200}
    }
}
```

We advise that you use [FunnelEnvy's Optimizely PHP wrapper](https://github.com/FunnelEnvy/optimizely-php), where using it in conjunction with `auth.php` would work like so:

```php
require_once './auth.php';
require_once './optimizely-php/optimizely.php';

// Authenticate with Optimizely
$optimizely = new Optimizely($CONTEXT->context->client->access_token, 'oauth');
```