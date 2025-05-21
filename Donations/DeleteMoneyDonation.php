<?php
include_once "DeletefunctionM.php";
if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    deleteRecord("MoneyForm.txt", $ID);
    echo "Record with ID $ID has been deleted.";
}
?>


<form method="post" action="DeleteMoneyDonation.php">
    <table>
        <tr>
            <td><input type="number" name="ID" placeholder="Enter ID" required></td>
            <td><input type="submit" value="Delete Donation"></td>
        </tr>
    </table>
</form>

<button><a href="MoneyDonBE.php">Back to Donations</a></button>