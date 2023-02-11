<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
$error_msg='';
/************deleter code******************************************** */

// check url have some parameters or not

if (isset($_GET["id"]) && $_GET["id"]!='') 
{
    // store url paramete to variable
    $id= $_GET["id"];

   // genrate query select data from database
   $query= "DELETE FROM `student` WHERE `std_id`='$id'";

   // use builtin function to select data
   $run= mysqli_query($conn, $query);

   if ($run) {
    echo '<script>
    alert("Student deleted Successfully");
    window.location="student.php";
        </script>';
}
else
{
    $error_msg="Action abort! Something wrong";
}
}



/************end delete code ******************************************** */


?>



<div class="container mt-5">
<div class="row">
    <span  class="col-md-6"> <h2>Manage Student</h2></span>
    <span  class="col-md-6">  <a href="student_add.php" class="btn btn-sm btn-primary col-md-4 offset-8">+ Add Student</a></span>
</div>
    <hr>
    <table class="table table-hover table-borederd">
        <thead class="table table-primary">
            <th>#</th>
            <th>Std Name</th>
            <th>Exam Id</th>
            <th>Subject Code</th>
            <th>Class</th>
            <th>Action</th>
        </thead>
        <tbody>

        <?php 
        
        /************First Select student that******************************************** */

        $sno=1;
        // genrate query select data from database
        $query= "SELECT * FROM student";

        // use builtin function to select data
        $run= mysqli_query($conn, $query);

        // fetch data store to variable and convert to array
        while ( $row= mysqli_fetch_assoc($run)) {
        ?>
            <tr>
                <td><?php echo $sno?></td>
                <td><?php echo $row['std_name']?></td>
                <td><?php echo $row['std_exam_id']?></td>
                <td><?php echo $row['subject_code']?></td>
                <td><?php echo $row['std_class']?></td>
                <td>
                    <a href="student_edit.php?id=<?php echo $row['std_id']?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="student.php?id=<?php echo $row['std_id']?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>

        <!-- end of while loop -->
            <?php $sno++; }?>
        </tbody>
    </table>
</div>
<?php 
include 'footer.php';

?>