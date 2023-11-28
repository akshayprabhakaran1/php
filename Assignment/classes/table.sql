set global sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE `library`.`books` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(128) NOT NULL , 
    `author` VARCHAR(60) NOT NULL , 
    `genre` VARCHAR(60) NULL , 
    `kind` VARCHAR(50) NOT NULL , 
    `epoch` VARCHAR(50) NOT NULL , 
    `url` VARCHAR(200) NOT NULL , 
    `slug` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), UNIQUE `slug_idx` (`slug`),
    `created_at` TIMESTAMP NOT NULL,
    `modified_at` TIMESTAMP NOT NULL,
    `deleted_at` TIMESTAMP NULL
    ) ENGINE = InnoDB;