-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 23:12:25
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
  `Id_receta` int(150) NOT NULL,
  `Id_usuario` int(150) NOT NULL,
  `NomReceta` text NOT NULL,
  `Receta` varchar(500) NOT NULL,
  `Ingredientes` varchar(300) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas recientes`
--

CREATE TABLE `recetas recientes` (
  `Id` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `NomReceta` text NOT NULL,
  `Receta` varchar(500) NOT NULL,
  `Ingredientes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(125) NOT NULL,
  `Nombre` varchar(125) NOT NULL,
  `Email` varchar(125) NOT NULL,
  `Imagen` varchar(125) NOT NULL,
  `Contra` varchar(125) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Email`, `Imagen`, `Contra`, `role`) VALUES
(1, 'carmelo', 'carmelo@gmail.com', '../assets/images/default.png', 'caca', 'admin'),
(4, 'Eze', 'eze@gmail.com', '../assets/images/default.png', '123', 'usuario'),
(6, 'Choco', 'choco@gmail.com', '../assets/images/default.png', '123', 'usuario'),
(7, 'Tomás', 'tomi.roca06@gmail.com', '../assets/images/default.png', 'H0la', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `receta favorita`
--
ALTER TABLE `receta favorita`
  ADD PRIMARY KEY (`Id_receta`);

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
-- AUTO_INCREMENT de la tabla `receta favorita`
--
ALTER TABLE `receta favorita`
  MODIFY `Id_receta` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `recetas recientes`
--
ALTER TABLE `recetas recientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
