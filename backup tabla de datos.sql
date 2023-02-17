-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla burguers.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `idcarrito` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idcliente` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcarrito`),
  KEY `FK_carritos_clientes` (`fk_idcliente`),
  CONSTRAINT `FK_carritos_clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.carrito_productos
CREATE TABLE IF NOT EXISTS `carrito_productos` (
  `idcarrito_producto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idproducto` int(11) unsigned DEFAULT NULL,
  `fk_idcarrito` int(11) unsigned DEFAULT NULL,
  `cantidad` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idcarrito_producto`),
  KEY `FK_carrito_productos_productos` (`fk_idproducto`),
  KEY `FK_carrito_productos_carritos` (`fk_idcarrito`),
  CONSTRAINT `FK_carrito_productos_carritos` FOREIGN KEY (`fk_idcarrito`) REFERENCES `carritos` (`idcarrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_carrito_productos_productos` FOREIGN KEY (`fk_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `celular` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `total` decimal(20,6) DEFAULT NULL,
  `fk_idsucursal` int(11) unsigned DEFAULT NULL,
  `fk_idcliente` int(11) unsigned DEFAULT NULL,
  `fk_idestado` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `FK_pedidos_sucursales` (`fk_idsucursal`),
  KEY `FK_pedidos_clientes` (`fk_idcliente`),
  KEY `FK_pedidos_estados` (`fk_idestado`),
  CONSTRAINT `FK_pedidos_clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_estados` FOREIGN KEY (`fk_idestado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_sucursales` FOREIGN KEY (`fk_idsucursal`) REFERENCES `sucursales` (`idsucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.pedidos_productos
CREATE TABLE IF NOT EXISTS `pedidos_productos` (
  `idpedidoproducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idproducto` int(11) unsigned DEFAULT NULL,
  `fk_idpedido` int(11) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciounitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idpedidoproducto`),
  KEY `FK_pedidos_productos_productos` (`fk_idproducto`),
  KEY `FK_pedidos_productos_pedidos` (`fk_idpedido`),
  CONSTRAINT `FK_pedidos_productos_pedidos` FOREIGN KEY (`fk_idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_productos_productos` FOREIGN KEY (`fk_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cantidad` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fk_idcategoria` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `FK_productos_categorias` (`fk_idcategoria`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`fk_idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla burguers.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `idsucursal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
