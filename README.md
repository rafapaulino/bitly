# PHP Bit.ly generate link with API


## Features

- `v1.0.0` Create class.

## Example of use

Install: composer require rafael.paulino/bitly

```php
<?php
include 'BitlyApi.php';

$bitly = new BitlyApi('yourloginname','yourapisecret');

$link = $bitly->getLink('http://rafapaulino.com');

echo '<pre>';
var_dump($link);