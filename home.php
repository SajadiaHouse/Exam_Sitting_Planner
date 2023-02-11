<?php
$message='';
include 'header.php';
include 'dbconn.php';
include 'nvabar.php';
?>
<style>
    .bg{
        background: url('./static/img/bgg.jpg');
        background-repeat: no-repeat;
        background-size:cover;
        height: 100vh;
        margin-top: -20px
    }
    .img{
        height: 240px;
    }
</style>
<div class='bg'>
    <div class="container pt-5">
    <h1 class='text-center my-3 text-white p-2 shadow'>WELECOM ONLINE EXAM <br> SEAT PLANNER</h1>
    <div class="row">
        <div class="col-md-3" >
            <div class="card" style='background: lightgrey;'>
                <img class='img' src="./static/img/exam1.png" alt="">
                <a href="exam_center.php" class='btn btn-dark form-control mt-1'>Manage Exam Center</a>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="card" style='background: lightgrey;'>
                <img class='img' src="./static/img/std.png" alt="">
                <a href="student.php" class='btn btn-dark form-control mt-1'>Manage Student</a>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="card" style='background: lightgrey;'>
                <img class='img' src="./static/img/exam.png" alt="">
                <a href="exam_center.php" class='btn btn-dark form-control mt-1'>View Plan</a>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="card" style='background: lightgrey;'>
                <img class='img' src="./static/img/profile.png" alt="">
                <a href="profile.php" class='btn btn-dark form-control mt-1'>User Profile</a>
            </div>
        </div>
    
    </div>
</div>
</div>
<?php 
include 'footer.php';
?>