CREATE DEFINER = CURRENT_USER TRIGGER `harvesthand`.`UserCredentials_AFTER_INSERT` AFTER INSERT ON `UserCredentials` FOR EACH ROW
BEGIN
 SET NEW.`password` = PASSWORD(CONCAT(NEW.`password`, NEW.salt));
END
