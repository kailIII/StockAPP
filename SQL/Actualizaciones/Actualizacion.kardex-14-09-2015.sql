-- ---------------------------
-- Tabla kardex StockApp
-- ---------------------------
DROP TABLE IF EXISTS `kardex`;

CREATE TABLE `kardex` (
  `id` int(5) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `entrada` int(11) DEFAULT NULL,
  `salida` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `preciounitario` varchar(15) DEFAULT NULL,
  `preciototal` varchar(15) DEFAULT NULL,
  `detalle` text,
  `fecha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
