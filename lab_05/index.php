<!DOCTYPE html>
<html>
<head>
    <title>Registration form</title>
    <meta charset="utf-8">
    <meta lang="EN">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
// define variables and set to empty values
$firstname = $middlename = $lastname = $password = $email = $phone = $country = $age = $arrivalDate = $salutation_title ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = test_input($_POST["firstname"]);
    $middlename = test_input($_POST["middlename"]);
    $lastname = test_input($_POST["lastname"]);
    $salutation_title = test_input($_POST["salutation"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $phone = test_input($_POST["phone"]);
    $age = test_input($_POST["age"]);
    $country = test_input($_POST["country"]);
    $arrivalDate = test_input($_POST["arrival-date"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div id="container">
    <form method="POST" action="form_handling.php">
        <p>Use the following form to register</p>
        <input type="text" name="firstname" placeholder="First name" required>
        <input type="text" name="middlename" placeholder="Middle name">
        <input type="text" name="lastname" placeholder="Last name" required>
        <label class="radio-container">Mr
            <input type="radio" checked="checked" name="salutation" value="Mr">
            <span class="checkmark"></span>
        </label>
        <label class="radio-container">Mrs
            <input type="radio" name="salutation" value="Mrs">
            <span class="checkmark"></span>
        </label>
        <label class="radio-container">Ms
            <input type="radio" name="salutation" value="Ms">
            <span class="checkmark"></span>
        </label>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <label for="age">Select your age</label>
        <select class="select-css" name="age" required>
            <?php
            for ($i = 18; $i < 100; $i++) {
                echo("<option>" . $i . "</option>");
            }
            ?>
        </select>
        <br>
        <input type="email" name="email" id="email" placeholder="Enter a valid email address" autocomplete="on" required>
        <br>
        <input type="tel"  name="phone" placeholder="Add your phone number" x-autocompletetype="tel" pattern="(^\+[0-9]{2,3}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)">
        <br>
        <label for="country">Select your country</label>
        <select id="country" name="country" class="select-css">
            <?php
            $countries = ["Japan", "Estonia", "Austoralia", "USA", "Sweden", "China", "Taiwan", "France", "Slovenia", "India"];
            foreach ($countries as $value) {
                echo("<option>" . $value . "</option>");
            }
            ?>
        </select>
        <br>
        <label for="arrival-date">Select your arrival date</label>
        <input type="date" id="arrival-date" name="arrival-date" min="2020-01-01" max="2029-01-01" required>
        <input type="Submit" class="btn" value="Submit">
    </form>
</div>

</body>
</html>