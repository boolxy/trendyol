# Trendyol PHP Client

![Tests](https://github.com/boolxy/trendyol/workflows/Tests/badge.svg?branch=master)
[![StyleCI](https://github.styleci.io/repos/241877329/shield?branch=master&style=flat)](https://github.styleci.io/repos/241877329)
[![Latest Stable Version](https://poser.pugx.org/boolxy/trendyol/v/stable?format=flat)](https://packagist.org/packages/boolxy/trendyol)
[![License](https://poser.pugx.org/boolxy/trendyol/license?format=flat)](https://packagist.org/packages/boolxy/trendyol)
[![GitHub stars](https://img.shields.io/github/stars/boolxy/trendyol)](https://github.com/boolxy/trendyol/stargazers)

Trendyol is the largest and fastest growing mobile commerce company in Turkey and in the MENA region.

This library is the easiest way to use Trendyol API services in PHP.
If you are a Trendyol partner and use PHP programming language on your own website, this package is perfect for you.

Services:

1. Product Service
2. Order Service
3. Claim Service
4. Settlement Service

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
    ->dataQueryType(DataQueryType::create(DataQueryType::LAST_MODIFIED_DATE))
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

$result = $service->create();
```

### Order Service

#### Get shipment packages

```php
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Enums\ShipmentOrderBy;
use BoolXY\Trendyol\Enums\ShipmentStatus;
use BoolXY\Trendyol\Enums\OrderByDirection;

$results = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->gettingShipmentPackages()
    ->status(ShipmentStatus::create(ShipmentStatus::DELIVERED))
    ->orderByField(ShipmentOrderBy::create(ShipmentOrderBy::PACKAGE_LAST_MODIFIED_DATE))
    ->orderByDirection(OrderByDirection::create(OrderByDirection::DESC))
    ->page(1)
    ->size(10)
    // ...
    ->get();
```

#### Update tracking number

```php
use BoolXY\Trendyol\Trendyol;

$shipmentPackageId = 11650604;
$trackingNumber = "7340447182689";

$result = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->updateTrackingNumber($shipmentPackageId, $trackingNumber);
```

#### Send invoice link

```php
use BoolXY\Trendyol\Trendyol;

$shipmentPackageId = 11650604;
$invoiceLink = "https://extfatura.faturaentegratoru.com/324523-34523-52345-3453245.pdf";

$result = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->sendInvoiceLink($invoiceLink, $shipmentPackageId);
```

#### Splitting shipment package

```php
use BoolXY\Trendyol\Trendyol;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->splittingShipmentPackage()
    ->setShipmentPackageId(11650604)
    ->addOrderLineId(2)
    ->addOrderLineId(3)
    ->addOrderLineId(4)
    // ...
    ->split();
```

multi

```php
use BoolXY\Trendyol\Trendyol;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->splittingShipmentPackageMulti()
    ->setShipmentPackageId(11650604)
    ->addGroup([ 3, 5, 6 ])
    ->addGroup([ 7, 8, 9 ])
    // ...
    ->split();
```

by quantity

```php
use BoolXY\Trendyol\Trendyol;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->orderService()
    ->splittingShipmentPackageByQuantity()
    ->setShipmentPackageId(11650604)
    ->addQuantitySplit($orderLineId = 0, [ 2, 2 ])
    // ...
    ->split();
```

### Claim Service

#### Get claims

```php
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Enums\ClaimItemStatus;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->claimService()
    ->gettingClaims()
    ->status(ClaimItemStatus::create(ClaimItemStatus::CREATED))
    // ...
    ->get();
```

#### Approve claim line items

```php
use BoolXY\Trendyol\Trendyol;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->claimService()
    ->approvingClaimLineItems()
    ->addClaimItemId("f9da2317-876b-4b86-b8f7-0535c3b65731")
    // ...
    ->approve();
```

#### Create claim issue

```php
use BoolXY\Trendyol\Trendyol;

$result = Trendyol::create($user, $pass, $supplier_id)
    ->claimService()
    ->creatingClaimIssue()
    ->setClaimIssueReasonId(1)
    ->setClaimId("f9da2317-876b-4b86-b8f7-0535c3b65731")
    ->setClaimItemIdList("b71461e3-d1a0-4c1d-9a6d-18ecbcb5158c")
    ->addFile(__DIR__ . '/test.png')
    // ...
    ->create();
```

#### Get claims issue reasons

```php
use BoolXY\Trendyol\Trendyol;

$results = Trendyol::create($user, $pass, $supplierId)
    ->claimService()
    ->getClaimsIssueReasons();
```

### Settlement Service

#### Get settlements

```php
use BoolXY\Trendyol\Trendyol;
use BoolXY\Trendyol\Enums\SettlementDateType;

$results = Trendyol::create($user, $pass, $supplierId)
    ->settlementService()
    ->gettingSettlements()
    ->dateType(SettlementDateType::create(SettlementDateType::ORDER))
    ->startDate(1557469159834)
    ->endDate(1557469159834)
    // ...
    ->get();
```

## Testing

With reviewing the tests, you can learn more about the package.
For testing: Copy phpunit.xml.dist as phpunit.xml and update it. After then you can start the testing.

```bash
vendor/bin/phpunit
```

or

```bash
composer test
```

## Credits

- [Sezai Ozarslan](https://github.com/sezaiozarslan)
- [All Contributors](https://github.com/boolxy/trendyol/graphs/contributors)

## License

The MIT License (MIT).
Please see [License File](https://github.com/boolxy/trendyol/blob/master/LICENSE.md) for more information.
