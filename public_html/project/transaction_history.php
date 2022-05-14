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

?>
<h1> PICK YOUR ACCOUNT </h1>
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
    <div>
            <label>Filter by date</label>
            <div>Start:</div>
            <input type="date" id="start" name="start" required/>
            <div>End:</div>
            <input type="date" id="end" name="end"required/>
            <label>Select Account Type</label>
            <select name="t_type">
            <option value="ALL">All</option>
            <option value="Deposit">Deposit</option>
            <option value="Withdraw">Withdraw</option>
            <option value="Transfer">Transfer</option>
            </select>
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
if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}

$userAccount=se($_POST,"s_account","",false);
$start=(se($_POST,"start","",false))." 00:00:00";
$end=(se($_POST,"end","",false))." 23:59:59";
$ttype=se($_POST,"t_type","ALL",false);
//print($ttype);
//print($start);
//print($end);
if(isset($userAccount)){
    if(empty($start)&&empty($end)){
        print("they are empty\n");
        $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE account_src = :account_id LIMIT 10");
        $r = $stmt->execute([":account_id" => $userAccount]);
    }
    else
    {
        if(strcmp($ttype,"ALL")>0){
            $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE (created BETWEEN :daystart AND :dayend) AND (account_src = :account_id) LIMIT 10");
            $r = $stmt->execute([":account_id" => $userAccount,":daystart"=>$start,":dayend"=>$end]);
            flash("Viewing all between $start and $end","info");
        }
        if(strcmp($ttype,"Deposit")>0){
            $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE (created BETWEEN :daystart AND :dayend) AND (account_src = :account_id) AND (transaction_type='Deposit') LIMIT 10");
            $r = $stmt->execute([":account_id" => $userAccount,":daystart"=>$start,":dayend"=>$end]);
            flash("Viewing deposits between $start and $end","info");
        }
        if(strcmp($ttype,"Withdraw")>0){
            $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE (created BETWEEN :daystart AND :dayend) AND (account_src = :account_id) AND (transaction_type='Withdraw') LIMIT 10");
            $r = $stmt->execute([":account_id" => $userAccount,":daystart"=>$start,":dayend"=>$end]);
            flash("Viewing withdraws between $start and $end","info");
        }
        if(strcmp($ttype,"Transfer")>0){
            $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE (created BETWEEN :daystart AND :dayend) AND (account_src = :account_id) AND (transaction_type='Transfer') LIMIT 10");
            $r = $stmt->execute([":account_id" => $userAccount,":daystart"=>$start,":dayend"=>$end]);
            flash("Viewing transfers between $start and $end","info");
        }
    }
    if ($r) {
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($transactions);
    } else {
        $e = $stmt->errorInfo();
        flash("There was an error fetching transaction info " . var_export($e, true));
    }
}

?>
    <h3>Transaction History</h3>
    <div class="results">
        <?php if ($transactions): ?>
            <div class="list-group">
                <?php foreach ($transactions as $t): ?>
                    <div class="list-group-item">
                        <div>
                            <span>Amount:</span>
                            <span><?php safer_echo($t["balance_change"]); ?></span>
                        </div>
                        <div>
                            <span>Transaction Type:</span>
                            <span><?php safer_echo($t["transaction_type"]); ?></span>
                        </div>
                        <div>
                        </div>
                        <div>
                            <span>Created:</span>
                            <span><?php safer_echo($t["created"]); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No results</p>
        <?php endif; ?>
    </div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>