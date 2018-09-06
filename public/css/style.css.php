<?php
$nav_height = 45;
?>

* {
    font-family: Arial, sans-serif;
}

body, html {
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

.show-error, .nav:hover ~ .error {
    margin-top: <?= $nav_height ?>px;
}

.hide-error {
    margin-top: 0;
}

/* Admin Editors */

.editor {
    position: absolute;
    width: 100%;
    height: 100%;
}

.editor-left {
    width: 30%;
    height: 100%;
    display: inline-block;
    float: left;
}

.editor-right {
    width: 70%;
    height: 100%;
    display: inline-block;
}

.editor-list, #text-editor-button-new, #text-editor-text, #text-editor-button-save, #text-editor-language {
    box-sizing: border-box;
    border: none;
    margin: 0;
    padding: 0;
}

.editor-list {
    width: 100%;
}

#text-editor-list {
    height: 90%;
}

#text-editor-button-new {
    width: 100%;
    height: 10%;
}

#text-editor-buttons {
    width: 100%;
    height: 5%;
}

#text-editor-language {
    height: 100%;
    width: 50px;
}

#text-editor-button-save {
    height: 100%;
    width: 80px;
}

#text-editor-text {
    width: 100%;
    height: 95%;
    padding: 5px;
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

#permission-editor-list {
    height: 100%;
}

/* Containers */

.content-body {
    position: absolute;
    top: <?= $nav_height ?>px;
    width: 100%;
    min-height: calc(100% - <?= $nav_height ?>px - 4px);
    max-height: calc(100% - <?= $nav_height ?>px - 4px);
}

.content, .content-wrapper, .full {
    background-color: white;
}

.content, .content-wrapper {
    padding: 10px 15px;
}

.content {

}

.full {
    position: absolute;
    width: 100%;
    height: 100%;
}

.content-wrapper {
    width: 900px;
    max-width: 90%;
    margin: 0 auto;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
}

/* Navigation (W3Schools) */

.nav {
    position: fixed;
    overflow: hidden;
    width: 100%;
    background-color: #333;
    z-index: 1000;
}

.nav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: <?= ($nav_height - 16)/2 ?>px 16px;
    text-decoration: none;
    font-size: 1em;
}

.nav a:hover {
    background-color: #ddd;
    color: black;
}

.active {
    background-color: #4CAF50;
    color: white;
}

.nav .icon {
    display: none;
}

@media screen and (max-width: 600px) {
    .nav a:not(:first-child) {
        display: none;
    }

    .nav a.icon {
        float: right;
        display: block;
    }

    .nav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .nav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}

@media screen and (max-width: 800px) {
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
