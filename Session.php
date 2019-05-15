<?php
Class Session{
    private $OccupiedSlots;
    private $ConsultedSlots;
    private $AvailableSlots;
    //private $ses=null;
    private $docID;
    private $mediCenID; 
    private $numOfSlots;
    private $date;
    private $start;
    private $end;
    function __construct($numOfSlots,$docID, $mediCenID,$date,$start,$end)
    {   
        $this->$docID = $docID;
        $this->$mediCenID =$mediCenID; 
        $this->$numOfSlots=$numOfSlots;
        $this->$date=$date;
        $this->$start=$start;
        $this->$end=$end;
        $AvailableSlots = array();
        $ConsultedSlots= array();
        $OccupiedSlots= array();

        // for ($i=0;$i<$numOfSlots;$i++){
        //     array_push($AvailableSlots,"0");
        // }
        // print_r($AvailableSlots);

    }
    
    function __updateSlots($slotList){
        // include "Slot.php";
        for($s=0;$s<$this->numOfSlots;$s++){
            if($slotList[$s]->getState()=="0"){
                array_push($AvailableSlots,$slotList[$s]);
            }
            else  if($slotList[$s]->getState()=="1"){
                array_push($OccupiedSlots,$slotList[$s]);
            }
            else if($slotList[$s]->getState()=="2"){
                array_push($ConsultedSlots,$slotList[$s]);
            }
        }
        
    }
    // function displaySlots(){
    //     for($i=0;$i<$numOfSlots;$i++){
    //         if()
    //     }
    // }

}

// $s=new Session(5);
?>