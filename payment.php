<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';



function get_payment_url($price,$name,$urlImg){

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

$preference = new MercadoPago\Preference();
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
    array("id" => "amex")
    ),
    "excluded_payment_types" => array(
    array("id" => "atm")
    ),
    "installments" => 6
);

$preference->back_urls = array(
    "success" => "https://mp-certificacion.herokuapp.com/?estado=success",
    "failure" => "https://mp-certificacion.herokuapp.com/?estado=failure",
    "pending" => "https://mp-certificacion.herokuapp.com/?estado=pending",
);

$preference->auto_return = "all";

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = '1234';
$item->title = $name;
$item->quantity = 1;
$item->unit_price = $price;
$item->description = 'Dispositivo móvil de Tienda e-commerce';
$item->picture_url = 'https://mp-certificacion.herokuapp.com/'.$urlImg;
$preference->items = array($item);


$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
    "area_code" => "11",
    "number" => "22223333"
);

$payer->address = array(
    "street_name" => "False",
    "street_number" => 123,
    "zip_code" => "1111"
);
$preference->payer = $payer;


$preference->external_reference = "ramanzincristian@gmail.com";

$preference->save();

return $preference->id;
}