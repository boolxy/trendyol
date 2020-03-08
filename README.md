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

#### Get products
```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->getProducts();
```
with filters:
```php
use BoolXY\Trendyol\Trendyol;                          
use BoolXY\Trendyol\Enums\DataQueryType;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->gettingProducts()
    ->dataQueryType(DataQueryType::LAST_MODIFIED_DATE)
    ->barcode('XXX')
    ->page(1)
    ->size(50)
    // ...
    ->get();
```

#### Update price and inventory
```php
use BoolXY\Trendyol\Trendyol;                      

$items = [
    [
        "barcode" => "8680000000",
        "quantity" => 100,
        "salePrice" => 112.85,
        "listPrice" => 113.85, 
    ],
    // ...
];

$service = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->updatingPriceAndInventory();

foreach($items as $item) {
    $service->addItem(
        $item["barcode"],
        $item["quantity"],
        $item["salePrice"],
        $item["listPrice"]
    );
}

$results = $service->update();
```

#### Create your own products on Trendyol
```php
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Models\Product;

$attributes = [ /* ... */ ];

$product1 = new Product($attributes);

$items = [
    $product1,
    // ...
];

$service = Trendyol::create($user, $pass, $supplier_id)
    ->productService()
    ->creatingProducts();

foreach($items as $item) {
    $service->addProduct($item);
}

$service->create();
```

### Order Service
### Cancel Service
### Accounting Service

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