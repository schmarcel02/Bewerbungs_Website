<?php
CSSLoader::loadByName("editor");
CSSLoader::loadByName("permission-editor");
?>
<div class="full">
    <div id="permission-editor" class="editor">
        <div id="left" class="editor-left">
            <select id="user-list" class="editor-list edeitor-element" size="2" ondblclick="changePermission()">
                <?php
                for ($i = 0; $i < count($users); $i++) {
                    echo "<option data-id='" . $users[$i]->id . "' data-email='" . $users[$i]->email . "' data-permission='" . $users[$i]->permission . "'>" . $users[$i]->email . ": " . $users[$i]->permission . "</option>";
                }
                ?>
            </select>
        </div>
        <div id="right" class="editor-right">
            <h2>Description: </h2>
            <p>0: All Permissions / Admin</p>
            <p>1: No Permissions / Banned</p>
            <p>2: View Projects</p>
            <p>3: View Projects + About Me + Grades</p>
            <p>4: All Permissions EXCEPT Permission-Editor (including text-editor)</p>
        </div>
    </div>
</div>
<script>
    function changePermission() {
        var list = document.getElementById("user-list");
        var selected = list[list.selectedIndex];
        var id = selected.getAttribute("data-id");
        var email = selected.getAttribute("data-email");
        var oldPerm = selected.getAttribute("data-permission");
        var newPerm = prompt("New Permission: ", oldPerm);
        if (newPerm !== null) {
            save(id, newPerm);
            selected.innerHTML = email + ": " + newPerm;
        }
    }

    function save(id, perm) {
        var oReq = new XMLHttpRequest();
        oReq.onload = function () {
        };
        oReq.open("post", "/user/setPermission/" + id + "/" + perm, true);
        oReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        oReq.send("text=A");
    }
</script>
