<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>\
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/x-icon" href="CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Money Donations</title>
    <link rel="stylesheet" href="../FormStyle1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/aboutAwardStyle.css">
    <link rel="stylesheet" href="../CSS Sheets/FormStyle2.css">
    <script src="MoneyDon.js" defer></script>
</head>
<body>
    <?php
            include_once(__DIR__ . '/../repeated.php');
            navBar();
        ?>
    <h1 id="title">Money Donations</h1><hr>
    <form action="MoneyDon.php" method="POST" onsubmit="validateForm();">
        <table border="1" align="center">
            <tr>
                <td>ID</td>
                <td><input type="text" id="ID" name="ID" placeholder="Automatically Added" readonly></td>
            <tr>
                <td>First Name</td>
                <td><input type="text" id="FirstName" name="FirstName" placeholder="Enter First Name"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" id="LastName" name="LastName" placeholder="Enter Last Name"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="Gender" value="M"> Male<br>
                    <input type="radio" name="Gender" value="F"> Female
                </td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td>
                    <select name="Country">
                        <option value="EG">Egypt</option>
                        <option value="GE">Germany</option>
                        <option value="SR">Turkey</option>
                        <option value="UAE">United Arab Emirates</option>
                        <option value="SAR">Saudi Arabia</option>
                        <option value="QTR">Qatar</option>
                        <option value="ENG">England</option>
                        <option value="FR">France</option>
                        <option value="USA">United States of America</option>
                        <option value="SK">South Korea</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Payment Method</td>
                <td>
                    <input type="Radio" id="Visa" value="VS" name="PaymentMethod"> Visa Card<br>
                    <input type="Radio" id="InstaPay" value="IP" name="PaymentMethod"> Insta pay<br>
                    <input type="Radio" id="PayPal" value="PP" name="PaymentMethod"> Pay Pal
                </td>
            </tr>
            <tr>
                <td>Donation Amount</td>
                <td>
                    <select id="Amount" name="DonationAmount">
                        <option value="0" selected>0</option>
                        <option value="100">$100</option>
                        <option value="200">$200</option>
                        <option value="500">$500</option>
                        <option value="1000">$1000</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="inputs" type="submit" value="Add Donation">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
