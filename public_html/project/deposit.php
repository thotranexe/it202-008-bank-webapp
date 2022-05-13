<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
?>
<h1> Deposit </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label>Amount Depositing</label>
        <input type="number" name="amount" min="1"  required />
        <input type="submit" class="btn btn-info" value="CONFIRM" />
    </div>
</form>
<script>
    function validate(form) {
        return true;
    }
</script>
<?php
if(isset($_POST["amount"])){
    $db=getDB();
    $account_recieving= $_SESSION['account'];
    $deposit=(int)se($_POST,"amount","",false);
    $world='000000000000';
    $tran_type='Deposit';
    $stmt = $db->prepare("INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, expected_total) 
    VALUES(:world,:account_recieving,:deposit,:tran_type,:deposit)");
    $stmt->bindValue(":world",$world);
    $stmt->bindValue(":account_recieving",$account_recieving);
    $stmt->bindValue(":deposit",$deposit);
    $stmt->bindValue(":tran_type",$tran_type);
    $stmt->bindValue(":deposit",$deposit);
    $stmt->execute();
    $rec_nb=$_SESSION['balance']+$deposit;
}

?>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>