<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php site_header(); ?>
<?php
if (isset($_SESSION['id'])) {
    nav_bar();
?>

<div class="row float-end m-3">
    <div class="col-md-2">
        <button data-bs-toggle="modal" data-bs-target="#project_create_edit_modal" class="btn btn-primary" type="button">Create</button>
    </div>
</div>
<div class="row m-3">
  <div class="row row-cols-1 row-cols-md-4 g-4">

    <div class="col">
      <div class="card text-white bg-dark mb-3">
        <div class="card-body text-center">
          <h5 class="card-title">Project Name</h5>
          <p class="card-text">Description</p>
          <a href="controllers/projects/edit.php" class="btn btn-sm btn-primary">Edit</a>
          <a href="controllers/projects/delete.php" class="btn btn-sm btn-danger">Delete</a>
        </div>
      </div>
    </div>
    
  </div>
</div>

<div class="modal text-dark" id="project_create_edit_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-video"></i> Add New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="controllers/projects/add.php" id="music-form" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-group mb-3">
                            <label for="title" class="control-label">Project Name</label>
                            <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" required placeholder="XYZ Music">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="control-label">Description</label>
                            <textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required placeholder="Write the description here"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="screennames" class="control-label">Screen Names</label>
                            <button id="add_screen" type="button" class="btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i></button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm rounded-0" form="music-form">Save</button>
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
} else{
    header('Location:index.php');
}
site_footer();