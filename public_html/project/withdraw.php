<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
get_or_create_account();
$db = getDB();
$accNum = get_user_id();
$query = "SELECT account From BankAccounts WHERE user_id='".$accNum."'";

//$stmt = $db->prepare($query); 
//$stmt->bind_param("i", $accNum);
//$stmt->execute();
//$result = $stmt->get_result(); // get the mysqli result
//$user = $result->fetch_assoc(); // fetch the data   

$params = null;
$query .= " ORDER BY modified desc LIMIT 5";

$stmt = $db->prepare($query);
$accounts = [];
try {
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $accounts = $results;
    } 
    else{
        flash("No matches found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
?>
<h1> Withdraw </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <?php

            $submittedValue='';
        ?>
            <select name="user_account">
        <?php foreach ($accounts as $account) : ?>
            <option value="<?php se($account, 'account'); ?>"><?php se($account, "account"); ?></option>
        <?php endforeach; ?>
    </select>
        <label>Amount Withdrawing</label>
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
$haserror=false;
get_or_create_account();
if(((int)se($_POST,"amount","",false))>get_account_balance()){
    $haserror=true;
    flash("You dont have enough money to withdraw that amount","danger");
}
if(isset($_POST["amount"])&&!$haserror){
    $db=getDB();
    $idNum = get_user_id();
    //get account
    $userAccount = se($_POST, "user_account", "", false);
    $account_recieving= $userAccount;

    $account_withdrawing= $userAccount;
    $withdraw=-1*(int)se($_POST,"amount","",false);
    $wdraw=-1*$withdraw;
    $world='000000000000';
    $tran_type='Withdraw';
    //transaction
    $stmt = $db->prepare("INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, expected_total) 
    VALUES(:account_withdrawing,:world,:withdraw,:tran_type,:withdraw),(:world,:account_withdrawing,:wdraw,:tran_type,:wdraw)");
    $stmt->bindValue(":world",$world);
    $stmt->bindValue(":account_withdrawing",$account_withdrawing);
    $stmt->bindValue(":withdraw",$withdraw);
    $stmt->bindValue(":tran_type",$tran_type);
    $stmt->bindValue(":withdraw",$withdraw);
    $stmt->bindValue(":wdraw",$wdraw);
    $stmt->execute();
    //uodating balances
    $stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account=:account_withdrawing");
    $stmt->execute([":account_withdrawing"=>$account_withdrawing]);
    $cbal=$stmt->fetch(PDO::FETCH_ASSOC);
    $cbal=implode("",$cbal);
    $nb=$cbal+$withdraw;
    $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_withdrawing");
    $stmt->execute([":nb" => $nb,":account_withdrawing" => $account_withdrawing]);
    get_or_create_account();
    /*$stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account='000000000000'");
    $stmt->execute();
    $wcbal=$stmt->fetch(PDO::FETCH_ASSOC);
    $wcbal=implode("",$wcbal);
    $wnb=$wcbal-$deposit;
    $stmt=$db->prepare("SELECT account FROM BankAccounts WHERE account='000000000000'");
    $stmt->execute();
    $wcc=$stmt->fetch(PDO::FETCH_ASSOC);
    $wcc=implode("",$wcc);
    $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_withdrawing");
    $stmt->execute([":nb" => $wnb,":account_withdrawing" => $wcc])*/
}

?>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>