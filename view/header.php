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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio Website - Marcel Schmutz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style><?php RootPath::root_include_once('public/css/style.css.php'); ?></style>
</head>
<body>
<div id="nav-top" class="nav">
    <a class="nav-link" href="/default/home"><?= TextUtil::getText("button_home") ?></a>
    <?php if (Util::isLoggedIn()): ?>
        <?php if (Util::hasPermission(0, 2, 3, 4)): ?>
            <a class="nav-link" href="/project/overview"><?= TextUtil::getText("button_projects") ?></a>
        <?php endif ?>
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
    <?php endif ?>
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