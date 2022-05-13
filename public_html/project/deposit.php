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
    } else {
        flash("No matches found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}
?>
<h1> Deposit </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <?php
            //print_r($accounts);
            echo implode(" ",$accounts);
            $submittedValue='';
        ?>
        <label>Select Account</label>
            <select name="accountno">
            <?php
        
        // Iterating through the product array
        foreach($accounts as $account){
            echo "<option value='strtolower($account)'>$account</option>";
        }
        ?>
            </select>
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
    $idNum = get_user_id();
    //get account
    $stmt = $db->prepare("SELECT account FROM BankAccounts WHERE user_ID=:userID ORDER BY created DESC LIMIT 1");
    $stmt->execute([":userID" => $idNum]);
    $userAccount = $stmt->fetch(PDO::FETCH_ASSOC);
    $userAccount = implode("",$userAccount);

    $account_recieving= $userAccount;
    $deposit=(int)se($_POST,"amount","",false);
    $wdepo=-1*$deposit;
    $world='000000000000';
    $tran_type='Deposit';
    //transaction
    $stmt = $db->prepare("INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, expected_total) 
    VALUES(:world,:account_recieving,:deposit,:tran_type,:deposit),(:account_recieving,:world,:wdepo,:tran_type,:wdepo)");
    $stmt->bindValue(":world",$world);
    $stmt->bindValue(":account_recieving",$account_recieving);
    $stmt->bindValue(":deposit",$deposit);
    $stmt->bindValue(":tran_type",$tran_type);
    $stmt->bindValue(":deposit",$deposit);
    $stmt->bindValue(":wdepo",$wdepo);
    $stmt->execute();
    //uodating balances
    //get current bal
    $stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account=:account_recieving");
    $stmt->execute([":account_recieving"=>$account_recieving]);
    $cbal=$stmt->fetch(PDO::FETCH_ASSOC);
    $cbal=implode("",$cbal);
    //set newbal
    $nb=$cbal+$deposit;
    $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_recieving");
    $stmt->execute([":nb" => $nb,":account_recieving" => $account_recieving]);
    echo "<meta http-equiv='refresh' content='0'>";
    /*$stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account='000000000000'");
    $stmt->execute();
    $wcbal=$stmt->fetch(PDO::FETCH_ASSOC);
    $wcbal=implode("",$wcbal);
    $wnb=$wcbal-$deposit;
    $stmt=$db->prepare("SELECT account FROM BankAccounts WHERE account='000000000000'");
    $stmt->execute();
    $wcc=$stmt->fetch(PDO::FETCH_ASSOC);
    $wcc=implode("",$wcc);
    $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_recieving");
    $stmt->execute([":nb" => $wnb,":account_recieving" => $wcc])*/
}

?>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>