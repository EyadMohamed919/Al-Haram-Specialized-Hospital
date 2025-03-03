<?php

function navBar()
{
    echo "<nav>
            <img src='CSS Sheets/Images/AboutUsImages/Hospital_Logo.svg' class='nav-logo' alt=''>
            <div class='nav-container'>
                <a class='nav-links' href='index.html'>Home</a>
                <a class='nav-links' href='Donations-Homepage.html'>Donation</a>
                <div class='nav-dropdown'>
                    <a class='nav-links' href='vehiclesPage.html'>Services<i class='fa-solid fa-caret-down'></i></a>
                    <div class'nav-dropdown-links'>
                        <a class='dropdown-item' href='ServicesMain.html'>Services Home</a>
                        <a class='dropdown-item' href='Pharmacy.html'>Pharmacy</a>
                        <a class='dropdown-item' href='Tests.html'>Tests</a>
                        <a class='dropdown-item' href='Appointments.html'>Book Us</a>
                        <a class='dropdown-item' href='Outpatient.html'>Outpatient</a>
                        <a class='dropdown-item' href='Surgery.html'>Surgery</a>
                        <a class='dropdown-item' href='PrevMed.html'>PrevMed™</a>
                        <a class='dropdown-item' href='Emergency.html'>Emergency</a>
                        <a class='dropdown-item' href='Dentistry.html'>Dentistry</a>
                        <a class='dropdown-item' href='ICU.html'>ICU</a>
                        <a class='dropdown-item' href='Oncology.html'>Oncology</a>
                    </div>
                </div>
                <div class='nav-dropdown'>
                    <a class='nav-links' href='contact Details.html'>Contact Us<i class='fa-solid fa-caret-down'></i></a>
                    <div class='nav-dropdown-links'>
                        <a href='contact Details.html'>Contact Details</a>
                        <a href='Online Consultaitions.html'>Online Consultations</a>
                        <a href='heart checks.html'>Heart Checks</a>
                        <a href='Directions to hospital.html'>Directions to the Hospital</a>
                    </div>
                </div>
                <a class='nav-links' href='recordPage.html'>Records</a>
                <a class='nav-links' href='aboutPageMain.html'>About Us</a>
                <a class='nav-links' href='Volunteering-Homepage.html'>Volunteering</a>
                <a href='Login.html' class='nav-links'><i class='fa-solid fa-user'></i></a>
            </div>
        </nav>";
}

?>