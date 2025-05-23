<html lang="en">
<?php
session_start();
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: ../index.php");
      }
      else
      {
        if($_SESSION["Access"] == "messages")
        {
            header("location: AdminMain.php");
        }
      }
    }
    else
    {
        header("location: ../index.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacist Panel</title>
    <link rel="stylesheet" href="servicesAdminCSS/admin.css">
</head>
<body>
<h1>Pharmacist Dashboard</h1>
<div class="tabs">


<?php 

$products = file('txtFiles\pharmaProds.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($products as $prod): ?>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Remove Product</th>
            <th>Quantity</th>
    </table>
<?php endforeach; ?>


<?php
   include_once(__DIR__ . '/../encrypt.php');
   $key = 123;
?>
<form method="post" action="pharmaAdmin.php">
    <input type="hidden" name="AddProduct" value="AddProduct">
    <table>
        <tr>
            <td class="td">Product Name:</td>
            <td class="td"><input type="text" class="input" name="ProductName" placeholder="Product Name"></td>
        </tr>

