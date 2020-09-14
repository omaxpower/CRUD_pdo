-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2020 a las 06:20:57
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_insertarpdo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `descrip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fregis` date NOT NULL,
  `cod` int(200) NOT NULL,
  `proveedor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombres`, `descripcion`, `categoria`, `lugar`, `fregis`, `cod`, `proveedor`, `cantidad`) VALUES
(29, 'G9 turbo Timon', 'Control para juegos tipo timon', 'Accesorios', 'Peru', '2020-09-14', 1036, 'Panda SAC', 12),
(30, 'CPU Gamer', 'CPU GAMER LENOVO LEGION T730-28ICO – I7-9700K 3.6 GHZ', 'Computadoras', 'Brasil', '2020-09-14', 1025, 'Innova', 5),
(31, 'MONITOR AOC', 'E2070SWH 19.5″ LED VGA-HDMI', 'Monitores', 'Ecuador', '2020-09-14', 202, 'Asterix EIRL', 30),
(32, 'SERVIDOR DELL', 'PowerEdge T30, : Intel® Xeon™ E3-1225 v5 Velocidad de reloj : 3.30 GHz Caché : 8MB Núcleos : 4', 'Servidores', 'Brasil', '2020-09-14', 366, 'Innova', 1),
(33, 'Tablet Lenovo', 'ab M7 Tb-7305x 7´´ Ips, 1gb, 16gb, Sim Car', 'Tabletas', 'Peru', '2020-09-14', 15669, 'DELL Peru', 4),
(34, 'SILLA GAMING', 'MARVO CH-301 SCORPION VERDE', 'Accesorios', 'EEUU', '2020-09-14', 2344, 'TechSport SAC', 12),
(35, 'Computadoras Vostro', 'Conozca la familia Vostro, rendimiento confiable y un valor excepcional', 'Computadoras', 'EEUU', '2020-09-14', 2536, 'DELL', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
