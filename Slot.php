<?php
abstract class State{ //state as object pattern
    //private static $state; //singleton pattern
    function __construct(){}

    abstract function getState();
    // abstract function goAvailable(Slot $slot);
    // abstract function goOccupied(Slot $slot);
    // abstract function goConsulted(Slot $slot);
}

class OccupiedState extends State{
    function goConsulted(Slot $slot){
         $slot.setState(new ConsultedState());
    }
    function goAvailable(Slot $slot){
        $slot.setState(new AvailableState());
    }
    public function getState(){
        // if ($this->state==null){
        //     $state=new OccupiedState();
        // }
        return 1;
    }
}
class ConsultedState extends State{
    function getState(){
        // if ($this->state==null){
        //     $state=new ConsultedState();
        // }
    return 2;
    }

}
class AvailableState extends State{
    function goOccupied($slot){
        $slot->setState(new OccupiedState());
    }
    function getState(){
        // if ($this->state==null){
        //     $state=new AvailableState();
        // }
        // echo "avail";
        return 0;
    }
    function asd(){
        echo "rrr";
        return 4;
    }
}
class Slot{
    private $sesID;
    public $userID;
    public $current=null;
    function __construct($sesID,$status,$userID){
        $this->sesID=$sesID;
        $this->userID=$userID;
        if($status==0){ $this->current=new AvailableState();}
        if($status==1){ $this->current=new OccupiedState();}
        if($status==2){ $this->current=new ConsultedState();}
    }
    function setState($state){ 
        $this->current=$state;
        echo $state;
    }
    function updateUser($userID){
        $this->userID=$userID;
    }
    function getUserID(){
        return $this->userID;
    }
    function goCon(){
        $this->current->goConsulted($this);
        // echo "gg";
    }
    function goOcc(){
        $this->current->goOccupied($this);
    }
    function goAvailable(){
        $this->current->goAvailable($this);
    }
    function getState(){
        $this->current->getState();
    }
    function aaa(){
        $this->current->asd();
    }
}

$ss=new Slot(4,0,1);
$r=$ss->aaa();
$e=$ss->getState();
// $q=$ss->getUserID();
echo $r;
// echo $ss->current->asd();
// $s->goCon();
?>
