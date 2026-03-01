-- MySQL initialization script. 
-- it will be executed when the MySQL container is first started. 
-- You can use this script to create databases, tables, and
--  insert initial data.

-- 01_init.sql, 02_create_db.sql => sẽ chạy theo thứ tự alphabet.

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);
