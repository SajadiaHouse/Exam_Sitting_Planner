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
   $query= "SELECT * FROM `student` WHERE `std_id`='$id'";

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
    $name= $_POST["name"];
    $eid= $_POST["eid"];
    $code= $_POST["code"];
    $class= $_POST["class"];

    // genrate query insert data to database
    $query= "UPDATE `student` SET `std_name`='$name',`std_exam_id`='$eid',`subject_code`='$code',`std_class`='$class' WHERE std_id='$id'";

    // use builtin function to insert data
    $run= mysqli_query($conn, $query);

    // check if data insert 
    // check if data insert 
    if ($run) {
        echo '<script>
        alert("student Change Successfully");
        window.location="student.php";
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


    <h2>Update Student Info</h2>
    <hr>
    <div class="col-md-6">
        <form action="" method="post">
        <div class="mb-3">
            <label  class="form-label">Student Name</label>
            <input type="text" value="<?php  echo $row["std_name"]  ?>" class="form-control" name="name"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Exam Id</label>
            <input type="text" value="<?php  echo $row["std_exam_id"]  ?>" class="form-control" name="eid"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Subject Code</label>
            <input type="text" value="<?php  echo $row["subject_code"]  ?>" class="form-control" name="code" min='5' max='5'  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Class</label>
            <input type="text" value="<?php  echo $row["std_class"]  ?>" class="form-control" name="class"  >
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