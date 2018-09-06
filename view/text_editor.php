<div class="full">
    <div id="text-editor" class="editor">
        <div id="text-editor-left" class="editor-left">
            <select id="text-editor-list" class="editor-list" size="2" onchange="changeText()">
                <?php
                echo "<option value='" . $briefs[0]->brief . "' selected>" . $briefs[0]->brief . "</option>";
                for ($i = 1; $i < count($briefs); $i++) {
                    echo "<option value='" . $briefs[$i]->brief . "'>" . $briefs[$i]->brief . "</option>";
                }
                ?>
            </select>
            <button id="text-editor-button-new" onclick="newText()">
                New
            </button>
        </div>
        <div id="text-editor-right" class="editor-right">
            <div id="text-editor-buttons">
                <select id="text-editor-language" name="" onchange="changeText()">
                    <option value="de" selected>de</option>
                    <option value="en">en</option>
                    <option value="fr">fr</option>
                </select>
                <button id="text-editor-button-save" onclick="save()">Save</button>
            </div>
            <textarea id="text-editor-text" name="text" onchange="changed = true"></textarea>
        </div>
    </div>
</div>
<script>
    var autosave = true;
    var changed = false;
    var currentBrief;
    var currentLanguage;
    var elem = document.getElementById('text-editor-list');
    elem.addEventListener('keydown', function (e) {
        if (e.keyCode === 46) {
            deleteText()
        }
    });
    getText();

    function reqListener() {
        console.log(this.responseText);
    }

    function changeText() {
        if (autosave && changed) {
            save();
            changed = false;
        }
        getText()
    }

    function getText() {
        currentBrief = document.getElementById("text-editor-list").value;
        currentLanguage = document.getElementById("text-editor-language").value;
        var oReq = new XMLHttpRequest();
        oReq.onload = function () {
            document.getElementById("text-editor-text").value = this.responseText;
        };
        oReq.open("get", "/text/getText/" + currentBrief + "/" + currentLanguage, true);
        oReq.send();
    }

    function save() {
        var text = document.getElementById("text-editor-text").value;
        var oReq = new XMLHttpRequest();
        oReq.onload = function () {
        };
        oReq.open("post", "/text/save/" + currentBrief + "/" + currentLanguage, true);
        oReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        oReq.send("text=" + text);
    }

    function newText() {
        var brief = window.prompt("Brief: ", "brief");
        if (brief !== null) {
            window.location.href = "/text/newText/" + brief;
        }
    }

    function deleteText() {
        var brief = document.getElementById("text-editor-list").value;
        if (confirm("Do you want to delete '" + brief + "'?")) {
            window.location.href = "/text/delete/" + brief;
        }
    }
</script>
