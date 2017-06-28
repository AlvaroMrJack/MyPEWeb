-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2017 a las 21:12:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mypeweb_empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_admin`
--

CREATE TABLE `mypeweb_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_user` varchar(45) DEFAULT NULL COMMENT 'Credecial de acceso',
  `adm_pass` varchar(45) DEFAULT NULL COMMENT 'Clave de acceso al sistema, debe estar encryptada \nen algoritmo sha1',
  `adm_name` varchar(100) DEFAULT NULL COMMENT 'Nombre completo del administrador\n',
  `adm_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mypeweb_admin`
--

INSERT INTO `mypeweb_admin` (`adm_id`, `adm_user`, `adm_pass`, `adm_name`, `adm_photo`) VALUES
(3, 'carlos', 'b675997f81911372c62b7efe6405cf1d3ee23af8', 'Carlos Rojas', '.PNG'),
(4, 'nicolas', '12345', 'pepe', '.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_category`
--

CREATE TABLE `mypeweb_category` (
  `cat_id` int(11) NOT NULL COMMENT 'Clave primaria de tabla',
  `cat_name` varchar(60) NOT NULL COMMENT '''Nombre asignado a una categoríaa''',
  `cat_parent` int(11) DEFAULT NULL COMMENT 'FK intrínseca y recursiva hace referenci al padre de la categoría',
  `cat_status` tinyint(4) NOT NULL COMMENT '0:  inactiva 1: Activa',
  `cat_position` tinyint(4) NOT NULL COMMENT 'Orden asignado en vista para categoría'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las categorías & subcategorías de producto';

--
-- Volcado de datos para la tabla `mypeweb_category`
--

INSERT INTO `mypeweb_category` (`cat_id`, `cat_name`, `cat_parent`, `cat_status`, `cat_position`) VALUES
(1, 'Categoria 1', NULL, 1, 1),
(2, 'Subcategoria 1', 1, 1, 2),
(3, 'Categoria 2', NULL, 1, 3),
(4, 'Subcategoria 2', 3, 1, 4),
(5, 'Subcategoria 3', 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_configuration`
--

CREATE TABLE `mypeweb_configuration` (
  `con_id` int(11) NOT NULL COMMENT 'Pk de tabla',
  `con_phonenumber` varchar(45) NOT NULL COMMENT '''Números de contacto del empresario''\n',
  `con_email` varchar(45) DEFAULT NULL COMMENT '''Email de contacto de los empresarios''',
  `con_background` varchar(20) NOT NULL COMMENT '''Color de fondo''',
  `con_footer` varchar(20) NOT NULL,
  `con_navbar` varchar(20) NOT NULL COMMENT '''Colo de fondo navbar''',
  `con_logo` varchar(100) DEFAULT NULL COMMENT '''Path para la marca de empresa''',
  `con_video` varchar(200) DEFAULT NULL COMMENT '''Url o path a video corporativo''',
  `con_nombrefantasia` varchar(100) NOT NULL COMMENT 'Nombre de fantasía de la empresa\n',
  `con_fontcolor` varchar(20) DEFAULT NULL COMMENT '''Color de fuente principal''',
  `con_fontstyle` varchar(20) DEFAULT NULL COMMENT 'Estilo de funte principal',
  `con_fontsize` tinyint(4) DEFAULT NULL COMMENT 'Tamaño de fuente principal',
  `con_status` tinyint(4) NOT NULL COMMENT '0:  Inactico 1: Activo',
  `con_banner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la configuración base de la página comepleta\n';

--
-- Volcado de datos para la tabla `mypeweb_configuration`
--

INSERT INTO `mypeweb_configuration` (`con_id`, `con_phonenumber`, `con_email`, `con_background`, `con_footer`, `con_navbar`, `con_logo`, `con_video`, `con_nombrefantasia`, `con_fontcolor`, `con_fontstyle`, `con_fontsize`, `con_status`, `con_banner`) VALUES
(1, '79024123', '', '#ffc400', '#0000ff', '#000080', 'Gabo.png', '', 'Gabo', '#0080c0', 'Times New Roman', 18, 1, 'banner.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_customer`
--

CREATE TABLE `mypeweb_customer` (
  `cus_id` int(11) NOT NULL COMMENT 'Pk de tabla',
  `cus_name` varchar(100) NOT NULL COMMENT 'Nombre de cliente suscrito',
  `cus_email` varchar(150) NOT NULL COMMENT 'Email de suscripción',
  `cus_phonenumber` varchar(20) DEFAULT NULL COMMENT 'Número de contacto',
  `cus_datesystem` datetime NOT NULL COMMENT 'Fecha de sistema que registra el día y la hora de subscripción\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Clientes suscritos\n';

--
-- Volcado de datos para la tabla `mypeweb_customer`
--

INSERT INTO `mypeweb_customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phonenumber`, `cus_datesystem`) VALUES
(1, 'Carlos Rojas', 'carlos.rojasm96@gmail.com', '948452833', '2017-06-15 00:00:00'),
(2, 'Gabriel Vega', 'gabo@gmail.com', '485858585', '2017-06-14 05:00:00'),
(3, 'Nicolas Ettlinger', 'nicolas@gmail.com', '6569685', '2017-06-12 08:00:00'),
(4, 'Benjamin Ayala', 'benjamin@gmail.com', '55255845', '2017-06-01 00:00:00'),
(5, 'Tiare Bravo', 'tiarebravo@gmail.com', '86234117', '2017-06-02 03:20:32'),
(23, 'nombre admin elección', 'correo@dominio.cl', '58585425', '2017-06-19 15:02:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_empresa`
--

CREATE TABLE `mypeweb_empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_mision` varchar(300) NOT NULL,
  `emp_vision` varchar(300) NOT NULL,
  `emp_objetivo` varchar(300) NOT NULL,
  `emp_descripcion` varchar(200) NOT NULL,
  `emp_estado` int(11) NOT NULL COMMENT '0: inactivo 1:activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mypeweb_empresa`
--

INSERT INTO `mypeweb_empresa` (`emp_id`, `emp_mision`, `emp_vision`, `emp_objetivo`, `emp_descripcion`, `emp_estado`) VALUES
(1, 'Esta es la misión de la empresa.', 'Esta es la visión de la empresa.', 'Este es el objetivo de la empresa.', 'Esta es la descripción de la empresa.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_multimedia`
--

CREATE TABLE `mypeweb_multimedia` (
  `mul_pro_id` int(11) NOT NULL COMMENT 'Fk de product',
  `mul_id` int(11) NOT NULL,
  `mul_name` varchar(200) NOT NULL COMMENT '''Nombre asignado al elemento''',
  `mul_route` varchar(300) NOT NULL COMMENT '''Path de elemento''',
  `mul_position` tinyint(4) NOT NULL COMMENT 'Posición asignada al elemento',
  `mul_status` tinyint(4) NOT NULL COMMENT '0 :  inactiva 1: activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mypeweb_multimedia`
--

INSERT INTO `mypeweb_multimedia` (`mul_pro_id`, `mul_id`, `mul_name`, `mul_route`, `mul_position`, `mul_status`) VALUES
(1, 1, 'foto', 'ave.jpg', 1, 1),
(2, 2, 'caballo', 'caballo.jpg', 1, 1),
(3, 4, 'copihue', 'copihue.jpg', 1, 1),
(1, 5, 'ave1', 'ave1.jpg', 1, 1),
(1, 6, 'ave2', 'ave2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_newsletter`
--

CREATE TABLE `mypeweb_newsletter` (
  `new_id` int(11) NOT NULL COMMENT 'Pk de tabla',
  `new_subject` varchar(100) NOT NULL COMMENT ' Asunto de mail\n',
  `new_text` text NOT NULL COMMENT 'Texto de correo o mailing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Mailing o información para clientes\n';

--
-- Volcado de datos para la tabla `mypeweb_newsletter`
--

INSERT INTO `mypeweb_newsletter` (`new_id`, `new_subject`, `new_text`) VALUES
(1, 'Mal Servicio', 'Este es un servicio cochino'),
(2, 'Enojado', 'Mal servicio'),
(3, 'Hola', 'Prueba'),
(5, 'Correo Cuatro', 'Buena tio'),
(6, 'Correo cinco', 'Wena choro'),
(7, 'Buen Servicio', 'Holahola'),
(8, 'Excelente servicio', 'hodsasdadsajkdsa'),
(24, 'Re:Hola', 'Re:Prueba\r\nEstimado(a): Nicolas Ettlinger\r\n'),
(25, 'Re:Enojado', 'Re:Mal servicio\r\nEstimado(a): Gabriel Vega\r\n'),
(26, 'Re:Enojado', 'Re:Mal servicio\r\nEstimado(a): Gabriel Vega\r\n'),
(27, 'Re:Enojado', 'Re:Mal servicio\r\nEstimado(a): Gabriel Vega\r\n'),
(28, 'Re:Hola', 'Re:Prueba\r\nEstimado(a): Nicolas Ettlinger\r\n'),
(30, 'Re:Hola', 'Re:Prueba\r\nEstimado(a): Nicolas Ettlinger\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_newslog`
--

CREATE TABLE `mypeweb_newslog` (
  `log_id` int(11) NOT NULL,
  `log_datesystem` datetime DEFAULT NULL COMMENT 'Registro de envío de mensaje',
  `log_cus_id` int(11) NOT NULL COMMENT 'Fk de tabla customer',
  `log_new_id` int(11) NOT NULL COMMENT 'Fk de tabla newletter\n',
  `log_type` int(11) NOT NULL,
  `log_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registgro de envío de mensajes';

--
-- Volcado de datos para la tabla `mypeweb_newslog`
--

INSERT INTO `mypeweb_newslog` (`log_id`, `log_datesystem`, `log_cus_id`, `log_new_id`, `log_type`, `log_state`) VALUES
(1, '2017-06-13 00:00:00', 1, 1, 1, 1),
(14, '2017-06-01 00:00:00', 2, 2, 1, 1),
(17, '2017-06-13 00:00:00', 3, 3, 1, 2),
(32, '2017-06-19 00:34:29', 23, 30, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mypeweb_product`
--

CREATE TABLE `mypeweb_product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL COMMENT 'Nombre de elemento',
  `pro_subtitle` varchar(200) DEFAULT NULL COMMENT 'Información segundaria de elemento',
  `pro_description` text NOT NULL COMMENT 'Descripción de elemento',
  `pro_price` decimal(10,2) NOT NULL COMMENT 'Precio real de producto\n',
  `pro_currency` varchar(4) NOT NULL COMMENT 'Tipo de moneda del producto',
  `pro_position` tinyint(4) DEFAULT NULL COMMENT 'Posición asignada al elemento',
  `pro_status` tinyint(4) NOT NULL COMMENT '0: Inactico 1:Activo',
  `pro_cat_id` int(11) NOT NULL COMMENT 'Fk , Categoría a la que pertence el producto\n',
  `pro_discount` decimal(10,2) DEFAULT NULL COMMENT 'Monto de descuento\n',
  `pro_total` decimal(10,2) DEFAULT NULL COMMENT 'Precio con descuento aplicado\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena productos o servicios de una empresa\n';

--
-- Volcado de datos para la tabla `mypeweb_product`
--

INSERT INTO `mypeweb_product` (`pro_id`, `pro_name`, `pro_subtitle`, `pro_description`, `pro_price`, `pro_currency`, `pro_position`, `pro_status`, `pro_cat_id`, `pro_discount`, `pro_total`) VALUES
(1, 'Aves de madera', 'Ave de madera tamaño mediano', 'Aves de madera talladas en madera de roble a mano.', '30.00', 'CLP', 1, 1, 1, '10.00', '2700.00'),
(2, 'Caballo de madera', 'Caballo tallado en madera', 'Cabeza de caballo tallada en madera a tamaño real.', '50.00', 'CLP', 1, 1, 2, '0.00', '50000.00'),
(3, 'Copihue Chileno', 'Copihue Chileno de cobre', 'Copihue Chileno hecho en cobre y forjado a mano', '30.00', 'CLP', 1, 1, 2, '0.00', '30.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `red_id` int(11) NOT NULL,
  `red_nom` varchar(80) NOT NULL,
  `red_tip` varchar(30) NOT NULL,
  `red_url` varchar(200) NOT NULL,
  `red_ico` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`red_id`, `red_nom`, `red_tip`, `red_url`, `red_ico`) VALUES
(1, 'Facebook', '', 'www.lala.com', 'fa fa-facebook'),
(2, 'Google+', '', 'rew', 'fa fa-google');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_nom` varchar(200) NOT NULL,
  `team_desc` text NOT NULL,
  `team_cargo` varchar(30) NOT NULL,
  `team_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`team_id`, `team_nom`, `team_desc`, `team_cargo`, `team_foto`) VALUES
(3, 'Carlos', 'Encargado de hacer que todo funcione', 'Jefe', 'c.png'),
(4, 'Ana', 'Encargada del dinero de la empresa', 'Contadora', 'a.png'),
(5, 'Berta', 'Encargada de hacer los productos', 'Trabajadora', 'b.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mypeweb_admin`
--
ALTER TABLE `mypeweb_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indices de la tabla `mypeweb_category`
--
ALTER TABLE `mypeweb_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `mypeweb_configuration`
--
ALTER TABLE `mypeweb_configuration`
  ADD PRIMARY KEY (`con_id`);

--
-- Indices de la tabla `mypeweb_customer`
--
ALTER TABLE `mypeweb_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indices de la tabla `mypeweb_empresa`
--
ALTER TABLE `mypeweb_empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `mypeweb_multimedia`
--
ALTER TABLE `mypeweb_multimedia`
  ADD PRIMARY KEY (`mul_id`);

--
-- Indices de la tabla `mypeweb_newsletter`
--
ALTER TABLE `mypeweb_newsletter`
  ADD PRIMARY KEY (`new_id`);

--
-- Indices de la tabla `mypeweb_newslog`
--
ALTER TABLE `mypeweb_newslog`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_cus_id` (`log_cus_id`),
  ADD KEY `log_new_id` (`log_new_id`);

--
-- Indices de la tabla `mypeweb_product`
--
ALTER TABLE `mypeweb_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`red_id`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mypeweb_admin`
--
ALTER TABLE `mypeweb_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mypeweb_category`
--
ALTER TABLE `mypeweb_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de tabla', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `mypeweb_configuration`
--
ALTER TABLE `mypeweb_configuration`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Pk de tabla', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mypeweb_customer`
--
ALTER TABLE `mypeweb_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Pk de tabla', AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `mypeweb_empresa`
--
ALTER TABLE `mypeweb_empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mypeweb_multimedia`
--
ALTER TABLE `mypeweb_multimedia`
  MODIFY `mul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `mypeweb_newsletter`
--
ALTER TABLE `mypeweb_newsletter`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Pk de tabla', AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `mypeweb_newslog`
--
ALTER TABLE `mypeweb_newslog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `mypeweb_product`
--
ALTER TABLE `mypeweb_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `red_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mypeweb_newslog`
--
ALTER TABLE `mypeweb_newslog`
  ADD CONSTRAINT `mypeweb_newslog_ibfk_1` FOREIGN KEY (`log_cus_id`) REFERENCES `mypeweb_customer` (`cus_id`),
  ADD CONSTRAINT `mypeweb_newslog_ibfk_2` FOREIGN KEY (`log_new_id`) REFERENCES `mypeweb_newsletter` (`new_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
