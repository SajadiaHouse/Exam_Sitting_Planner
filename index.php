<?php
$message = '';
include 'dbconn.php';
include 'header.php';
include 'nvabar.php';
if (isset($_POST["btn"])) {
    $uemail = $_POST["uemail"];
    $pass = $_POST["pass1"];
    $query = "SELECT * FROM s_user WHERE email='$uemail' and `password`='$pass'";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) === 1) {
        $row=mysqli_fetch_assoc($run);
        if($row['type']=='admin'){
            $message = 'You are login Succesfull';
            $_SESSION['userid']=$row['uid'];
            header("location:./admin/dashboard.php"); 
        }
        else {
            $message = 'You are login Succesfull';
            $_SESSION['userid']=$row['uid'];
            header("location:home.php");
        }
       
    } else {
        $message = 'User Name or Password Incorrect!';
    }
}
?>
<style>
    .bg{
        background: url('./static/img/login.webp');
        background-repeat: no-repeat;
        background-size:cover;
        height: 100vh !important;
        margin-top: -20px
    }
    .img{
        height: 240px;
    }
</style>

<div class="bg">
<div class="container">
    <div style="height:80px"></div>
<div class="col-md-4 offset-8">
    <div class="card p-4">
    <h1 class="text-center py-2">Login</h1>
    <h5>
    <?php
    if ($message != '') {
        echo $message;
    }
    ?>

</h5>
    <form action="" method="POST">
     <div class="mb-2">
        <label for="">User Email</label><br>
        <input type="email" class="form-control" name="uemail">
    </div>

    <div class="mb-2">
        <label for="">Password</label><br>
        <input class="form-control" type="password" name="pass1">
    </div>

    <br>
    <div class="input-group mb-5">
         <input type="reset" class="form-control btn btn-dark" value="Reset">
    <input type="submit" class="form-control btn btn-success" name="btn" value="Login">
    </div>
   
</form>
</div>
   

</div>
    </div>

    </div>


<?php
include 'footer.php';
?>