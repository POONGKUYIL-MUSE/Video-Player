<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php site_header(); ?>
<?php
if (isset($_SESSION['id'])) {
    nav_bar();
?>

    <div class="row m-3">
        <div class="col-md-8">
            <h3 class="float-start">Manage Projects</h3>
        </div>
        <div class="col-md-4">
            <button data-bs-toggle="modal" data-bs-target="#project_create_edit_modal" class="btn btn-primary float-end" type="button">Create New Project</button>
        </div>
    </div>
    <div class="row m-3">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <?php 
            $music = $conn->query('SELECT * FROM `projects` order by project_title asc');

            while ($row = $music->fetch_assoc()) :

            ?>
            <div class="col">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $row['project_title']; ?></h5>
                        <p class="card-text"><?= $row['project_desc']; ?></p>
                        <a href="#" data-project_id="<?= $row['id']; ?>" class="btn btn-sm btn-primary edit_project">Edit</a>
                        <a href="controllers/projects/delete.php" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>

            <?php
                endwhile;
            ?>

        </div>
    </div>

    <div class="modal text-dark" id="project_create_edit_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-video"></i> Add/Edit New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="project-form" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input type="hidden" name="project_id">
                            <div class="form-group mb-3">
                                <label for="title" class="control-label">Project Name</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" required placeholder="XYZ Project">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="control-label">Description</label>
                                <textarea rows="3" name="description" id="description" class="form-control form-control-sm rounded-0" required placeholder="Write the description here"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="screennames" class="control-label">Screen Names</label>
                                <button id="add_screen" type="button" class="btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i></button>
                                <hr>
                                <div class="screen_lists">
                                    <div class="row mb-3" id="list_1">
                                        <div class="col-md-11">
                                            <input type="text" name="screen_lists[]" class="form-control" placeholder="Enter screen name">
                                        </div>
                                        <div class="col-md-1">
                                            <button onclick="remove_screen(this);" type="button" class="btn-sm btn-danger float-end"><i class="fa-solid fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="project_btn" class="btn btn-primary btn-sm rounded-0">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0 close" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else {
    header('Location:index.php');
}
site_footer();