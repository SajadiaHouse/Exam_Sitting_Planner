<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
// message variable declare
$success_msg='';
$error_msg='';

/************add studet Code******************************************** */

// check btn pressed
if (isset($_POST["btn"]))
 {
    // store html input to variables
    $name= $_POST["name"];
    $eid= $_POST["eid"];
    $code= $_POST["code"];
    $class= $_POST["class"];

    // genrate query insert data to database
    $query= "INSERT INTO `student`( `std_name`, `std_exam_id`, `subject_code`, `std_class`) VALUES ('$name','$eid','$code','$class')";

    // use builtin function to insert data
    $run= mysqli_query($conn, $query);

    // check if data insert 
    if ($run) {
       $success_msg="Student Insert Successfully";
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


    <h2>Add New Student</h2>
    <hr>
    <div class="col-md-6">
        <form action="" method="post">
        <div class="mb-3">
            <label  class="form-label">Student Name</label>
            <input type="text" class="form-control" name="name"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Exam Id</label>
            <input type="text" class="form-control" name="eid"  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Subject Code</label>
            <input type="text" class="form-control" name="code" min='5' max='5'  >
         </div> 
        <div class="mb-3">
            <label  class="form-label">Class</label>
            <input type="text" class="form-control" name="class"  >
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