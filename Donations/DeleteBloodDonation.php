<?php
include_once "DeletefunctionB.php";

if (isset($_POST['ID'])) {
    $id = $_POST['ID'];
    deleteRecord("BF.txt", $id);
    echo "Record with ID $id has been deleted.";
}
?>


<form method="post" action="DeleteBloodDonation.php">
    <table>
        <tr>
            <td><input type="number" name="ID" placeholder="Enter ID" required></td>
            <td><input type="submit" value="Delete Donation"></td>
        </tr>
    </table>
</form>

<button><a href="BloodDonBE.php">Back to Donations</a></button>