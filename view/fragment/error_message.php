<div id="error" class="error show-error" style="display: <?= Errors::hasError() ? "block" : "none" ?>;">
    <?php
    if (Errors::hasError())
        echo Errors::getError();
    ?>
</div>
<script>
    setTimeout(function () {
        hide()
    }, 5000);

    function show() {
        var err = document.getElementById('error');
        err.classList.remove('hide-error');
        err.classList.remove('show-error');
        err.classList.add('show-error');
    }

    function hide() {
        var err = document.getElementById('error');
        err.classList.remove('show-error');
        err.classList.remove('hide-error');
        err.classList.add('hide-error');
    }
</script>
