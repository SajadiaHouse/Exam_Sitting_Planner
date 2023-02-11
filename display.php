<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';

// define a function to trim and get subject
function gstr($a){
    return substr($a,0,5);
}
?>
  <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div style='height:30px'></div>
<?php
/*######### first step ########### */
if (isset($_GET['id']) && $_GET['id']!='') {
    $gid=$_GET['id']; 
}
//make query
$query1="SELECT * FROM `grid` WHERE gid='$gid'";
// use builtin function execute query
$run1=mysqli_query($conn,$query1);
// store fetch data to variable
$data= mysqli_fetch_assoc($run1);
// store fetch number of rows and column to variable
$totalCol= $data['col'];
$totalRows= $data['rows'];
$seat= $data['seat'];
$exam= $data['exam_type'];


/*######### end first step ########### */

/*######### 2nd step ########### */

//make an 2dimensional empty array
$input_arr = [[]];
for ($k = 0; $k < $totalRows; $k++) {
    for ($m = 0; $m < $totalCol; $m++) {
        $input_arr[$k][$m] = null;
    }
}

/*######### 2nd step ########### */


/*######## 3rd ################ */

// fetch student subject code to display

$query="SELECT * FROM `student`";
$run=mysqli_query($conn,$query);
$student= mysqli_num_rows($run);
    while ($data = mysqli_fetch_assoc($run)) {
        /*********** 1st loop *************** */
        for ($r = 0; $r < $totalRows; $r++) {
            for ($column = 0; $column < $totalCol; $column++) {
                // check input array empty 
                if ($r == 0 && $column == 0 && is_null($input_arr[$r][$column])) {
                    $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                 
                } 
                elseif ($column > 0 && $r > 0) 
                {
                    if (
                           // check input array empty 
                        is_null($input_arr[$r][$column]) &&
                        // check right side subject not same
                       gstr( $input_arr[$r - 1][$column]) != $data["subject_code"] &&
                        // check top side subject not same
                       gstr( $input_arr[$r][$column - 1]) != $data["subject_code"]
                    ) {
                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                        // break for loop
                        break 2;
                    } 
					elseif (
                        (is_null($input_arr[$r][$column]) && 
                           // check right side subject not same
                       gstr( $input_arr[$r - 1][$column]) == $data["subject_code"]) ||
                             // check top side subject not same
                        gstr($input_arr[$r][$column - 1]) == $data["subject_code"]
                    ) {
                     /*********** 2nd loop *************** */

                        for ($rw = $r; $rw < $totalRows; $rw++) {
                            for ($col = 0; $col < $totalCol; $col++) {
                               
                                if ($col == 0) {
                                    if (
                                        is_null($input_arr[$rw][$col]) &&
                                          // check right side subject not same
                                        gstr($input_arr[$rw - 1][$col]) != $data["subject_code"] &&
                                          // check top side subject not same
                                        gstr($input_arr[$rw][$col - 1]) != $data["subject_code"]
                                           
                                    ) {
                                    
                                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                                        break 2;
                                    }
                                } 
								elseif ($col == $totalCol - 1) {
                                    if (
                                         // check right side subject not same
                                       gstr( $input_arr[$rw - 1][$col]) != $data["subject_code"] &&
                                        // check top side subject not same
                                      gstr($input_arr[$rw][$col - 1]) != $data["subject_code"]
                                    ) {
                                    
                                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                                        break 2;
                                    }
                                }
								 else {
                                    if (
                                           // check right side subject not same
                                          gstr( $input_arr[$rw - 1][$col] )!= $data["subject_code"] &&
                                           // check top side subject not same
                                        gstr( $input_arr[$rw][$col - 1] )!= $data["subject_code"]
                                    ) {
                                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                                        break 2;
                                    }
                                }

                                break 2;
                            }
                              /*********** end 2nd loop *************** */
                        }
                    }
                } elseif ($r > 0 && $column == 0) {
                    if (
                        is_null($input_arr[$r][$column]) &&
                      gstr($input_arr[$r - 1][$column]) != $data["subject_code"]
                    ) {
                        //echo "subject found legal in first column upper <br>";
                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                        break 2;
                    }
                } elseif ($r == 0 && $column >= 1) {
                    if (
                        is_null($input_arr[$r][$column]) &&
                       gstr( $input_arr[$r][$column - 1]) != $data["subject_code"]
                    ) {
                        //echo "subject found legal in 1st row <br>";

                        $input_arr[$r][$column] = $data["subject_code"].$data['std_id'];
                        //echo "data entered successfully 
                        break 2;
                    }
                 }
            }
        }
          /*********** end first loop *************** */
    }
$th=1;
?>
<div class="container">
    <h2 class='text-center'><?php echo $exam?></h2>
    <div class="row px-5">
        <div class="col-md-6">
           <span><b>Row:</b><?php echo $totalRows?></span><br>
            <b>Column:</b><?php echo $totalCol?>
        </div>
        <div class="col-md-6 text-end">
            <b>Total Seats:</b><?php echo $seat?><br>
            <b>No Of Students:</b><?php echo $student?>
        </div>
    </div>
    <div id="redips-drag">
        <table class='table'>
    <?php 
    $seat=1;
     for ($p = 0; $p < $totalRows; $p++) {
        echo "<tr>";
        for ($q = 0; $q < $totalCol; $q++) {   
                
                $subject= substr($input_arr[$p][$q], 0, 5);
                $id= substr($input_arr[$p][$q], 5);
                $qry=mysqli_query($conn, "SELECT * FROM `student` WHERE `std_id`='$id'");
                $fdata=mysqli_fetch_assoc($qry);
                
                        
                echo "<td>
                        <div class='redips-drag'>
                            <h4>" .  $subject . "</h4>
                            <b>Student Id:</b>".$fdata['std_exam_id'] ."
                            <b>Student Name:</b>".$fdata['std_name'] ."
                            <b>Seat No<b>:".$seat." 
                        </div>
                     </td>"; 
                     $seat=$seat+1;      
        }
        echo "</tr>";
      
    }
 
    ?>
</table>
    </div>
<button class='btn btn-primary' onclick='{print()}'>Print</button>
</div>


<?php 
// include header and connection files
include 'footer.php';
?>
 