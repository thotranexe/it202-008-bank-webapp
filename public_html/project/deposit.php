<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1> Deposit </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        
        <label>Deposit amount</label>
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