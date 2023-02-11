<?php
$message='';
include 'header.php';
include 'dbconn.php';
include 'nvabar.php';
?>
<div class="container">
<h1 class="text-center text-success"> USER PROFILE </h1>

<?php
    $user_id= $_SESSION['userid'];
    echo $user_id;
    $query = "SELECT * FROM s_user WHERE `uid` = '$user_id'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);

?>
<div class="container-fluid justify-content-center" style="width: 50%;">
    <div class="card shadow m-3" >
        <div class="row">
            <div class="col-md-4">
                <img src="assets/user.png" alt="user profile image" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title text-primary">PERSON INFORMATION</h4>
                    <div class="row">
                    <div class="col-sm-6">
                            <p class="m-b-10 f-w-600"> <b> Name </b> </p>
                            <h6 class="text-muted f-w-400"><?php echo $row["name"];?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600"> <b> Email </b> </p>
                            <h6 class="text-muted f-w-400"><?php echo $row["email"];?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600"> <b> Phone </b> </p>
                            <h6 class="text-muted f-w-400"><?php echo $row["cell"]?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600"> <b> Department </b> </p>
                            <h6 class="text-muted f-w-400"><?php echo $row["department"]?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php 
include 'footer.php';
?>