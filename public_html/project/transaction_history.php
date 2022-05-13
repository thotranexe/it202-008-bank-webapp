<?php require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");?>
<?php

if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}

$account_id = get_user_id();

$db = getDB();

if(isset($account_id)) {

    $stmt = $db->prepare("SELECT amount, transaction_type, created FROM Transactions WHERE account_src = :account_id LIMIT 10");
    $r = $stmt->execute(["account_id" => $account_id]);
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