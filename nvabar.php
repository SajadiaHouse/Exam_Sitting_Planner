<style>
li a{
    font-weight: 800;
    color: white !important;
    font-family:'Times New Roman', Times, serif;
    font-size: 18px;
    letter-spacing: 1.5px;
}
.navbar-brand{
  font-weight: 800;
  font-size: 20px !important;
  letter-spacing: 2px;
}

</style>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ONLINE EXAM SEATING PLANNER</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
        <?php 
        if(isset($_SESSION['userid']) && $_SESSION['userid']!=''){
          ?>
           <li class="nav-item">
          <a class="nav-link "  href="home.php">Home</a>
        </li> 
          <li class="nav-item">
          <a class="nav-link " href="logout.php">Logout</a>
        </li>
        <?php
        }?>  
      </ul>
     
    </div>
  </div>
</nav>
</header>
