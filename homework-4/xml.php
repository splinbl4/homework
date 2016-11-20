<?php
$xml = simplexml_load_file('data.xml');
//echo '<pre>';
//print_r($xml);

echo 'Purchase Order Number: ' . $xml[PurchaseOrderNumber] . '<br>' .
'Order Date: ' . $xml[OrderDate] . '<hr>';
foreach ($xml -> Address as $data) {
    echo '<b>' . $data[Type] . ': </b><br>';
    echo 'Name: ' . $data -> Name . '<br>';
    echo 'Street: ' . $data -> Street . '<br>';
    echo 'City: ' . $data -> City . '<br>';
    echo 'State: ' . $data -> State . '<br>';
    echo 'Zip: ' . $data -> Zip . '<br>';
    echo 'Country: ' . $data -> Country . '<br><br>';
}
echo '<p>'. $xml -> DeliveryNotes . '</p>';
foreach ($xml -> Items -> Item as $item) {
    echo '<b>' . '№ ' . $item[PartNumber] . ':</b><br>';
    echo 'ProductName: ' . $item ->ProductName . '<br>';
    echo 'Quantity: ' . $item -> Quantity . '<br>';
    echo 'USPrice: ' . $item -> USPrice . '<br>';
    if ($item -> Comment) {
        echo 'Comment: ' . $item -> Comment . '<br><br>';
    } else {
        echo 'ShipDate: ' . $item -> ShipDate . '<br><br>';
    }
}
