<?php
ClassLoader::loadByName("Errors");
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$uri = $uri_parts[0];
if (isset($_GET['lng']))
    $_SESSION['lng'] = $_GET['lng'];
else if (!isset($_SESSION['lng']))
    $_SESSION['lng'] = "de";
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
    <title>Marcel Schmutz - bwd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <style><?php RootPath::root_include_once('public/css/style.css.php'); ?></style>
</head>
<body>
<div id="nav-top" class="my-nav">
    <a class="nav-link" href="/default/home"><?= TextUtil::getText("button_home") ?></a>
    <a class="nav-link" href="/project/overview"><?= TextUtil::getText("button_projects") ?></a>
    <?php if (Util::isLoggedIn()): ?>
        <?php if (Util::hasPermission(0, 3, 4)): ?>
            <a class="nav-link" href="/about/cv"><?= TextUtil::getText("button_about") ?></a>
            <a class="nav-link" href="/grades/view"><?= TextUtil::getText("button_grades") ?></a>
        <?php endif ?>
        <?php if (Util::hasPermission(0, 4)): ?>
            <a class="nav-link desktop-only" href="/text/editor"><?= TextUtil::getText("button_editor") ?></a>
        <?php endif ?>
        <?php if (Util::hasPermission(0)): ?>
            <a class="nav-link desktop-only"
               href="/user/permissionEditor"><?= TextUtil::getText("button_permissions") ?></a>
        <?php endif ?>
        <a class="nav-link" href="/user/doLogout"><?= TextUtil::getText("button_logout") ?></a>
    <?php else: ?>
        <a class="nav-link" href="/user/login"><?= TextUtil::getText("button_login") ?></a>
        <a class="nav-link" href="/user/create"><?= TextUtil::getText("button_register") ?></a>
    <?php endif ?>
    <?php
    $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
    ?>
    <a class="language-link" id="english-link" href="<?= $uri ?>?lng=en">en</a>
    <a class="language-link" id="german-link" href="<?= $uri ?>?lng=de">de</a>
    <!--<div>
    <a id=language-dd class="nav-link"><?= $_SESSION['lng'] ?></a>
    <a class="language-link" id="german-link" href="<?= $uri . "?lng=de" ?>">de</a>
    <a class="language-link" id="english-link" href="<?= $uri . "?lng=en" ?>">en</a>
    <a class="language-link" id="french-link">fr</a>
    </div>-->
    <a href="javascript:void(0);" class="icon" onclick="navToggle()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
    function navToggle() {
        var x = document.getElementById("nav-top");
        if (x.className === "nav") {
            x.className += " responsive";
        } else {
            x.className = "nav";
        }
    }
</script>
<?php
RootPath::root_include('view/fragment/error_message.php');
?>
<div class="content-body">