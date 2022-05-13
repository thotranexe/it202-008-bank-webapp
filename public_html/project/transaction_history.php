<?php require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");?>
<?php

if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}

$account_id = get_user_id();
print($account_id);

$db=getDB();
$idNum = get_user_id();
//get account
$stmt = $db->prepare("SELECT account FROM BankAccounts WHERE user_ID=:userID ORDER BY created DESC LIMIT 1");
$stmt->execute([":userID" => $idNum]);
$userAccount = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccount = implode("",$userAccount);

if(isset($account_id)) {

    $stmt = $db->prepare("SELECT balance_change, transaction_type, created FROM Transactions WHERE account_src = :account_id LIMIT 10");
    $r = $stmt->execute(["account_id" => $userAccount]);
    if ($r) {
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($transactions);
    } else {
        $e = $stmt->errorInfo();
        flash("There was an error fetching transaction info " . var_export($e, true));
    }
}
?>
    <h3>Transaction History</h3>
    <div class="results">
        <?php // if ($transactions): ?>
            <div class="list-group">
                <?php foreach ($transactions as $t): ?>
                    <div class="list-group-item">
                        <div>
                            <div>Amount:</div>
                            <div><?php safer_echo($t["amount"]); ?></div>
                        </div>
                        <div>
                            <div>Action Type:</div>
                            <div><?php safer_echo($t["action_type"]); ?></div>
                        </div>
                        <div>
                            <div>Memo:</div>
                            <div><?php safer_echo($t["memo"]); ?></div>
                        </div>
                        <div>
                            <div>Created:</div>
                            <div><?php safer_echo($t["created"]); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php //else: ?>
            <p>No results</p>
        <?php //endif; ?>
    </div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>