<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php site_header(); ?>
<?php
if (isset($_SESSION['id'])) {
    nav_bar();

?>
logged
<?php
} else{
    header('Location:index.php');
}
site_footer();