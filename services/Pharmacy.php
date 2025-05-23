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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSelected']) && isset($_POST['deleteItems'])) {
    $file = __DIR__ . "/txtFiles/tempPharmaCart.txt";
    $cartLines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($_POST['deleteItems'] as $idx) {
        unset($cartLines[$idx]);
    }
    file_put_contents($file, implode("\n", array_values($cartLines)) . (count($cartLines) ? "\n" : ""));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    include_once __DIR__ . '/../encrypt.php';
    $cartFile = __DIR__ . "/txtFiles/tempPharmaCart.txt";
    $ordersFile = __DIR__ . "/txtFiles/pharmaForm.txt";
    $email = $_SESSION['UserEmail'] ?? '';
    $key = '123';

    if ($email && file_exists($cartFile)) {
        $cartLines = file($cartFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $ordersToMove = [];
        $remainingCart = [];

        foreach ($cartLines as $line) {
            $fields = explode("~", $line);
            if (isset($fields[6]) && decrypt($fields[6], $key) === $email) {
                $ordersToMove[] = $fields;
            } else {
                $remainingCart[] = $line;
            }
        }

        $lastID = 0;
        if (file_exists($ordersFile)) {
            $orderLines = file($ordersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($orderLines as $orderLine) {
                $orderFields = explode("~", $orderLine);
                if (isset($orderFields[0]) && is_numeric($orderFields[0])) {
                    $lastID = max($lastID, (int)$orderFields[0]);
                }
            }
        } else {
            $orderLines = [];
        }

        $newOrderLines = [];
        foreach ($ordersToMove as $fields) {
            $lastID++;
            $fields[0] = $lastID;
            $newOrderLines[] = implode("~", $fields);
        }
        if (!empty($newOrderLines)) {
            file_put_contents($ordersFile, implode("\n", $newOrderLines) . "\n", FILE_APPEND | LOCK_EX);
        }
        file_put_contents($cartFile, implode("\n", $remainingCart) . (count($remainingCart) ? "\n" : ""));

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return ValidateForm(event)">
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
                        <td class="td"><input type="email" id="email" class="input" value="<?php echo $_SESSION['UserEmail']; ?>" name="Email" placeholder="johndoe@email.com"></td>
                    </tr>
                    <tr>
                        <td class="td" align="right"><input type="submit" id="submit" class="input" name="submit" value="Add to Cart"></td>
                        <td class="td"><input type="reset" id="reset" class="input" name="reset"></td>
                    </tr>
                </table>
            </form>
            <?php
$filepath = 'txtFiles/tempPharmaCart.txt';
include_once(__DIR__ . '/../encrypt.php');
function getlastID($filepath)
{
    $appointFile = fopen($filepath, 'r');
    $lastID = 0;
    while (!feof($appointFile)) {
        $oneline = fgets($appointFile);
        $Arr = explode('~', $oneline);
        if (isset($Arr[0]) && is_numeric($Arr[0])) {
            $lastID = $Arr[0];
        }
    }
    fclose($appointFile);
    return $lastID;
}
$lastID = getlastID($filepath);
$newID = $lastID + 1;
$key = '123';
date_default_timezone_set("Africa/Cairo");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $medicine = $_POST["Medicine"];
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $address = $_POST["Address"];
    $PN = $_POST["PN"];
    $email = $_POST["Email"];

    $buildLine = "\n" . $newID . "~" . encrypt($medicine, $key) . "~" . encrypt($firstName, $key) . "~" . encrypt($lastName, $key) . "~" . encrypt($address, $key) . "~" . encrypt($PN, $key) . "~" . encrypt($email, $key) . "~" . encrypt(date("Y-m-d"), $key) . "~" . encrypt(date("H:i:s"), $key);
    $appointFile = fopen($filepath, 'a+');
    fwrite($appointFile, $buildLine);
    fclose($appointFile);
}
?>
            
            <h2>Cart</h2>

            <form method="POST" action="">
    <table border="1" cellpadding="5">
        <tr>
            <th>Select</th>
            <th>Cart item no.</th>
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
        $file = __DIR__ . "/txtFiles/tempPharmaCart.txt";
        $email = $_SESSION['UserEmail'] ?? '';
        $found = false;
        if ($email && file_exists($file)) {
            foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $idx => $order) {
                $f = explode("~", $order);
                if (isset($f[6]) && decrypt($f[6], '123') === $email) {
                    $found = true;
                    echo "<tr>";
                    // Checkbox: use the line number as the value
                    echo '<td><input type="checkbox" name="deleteItems[]" value="' . $idx . '"></td>';
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
        if (!$found) echo '<tr><td colspan="10"><center>No items in cart.</center></td></tr>';
        ?>
    </table>
    <input type="submit" name="deleteSelected" value="Delete Selected" class="input">
</form>

            <form method="POST" action="" style="background: transparent;">
            <input type="submit" name="confirm" class="input" value="confirm">
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
                if (!$found) echo '<tr><td colspan="9"><center>No past orders found.</center></td></tr>';
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