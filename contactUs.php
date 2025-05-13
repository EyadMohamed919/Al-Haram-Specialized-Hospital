<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c19e8a164c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS Sheets/aboutNavStyle.css">
    <link rel="stylesheet" href="CSS Sheets/visitStyle.css">
    <link rel="icon" type="image/x-icon" href="CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Al Haram Hospital</title>
</head>
<body>
    <?php include("repeated.php"); navBar();?>
    <header class="header-section">
    </header>
    <div class="header-title">
        <h1>Contact Us</h1>
    </div>
    
    <!-- Main Content of the page -->
    <section class="content-section">
        <div class="content-box">
            <h2 class="content-box-title">Contact Us</h2>
            <h3 class="content-box-subtitle">Contact us<hr class="content-box-subtitle-hr"></h3>

            <form action="SaveContact.php" method="post">
                <table>
                    <tr>
                        <td class="name-cell"><label for="Fname">First Name</label></td>
                        <td><input type="text" name="Fname" required></td>
                        <td class="name-cell"><label for="Lname">Last Name</label></td>
                        <td><input type="text" name="Lname" required></td>
                    </tr>
                    <tr>
                        <td class="name-cell"><label for="email">Email</label></td>
                        <td><input type="email" name="email" required></td>

                        <td class="name-cell"><label for="phone">Phone Number</label></td>
                        <td><input type="tel" name="phone" required></td>
                    </tr>
                    <tr>
                        <td><label for="Gaddress">Governorate</label></td>
                        <td>
                            <select oninput="addOptions()" name="Gaddress" id="governorateSelect">
                                <option value="none"  selected>Choose Governorate</option>
                                <option value="cai">Cairo</option>
                                <option value="giz">Giza</option>
                                <option value="alx">Alexandria</option>
                            </select>
                        </td>
                        <td><label for="Caddress">City</label></td>
                        <td>
                            <select name="Caddress" id="citySelect">
                                <option value="none" selected>None</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address">Message Type</label></td>
                        <td colspan="4">
                            <select name="type" id="type">
                                <option value="complain" selected>Complain</option>
                                <option value="suggesstion">Suggesstion</option>
                                <option value="other">other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label></td>
                        
                        <td colspan="4"><textarea name="message" id="" cols="60" rows="10"></textarea></td>
                    </tr>
                </table>

                <input class="submit-btn" type="submit" value="Request Record">
            </form>
        </div>
    </section>

    <script src="AboutUs/form.js"></script>
</body>
</html>