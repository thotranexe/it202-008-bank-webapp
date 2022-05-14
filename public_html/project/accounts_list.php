<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");

$db = getDB();
$accNum = get_user_id();
$query = "SELECT id, account, balance, accType, created, modified, apy from BankAccounts WHERE user_id='".$accNum."'";

//$stmt = $db->prepare($query); 
//$stmt->bind_param("i", $accNum);
//$stmt->execute();
//$result = $stmt->get_result(); // get the mysqli result
//$user = $result->fetch_assoc(); // fetch the data   

$params = null;
$query .= " ORDER BY modified desc LIMIT 10";

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

<h1>List Accounts</h1>
<h3>Account Types:</h3>
<h5>2 = Checking, 3 = Savings</h5>
<table>
    <thead>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
        <th>Date Created</th>
        <th>Recent Transaction Date</th>
    </thead>
    <tbody>
        <?php if (empty($accounts)) : ?>
            <tr>
                <td colspan="100%">No roles</td>
            </tr>
        <?php else : ?>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td style="padding-right: 15px;"><?php se($account, "account"); ?></td>
                    <td style="padding-right: 15px;"><?php se($account, "accType"); ?></td>
                    <td style="padding-right: 15px;"><?php se($account, "balance"); ?></td>
                    <td style="padding-right: 15px;"><?php se($account, "created"); ?></td>  
                    <td style="padding-right: 15px;"><?php se($account, "modified"); ?></td>  
                    <?php if(se($account,"apy","",false)!=NULL):?>
                        <td style="padding-right: 15px;"><?php se($account, "apy")?></td>
                    <?php endif;?>                        
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>