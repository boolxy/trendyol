# Trendyol Client Lib

The easiest way for using Trendyol APIs in PHP

## Installation

This package can be installed via Composer:

```bash
composer require boolxy/trendyol
```

## Usage

### Product Service

#### Get brands
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getBrands();
```

#### Get brands by name
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getBrandsByName("TRENDYOL");
```

#### Get categories
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getCategories();
```

#### Get attributes by categoryId
```php
use BoolXY\Trendyol\Trendyol;

$categoryId = 387;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getAttributes($categoryId);
```

#### Get shipment providers
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getProviders();
```

#### Get suppliers addresses
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getSuppliersAddresses();
```

#### Get batch request result
```php
use BoolXY\Trendyol\Trendyol;

$batchRequestId = '5631d1a1-ec81-496f-9407-99876554433-1529820717';

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getBatchRequestResult($batchRequestId);
```

#### Create your own products on Trendyol (This is not ready yet)

```php
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Models\Product;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->addProduct(new Product($attributes))
    ->addProduct(new Product($attributes))
    // ...
    ->create();
```

With reviewing the tests, you can learn more...

## Testing

Copy phpunit.xml.dist as phpunit.xml and update it. After then you can start testing.

```bash
vendor/bin/phpunit
```

or

```bash
composer test
```

## Credits

- [Sezai Ozarslan](https://github.com/sezaiozarslan)