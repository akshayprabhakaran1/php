CREATE TABLE books (
    id SERIAL PRIMARY KEY NOT NULL,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(60) NOT NULL,
    genre VARCHAR(60),
    kind VARCHAR(50) NOT NULL,
    epoch VARCHAR(50) NOT NULL,
    url VARCHAR(200) NOT NULL,
    slug VARCHAR(30) UNIQUE
)

CREATE TABLE `library`.`books` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(128) NOT NULL , 
    `author` VARCHAR(60) NOT NULL , 
    `genre` VARCHAR(60) NULL , 
    `kind` VARCHAR(50) NOT NULL , 
    `epoch` VARCHAR(50) NOT NULL , 
    `url` VARCHAR(200) NOT NULL , 
    `slug` VARCHAR(40) NOT NULL , PRIMARY KEY (`id`), UNIQUE `slug_idx` (`slug`)
    ) ENGINE = InnoDB;