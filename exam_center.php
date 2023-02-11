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
   $query= "DELETE FROM `grid` WHERE `gid`='$id'";

   // use builtin function to select data
   $run= mysqli_query($conn, $query);

   if ($run) {
    echo '<script>
    alert("Exam center deleted Successfully");
    window.location="exam_center.php";
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
    <span  class="col-md-6"> <h2>Manage Exam Center</h2></span>
    <span  class="col-md-6">  <a href="exam_center_add.php" class="btn btn-sm btn-primary col-md-4 offset-8">+ Add Exam Center</a></span>
</div>
    <hr>
    <table class="table table-hover table-borederd">
        <thead class="table table-primary">
            <th>#</th>
            <th>Exam Center</th>
            <th>Exam Type</th>
            <th>No of Rows</th>
            <th>No of Column</th>
            <th>Total Seats</th>
            <th>Action</th>
        </thead>
        <tbody>

        <?php 
        
        /************First Select Exam Center that edit******************************************** */

        $sno=1;
        // genrate query select data from database
        $query= "SELECT * FROM grid";

        // use builtin function to select data
        $run= mysqli_query($conn, $query);

        // fetch data store to variable and convert to array
        while ( $row= mysqli_fetch_assoc($run)) {
        ?>
            <tr>
                <td><?php echo $sno?></td>
                <td><?php echo $row['center']?></td>
                <td><?php echo $row['exam_type']?></td>
                <td><?php echo $row['rows']?></td>
                <td><?php echo $row['col']?></td>
                <td><?php echo $row['seat']?></td>
                <td>  <a href="display.php?id=<?php echo $row['gid']?>" class="btn btn-sm btn-success">Genrate</a>
                    <a href="exam_center_edit.php?id=<?php echo $row['gid']?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="exam_center.php?id=<?php echo $row['gid']?>" class="btn btn-sm btn-danger">Delete</a>
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