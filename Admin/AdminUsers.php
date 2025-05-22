<html lang="en">
<?php
session_start();
    if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: ../index.php");
      }
    }
    else
    {
        header("location: ../index.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://classless.de/classless.css">
    <title>Al Harama Specialized Hospital</title>
</head>
<body>
    
    <h1>Admin Users</h1>
    <form action="../GlobalFunctions.php" method="post">
    <table>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Access</strong></td>
        <td><strong>Delete</strong></td>
    </tr>
    <?php
        include("../GlobalFunctions.php");

        $array = sendAdminUsers();
        foreach($array as $line)
        {
            echo "<tr>";
            echo "<td>" . $line["id"] . "</td>";
            echo "<td>" . $line["name"] . "</td>";
            echo "<td>" . $line["email"] . "</td>";
            echo "<td>" . $line["access"] . "</td>";
            if($line["id"] != 1)
            {
                echo "<td><input type=\"checkbox\" name=\"delArray[]\" value=" . $line["id"] . "required>"; 
            }
            else
            {
                echo "<td><input type=\"checkbox\" name=\"delArray[]\" disabled>";
            }

            echo "</tr>";
        }
    ?>

    </table>
        
        <br>
        <h4>Delete Admin</h4>
        <label for="deleteAdmin">Select admins using checkboxes</label>
        <button type="submit" name="deleteAdmin">Delete</button>
    </form>
    <form action="../GlobalFunctions.php" method="post">
        <h4>Update Admin</h4>
        <label for="name">Select user to update</label>
        <select name="id" required>
            <option value="" disabled selected>Select user</option>
            <?php
                
                foreach($array as $name)
                {
                    echo "<option value=" . $name["id"] . ">" . $name["name"] . "</option>";
                }
            ?>
        </select>

        <input type="text" name="name" placeholder="Update name" required>
        <input type="email" name="email" placeholder="Update email" value="example@hospital.com" required>

        <label for="user">Update Privilages</label>
        <select name="access">
            <option value="top">top</option>
            <option value="messages">Messages</option>
            <option value="pharmacist">Pharmacist</option>
        </select>
        <button type="submit" name="updateAdmin">Update</button>
    </form>

    <?php include("../repeated.php"); adminNav(); ?>
</body>
</html>