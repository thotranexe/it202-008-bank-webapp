<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
?>
<h1> Withdraw </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
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
if(isset($_POST,"ammount","",false)){
    $haserror=true;
    flash("dude put in an amount");
}
elseif(((int)se($_POST,"amount","",false))>get_account_balance()){
    $haserror=true;
    flash("You dont have enough money to withdraw that amount","danger");
}
if(isset($_POST["amount"])&&!$haserror){
    $db=getDB();
    $idNum = get_user_id();
    //get account
    $stmt = $db->prepare("SELECT account FROM BankAccounts WHERE user_ID=:userID ORDER BY created DESC LIMIT 1");
    $stmt->execute([":userID" => $idNum]);
    $userAccount = $stmt->fetch(PDO::FETCH_ASSOC);
    $userAccount = implode("",$userAccount);

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