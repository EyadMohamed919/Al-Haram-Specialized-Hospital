<?php
include_once (__DIR__ . '/../encrypt.php');
$key = 0;

$filename = "MoneyForm.txt";

$file = fopen($filename, "r");

$output = "";

foreach (file($filename) as $line) {
    $arrayline = explode("~", $line);
}

$output .= "TotalDonations : " . decrypt($arrayline[1], $key) . "-" . decrypt($arrayline[5] , $key) ."$" . "\n";

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="MoneyDonations.txt"');

echo $output;

fclose($file);

?>
