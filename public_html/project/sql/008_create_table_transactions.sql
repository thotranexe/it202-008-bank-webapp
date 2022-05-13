CREATE TABLE IF NOT EXISTS Transactions (
    id int AUTO_INCREMENT PRIMARY KEY,
    account_src VARCHAR(12), 
    account_dest VARCHAR(12), 
    balance_change int, 
    transaction_type VARCHAR(12), 
    memo VARCHAR(20), 
    expected_total INT, 
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
)