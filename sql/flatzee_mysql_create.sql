CREATE TABLE `property` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`negotiable` varchar(255) NOT NULL,
	`price` INT(255) NOT NULL,
	`bathroom` varchar(255) NOT NULL,
	`balconies` varchar(255) NOT NULL,
	`society` varchar(255) NOT NULL,
	`super_area` FLOAT NOT NULL,
	`build_up_area` FLOAT NOT NULL,
	`carpet_area` FLOAT NOT NULL,
	`furnished_status` varchar(255) NOT NULL,
	`car_parking` varchar(255) NOT NULL,
	`floor` INT NOT NULL,
	`total_floor` INT NOT NULL,
	`facing` varchar(255) NOT NULL,
	`description` varchar(1000) NOT NULL,
	`monthly_maintenance` FLOAT NOT NULL,
	`security_deposit` FLOAT NOT NULL,
	`location` varchar(255) NOT NULL,
	`landmarks` varchar(255) NOT NULL,
	`age_of_construction` INT NOT NULL,
	`available_since` varchar(255) NOT NULL,
	`date_added` DATE NOT NULL,
	PRIMARY KEY (`id`,`slug`)
);

CREATE TABLE `bedroom` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`property_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `bedroom_amenities` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`bedroom_id` INT NOT NULL,
	`amenity_ir` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `images` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`property_id` INT NOT NULL,
	`url` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `amenities` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`icon` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `backend_user` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`authKey` varchar(255) NOT NULL,
	`accessToken` varchar(255) NOT NULL,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`contact_number` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	PRIMARY KEY (`id`,`username`)
);

ALTER TABLE `bedroom` ADD CONSTRAINT `bedroom_fk0` FOREIGN KEY (`property_id`) REFERENCES `property`(`id`);

ALTER TABLE `bedroom_amenities` ADD CONSTRAINT `bedroom_amenities_fk0` FOREIGN KEY (`bedroom_id`) REFERENCES `bedroom`(`id`);

ALTER TABLE `bedroom_amenities` ADD CONSTRAINT `bedroom_amenities_fk1` FOREIGN KEY (`amenity_ir`) REFERENCES `amenities`(`id`);

ALTER TABLE `images` ADD CONSTRAINT `images_fk0` FOREIGN KEY (`property_id`) REFERENCES `property`(`id`);

