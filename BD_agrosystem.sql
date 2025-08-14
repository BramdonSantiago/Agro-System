-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-12-2020 a las 19:40:42
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agrosystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

DROP TABLE IF EXISTS `categoria_producto`;
CREATE TABLE IF NOT EXISTS `categoria_producto` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id`, `categoria`) VALUES
(1, 'Fertilizante'),
(2, 'Semilla'),
(3, 'Toxico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id_numero_pedido` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `precio` double UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `subtotal` double UNSIGNED NOT NULL,
  KEY `id_producto` (`id_producto`),
  KEY `id_numero_pedido` (`id_numero_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_numero_pedido`, `id_producto`, `precio`, `cantidad`, `subtotal`) VALUES
(1, 3, 250, 2, 500),
(1, 8, 1035, 1, 1035),
(2, 12, 213, 1, 213),
(2, 13, 250, 1, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_entrega_pedido`
--

DROP TABLE IF EXISTS `estado_entrega_pedido`;
CREATE TABLE IF NOT EXISTS `estado_entrega_pedido` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado_entrega` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_entrega_pedido`
--

INSERT INTO `estado_entrega_pedido` (`id`, `estado_entrega`) VALUES
(1, 'No entregado'),
(2, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_inventario_producto`
--

DROP TABLE IF EXISTS `estado_inventario_producto`;
CREATE TABLE IF NOT EXISTS `estado_inventario_producto` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_inventario_producto`
--

INSERT INTO `estado_inventario_producto` (`id`, `estado`) VALUES
(1, 'Disponible'),
(2, 'No disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

DROP TABLE IF EXISTS `metodos_pago`;
CREATE TABLE IF NOT EXISTS `metodos_pago` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `metodo_pago` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id`, `metodo_pago`) VALUES
(1, 'Tarjeta'),
(2, 'Contra entrega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `numero_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `referencia_pago` varchar(35) NOT NULL,
  `numero_productos` int(10) UNSIGNED DEFAULT NULL,
  `total` double UNSIGNED NOT NULL,
  `id_metodo_pago` int(10) UNSIGNED NOT NULL,
  `id_estado_entrega` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`numero_pedido`),
  KEY `id_cliente` (`id_cliente`) USING BTREE,
  KEY `id_estado_entrega` (`id_estado_entrega`),
  KEY `id_metodo_pago` (`id_metodo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`numero_pedido`, `id_cliente`, `fecha`, `hora`, `referencia_pago`, `numero_productos`, `total`, `id_metodo_pago`, `id_estado_entrega`) VALUES
(1, 1, '2020-12-21', '19:34:46', 'ch_1I0zlzLvw6u7vusncClASeOp', 2, 1535, 1, 2),
(2, 1, '2020-12-21', '19:37:13', 'ch_1I0zoMLvw6u7vusnmcU4kv6H', 2, 463, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `marca` varchar(35) NOT NULL,
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `precio` double UNSIGNED NOT NULL,
  `imagen` varchar(35) NOT NULL,
  `descripcion` text NOT NULL,
  `id_estado_inventario` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imagen` (`imagen`),
  KEY `id_categoria` (`id_categoria`) USING BTREE,
  KEY `id_estado_inventario` (`id_estado_inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `id_categoria`, `precio`, `imagen`, `descripcion`, `id_estado_inventario`) VALUES
(1, 'Fertilizante 1 LT', 'Fertiplus', 1, 380, 'fertilizante1.jpg', 'Es un concentrado nutricional biodegradable compuesto de ácidos húmicos y adicionado con NPK ymicroelementos a base de Fe, Mn, Zn y Bo, el cual en las aplicaciones al suelo estimula los procesos fisiológicos y bioquímicos de las plantas, incrementando la fertilidad y mejorando la estructura de los mismos.Incrementa la capacidad de intercambio catiónico y la fertilidad ya que forma agregados que mejoran la estructura del suelo.', 1),
(2, 'Fertilizante 1 LT', 'Bayfolan', 1, 140, 'fertilizante2.webp', 'Bayfolan® Forte es una fórmula especial concentrada de nutrimentos que contiene vitaminas y fitohormonas; actúa estimulando los procesos metabólicos de las plantas, vigorizándolas al proporcionarles los nutrimentos indispensables para su buen desarrollo. La planta los aprovecha íntegramente y su efecto se manifiesta en cultivos vigorosos y cosechas más abundantes y de calidad. Bayfolan® Forte ayuda a resolver deficiencias de microelementos, frecuentes en zonas con aguas duras. Para optimizar los resultados del producto, aplíquelo cuando los cultivos están en etapas de desarrollo vegetativo o en producción intensiva.', 1),
(3, 'Semillas de Maíz 20 KG', 'Pioneer', 2, 250, 'semilla1.jpg', 'La semilla de maíz está contenida dentro de un fruto denominado cariópside; la capa externa que rodea este fruto corresponde al pericarpio, estructura que se sitúa por sobre la testa de la semilla. Esta última está conformada internamente por el endosperma y el embrión, el cual a su vez está constituido por la coleorriza, la radícula, la plúmula u hojas embrionarias, el coleoptilo y el escutelo o cotiledón.', 1),
(4, 'Semillas de Frijol 20 KG', 'All N1', 2, 250, 'semilla2.jpg', 'Los frijoles crecen en vainas color verde, conteniendo entre 4-6 semillas en cada una. Las semillas de frijol tienen una forma aproximada de media luna, su tamaño y color cambian de acuerdo a su variedad. Este cultivo puede crecer perfectamente en pleno sol o un poco de sombra en lugares muy cálidos.', 1),
(5, 'Fertilizante Urea 50 KG', 'Fertisa', 1, 1047, 'fertilizante3.jpg', 'Estimula Nutrientes complejos para liberarlos del suelo y Hacer que este disponible fácilmente para plantas. Aumenta la absorción de nutrientes a través de Las membranas de las raíces y hojas de las plantas. Reestructura el suelo en una pequeña forma de agregado para naturalmente airear el suelo. Elimina las capas y mejora las tasas de percolación. Estimula la actividad microbial para crear un suelo más activo y vivo. Limpia el suelo de las toxinas, tanto naturales como artificiales. Actua como un Tampón de humedad para reducir los extremos de demasiado o muy poca humedad.', 1),
(6, 'Fertilizante 5 KG', 'Gro Green', 1, 699, 'fertilizante4.webp', 'Sistema que consiste en suministrar por medio de aspersiones los principales nutrientes necesarios para lograr una nutrición oportuna en los momentos críticos del desarrollo de las plantas, corrigiendo la mayoría de las deficiencias y evitando caída de flores y frutos, fallas de maduración, etc. La acción del fertilizante foliar Fórmula 20-30-10, es extraordinariamente rápida y no se debe únicamente a la cantidad que cada fórmula contiene de cada elemento, sino al efecto sinérgico (de conjunto) de los elementos agrupados. Bastan unos cuantos kilos por hectárea o manzana y en menos de 72 horas los resultados empiezan a mostrarse.', 1),
(7, 'Fertilizante 25 KG', 'Novatec', 1, 930, 'fertilizante5.jpg', 'Los fertilizantes NovaTec contienen en su formulación la molécula DMPP (3-4 Dimetilpirazol fosfato), que retrasa la transformación del Nitrógeno Amoniacal (NH4+) a Nitrógeno Nítrico (NO3-) por la inhibición temporal de las bacterias nitrosomonas. Es un Fertilizante NPK monogránulo, lo que garantiza uniformidad en la distribución física de los nutrientes, mejorando la eficiencia de la aplicación. Al retardar el paso de Amonio a Nitrato, evita las pérdidas de nitrógeno por lixiviación y reduce fuertemente el efecto de acidificación de suelo.', 1),
(8, 'Fertilizante 25 KG', 'Ultrasol', 1, 1035, 'fertilizante6.jpg', 'NITRÓGENO 15% + FÓSFORO 30% + POTASIO 15%. P » Equilibrio 1-2-1. Composición: nitrógeno total 15%; fósforo 30%; potasio 15%; azufre 0.7% (S); magnesio 0.5%; boro 2,000 ppm; zinc 1,000 ppm. Conductividad 1.05 dS/m (1 g/l 20ºC); pH 5.85 (1g/L a 20ºC). Disolución sugerida 15%. Disolución máxima 25%. Fertilizante NPK con azufre y magnesio en forma de polvo soluble. Especialmente diseñado para aplicar durante las etapas de enraizamiento hasta el inicio de la floración; favoreciendo por tanto la estimulación de la biosíntesis de los tejidos radicales, la floración y cuajado. Para aplicar mediante riego por goteo, microaspersión y pivote.', 1),
(9, 'Semillas de Sorgo 20 KG', 'King Gold', 2, 1999, 'semilla3.jpg', 'El sorgo en sus diversas variedades se usa para consumo humano, tanto para alimentación como para elaboración de bebidas alcohólicas y para alimentación animal en la producción de forrajes o piensos. El tallo seco y las hojas de sorgo, en particular de las especies Sorghum bicolor y Sorghum vulgare var.', 1),
(11, 'Sanizante Sales Cuaternarias 1 LT', 'Fullgro', 3, 680, 'toxico1.jpg', 'FULL-GRO es un complejo bacteriostático, el cual es un poderoso aliado para el desarrollo de frutos de gran valor y gran calidad, mejorando además su vida de anaquel. Es un desinfectante y sanitizante, germicida de amplio espectro. Se puede utilizar como preventivo dentro de cualquier programa, ya sea al suelo o vía foliar. FULL-GRO es una combinación de sales cuaternarias de amonio de segunda y cuarta generación de doble cadena que potencializan su actividad bactericida, viricida, fungicida, alguicida, nematicida y sanitizante. Estos compuestos son generalmente los más eficaces contra bacterias en gamas alcalinas de pH. FULL-GRO es biodegradable en un periodo no mayor a 3 semanas, por lo que no causa daños a los seres vivos ni a la naturaleza.\r\n', 1),
(12, 'Herbicida Hierba Glifosato 1 LT', 'Faena', 3, 213, 'toxico2.jpg', 'GLIFOSATO 35.6%. CS » [35.6% en peso equivale a 363 g de i.a/L]. Los 356 g de i.a. proceden de Sal de potasio N-fosfonometil-glicina con una riqueza no menor del 81.61% de glifosato]. Herbicida sistémico, no selectivo, no residual, de amplio espectro presentado en forma de solución acuosa. Se aplica en postemergencia a la maleza, preferentemente cuando la hierba esté creciendo activamente. Actúa por traslocación a través del follaje obteniéndose resultados a los 3-7 días después de su aplicación.', 1),
(13, 'Fungicida 250 GR', 'Grow Depot', 3, 250, 'toxico3.jpg', 'TRICHOSPORE es un producto 100% orgánico que actúa como biofungicida, a base del hongo benéfico Trichoderma harzianum, el cual protege a la planta contra enfermedades causadas por hongos fitopatógenos gracias a sus diferentes mecanismos de control biológico. Además, actúa como promotor de crecimiento vegetal y produce hormonas reguladoras del crecimiento. Es un excelente preventivo de ataques de hongos en tus domos de clonación, solo diluye el producto en agua, aplícalo a tu medio de propagación y protege a tus clones. Recuerda que en alta humedad relativa la proliferación de hongos patógenos es mas rápido.', 1),
(14, 'Insecticida Cipermetrina 454 GR', 'Cynoff', 3, 1547, 'toxico4.jpg', 'Polvo ultra-micronizado que dura varias semanas controlando las plagas. El producto no mancha ni huele. Es un insecticida seguro para el ser humano y animales domesticos, y para su uso en zonas urbanas. Su ingrediente activo es cipermetrina. Actúa por contacto e ingestión. Cynoff® 40 WP es un insecticida piretroide de amplio espectro. Ideal para exteriores y superficies grasosas. No tiene olor.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_cliente`
--

DROP TABLE IF EXISTS `registro_cliente`;
CREATE TABLE IF NOT EXISTS `registro_cliente` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` char(60) NOT NULL,
  `nombre_usuario` varchar(35) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `codigo_postal` char(5) DEFAULT NULL,
  `ciudad` varchar(35) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `telefono` char(12) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_cliente`
--

INSERT INTO `registro_cliente` (`id`, `nombre`, `apellido`, `email`, `pass`, `nombre_usuario`, `direccion`, `codigo_postal`, `ciudad`, `estado`, `telefono`, `fecha_registro`) VALUES
(1, 'Bramdon Isay', 'Santiago Cardoso', 'bramdsantiago@gmail.com', '$2y$10$VRNm/ork/BdR1opN53I3Hu2IDC3RvTwBQi8dQTRHx1Wa29C9q4z.e', 'Bramdon Santiago', 'Manuel Villalongin #274', '58500', 'Puruándiro', 'Michoacán', '4381338561', '2020-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

DROP TABLE IF EXISTS `usuario_admin`;
CREATE TABLE IF NOT EXISTS `usuario_admin` (
  `usuario` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`usuario`, `password`) VALUES
('admin', 'admin1234');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_3` FOREIGN KEY (`id_numero_pedido`) REFERENCES `pedidos` (`numero_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `registro_cliente` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_estado_entrega`) REFERENCES `estado_entrega_pedido` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_producto` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_estado_inventario`) REFERENCES `estado_inventario_producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
