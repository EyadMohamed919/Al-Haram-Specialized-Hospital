<?php
session_start();

if (!isset($_SESSION["Logged"]) || $_SESSION["Logged"] !== true) {
    header("Location: ../Login.php");
    exit();
}

if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] === true) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Al Haram Hospital Pharmacy</title>
        <?php
            include_once(__DIR__ . '/../repeated.php');
            servicesSEO();
        ?>
    </head>
    <body>
        <?php
            include_once(__DIR__ . '/../repeated.php');
            navBar();
        ?>
        <center>
            <h1 id="h1"> Hello <?php
                echo $_SESSION['UserName'] . "!";
            ?>
             Order your medicine from home!</h1><br>
            <form method="post" action="forms.php" onsubmit="return ValidateForm(event)">
                <input type="hidden" name="formType" value="Pharmacy">
                <table id="table1">
                    <tr>
                        <td class="td">Medicine:</td>
                        <td class="td">
                            <select class="input" name="Medicine">
                                <?php
                                    $lines = file("txtFiles/pharmaProds.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    if ($lines) {
                                        foreach ($lines as $line) {
                                            $parts = explode("~", $line, 2);
                                            $label = isset($parts[1]) ? htmlspecialchars(trim($parts[1])) : htmlspecialchars(trim($parts[0]));
                                            echo "<option value=\"$label\">$label</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">First Name:</td>
                        <td class="td"><input type="text" class="input" name="FirstName" placeholder="John"></td>
                    </tr>
                    <tr>
                        <td class="td">Last Name:</td>
                        <td class="td"><input type="text" class="input" name="LastName" placeholder="Doe"></td>
                    </tr>
                    <tr>
                        <td class="td">Address:</td>
                        <td class="td"><input type="text" class="input" name="Address" placeholder="New York, queens, ..."></td>
                    </tr>
                    <tr>
                        <td class="td">Phone number:</td>
                        <td class="td"><input type="number" id="pn" class="input" name="PN" placeholder="01234567890"></td>
                    </tr>
                    <tr>
                        <td class="td">Email:</td>
                        <td class="td"><input type="email" id="email" class="input" name="Email" placeholder="johndoe@email.com"></td>
                    </tr>
                    <tr>
                        <td class="td" align="right"><input type="submit" id="submit" class="input" name="submit"></td>
                        <td class="td"><input type="reset" id="reset" class="input" name="reset"></td>
                    </tr>
                </table>
            </form>
            <h2>Past Orders</h2>
            <table border="1" cellpadding="5">
                <tr>
                    <th>Order ID</th>
                    <th>Medicine</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php
                include_once __DIR__ . '/../encrypt.php';
                $file = __DIR__ . "/txtFiles/pharmaForm.txt";
                $email = $_SESSION['UserEmail'] ?? '';
                $found = false;
                if ($email && file_exists($file)) {
                    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $order) {
                        $f = explode("~", $order);
                        if (isset($f[6]) && decrypt($f[6], '123') === $email) {
                            $found = true;
                            echo "<tr>";
                            foreach ($f as $i => $v) {
                                if (in_array($i, [1, 2, 3, 4, 5, 6, 7, 8])) {
                                    echo "<td>" . htmlspecialchars(decrypt($v, '123')) . "</td>";
                                } else {
                                    echo "<td>" . htmlspecialchars($v) . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    }
                }
                if (!$found) echo '<tr><td colspan="9">No past orders found.</td></tr>';
                ?>
            </table>
            <footer id="footer">
                <hr>
                © 2024 Haram Public Hospital, all rights reserved
            </footer>
        </center>
        <script src="services.js"></script>
    </body>
</html>