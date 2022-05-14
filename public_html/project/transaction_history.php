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
            <span>Start:</span>
            <input type="date" id="start" name="start"/>
            <div><span>End:</span></div>
            <input type="data" id="end" name="end"/>
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
$start=strtotime(se($_POST,"start","",false));
$end=strtotime(se($_POST,"end","",false));

if(isset($userAccount)){

    $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE account_src = :account_id LIMIT 10");
    if(isset($start)&&isset($end)){
        $stmt=$db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE (account_src = :account_id) AND ( created BETWEEN :daystart AND :dayend) LIMIT 10");
        $r = $stmt->execute([":account_id" => $userAccount,":daystart"=>$start, ":dayend"=>$end]);
    }
    $r = $stmt->execute(["account_id" => $userAccount]);
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