<?php
$nav_height = 45;
?>

* {
    font-family: Arial, sans-serif;
}

body, html {
    position: absolute;
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    background-color: #EEEEEE;
}

/* Error Message */

.error {
    position: fixed;
    width: 800px;
    max-width: 90%;
    transform: translateX(-50%);
    left: 50%;
    background-color: pink;
    color: red;
    padding: 8px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border: red solid 1px;
    -webkit-transition: margin-top ease-in-out 1s;
    transition: margin-top 1s;
    z-index: 999;
}

.show-error, .my-nav:hover ~ .error {
    margin-top: <?= $nav_height ?>px;
}

.hide-error {
    margin-top: 0;
}

#label-semester {
    padding: 8px 4px;
}

#div-semester, .button-semester {
    background-color: lightgray;
}

.button-semester {
    border: none;
    box-sizing: border-box;
    padding: 10px 12px;
    font-size: large;
}

/* Containers */

.content-body {
    position: absolute;
    top: <?= $nav_height ?>px;
    width: 100%;
    min-height: calc(100% - <?= $nav_height ?>px - 4px);
    max-height: calc(100% - <?= $nav_height ?>px - 4px);
}

.content {

}

.content-wrapper {
    width: 900px;
    max-width: 90%;
    margin: 0 auto;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
}

.full {
    position: absolute;
    width: 100%;
    height: 100%;
}

.content, .content-wrapper {
    padding: 10px 15px;
    margin-bottom: 60px;
}

.content, .content-wrapper, .full {
    background-color: white;
}

/* Navigation (W3Schools) */

.my-nav {
    position: fixed;
    overflow: hidden;
    width: 100%;
    background-color: #333;
    z-index: 1000;
}

.my-nav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: <?= ($nav_height - 16)/2 ?>px 16px;
    text-decoration: none;
    font-size: 1em;
}

.my-nav a.language-link {
    float: right;
}

.my-nav a:hover {
    background-color: #ddd;
    color: black;
}

.active {
    background-color: #4CAF50;
    color: white;
}

.my-nav .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    body, html {
        width: 600px;
    }

    .my-nav a:not(:first-child) {
        display: none;
    }

    .my-nav a.icon {
        float: right;
        display: block;
    }

    .my-nav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .my-nav.responsive #german-link {
        position: absolute;
        right: 0;
        top: <?= $nav_height ?>px;
    }

    .my-nav.responsive #english-link {
        position: absolute;
        right: 0;
        top: <?= $nav_height*2 ?>px;
    }

    .my-nav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }

    .content-wrapper {
        max-width: 100%;
        width: 100%;
    }
}

@media screen and (max-width: 820px) {
    .desktop-only {
        display: none !important;
    }
}

/* Login / Register Form */

.form {
    width: 90%;
    margin: 0 auto;
}

.form_input {
    width: 100%;
    height: 30px;
    /*border: black 1px solid;
    border-radius: 10px;*/
    margin-bottom: 10px;
}