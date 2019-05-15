<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "testdocdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$docID = mysqli_real_escape_string($link, $_REQUEST['docID']);
$mediCenID = mysqli_real_escape_string($link, $_REQUEST['mediCenID']);
$numOfSlots = mysqli_real_escape_string($link, $_REQUEST['numOfSlots']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$start = mysqli_real_escape_string($link, $_REQUEST['start']);
$end = mysqli_real_escape_string($link, $_REQUEST['end']);

// Attempt insert query execution
$sql = "INSERT INTO Sessions (docID,mediCenID,numOfSlots,date,start,end) VALUES ('$docID', '$mediCenID','$numOfSlots','$date','$start','$end')";


if(mysqli_query($link, $sql)){
    echo "Session added successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// $sesID=mysql_insert_id();
$sesID=21;
//add slots
$check=true;
for ($i=0;$i<$numOfSlots; $i++) {
    $sql2 = "INSERT INTO Slots (sesID,status,slotNumber) VALUES ('$sesID', '0','$i'+1)";
    if(!mysqli_query($link, $sql2)){
        $check=false;
    }
}
if ($check= true){
    echo "Each slot added successfully.";
}
else{
    echo "ERROR: Slots can not be added $sql2. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);

?>
