-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema healthy_ninja
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema healthy_ninja
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `healthy_ninja` DEFAULT CHARACTER SET utf8 ;
USE `healthy_ninja` ;

-- -----------------------------------------------------
-- Table `healthy_ninja`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `billing_street` VARCHAR(45) NULL,
  `billing_city` VARCHAR(45) NULL,
  `billing_state` VARCHAR(45) NULL,
  `billing_zip` VARCHAR(45) NULL,
  `shipping_street` VARCHAR(45) NULL,
  `shipping_city` VARCHAR(45) NULL,
  `shipping_state` VARCHAR(45) NULL,
  `shipping_zip` VARCHAR(45) NULL,
  `admin_status` BINARY NULL,
  `last_login` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `guest` BINARY NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `category` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `stock` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` FLOAT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `healthy_ninja`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`reviews` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NULL,
  `rating` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `user_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reviews_users_idx` (`user_id` ASC),
  INDEX `fk_reviews_products1_idx` (`product_id` ASC),
  CONSTRAINT `fk_reviews_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `healthy_ninja`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `healthy_ninja`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `review_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_reviews1_idx` (`review_id` ASC),
  CONSTRAINT `fk_comments_reviews1`
    FOREIGN KEY (`review_id`)
    REFERENCES `healthy_ninja`.`reviews` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`order_relationships`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`order_relationships` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `product_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  `quantity` INT NULL,
  `price` FLOAT NULL,
  `product_total` FLOAT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_relationships_products1_idx` (`product_id` ASC),
  INDEX `fk_order_relationships_orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_order_relationships_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `healthy_ninja`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_relationships_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `healthy_ninja`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`carts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`carts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carts_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_carts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `healthy_ninja`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy_ninja`.`cart_relationships`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy_ninja`.`cart_relationships` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `product_id` INT NOT NULL,
  `cart_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cart_relationships_products1_idx` (`product_id` ASC),
  INDEX `fk_cart_relationships_carts1_idx` (`cart_id` ASC),
  CONSTRAINT `fk_cart_relationships_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `healthy_ninja`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_relationships_carts1`
    FOREIGN KEY (`cart_id`)
    REFERENCES `healthy_ninja`.`carts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
