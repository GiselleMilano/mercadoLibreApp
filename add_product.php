<?php
include("auth.php");
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstanceRest = new Meli\Api\RestClientApi();

$body = json_decode('{
  "title":"Item de test - No Ofertar ' . $_POST["title"] . '",
  "category_id":"MLU3530",
  "price":' . $_POST["cost"] . ',
  "currency_id":"UYU",
  "available_quantity":' . $_POST["amount"] . ',
  "buying_mode":"buy_it_now",
  "condition":"new",
  "listing_type_id":"gold_special",
  "sale_terms":[
     {
        "id":"WARRANTY_TYPE",
        "value_name":"Garantía del vendedor"
     },
     {
        "id":"WARRANTY_TIME",
        "value_name":"90 días"
     }
  ],
  "pictures":[
     {
        "source":"http://mlu-s2-p.mlstatic.com/968521-MLU20805195516_072016-O.jpg"
     }
  ],
  "attributes":[
     {
        "id":"BRAND",
        "value_name":"Marca del producto"
     },
     {
        "id":"EAN",
        "value_name":"7898095297749"
     }
  ]
}');

$result = $apiInstanceRest->resourcePost('items', $_SESSION["TOKEN"], $body);
header("Location: index.php");

?>