<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/dashboard_nav.php");
is_logged_in(true);
?>

<h1>New Account</h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        
        <label>Select Account Type</label>
        <select name="account_type">
            <option value="2">Checking</option>
            <option value="3">Savings</option>
        </select>
        <label>Starting Deposit</label>
        <input type="number" name="bal" required />
        <input type="submit" class="btn btn-info" value="Open Account" />
    </div>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        return true;
    }
</script>

<?php
//TODO 2: add PHP Code
if (isset($_POST["bal"]) && isset($_POST["account_type"])) {
    $accNum = null;
    $accType = se($_POST, "account_type", "", false);
    $bal = (int)se($_POST, "bal", "", false);
    //TODO 3
    $hasError = false;
    if (empty($bal)) {
        flash("Balance must not be empty, please enter 0 if no deposit", "danger");
        $hasError = true;
    }
    //validate
    if (!$hasError) {
        //TODO 4
        $idNum = get_user_id();
        $db = getDB();
        $tt = "Deposit";      

        $stmt = $db->prepare("INSERT INTO BankAccounts (user_id, accType) VALUES(:userID, :account_type)");
        $stmt->execute([":userID" => $idNum, ":account_type" => $accType]);      

        $worldID = '000000000000';

        $stmt = $db->prepare("SELECT account FROM BankAccounts WHERE user_ID=:userID ORDER BY created DESC LIMIT 1");
        $stmt->execute([":userID" => $idNum]);
        $userAccount = $stmt->fetch(PDO::FETCH_ASSOC);
        $userAccount = implode("",$userAccount);

        $stmt = $db->prepare("SELECT balance_change from Transactions WHERE account_src=000000000000 ORDER BY created DESC LIMIT 1");
        $stmt->execute();
        $wrldChnge = (int)$stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($wrldChnge)) {
            $wrldChnge = 0;
        }

        $stmt = $db->prepare("SELECT balance_change from Transactions WHERE account_dest=000000000000 ORDER BY created DESC LIMIT 1");
        $stmt->execute();
        $userChnge = (int)$stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($userChnge)) {
            $userChnge = 0;
        }

        $wrldChnge -= $bal;
        $userChnge += $bal;

        $query = "INSERT INTO Transactions (account_src, account_dest, balance_change, transaction_type, expected_total) 
        VALUES(:srcAcc1, :destAcc1, :balChnge1, :tt, :exT1), (:srcAcc2, :destAcc2, :balChnge2, :tt, :exT2)";

        $stmt = $db->prepare($query);
	    $stmt->bindValue(":srcAcc1", $worldID);
	    $stmt->bindValue(":destAcc1", $userAccount);
	    $stmt->bindValue(":balChnge1", $bal*-1);
	    $stmt->bindValue(":tt", $tt);
	    $stmt->bindValue(":exT1", $wrldChnge);
	    //flip data for other half of transaction
	    $stmt->bindValue(":srcAcc2", $userAccount);
	    $stmt->bindValue(":destAcc2", $worldID);
	    $stmt->bindValue(":balChnge2", ($bal));
	    $stmt->bindValue(":tt", $tt);
	    $stmt->bindValue(":exT2", $userChnge);
	    $result = $stmt->execute();
    	echo var_export($result, true);
    	echo var_export($stmt->errorInfo(), true);
        flash("Account created!", "success");
	    return $result;
        //$stmt = $db->prepare("UPDATE BankAccounts SET balance = :world WHERE user_id=-1");
        //$stmt->execute([":world" => $world]);

        //$stmt = $db->prepare("UPDATE BankAccounts SET balance = :bal WHERE user_id=:userID");
        //$stmt->execute([":bal" => $cash, ":userID" => $idNum]);
        
    }

}
?>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>