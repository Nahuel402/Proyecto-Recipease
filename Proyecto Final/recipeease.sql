-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 11:21:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recipeease`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta favorita`
--

CREATE TABLE `receta favorita` (
  `ID` int(11) NOT NULL,
  `Id-usuario` int(11) NOT NULL,
  `NombreReceta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas recientes`
--

CREATE TABLE `recetas recientes` (
  `Id` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `NomReceta` text NOT NULL,
  `Receta` varchar(500) NOT NULL,
  `Ingredientes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recetas recientes`
--

INSERT INTO `recetas recientes` (`Id`, `Id_usuario`, `NomReceta`, `Receta`, `Ingredientes`) VALUES
(1, 1, 'Pollo al horno sencillo', '<li>Precalienta el horno a 200 grados Celsius.</li><li>Mientras el horno se calienta, prepara el pollo. Si es necesario, límpialo y luego sécalo con toallas de papel. </li><li>Coloca el pollo en una bandeja para asar.</li><li>Hornea el pollo durante aproximadamente 1-5 horas, o hasta que la temperat', '<li>- Pollo</li>'),
(2, 1, 'Pollo Empanizado', '<li>Primero, bate el huevo en un tazón aparte.</li><li>Luego, cubre el pollo con el huevo batido.</li><li>Después, cubre el pollo con el pan rayado asegurando que quede bien cubierto.</li><li>Finalmente, fríe el pollo en una sartén caliente hasta que esté bien dorado y cocido. El tiempo dependerá de', '<li>Pollo</li><li>Pan rayado</li><li>Huevo</li>'),
(3, 1, 'Pollo al Horno Simple', '<li>Precalienta el horno a 180 grados Celsius.</li><li>Lava el pollo y seca con toallas de papel.</li><li>Pon el pollo en una bandeja para hornear.</li><li>Hornea el pollo durante 1 a 2 horas, o hasta que la temperatura interna llegue a 75 grados Celsius.</li><li>Deja que el pollo descanse durante 1', '<li>- Pollo</li>'),
(4, 1, 'Pollo Simple a la Plancha', '<li>Calentar una plancha o sartén grande a fuego medio-alto.</li><li>Sazona el pollo con sal y pimienta al gusto (si se dispone de ella).</li><li>Coloca el pollo en la plancha o sartén, dorándolo durante unos 7-8 minutos de cada lado o hasta que esté completamente cocido.</li><li>Sirve caliente.</li', '<li>Pollo</li>'),
(5, 1, 'Pollo a la plancha', '<li>Precalentar la sartén a fuego medio.</li><li>Colocar el pollo en la sartén y cocinar durante unos 7-10 minutos por cada lado, o hasta que se haya cocido completamente. </li><li>Retirar el pollo de la sartén y dejar reposar unos minutos antes de servir. </li><li></li><li>Nota: Esta es una versión', '<li>- Pollo</li>'),
(6, 1, 'Chuletas de Ajo', '<li>Pelar los dientes de ajo y picarlos finamente. </li><li>Calentar una sartén a fuego medio-alto. </li><li>Agregar las chuletas a la sartén y cocinar cada lado durante 5-7 minutos. </li><li>Esparcir el ajo picado sobre las chuletas y cocinar durante un minuto adicional para que el ajo desprenda to', '<li>- Chuletas</li><li>- Ajo</li>'),
(7, 1, 'Pollo Asado Simple', '<li>Precalienta el horno a 200 grados Celsius.</li><li>Coloca el pollo en una bandeja para hornear.</li><li>Hornea durante 1-1:30 horas o hasta que el pollo esté dorado y completamente cocido. Según el tamaño del pollo puede variar el tiempo.</li><li>Retira del horno y deja reposar durante 10 minuto', '<li>- Pollo</li>'),
(8, 1, 'Chuletas de Cerdo a la Mayonesa', '<li>Precalienta la sartén a fuego medio.</li><li>Cocina las chuletas de cerdo hasta que estén doradas y completamente cocidas.</li><li>Sirve las chuletas de cerdo y cubre cada una con una capa de mayonesa.</li><li>Nota: Esta es una receta simplificada y puede que no sea del todo típica. Las chuletas', '<li>- Chuletas de cerdo</li><li>- Mayonesa</li>'),
(9, 1, 'Pollo Simple a la Parrilla', '<li>Precalienta la parrilla a fuego medio.</li><li>Coloca el pollo en la parrilla.</li><li>Deja que el pollo se cocine durante unos 30 minutos, volteándolo de vez en cuando.</li><li>Asegúrate de que el pollo esté bien cocido antes de retirarlo de la parrilla. Si tienes un termómetro para carnes, el ', '<li>- Pollo.</li>'),
(10, 1, 'Pollo Sencillo Asado', '<li>Precalienta el horno a 200°C.</li><li>Coloca el pollo en una bandeja para asar.</li><li>Asegurate de que el pollo esté limpio y seco.</li><li>Asa el pollo en el horno durante 1:30 hora o hasta que esté bien cocido (tienes que asegurarte de que no esté crudo en absoluto en el interior).</li><li>R', '<li>- Pollo</li>'),
(11, 1, 'Arroz con Pollo', '<li>Coloca el pollo en una sartén caliente y sofrie hasta que estén dorados en ambos lados.</li><li>Añade el arroz a la sartén y cúbrelo con agua.</li><li>Cocina a fuego medio hasta que el arroz esté bien cocido y el pollo esté completamente hecho.</li><li>Añade sal o azúcar a gusto.</li><li>Sirve c', '<li>- Pollo</li><li>- Arroz</li>'),
(12, 1, 'Pollo Revuelto con Huevos', '<li>Cocina el pollo en una sartén caliente hasta que esté completamente cocido. Remueve el pollo y déjalo a un lado para que se enfríe.</li><li>Mientras el pollo se enfría, bate los dos huevos en un tazón hasta que estén bien mezclados.</li><li>Añade los huevos batidos a la sartén y cocina a fuego m', '<li>Pollo</li><li>2 Huevos</li>'),
(13, 1, 'Pollo Rostizado con Papas', '<li>Precaliente el horno a 200°C.</li><li></li><li>Coloca el pollo en una bandeja de horno. Agrega sal al gusto.</li><li></li><li>Lava y seca las papitas.</li><li></li><li>Dispone las papitas alrededor del pollo en la bandeja del horno.</li><li></li><li>Rostiza en el horno durante aproximadamente un', '<li>- Pollo</li><li>- Papitas</li>'),
(14, 1, 'Ensalada de Calamar y Choclo', '<li>Cocina los tentáculos de calamar en una sartén caliente hasta que estén dorados y crujientes. </li><li>Cocina el choclo en agua hirviendo hasta que esté tierno. </li><li>Combina el calamar y el choclo en un plato.</li><li>Agrega sal y azúcar a gusto antes de servir. Puedes guardar en la nevera p', '<li>Tentáculos de calamar</li><li>Choclo</li>'),
(15, 1, 'Arroz con Pollo', '<li>Cocina el pollo en una sartén hasta que esté bien hecho y dorado.</li><li>En otra olla, cocina el arroz según las instrucciones del paquete.</li><li>Cuando ambos estén listos, mezcla el pollo con el arroz. Agrega sal a gusto.</li><li>Sirve caliente.</li>', '<li>- Pollo</li><li>- Arroz</li>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(125) NOT NULL,
  `Nombre` varchar(125) NOT NULL,
  `Email` varchar(125) NOT NULL,
  `Imagen` varchar(125) NOT NULL,
  `Contra` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Email`, `Imagen`, `Contra`) VALUES
(1, 'carmelo', 'carmelo@gmail.com', 'Array', 'caca');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `receta favorita`
--
ALTER TABLE `receta favorita`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `recetas recientes`
--
ALTER TABLE `recetas recientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recetas recientes`
--
ALTER TABLE `recetas recientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
