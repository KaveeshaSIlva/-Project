<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "testdocdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$condition=true;
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$speciality = mysqli_real_escape_string($link, $_REQUEST['speciality']);
$district = mysqli_real_escape_string($link, $_REQUEST['district']);
$qualifications = mysqli_real_escape_string($link, $_REQUEST['qualifications']);
$regno = mysqli_real_escape_string($link, $_REQUEST['regno']);
$sex = mysqli_real_escape_string($link, $_REQUEST['sex']);
$birthday_day = mysqli_real_escape_string($link, $_REQUEST['birthday_day']);
$birthday_month = mysqli_real_escape_string($link, $_REQUEST['birthday_month']);
$birthday_year = mysqli_real_escape_string($link, $_REQUEST['birthday_year']);

if(preg_match('/\\d/', $first_name)>0 ){
    $condition=false;
    echo "First name should contain only letters"."<br>";
}

if(preg_match('/\\d/', $last_name)>0 ){
    $condition=false;
    echo "Last name should contain only letters"."<br>";
}

if(is_numeric($regno)==false){
    $condition=false;
    echo "Invalid Registration Number";
}
if(preg_match('/\\d/', $speciality)>0 ){
    $condition=false;
    echo "Speciality should contain only letters"."<br>";
}

if ($condition==true){
// Attempt insert query execution
$sql = "INSERT INTO doctors (first_name, last_name, speciality,district,qualifications,regno,sex,birthday_day,birthday_month,birthday_year) VALUES ('$first_name', '$last_name', '$speciality','$district','$qualifications','$regno','$sex','$birthday_day','$birthday_month','$birthday_year')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
} 
// Close connection
mysqli_close($link);

?>
