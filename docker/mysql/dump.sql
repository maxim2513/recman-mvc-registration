USE recman;

CREATE TABLE users
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name  VARCHAR(255) NOT NULL,
    email      VARCHAR(255) NOT NULL UNIQUE,
    mobile     VARCHAR(15),
    password   VARCHAR(255) NOT NULL,
    createdAt  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);