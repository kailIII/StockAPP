-- ---------------------------
-- Tabla sistema StockApp
-- ---------------------------
ALTER TABLE `sistema` ADD COLUMN `TipoCambio` TINYINT NULL AFTER `logo`;
ALTER TABLE `sistema` CHANGE `TipoCambio` `TipoCambio` TINYINT(1) DEFAULT 1 NULL;
