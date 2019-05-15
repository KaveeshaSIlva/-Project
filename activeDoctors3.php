
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>



<body> 
    
<?php
include "Session.php";
include "Slot.php";
$mediID=3;
$today= date("Y-m-d");
$time=time();
//connect database
$conn = new mysqli("localhost", "root", "", "testdocdb");
//connect slot table
$sql = "SELECT slotID,sesID,status,slotNumber,channeledUserID FROM Slots";
$slotResult = $conn->query($sql);

//connect session table
$sql1 = "SELECT sesID,docID,mediCenID,numOfSlots,date,start,end FROM Sessions";
$sesResult = $conn->query($sql1);

//connect doctors table
$sql2 = "SELECT id,first_name,last_name FROM doctors";
$docResult = $conn->query($sql2);

$startingSlotIDNumbers=array();
$sessions=array();
$doctors=array(); 
// array_push($doctors,"Kaveesha Silva")?>
<?php while($row = $sesResult->fetch_assoc()):?>
    <?php
    $foundSession=false;
    if (($today==$row["date"]) ){ // get active sessions  and  ($row["start"]<=$time and $time<=$row["end"] )
        echo "sesFound!";
        if($mediID==$row["mediCenID"]){
            $sesID=$row["sesID"];
            $docID=$row["docID"];
            $date=$row["date"];
            $start=$row["start"];
            $end=$row["end"];
            $numOfSlots=$row["numOfSlots"];
            $foundSession=true;
            
        }
    }
    ?>
    <?php
    if($foundSession):?>
        <?php
        //get Doctor's name
        while($row = $docResult->fetch_assoc()) {
            echo $docID." ".$row["id"]."<br>";
            if($docID==$row["id"]){
                echo "docFound!";
                $docName= $row["first_name"]." ".$row["last_name"];
                array_push($doctors,$docName);
                break;
            }
        }

        //create new session object
        $ses=new Session($numOfSlots,$docID, $mediID,$date,$start,$end);
        $startingSlotID;
        $slots=array();
        
            // output data of each row
        $found=false;// variable for finding the correct session in slot table
        while($row = $slotResult->fetch_assoc()) {
            if (!$found){
                if ($sesID==$row["sesID"]){ // found the correct session
                    $found=true;
                    $slotNumber=1;
                    $startingSlotID=$row["slotID"];
                    array_push($startingSlotIDNumbers,$startingSlotID);

                }
            }
            if ($found){
                
                    $status=$row["status"];
                    $userID=$row["channeledUserID"];
                    $slot=new Slot($sesID,$status,$userID);
                    array_push($slots,$slot);
                    // $status=$slot->getState();
                    //codes to update the rectangles according to status
                    // echo $status;//."status"."<br>";
                    //code to create a button for each slot
                    
                    if($slotNumber<$numOfSlots){
                        $slotNumber++;
                    }
                    else{ 
                        array_push($sessions,$slots);
                        break;
                    }
                
            }
       
        }?>


    <?php endif;?>
    
<?php endwhile;?>
<form method="POST"> 
    <?php for($s=0;$s<count($doctors);$s++):?>
        <input type="radio" name="num" value="<?=$s?>" > <h2><?php echo $doctors[$s];?></h2><br>
    
    <?php endfor?>
    <button name="test">Display</button>
</form>
<?php

    if(isset($_POST['test'])){
        if(isset($_POST['num'])){
            $n=$_POST['num'];  // order in array
            $name=$doctors[$n];
            $a=array();
            $o=array();
            $c=array();
            for($s=1;$s<=count($sessions[$n]);$s++){
                if($sessions[$n][$s-1]->getState()==0){array_push($a,$s);}
                else if($sessions[$n][$s-1]->getState()==1){array_push($o,$s);}
                else if($sessions[$n][$s-1]->getState()==2){array_push($c,$s);}
            }
            include "display.php";
        } 
    }
?>


        


</body>

</html>


    





