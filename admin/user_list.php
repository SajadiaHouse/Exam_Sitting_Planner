<?php 
// include header and connection files
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
?>


<div style="height:50px"></div>
<div class="container mt-5">
<div class="row">
    <span  class="col-md-6"> <h2>Manage User</h2></span>
</span>
</div>
    <hr>
    <table class="table table-hover table-borederd">
        <thead class="table table-primary">
            <th>#</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Cell</th>
            <th>Department</th>           
            <th>Action</th>
        </thead>
        <tbody>

        <?php 
        
        /************First Select User that edit******************************************** */

        $sno=1;
        // genrate query select data from database
        $query= "SELECT * FROM s_user";

        // use builtin function to select data
        $run= mysqli_query($conn, $query);

        // fetch data store to variable and convert to array
        while ( $row= mysqli_fetch_assoc($run)) {
        ?>
            <tr>
                <td><?php echo $sno?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['cell']?></td>
                <td><?php echo $row['department']?></td>
                <td>
                    <!-- <a href="user_edit.php?id=<?php echo $row['uid']?>" class="btn btn-sm btn-primary">Edit</a> -->
                    <a href="user_del.php?id=<?php echo $row['uid']?>" class="btn btn-sm btn-danger">Delete</a>
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