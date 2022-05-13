<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
?>
<h1> Deposit </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label>Starting Deposit</label>
        <input type="number" name="bal" required />
        <input type="submit" class="btn btn-info" value="deposit" />
    </div>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        return true;
    }
</script>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>