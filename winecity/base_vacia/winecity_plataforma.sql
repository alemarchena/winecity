-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-01-2019 a las 17:10:47
-- Versión del servidor: 5.6.32-78.1
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `winecity_plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendados`
--

CREATE TABLE `agendados` (
  `id_agendado` int(11) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  `id_consumision` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_contactobodega` int(11) NOT NULL,
  `id_estadoagendado` int(11) NOT NULL,
  `fechaagendado` date NOT NULL,
  `horaagendado` time NOT NULL,
  `fechahoraoperativa` datetime NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `observaciones` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `infoultimoemail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `infoultimoemailbodega` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id_bodega` int(11) NOT NULL,
  `nombre_bodega` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_bodega` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email_bodega` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegascontactos`
--

CREATE TABLE `bodegascontactos` (
  `id_contactobodega` int(11) NOT NULL,
  `nombrecontactobodega` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombrecliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emailcliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idpais` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumisiones`
--

CREATE TABLE `consumisiones` (
  `id_consumision` int(11) NOT NULL,
  `nombreconsumision` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosagendados`
--

CREATE TABLE `estadosagendados` (
  `id_estadoagendado` int(11) NOT NULL,
  `nombreestado` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estadosagendados`
--

INSERT INTO `estadosagendados` (`id_estadoagendado`, `nombreestado`) VALUES
(1, 'Pendiente'),
(2, 'Confirmado'),
(3, 'Disponible'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL,
  `nombrehotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrosemail`
--

CREATE TABLE `parametrosemail` (
  `titulocliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulocliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuerpocliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `titulobodega` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulobodega` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuerpobodega` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idioma` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `emailcopia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parametrosemail`
--

INSERT INTO `parametrosemail` (`titulocliente`, `subtitulocliente`, `cuerpocliente`, `titulobodega`, `subtitulobodega`, `cuerpobodega`, `idioma`, `emailcopia`) VALUES
('Estimado pasajero.', 'No responda este mensaje dado que es automÃ¡tico.', 'Queremos informarle acerca  del estado de la reserva y los datos necesarios para que tenga en cuenta al momento de arribar nuestra querida ciudad de Mendoza - Argentina.', 'Solicitud Reserva Wine City', 'Responsable Walter Galimberti 261 633-9555.', 'Por favor necesito una reserva segÃºn los siguientes datos:', 'espaniol', 'wgalimberti@winecity.com.ar'),
('Dear passenger', 'Do not respond to this message as it is a', 'We want to inform you about the status of the reservation and the necessary information to take into account when arriving in our beloved city of Mendoza - Argentina.', '', '', '', 'ingles', ''),
('Caro passageiro', 'NÃ£o responda a esta mensagem, pois Ã© automÃ¡tica', 'Queremos informÃ¡-lo sobre o status da reserva e as informaÃ§Ãµes necessÃ¡rias para levar em conta ao chegar em nossa querida cidade de Mendoza - Argentina.', '', '', '', 'portugues', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombreservicio` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clave_usuario` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `clave_usuario`, `token`) VALUES
(1, 'alemarchena', 'alemarchena@gmail.com', 'aaa', ''),
(2, 'Wine city', 'wgalimberti@winecity.com.ar', 'Beltran0', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendados`
--
ALTER TABLE `agendados`
  ADD PRIMARY KEY (`id_agendado`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `bodegascontactos`
--
ALTER TABLE `bodegascontactos`
  ADD PRIMARY KEY (`id_contactobodega`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `consumisiones`
--
ALTER TABLE `consumisiones`
  ADD PRIMARY KEY (`id_consumision`);

--
-- Indices de la tabla `estadosagendados`
--
ALTER TABLE `estadosagendados`
  ADD PRIMARY KEY (`id_estadoagendado`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendados`
--
ALTER TABLE `agendados`
  MODIFY `id_agendado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bodegascontactos`
--
ALTER TABLE `bodegascontactos`
  MODIFY `id_contactobodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consumisiones`
--
ALTER TABLE `consumisiones`
  MODIFY `id_consumision` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadosagendados`
--
ALTER TABLE `estadosagendados`
  MODIFY `id_estadoagendado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
