<?php 
include 'dbconn.php';
/************Delete code******************************************** */

// check url have some parameters or not

if (isset($_GET["id"]) && $_GET["id"]!='') 
{
    // store url paramete to variable
    $id= $_GET["id"];

   // genrate query select data from database
   $query= "DELETE FROM s_user WHERE `uid`='$id'";

   // use builtin function to select data
   $run= mysqli_query($conn, $query);
 // check if data delete
   if ($run) {
    echo '<script>
    alert("user deleted Successfully");
    window.location="user_list.php";
        </script>';
 }
 else
 {
    echo '<script>
    alert("Something wrong! Action Abort");
    window.location("user_list.php");
        </script>';
 }

}



/************end ********************************************************** */



?>