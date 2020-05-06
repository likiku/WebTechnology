<!DOCTYPE html>
<html>
<head>
    <title>Registration details</title>
    <meta charset="utf-8">
    <meta lang="EN">
    <link rel="stylesheet" type="text/css" href="form_handling.css">
    <!-- Add icon library for download button-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
global $file;
$file = 'registration.txt';
// Open the file to get existing content
$current = file_get_contents($file); //when using this function we don't need to close the file
// Append a new person to the file
$registration_entries = [$_POST["firstname"], $_POST["middlename"], $_POST["lastname"], $_POST["salutation"], $_POST["password"], $_POST["age"], $_POST["email"], $_POST["phone"], $_POST["country"], $_POST["arrival-date"]];
$registration_text = "";
foreach ($registration_entries as $value) {
    $registration_text .= $value . "\t";
}
// Write the contents back to the file
file_put_contents($file, $registration_text . "; \n", FILE_APPEND);
global $display_array;
$display_array = explode("\t", $registration_text);
$registered_user = [
    "First name" => $display_array[0],
    "Middle name" => $display_array[1],
    "Last name" => $display_array[2],
    "Salutation" => $display_array[3],
    "Password" => $display_array[4],
    "Age" => $display_array[5],
    "Email" => $display_array[6],
    "Phone" => $display_array[7],
    "Country" => $display_array[8],
    "Arrival date" => $display_array[9]
];

?>

<div id="container">
    <h2>Your registration is complete</h2>
    <p>Here is the information you have submitted:</p>
    <ol>
        <?php
        foreach ($registered_user as $key => $value) {
            echo "<li> " . $key . " - " . $value . " </li>";
        }
        ?>
    </ol>
    
    <p>Download the registration file below:</p>
    <button class="btn"><i class="fa fa-download"></i> <a href="download.php">Download</a></button>
    <button class="back-btn"><a href="index.php" class="navigate">Back</a</button>

</div>
</body>
</html>