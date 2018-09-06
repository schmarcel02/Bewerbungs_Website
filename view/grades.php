<div class="full">
    <div id="div-semester">
        <label id="label-semester">
            Semester:
        </label>
        <button id="button-semester-1" class="button-semester" onclick="showGrades(1)">
            1
        </button>
        <button id="button-semester-2" class="button-semester" onclick="showGrades(2)">
            2
        </button>
        <button id="button-semester-3" class="button-semester" onclick="showGrades(3)">
            3
        </button>
        <button id="button-semester-4" class="button-semester" onclick="showGrades(4)">
            4
        </button>
    </div>
    <div id="div-grades">

    </div>
</div>
<script>
    showGrades(4);

    function showGrades(sem) {
        for (var i = 1; i <= 4; i++) {
            document.getElementById("button-semester-" + i).style.backgroundColor = "lightgray";
        }
        document.getElementById("button-semester-" + sem).style.backgroundColor = "lightblue";
        var oReq = new XMLHttpRequest();
        oReq.onload = function () {
            document.getElementById("div-grades").innerHTML = this.responseText;
        };
        oReq.open("get", "/grades/getGrades/" + sem, true);
        oReq.send();
    }
</script>
