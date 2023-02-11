<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
// message variable declare
$success_msg='';
$error_msg='';

/************add center Code******************************************** */

// check btn pressed
if (isset($_POST["btn"]))
 {
    // store html input to variables
    $type= $_POST["type"];
    $center= $_POST["center"];
    $row= $_POST["row"];
    $col= $_POST["col"];
    $seat= $_POST["seat"];

    // genrate query insert data to database
    $query= "INSERT INTO `grid`(`rows`, `col`, `seat`, `exam_type`, `center`) VALUES ('$row','$col','$seat','$type','$center')";

    // use builtin function to insert data
    $run= mysqli_query($conn, $query);

    // check if data insert 
    if ($run) {
       $success_msg="Exam center Insert Successfully";
    }
    else
    {
        $error_msg="Action abort! Something wrong";
    }
}
// else
// {
//     $error_msg="Action abort! Form not submitted";
// }

/************End Company COde**************************************************8* */
?>



<div class="container mt-5">

    <!-- display message by php -->
    <?php 
    if ($success_msg != '') 
    {
        echo  $success_msg;
    }
    else if ($error_msg != '') 
    {
        echo  $error_msg;
    }
    ?>
    <!-- display message end -->


    <h2>Add New Exam Center</h2>
    <hr>
    <div class="col-md-6">
        <form action="" method="post">
        <div class="mb-3">
            <label  class="form-label">Exam Type</label>
            <input type="text" class="form-control" name="type"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Exam Center</label>
            <input type="text" class="form-control" name="center"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">No of Rows</label>
            <input type="text" class="form-control" name="row"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">No of Columns</label>
            <input type="text" class="form-control" name="col"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Total Seats</label>
            <input type="text" class="form-control" name="seat"  >
         </div> 
         <div class="mb-3 input-group">
            <input type="reset" value="Reset" class=" form-control btn btn-dark btn-md">
            <input type="submit" class="form-control btn btn-success btn-md" value="Save" name="btn">
         </div>   
         </form> 
    </div>
</div>
<?php 
include 'footer.php';

?>