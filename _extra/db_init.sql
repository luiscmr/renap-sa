CREATE SCHEMA `renap_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;


CREATE USER 'renap_user'@'localhost' IDENTIFIED BY 'M89Mxvrxpp97jVSS@3';
GRANT ALL PRIVILEGES ON * . * TO 'renap_user'@'localhost';
FLUSH PRIVILEGES;
