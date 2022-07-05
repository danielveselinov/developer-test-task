create TABLE switch (
	`id` INT NOT NULL AUTO_INCREMENT ,
    `title` varchar(255) NOT NULL ,
    
     PRIMARY KEY (`id`)
);

INSERT INTO switch(title) VALUES ('DVD'), ('Furniture'), ('Book');

create TABLE dvd (
	`id` INT NOT NULL AUTO_INCREMENT ,
    `sizeMB` int NOT NULL ,
    
     PRIMARY KEY (`id`)
);

create TABLE furniture (
	`id` INT NOT NULL AUTO_INCREMENT ,
    `height` int NOT NULL ,
    `width` int NOT NULL ,
    `length` int NOT NULL ,
    
     PRIMARY KEY (`id`)
);

create TABLE book (
	`id` INT NOT NULL AUTO_INCREMENT ,
    `weight` int NOT NULL ,
    
     PRIMARY KEY (`id`)
);


CREATE TABLE `products` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `sku` VARCHAR(255) NOT NULL , 
    `name` VARCHAR(255) NOT NULL , 
    `price` DECIMAL(8,2) NOT NULL , 
    `is_dvd` INT NULL , 
    `is_furniture` INT NULL , 
    `is_book` INT NULL , 
    
    PRIMARY KEY (`id`),
    FOREIGN KEY(is_dvd) REFERENCES dvd(id),
    FOREIGN KEY(is_furniture) REFERENCES furniture(id),
    FOREIGN KEY(is_book) REFERENCES book(id)
);