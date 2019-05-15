
<div >
      <ol id="selectable">
            <?php $cc=1?>
                <script>
            var num = 10;
            var available = [7,9,8];
            var occupied = [4,5,6,10];
            var consulted =[1,2,3];
            </script>
            <?php include "gridFiles.php"; ?>
            <script> Grid_genarator(num,available,occupied,consulted)</script>

            <form method="post">
                <button name="inc">Increment</button>
            </form>
            
            <form method="post">
                <button name="dec">Decrement</button>
            </form>



    </ol> 
    
  </div>
  
  <?php
        if(isset($_POST['inc'])){
            if (count($c)>0){
                if($c[count($c)-1]<$numOfSlots){
                    $last=$c[count($c)-1];
                    $nxt=$last+1;
                    if(in_array($nxt,$a)){
                        $key=array_search($nxt,$a);
                        \array_splice($a, $key, 1);
                        array_push($c,$nxt);

                        
                    }
                    else if(in_array($nxt,$o)){
                            $key=array_search($nxt,$o);
                            \array_splice($o, $key, 1);
                            array_push($c,$nxt);
                    }
                    $SlotID=$startingSlotIDNumbers[$n]+$nxt-1;
                    //code to update slot status
                }
                else if($c[count($c)-1]==$numOfSlots){

                }
            }
            else if(count($c)==0){
                if(in_array(1,$a)){
                    \array_splice($a, 1, 1);
                    array_push($c,1);
                }
                else if(in_array(1,$o)){
                    \array_splice($o, 1, 1);
                    array_push($c,1);
                }
                $slotID=$startingSlotIDNumbers[$n];
            } 

            
        }
        if(isset($_POST['dec'])){
            // $last=end($c);
            // if($last<$numOfSlots){

            // }
            echo "dddd";
            
        }

?>
