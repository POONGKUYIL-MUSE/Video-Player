<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php
if (isset($_SESSION['id'])) {
  site_header();
  nav_bar();
?>

<div class="row m-3">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card ">
        <img src="resources/images/music3.jpg" class="card-img-top" alt="..." height="10%">
        <div class="card-body text-center">
          <h5 class="card-title">Projects</h5>
          <a href="projects.php" class="btn btn-primary">Manage</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card ">
        <img src="resources/images/music3.jpg" class="card-img-top" alt="..." height="10%">
        <div class="card-body text-center">
          <h5 class="card-title">Videos</h5>
          <a href="videos.php" class="btn btn-primary">Manage</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
site_footer();
} else{
    header('Location:index.php');
}