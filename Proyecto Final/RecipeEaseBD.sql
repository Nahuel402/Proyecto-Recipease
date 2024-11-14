-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 05:00:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

--
-- Volcado de datos para la tabla `receta favorita`
--

INSERT INTO `receta favorita` (`Id_receta`, `Id_usuario`, `NomReceta`, `Receta`, `Ingredientes`, `fecha`) VALUES
(10, 7, '\"Tortilla de Verduras\"', '<li>Lava y pela las zanahorias y la cebolla, pica todo en juliana (tiras finitas). Lava los pimientos, quita las semillas y corta en tiras del mismo tamaño que las zanahorias y la cebolla.</li><li>En una sartén grande, calienta un buen chorro de aceite de oliva a fuego medio. Cuando esté caliente, agregar las verduras picadas. Cocina lentamente hasta que las verduras estén blandas y la cebolla esté transparente.</li><li>Mientras se cocinan las verduras, bate los huevos en un bol y agrega sal al ', '<li>- 5 huevos</li><li>- 2 zanahorias</li><li>- 1 pimiento verde</li><li>- 1 pimiento rojo</li><li>-', '2024-10-23'),
(19, 11, '\"Pastel de Zanahoria con Caramelo al Horno\"', '<li>Precalienta el horno a 180°C.</li><li>En un bol, mezcla la harina, el azúcar, la canela, el bicarbonato y la sal.</li><li>Agrega los huevos y el aceite. Mezcla bien.  </li><li>Agrega las zanahorias y las nueces. Combina bien todos los ingredientes.</li><li>Hornea durante 35-40 minutos, o hasta que un palillo insertado en el centro del pastel salga limpio.</li><li>Para hacer el caramelo, combina el azúcar y el agua en una cacerola a fuego medio. Remueve hasta que el azúcar se disuelva.</li><l', '<li>2 tazas de harina</li><li>2 tazas de azúcar</li><li>4 huevos</li><li>2 tazas de zanahoria rallad', '2024-11-12');

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

--
-- Volcado de datos para la tabla `recetas recientes`
--

INSERT INTO `recetas recientes` (`Id`, `Id_usuario`, `fecha`, `NomReceta`, `Receta`, `Ingredientes`) VALUES
(1, 8, '2024-10-23', '\"Sandwich de Queso y Jamón\"', '<li>Coloca una rebanada de jamón y queso entre las dos rebanadas de pan.</li><li>Tuesta tu sandwich en un tostador o en el horno hasta que el queso se derrita y el pan esté dorado.</li><li>Espera a que se enfríe un poco antes de comer.</li><li> </li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Mostaza]</li><li>[Agregar Lechuga]</li><li>[Agregar Tomate]</li>', '<li>2 rebanadas de pan</li><li>50 gramos de queso</li><li>2 rebanadas de jamón</li>'),
(2, 8, '2024-10-23', '\"Sandwich de Jamón y Queso con Lechuga\"', '<li>Tosta el pan hasta que esté dorado.</li><li>Coloca el queso y el jamón sobre el pan tostado.</li><li>Agrega la lechuga fresca encima.</li><li>Dobla el pan por la mitad y sirve.</li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Mayonesa]</li><li>[Agregar Mostaza]</li>', '<li>1 rebanada de pan</li><li>Queso al gusto</li><li>1 tira de Jamón</li><li>Lechuga al gusto</li>'),
(3, 8, '2024-10-23', '\"Sandwich de queso y jamón con aderezo opcional\"', '<li>Toma una rebanada de pan y coloca encima el queso seguido del jamón.</li><li>Coloca la otra rebanada de pan encima.</li><li>Si tienes una sandwichera, puedes calentar el sándwich hasta que el queso se derrita. Si no, también puedes hacerlo en una sartén tapada a fuego lento.</li><li>Una vez que el queso esté derretido, tu sándwich estará listo para servir.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Lechuga]</li><li>[Mayonesa]</li>', '<li>2 rebanadas de pan</li><li>100g de queso</li><li>100g de jamón</li>'),
(4, 8, '2024-10-23', '\"Arroz con Pollo\"', '<li>Cocina el pollo en una sartén con un poco de aceite hasta que esté bien dorado.</li><li>Cocina el arroz en otra olla con agua hirviendo y una pizca de sal.</li><li>Cuando estén listos, mezcla el pollo y el arroz.</li><li>Sirve caliente.</li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Guisantes]</li><li>[Agregar Zanahoria]</li><li>[Agregar Pimientos]</li><li>[Agregar Cilantro]</li><li>[Agregar Soja]</li>', '<li>1 pechuga de pollo</li><li>1 taza de arroz</li>'),
(5, 7, '2024-10-23', '\"Sandwich de Jamón Clásico\"', '<li>Tuesta las rebanadas de pan hasta que estén doradas.</li><li>Coloca las lonchas de jamón dentro del pan tostado.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Mantequilla]</li><li>[Agregar Queso]</li><li>[Agregar Hojas de Lechuga]</li><li>[Agregar Rodajas de Tomate]</li>', '<li>2 rebanadas de pan</li><li>4 lonchas de jamón</li>'),
(6, 7, '2024-10-23', '\"Bombones de Chocolate Caseros\"', '<li>Derrite el chocolate a baño maría.</li><li>Agrega el azúcar al chocolate derretido y mezcla bien.</li><li>Coloca la mezcla en moldes pequeños de silicona.</li><li>Refrigerar durante al menos 2 horas hasta que los bombones estén firmes.</li><li>Retira los bombones de los moldes.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Leche Condensada]</li><li>[Agregar Extracto de Vainilla]</li><li>[Agregar Frutos Secos]</li>', '<li>200g de chocolate </li><li>100g de azúcar</li>'),
(7, 7, '2024-10-23', '\"Tortitas de limón\"', '<li>Mezcla la harina, el jugo de limón, el azúcar y la sal en un tazón hasta obtener una masa homogénea.</li><li>Calienta un sartén antiadherente a fuego medio.</li><li>Dales forma a las tortitas y cocínalas por ambos lados hasta que estén doradas.</li><li>Sirve caliente.</li><li>Ingredientes opcionales:</li><li></li><li>[Agregar ralladura de limón]</li><li>[Agregar crema batida]</li><li>[Agregar sirope de arce]</li>', '<li>4 tazas de harina</li><li>1 taza de jugo de limón</li><li>1/2 taza de azúcar</li><li>Una pizca d'),
(9, 7, '2024-10-23', '\"Receta de pollo a la parrilla\"', '<li>Prepara la parrilla y precaliéntala a temperatura media-alta. </li><li>Mientras la parrilla se calienta, prepara el pollo para la parrilla. Limpia el pollo por dentro y por fuera, luego seca con papel toalla.</li><li>Coloca el pollo en la parrilla y cocina durante unos 20-25 minutos por lado, o hasta que el pollo esté bien cocido y los jugos salgan claros.</li><li>Cuando el pollo esté listo, retíralo de la parrilla y déjalo reposar durante unos minutos antes de servir. </li><li></li><li>Ingr', '<li>- 1 pollo entero</li>'),
(10, 7, '2024-10-23', '\"Tortilla de Verduras\"', '<li>Lava y pela las zanahorias y la cebolla, pica todo en juliana (tiras finitas). Lava los pimientos, quita las semillas y corta en tiras del mismo tamaño que las zanahorias y la cebolla.</li><li>En una sartén grande, calienta un buen chorro de aceite de oliva a fuego medio. Cuando esté caliente, agregar las verduras picadas. Cocina lentamente hasta que las verduras estén blandas y la cebolla esté transparente.</li><li>Mientras se cocinan las verduras, bate los huevos en un bol y agrega sal al ', '<li>- 5 huevos</li><li>- 2 zanahorias</li><li>- 1 pimiento verde</li><li>- 1 pimiento rojo</li><li>-'),
(11, 7, '2024-10-23', '\"Chow Mein de Pollo\"', '<li>Corta el pollo en tiras y sazónalo con sal y pimienta.</li><li>Pela y corta en tiras la zanahoria, los pimientos y la cebolla. Pela y pica finamente los dientes de ajo.</li><li>Cocina los fideos de huevo según las instrucciones del paquete.</li><li>En una sartén grande, calienta un poco de aceite de oliva y dora el pollo hasta que esté cocido.</li><li>Agrega las verduras y el ajo e cocina hasta que estén tiernos.</li><li>Añade los fideos de huevo y mézclalos bien con el pollo y las verduras.', '<li>200 gr de fideos de huevo</li><li>1 pechuga de pollo</li><li>1 zanahoria</li><li>1 pimiento verd'),
(13, 7, '2024-10-23', '\"Ensalada Caprese\"', '<li>Corta los tomates y la mozzarella en rodajas.</li><li>Coloca en un plato las rodajas de tomate, mozzarella y albahaca, alternando y superponiéndolos.</li><li>Rocía con aceite de oliva y espolvorea con sal y pimienta al gusto.</li><li>Ingredientes opcionales:</li><li></li><li>[Agregar vinagre balsámico]</li><li>[Agregar aceitunas negras]</li>', '<li>3 tomates grandes</li><li>300 gramos de mozzarella fresca</li><li>Un puñado de hojas frescas de '),
(14, 9, '2024-11-11', '\"Quesadillas de queso\"', '<li>Tuesta el pan en la tostadora hasta que esté dorado.</li><li>Coloca el queso entre las dos rebanadas de pan.</li><li>Calienta un sartén a fuego medio.</li><li>Cocina la quesadilla en el sartén hasta que el queso se derrita.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Tomate]</li><li>[Agregar Jamón]</li><li>[Agregar Pollo]</li>', '<li>2 rebanadas de pan</li><li>50g de queso</li>'),
(16, 10, '2024-11-11', '\"Sandwich de Jamón y Queso Tostado\"', '<li>Coloca una sartén antiadherente a fuego medio.</li><li>Mientras la sartén se calienta, coloca una rebanada de queso y una de jamón entre las dos rebanadas de pan.</li><li>Coloca el sandwich en la sartén y cocina hasta que el pan esté tostado y dorado.</li><li>Voltea el sandwich y cocina el otro lado hasta que esté igual de tostado.</li><li>Asegúrate de que el queso esté derretido antes de servir.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Agregar Mostaza]</li><li>[Agregar To', '<li>2 rebanadas de pan</li><li>2 rebanadas de queso</li><li>2 rebanadas de jamón</li>'),
(17, 10, '2024-11-11', '\"Dip de garbanzos (Hummus)\"', '<li>Remoja los garbanzos durante la noche, luego cocina hasta que estén tiernos.</li><li>En un procesador de alimentos, añade los garbanzos, el ajo, el jugo de limón, el tahini y la sal.</li><li>Procesa hasta obtener una pasta suave, agregando aceite de oliva mientras se mezcla.</li><li>Sirve con vegetales frescos o pan pita.</li><li></li><li>Ingredientes opcionales:</li><li></li><li>[Agregar comino]</li><li>[Agregar pimentón dulce para espolvorear por encima]</li><li>[Agregar cilantro o perejil', '<li>1 taza de garbanzos</li><li>3 dientes de ajo</li><li>Jugo de 1 limón</li><li>3 cucharadas de tah'),
(18, 10, '2024-11-11', '\"Chow Mein de Pollo\"', '<li>Cocina los fideos de huevo de acuerdo a las instrucciones del paquete, y reserva.</li><li>Corta el pollo en tiras finas y saltea en un wok con un poco de aceite de sésamo.</li><li>Agregar la zanahoria, pimiento verde, cebolla y ajo picados al wok y freír hasta que estén tiernos.</li><li>Añade los fideos de huevo cocidos y la salsa de soja al wok, y revuelve bien para mezclar todos los ingredientes.</li><li>Cocinar durante unos minutos más y servir caliente.</li><li>Ingredientes opcionales:</', '<li>1 pechuga de pollo</li><li>1 zanahoria</li><li>1 pimiento verde</li><li>1 cebolla</li><li>2 dien');

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
(7, 'Tomás', 'tomi.roca06@gmail.com', '../assets/images/default.png', 'H0la', 'admin'),
(8, 'Nahuel', 'Nahuel@gmail.com', '../assets/images/default.png', '$2y$10$ASEXgCz5KsZZ7iJ9Q1Lm4ORm3ddxHCfsNYYhULelo0fNzX1hLqlS.', ''),
(9, 'eze', 'eze1@gmail.com', '../assets/images/default.png', '123', ''),
(10, 'tomi', 'tomi@gmail.com', '../assets/images/default.png', '$2y$10$U40gQDsMT4w.Yh4qFkgjgeZP1.aQlMp7ecrO5B8Wrxru2KGbp6V62', ''),
(11, 'Tomi', 'tomi.roca106@gmail.com', '../assets/images/default.png', '123', '');

--
-- Índices para tablas volcadas
--

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(125) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
