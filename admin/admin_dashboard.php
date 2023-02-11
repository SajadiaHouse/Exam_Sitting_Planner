


  <?php
     // include header and connection files
     include 'dbconn.php';
     include 'header.php';
     include 'nvabar.php'; 
      
      $q=mysqli_fetch_assoc(mysqli_query($conn,  "SELECT COUNT(gid) from `grid`"));
      $qqq=mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(std_id) FROM student"));
      $qq=mysqli_fetch_assoc(mysqli_query($conn,  "SELECT  COUNT(`uid`) from s_user"));
     // $or=mysqli_fetch_assoc(mysqli_query($con,  "SELECT  COUNT(loc_id) from `location`"));
     

    ?>

<div id="">
              <main>
                  <div class="container-fluid px-4">
                      <h1 class="mt-4">Admin Dashboard</h1>
                      <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                      <div class="row">
                          <div class="col-xl-3 col-md-6">
                              <div class="card bg-primary text-white mb-4">
                                  <div class="card-body">Exam Center
                                    <div class="d-flex justify-content-end"><h4><?php echo $q['COUNT(gid)']?></h4></div>
                                    
                                  </div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                      <a class="small text-white stretched-link" href="#">View Details</a>
                                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-md-6">
                              <div class="card bg-warning text-white mb-4">
                              <div class="card-body">Register Student
                                    <div class="d-flex justify-content-end"><h4><?php echo $qqq['COUNT(std_id)']?></h4></div>
                                    
                                  </div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                      <a class="small text-white stretched-link" href="#">View Details</a>
                                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-md-6">
                              <div class="card bg-success text-white mb-4">
                              <div class="card-body">Register User
                                    <div class="d-flex justify-content-end"><h4><?php echo $qq['COUNT(`uid`)']?></h4></div>
                                    
                                  </div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                      <a class="small text-white stretched-link" href="#">View Details</a>
                                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                  </div>
                              </div>
                          </div>
                      
                      </div>
                  </div>
             
                  <?php 
include 'footer.php';

?>