<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
get_or_create_account();
$db = getDB();
$accNum = get_user_id();
$query = "SELECT account From BankAccounts WHERE user_id='".$accNum."'";

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
$query = "SELECT account From BankAccounts Where "
?>

<h1> Transfer externally </h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <?php
            $submittedValue='';
        ?>
            <select name="s_account">
                <?php foreach ($accounts as $account) : ?>
                    <option value="<?php se($account, 'account'); ?>"><?php se($account, "account"); ?></option>
                <?php endforeach; ?>
            </select>
            <span>to</span>
        <label>Account Destination ID Last 4</label>
        <input type="text" name="last_4"/>
        <div><label>Last Name</label></div>
        <input type="text" name="last_name"/>
        <div><label>Amount transfering</label></div>
        <input type="number" name="amount" min="1"  required />
        <div>
            <label>Memo</label>
            <input type="text" name="message" required maxlength="150" />
        </div>
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
if(isset($_POST["amount"])&&!$haserror){
    $db=getDB();
    $idNum = get_user_id();
    //get accounts
    $from = se($_POST, "s_account", "", false);
    $last_name = $_POST["last_name"];
    $last_4 = $_POST["last_4"];
    $mem = se($_POST, "message", "", false);
    $query=("SELECT a.id FROM Users u JOIN BankAccounts a on u.id = a.user_id WHERE (u.last_name = :last_name) AND (a.account LIKE :last_4)");
    $stmt=$db->prepare($query);
    $stmt->execute([":last_name"=>$last_name,":last_4"=>$last_4]);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    se($result['id'],"id");
    if($result){
        $to=se($result['id'],"id","",false);
    }
    else{
        flash("no accounts found","danger");
    }
    if($to!=NULL){
        $transfer=(int)se($_POST,"amount","",false);
        $inverse=-1*$transfer;
        $tran_type='EXT-Transfer';
        //transaction

        //from account balance
        $stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account=:s_account");
        $stmt->execute([":s_account"=>$from]);
        $frombal=$stmt->fetch(PDO::FETCH_ASSOC);
        $frombal=implode("",$frombal);
        //to account balance
        $stmt=$db->prepare("SELECT balance FROM BankAccounts WHERE account=:d_account");
        $stmt->execute([":d_account"=>$to]);
        $tobal=$stmt->fetch(PDO::FETCH_ASSOC);
        //$tobal=implode("",$tobal);
        $tobal=(int)se($tobal,null,"",false);

        $s_nb=$frombal-$transfer;
        $d_nb=$tobal+$transfer;

        print($s_nb);
        if((int)$s_nb>=0){
        //first update from account
            $stmt = $db->prepare("INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, memo, expected_total) 
            VALUES(:s_acc,:d_account,:amount,:ttype,:memo,:expected_total),(:d_account,:s_acc,:inverse,:ttype,:memo,:expected_nb)");
            $stmt->bindValue(":s_acc",$from);
            $stmt->bindValue(":d_account",$to);
            $stmt->bindValue(":amount",$inverse);
            $stmt->bindValue(":ttype",$tran_type);
            $stmt->bindValue(":memo",$mem);
            $stmt->bindValue(":inverse",$transfer);
            $stmt->bindValue(":expected_total",$s_nb);
            $stmt->bindValue(":expected_nb",$d_nb);
            $stmt->execute();
        //update balance
            $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_transfering");
            $stmt->execute([":nb" => $s_nb,":account_transfering" => $from]);
            $stmt=$db->prepare("UPDATE BankAccounts SET balance=:nb WHERE account=:account_transfering");
            $stmt->execute([":nb" => $d_nb,":account_transfering" => $to]);
            flash("Your transfer was sucessful","success");
        }
        else{
            flash("balance too low","danger");
        }
    }
    else
    {
        flash("Failed to transfer","danger");
    }
    get_or_create_account();
}

?>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>