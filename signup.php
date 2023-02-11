<?php
$message='';
include 'header.php';
include 'dbconn.php';
include 'nvabar.php';

if(isset($_POST["btn"]))// isset builtin function use to check variable value set or not
{
   $uname=$_POST["uname"]; 
   $email=$_POST["uemail"]; 
   $cell=$_POST["ucell"]; 
   $department=$_POST["department"];    
   $pass1=$_POST["pass1"]; 
   $pass2=$_POST["pass2"]; 
   if($pass1==$pass2){
    $query="INSERT INTO `s_user`(`name`, `email`, `cell`,`department`, `password`,`type`) VALUES ('$uname','$email','$cell','$department','$pass2','user')";
    $run= mysqli_query($conn,$query);
    if($run){
        $message="You are signup Successfully";
    }
   }
   else{
        $message="Password Did not match";
   }
}
?>
   
   
     <div style="height: 100px;"></div>
<div class="container">

    <div class="col-md-6 offset-3 my-5 p-2">
        <h1 class="text-center">SignUp</h1>
        <h5 class="text-success">
    <?php 
    if($message!=''){
        echo $message;
    }
    ?>
     </h5>
        <form action="" method="POST">
        <div>
            <label for="">User Name</label><br>
            <input class="form-control" type="text" name="uname">
        </div>
        <div>
            <label for="">User Email</label><br>
            <input class="form-control" type="text" name="uemail">
        </div>
        <div>
            <label for="">User Cell</label><br>
            <input class="form-control" type="text" name="ucell">
        </div>
        <div>
            <label for="">Department</label><br>
            <input class="form-control" type="text" name="department">
        </div>
        <div>
            <label for="">Password</label><br>
            <input class="form-control" type="password" name="pass1">
        </div>
        <div>
            <label for="">Password (Confirm)</label><br>
            <input class="form-control" type="password" name="pass2">
        </div>
        <br>
        <div class="input-group">
             <input type="reset" class="form-control btn btn-dark" value="Reset">
        <input type="submit" class="form-control btn btn-success" name="btn" value="Sigunup">
        </div>
       
    </form>
    </div>
</div>
<div style="height: 100px;"></div> 
   
<?php 
include 'footer.php';
?>