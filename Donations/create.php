<!DOCTYPE html>
<html>
<head>
    <title>Add Donation</title>
</head>
<body>
    <h2>Add New Donation</h2>
    <form method="post">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" required></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="text" name="gender" required></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="country" required></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="date" required></td>
            </tr>
            <tr>
                <td>Blood Type:</td>
                <td><input type="text" name="blood" required></td>
        <input type="submit" value="Add Donation">
    </form>

    <?php
    
    $fget = fopen("BF.txt", "r+");
    while(!feof($fget)){
        $line= fgets($fget);
        $ArrayLine=explode("~",$line);
        fopen("BF.txt", "a");
        $data = "\n".$ArrayLine[0]."~".
                $ArrayLine[1]."~".
                $ArrayLine[2]."~".
                $ArrayLine[3]."~".
                $ArrayLine[4]."~".
                $ArrayLine[5];
        fwrite($fget, $data);
        fclose($fget);
    }
    ?>
</body>
</html>
