<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
// message variable declare
$success_msg='';
$error_msg='';

/************First Select exam center that edit******************************************** */

// check url have some parameters or not

if (isset($_GET["id"]) && $_GET["id"]!='') 
{
    // store url paramete to variable
    $id= $_GET["id"];

   // genrate query select data from database
   $query= "SELECT * FROM `grid` WHERE `gid`='$id'";

   // use builtin function to select data
   $run= mysqli_query($conn, $query);

   // fetch data store to variable and convert to array
   $row= mysqli_fetch_assoc($run);
}



/************end Select exam center that edit******************************************** */

/************Add exam center Code******************************************** */

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
    $query= "UPDATE `grid` SET `rows`='$row',`col`='$col',`seat`='$seat',`exam_type`='$type',`center`='$center' WHERE gid='$id'";

    // use builtin function to insert data
    $run= mysqli_query($conn, $query);

    // check if data insert 
    // check if data insert 
    if ($run) {
        echo '<script>
        alert("Company Change Successfully");
        window.location="exam_center.php";
            </script>';
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

/************End  COde**************************************************8* */
?>


<div style="height:50px"></div>
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


    <h2>Update Exam Center</h2>
    <hr>
    <div class="col-md-6">
        <form action="" method="post">
        <div class="mb-3">
            <label  class="form-label">Exam Type</label>
            <input type="text" value="<?php  echo $row["exam_type"]  ?>" class="form-control" name="type"  placeholder="Mobile Name">
         </div> 
        <div class="mb-3">
            <label  class="form-label">Exam Center</label>
            <input type="text" value="<?php  echo $row["center"]  ?>" class="form-control" name="center"  placeholder="Mobile Name">
         </div> 
        <div class="mb-3">
            <label  class="form-label">No of Rows</label>
            <input type="text" value="<?php  echo $row["rows"]  ?>" class="form-control" name="row"  placeholder="Mobile Name">
         </div> 
        <div class="mb-3">
            <label  class="form-label">No of Columns</label>
            <input type="text" value="<?php  echo $row["col"]  ?>" class="form-control" name="col"  placeholder="Mobile Name">
         </div> 
        <div class="mb-3">
            <label  class="form-label">Total Seats</label>
            <input type="text" value="<?php  echo $row["seat"]  ?>" class="form-control" name="seat"  placeholder="Mobile Name">
         </div> 
        <input type="hidden" name="id" value="<?php  echo $_GET["id"]  ?>">
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