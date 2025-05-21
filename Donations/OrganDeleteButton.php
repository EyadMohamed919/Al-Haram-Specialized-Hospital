<?php
include_once "OrganDeletefunction.php";
if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    deleteRecord("OrganFile.txt", $ID);
    echo "Record with ID $ID has been deleted.";
}
?>


<form method="post" action="OrganDeleteButton.php">
    <table>
        <tr>
            <td><input type="number" name="ID" placeholder="Enter ID" required></td>
            <td><input type="submit" value="Delete Donation"></td>
        </tr>
    </table>
</form>

<button><a href="OrganDonBE.php">Back to Donations</a></button>