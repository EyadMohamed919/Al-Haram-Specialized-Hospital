<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/c19e8a164c.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='../CSS Sheets/aboutNavStyle.css'>
    <link rel='stylesheet' href='../CSS Sheets/aboutAwardStyle.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../CSS Sheets/Images/AboutUsImages/favicon.svg">
    <title>Heart Check Services - Al Haram Hospital</title>
    <style>
        .form-group {
            margin-bottom: 20px;
        }
        .form-border {
            border: 2px solid green;
            padding: 20px;
            border-radius: 10px;
        }
        .visit-section {
            background-color: grey;
            padding: 20px;
            color: white;
            margin-top: 20px;
            border-radius: 10px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .phone-number {
            text-align: right;
            padding: 20px;
            font-size: 1.5em;
            margin-top: 2rem;
            background-color: white;
            color: black;
            font-family: 'Arial Black', sans-serif;
        }
        .phone-number .big-number {
            font-size: 2.5em;
            color: black;
        }
    </style>
</head>
<body>
    <div class="phone-number">
        Call us: <br>
        <span class="big-number">02 33860236</span>
    </div>
    <?php
        include_once '../repeated.php';
        navBar();
    ?>
    <div class="container" style="margin-top: 40px;">
        <h2>Heart Check Services</h2>
        <div class="form-border">
            <form>
                <div class="form-row" style="display: flex; justify-content: space-between;">
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <label for="patient-name">Patient Name</label>
                        <input type="text" id="patient-name" placeholder="Enter patient name" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="phone-number">Phone Number</label>
                        <input type="tel" id="phone-number" placeholder="Enter phone number" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                </div>
                <div class="form-row" style="display: flex; justify-content: space-between;">
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <label for="mobile-number">Mobile Number</label>
                        <input type="tel" id="mobile-number" placeholder="Enter mobile number" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Enter your email" required style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                </div>
                <div class="form-row" style="display: flex; justify-content: space-between;">
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <label for="file1">Upload File No:1</label>
                        <input type="file" id="file1" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="file2">Upload File No:2</label>
                        <input type="file" id="file2" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                </div>
                <div class="form-row" style="display: flex; justify-content: space-between;">
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <label for="file3">Upload File No:3</label>
                        <input type="file" id="file3" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label for="file4">Upload File No:4</label>
                        <input type="file" id="file4" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
                    </div>
                </div>
                <button type="submit" style="background-color: #007bff; border: none; padding: 10px 20px; color: white; border-radius: 5px;">Submit</button>
            </form>
        </div>
    </div>

    <div class="visit-section">
        <h2>Visit Us</h2>
        <p>11111 Street</p>
        <h2>Call Us</h2>
        <p>Reserve an appointment: 11111</p>
        <p>WhatsApp: 11111</p>
        <p>To contact us: 11111@gmail.com</p>
        <p>Emergency Ambulance: 11111</p>
    </div>

    <footer style="background-color: #343a40; color: white; text-align: center; padding: 20px;">
        <p>&copy; 2024 Al Haram Hospital. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            
            form.addEventListener("submit", function(event) {
                let isValid = true;
    
                const requiredFields = form.querySelectorAll("[required]");
                requiredFields.forEach(function(field) {
                    if (!field.value) {
                        isValid = false;
                        field.classList.add("is-invalid");
                        field.classList.remove("is-valid");
                    } else {
                        field.classList.add("is-valid");
                        field.classList.remove("is-invalid");
                    }
                });
    
                if (!isValid) {
                    event.preventDefault(); 
                    alert("Please fill out all required fields.");
                }
            });
        });
    </script>
</body>
</html>
