CREATE TABLE IF NOT EXISTS BankAccounts(
    id int AUTO_INCREMENT PRIMARY KEY,
    account varchar(12) unique DEFAULT (LPAD(user_id, 12, "0")),
    user_id int,
    balance int DEFAULT 0,
    accType int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    check (balance >= 0 AND LENGTH(account) = 12),

    FOREIGN KEY (user_id) REFERENCES Users(id),
)