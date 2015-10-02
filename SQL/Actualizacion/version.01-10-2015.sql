-- ---------------
-- Sistema version
-- ---------------
ALTER TABLE `sistema` CHANGE `logo` `logo` VARCHAR(55) CHARSET utf8 COLLATE utf8_general_ci DEFAULT 'logo.jpg' NULL, ADD COLUMN `version` VARCHAR(15) CHARSET utf8 COLLATE utf8_general_ci NULL AFTER `TipoCambio`; 
UPDATE `sistema` SET `version` = 'v1.0.5 Estable' WHERE `id` = '1';
