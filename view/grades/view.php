<div class="full">
    <div id="div-semester">
        <label id="label-semester">
            Zeugnisse:
        </label>
        <button id="button-grades-1" class="button-semester" onclick="showGrades(1)">
            bwd
        </button>
        <button id="button-grades-2" class="button-semester" onclick="showGrades(2)">
            gibb
        </button>
    </div>
    <div id="div-grades-1">
        <img id="img-grades" src="/grades/getGrades/1" width="100%">
    </div>
    <div id="div-grades-2">
        <img id="img-grades" src="/grades/getGrades/2" width="100%">
    </div>
</div>
<script>
    var current = 2;
    showGrades(1);

    function showGrades(s) {
        document.getElementById("button-grades-" + current).style.backgroundColor = "lightgray";
        document.getElementById("button-grades-" + s).style.backgroundColor = "lightblue";
        document.getElementById("div-grades-" + current).style.display = "none";
        document.getElementById("div-grades-" + s).style.display = "block";
        current = s;
    }
</script>