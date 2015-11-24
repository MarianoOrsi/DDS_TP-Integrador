-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `IdAccion` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Accion` varchar(50) NOT NULL
);

INSERT INTO `acciones` (`Accion`) 
VALUES
('Seleccion'),
('Calificacion'),
('Consulta');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condimentos`
--

CREATE TABLE IF NOT EXISTS `condimentos` (
  `IdCondimento` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Condimento` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `imagen` varchar(60) NOT NULL
);

INSERT INTO `condimentos` (`Condimento`, `Tipo`, `imagen`) VALUES
('ajiPicante', '', 'img\\Condimentos\\aji-puta-pario.jpg'),
('ajiRePicante', '', 'img\\Condimentos\\aji-rocoto.jpg'),
('albaca', '', 'img\\Condimentos\\albaca.jpg'),
('azafran', '', 'img\\Condimentos\\Azafran.jpg'),
('canela', '', 'img\\Condimentos\\Canela.jpg'),
('cilantro', '', 'img\\Condimentos\\cilantro.jpg'),
('clavo', '', 'img\\Condimentos\\clavos_de_olor.jpg'),
('comino', '', 'img\\Condimentos\\comino.jpg'),
('jengibre', '', 'img\\Condimentos\\jengibre.jpg'),
('laurel', '', 'img\\Condimentos\\laurel.jpg'),
('menta', '', 'img\\Condimentos\\menta.jpg'),
('nuezMoscada', '', 'img\\Condimentos\\nuez_moscada.jpg'),
('oregano', '', 'img\\Condimentos\\oregano.jpg'),
('perejil', '', 'img\\Condimentos\\perejil.jpg'),
('pimientaNegra', '', 'img\\Condimentos\\pimienta-negra.jpg'),
('pimientaRoja', '', 'img\\Condimentos\\pimienta-roja.jpg'),
('romero', '', 'romero.jpg'),
('sal', '', 'img\\Condimentos\\sal.jpg'),
('tomillo', '', 'img\\Condimentos\\Tomillo.jpg');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contexturas`
--

CREATE TABLE IF NOT EXISTS `contexturas` (
  `IdContextura` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
);

INSERT INTO `contexturas` (`Nombre`, `Descripcion`) VALUES
('Peque', 'Peque'),
('Mediana', 'Mediana'),
('Grande', 'Grande');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas`
--

CREATE TABLE IF NOT EXISTS `dietas` (
  `IdDieta` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` varchar(50) NOT NULL
);

INSERT INTO `dietas` (`Nombre`) VALUES
('Normal'),
('Vegano'),
('Vegetariano'),
('Ovolactovegetariano');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultades`
--

CREATE TABLE IF NOT EXISTS `dificultades` (
  `IdDificultad` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Dificultad` varchar(50) NOT NULL
);


INSERT INTO `dificultades` (`Dificultad`) VALUES
('Facil'),
('Media'),
('Dificil'),
('Muy Dificil');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE IF NOT EXISTS `estaciones` (
  `IdEstacion` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Estacion` varchar(50) NOT NULL
);

INSERT INTO `estaciones` (`Estacion`) VALUES
('Verano'),
('Oto'),
('Invierno'),
('Primavera'),
('Navidad'),
('Pascuas');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `IdHorario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Horario` varchar(25) NOT NULL
);

INSERT INTO `horarios` (`Horario`) VALUES
('Desayuno'),
('Almuerzo'),
('Merienda'),
('Cena');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `IdIngrediente` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Ingrediente` varchar(50) NOT NULL,
  `Porcion` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL,
  `imagen` varchar(60) NOT NULL
);

INSERT INTO `ingredientes` (`Ingrediente`, `Porcion`, `Calorias`, `imagen`) VALUES
('aceiteGirasol', 100, 154, 'img\\Ingredientes\\aceite-de-girasol.jpg'),
('aceiteOliva', 100, 152, 'img\\Ingredientes\\aceite-oliva.jpg'),
('aceituna', 1, 9, 'img\\Ingredientes\\aceituna.jpg'),
('ajo', 1, 5, 'img\\Ingredientes\\ajo.jpg'),
('arroz', 50, 68, 'img\\Ingredientes\\arroz.jpg'),
('asado', 100, 59, 'img\\Ingredientes\\asado.jpg'),
('banana', 1, 89, 'img\\Ingredientes\\banana.jpg'),
('batata', 1, 56, 'img\\Ingredientes\\batata.jpg'),
('cebolla', 1, 58, 'img\\Ingredientes\\cebolla.jpg'),
('cebollaVerdeo', 5, 57, 'img\\Ingredientes\\cebolla-de-verdeo.jpg'),
('esparrago', 5, 65, 'img\\Ingredientes\\esparragos.jpg'),
('espinaca', 12, 78, 'img\\Ingredientes\\espinaca.jpg'),
('fideos', 50, 32, 'img\\Ingredientes\\fideos.jpg'),
('harinaTrigo', 50, 35, 'img\\Ingredientes\\harina-de-trigo.jpg'),
('harinaMaiz', 50, 54, 'img\\Ingredientes\\harina-del-maiz.jpg'),
('hongo', 1, 12, 'img\\Ingredientes\\hongo.jpg'),
('huevo', 1, 36, 'img\\Ingredientes\\huevo.jpg'),
('kiwi', 1, 34, 'img\\Ingredientes\\kiwi.jpg'),
('leche', 50, 41, 'img\\Ingredientes\\leche.jpg'),
('limon', 1, 29, 'img\\Ingredientes\\limon.jpg'),
('lomo', 100, 92, 'img\\Ingredientes\\lomo.jpg'),
('mandarina', 1, 59, 'img\\Ingredientes\\mandarina.jpg'),
('manteca', 20, 89, 'img\\Ingredientes\\manteca.jpg'),
('manzana', 1, 59, 'img\\Ingredientes\\manzana.jpg'),
('matambre', 100, 89, 'img\\Ingredientes\\matambre.jpg'),
('melon', 1, 340, 'img\\Ingredientes\\melon.jpg'),
('morron', 10, 9, 'img\\Ingredientes\\morron-rojo.jpg'),
('naranja.jpg', 1, 59, 'img\\Ingredientes\\naranja.jpg'),
('papa', 1, 50, 'img\\Ingredientes\\papas.jpg'),
('pepino', 1, 59, 'img\\Ingredientes\\pepinos.jpg'),
('pera', 1, 59, 'img\\Ingredientes\\Pera.jpg'),
('pescado', 30, 26, 'img\\Ingredientes\\pescado.jpg'),
('pina', 1, 257, 'img\\Ingredientes\\pina.jpg'),
('queso', 60, 38, 'img\\Ingredientes\\queso.jpg'),
('repollo', 1, 674, 'img\\Ingredientes\\repollo_morado.jpg'),
('sandia', 1, 102, 'img\\Ingredientes\\sandia.jpg'),
('tomate', 1, 38, 'img\\Ingredientes\\tomate.jpg'),
('vacio', 100, 98, 'img\\Ingredientes\\vacio.jpg'),
('vinoBlanco', 1, 268, 'img\\Ingredientes\\vino-blanco.jpg'),
('vinoTinto', 1, 126, 'img\\Ingredientes\\vino-timto.jpg'),
('zanahoria', 1, 34, 'img\\Ingredientes\\zanahoria.jpg');





-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesos-ideales`
--

CREATE TABLE IF NOT EXISTS `pesos-ideales` (
  `IdPesos-Ideales` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Sexo` varchar(1) NOT NULL,
  `Altura` int(11) NOT NULL,
  `MedidaTorax` int(11) NOT NULL,
  `MedidaCintura` int(11) NOT NULL,
  `MedidaCadera` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `PesoMinimo` int(11) NOT NULL,
  `PesoMaximo` int(11) NOT NULL
);

INSERT INTO `pesos-ideales` (`Sexo`, `Altura`, `MedidaTorax`, `MedidaCintura`, `MedidaCadera`, `Peso`, `PesoMinimo`, `PesoMaximo`) VALUES
('M', 183, 90, 75, 75, 80, 73, 88);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piramides`
--

CREATE TABLE IF NOT EXISTS `piramides` (
  `IdPiramide` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Sector` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Contraindicaciones` varchar(50) NOT NULL
);

INSERT INTO `piramides` (`Sector`, `Descripcion`, `Contraindicaciones`) VALUES
('carne', 'desc1', 'nada'),
('frutas', 'perfectas', 'ni idea');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preexistentes`
--

CREATE TABLE IF NOT EXISTS `preexistentes` (
  `IdPreexistente` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` varchar(50) NOT NULL
);

INSERT INTO `preexistentes` (`Nombre`) VALUES
('Diabetes'),
('Hipertension'),
('Celiasis');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE IF NOT EXISTS `rutinas` (
  `IdRutina` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` varchar(15) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
);

INSERT INTO `rutinas` (`Nombre`, `Descripcion`) VALUES
('Nada', 'Sedentaria con nada de ejercicio'),
('Leve', 'Sedentaria con algo de ejercicio (-30 min.)'),
('Mediano', 'Sedentaria con ejercicio (+30 min.)'),
('Fuerte', 'Activa sin ejercicio adicional'),
('Intensivo', 'Activa con ejercicio adicional (+30 min.)');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `IdReceta` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Receta` varchar(50) NOT NULL,
  `IdDificultad` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPiramide` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL,
  CONSTRAINT `Receta-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  CONSTRAINT `Receta-Dificultad` FOREIGN KEY (`IdDificultad`) REFERENCES `dificultades` (`IdDificultad`),
  CONSTRAINT `Receta-Piramides` FOREIGN KEY (`IdPiramide`) REFERENCES `piramides` (`IdPiramide`)
);

INSERT INTO `recetas` (`Receta`, `IdDificultad`, `IdUsuario`, `IdPiramide`, `IdDieta`, `Calorias`) VALUES
('carne con arroz', 1, 29, 1, 1, 90);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE IF NOT EXISTS `pasos` (
`IdPasos` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdReceta` int(11) NOT NULL,
  `Paso` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Foto` varchar(50) NOT NULL,
   CONSTRAINT `pasos-receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-estaciones`
--

CREATE TABLE IF NOT EXISTS `receta-estaciones` (
  `IdRecetaEstacion` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdReceta` int(11) NOT NULL,
  `IdEstacion` int(11) NOT NULL,
  CONSTRAINT `Estaciones` FOREIGN KEY (`IdEstacion`) REFERENCES `estaciones` (`IdEstacion`),
  CONSTRAINT `RecetaEstacion` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`)
);

INSERT INTO `receta-estaciones` (`IdReceta`, `IdEstacion`) VALUES
(1, 1);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente-preexistente`
--

CREATE TABLE IF NOT EXISTS `ingrediente-preexistentes` (
  `IdIngredientePreexistentes` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdIngrediente` int(11) NOT NULL,
  `IdPreexistente` int(11) NOT NULL,
  CONSTRAINT `IPreexistente` FOREIGN KEY (`IdPreexistente`) REFERENCES `Preexistentes` (`IdPreexistente`),
  CONSTRAINT `IngredientePreexistentes` FOREIGN KEY (`IdIngrediente`) REFERENCES `Ingredientes` (`IdIngrediente`)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingredientes`
--

CREATE TABLE IF NOT EXISTS `receta-ingredientes` (
  `IdRecetaIngrediente` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdReceta` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL COMMENT '0 Ing. Principal 1 Ing 2 Cond',
  CONSTRAINT `RecetaIng` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`)
);

INSERT INTO `receta-ingredientes` (`IdReceta`, `IdIngrediente`, `Tipo`) VALUES
(1, 2, 2),
(1, 7, 0);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE IF NOT EXISTS `procedimiento` (
  `IdProcedimiento` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdPaso` int(11) NOT NULL,
  `Paso` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  CONSTRAINT `Pasos` FOREIGN KEY (`IdPaso`) REFERENCES `pasos` (`IdPasos`),
  CONSTRAINT `RecetaPasos` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Usuario` varchar(50) NOT NULL UNIQUE KEY,
  `Contrase` varchar(25) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `IdContextura` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Trabajo` varchar(50) DEFAULT NULL,
  `IdRutina` int(11) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Altura` int(11) NOT NULL,
  `IdPreexistente` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `IdPesos-Ideales` int(11) NOT NULL,
  CONSTRAINT `UsuRutina` FOREIGN KEY (`IdRutina`) REFERENCES `rutinas` (`IdRutina`),
  CONSTRAINT `Usuario-Contextura` FOREIGN KEY (`IdContextura`) REFERENCES `contexturas` (`IdContextura`),
  CONSTRAINT `Usuario-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  CONSTRAINT `Usuario-PesosIdeales` FOREIGN KEY (`IdPesos-Ideales`) REFERENCES `pesos-ideales` (`IdPesos-Ideales`),
  CONSTRAINT `Usuario-Preexistente` FOREIGN KEY (`IdPreexistente`) REFERENCES `preexistentes` (`IdPreexistente`)
);

INSERT INTO `usuarios` (`Usuario`, `Contrase`, `fechaCreacion`, `IdContextura`, `Sexo`, `Trabajo`, `IdRutina`, `Edad`, `Altura`, `IdPreexistente`, `IdDieta`, `Email`, `IdPesos-Ideales`) VALUES
('Leandrin', 'pepe', '0000-00-00 00:00:00', 3, 'm', NULL, 3, 0, 123, 1, 2, 'pepin', 1),
('d', 'pepe', '2015-08-23 16:42:59', 3, 'm', NULL, 3, 0, 123, 1, 3, 'pepin', 1),
('425', 'twr', '2015-08-23 17:02:37', 1, 'm', NULL, 3, 0, 0, 3, 4, '24524', 1),
('fd', 'fda', '2015-08-23 17:05:43', 2, 'f', NULL, 3, 0, 452, 3, 4, 'fafd', 1),
('fdafad', 'fdafa', '2015-08-23 17:10:53', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
('fdafadd', 'fdafa', '2015-08-23 17:11:37', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
('fdafaddd', 'fdafa', '2015-08-23 17:12:15', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
('fdafadddg', 'fdafa', '2015-08-23 17:12:28', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
('frgsfg', 'gsfgf', '2015-08-23 17:20:23', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
('frgsfgh', 'gsfgf', '2015-08-23 17:20:45', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
('the', 'hethe', '2015-08-23 17:21:54', 2, 'm', NULL, 2, 0, 2142, 3, 4, 'hethe', 1),
('4254', '24524', '2015-08-23 17:26:56', 1, 'm', NULL, 1, 0, 2452, 3, 4, '452452', 1),
('789', '789', '2015-08-23 17:28:16', 1, 'm', NULL, 3, 0, 789, 3, 4, '7789', 1),
('46', '4', '2015-08-23 17:30:14', 2, 'm', NULL, 2, 0, 34, 3, 4, '4', 1),
('423', '23', '2015-08-23 17:32:18', 1, 'm', NULL, 2, 0, 234, 3, 4, '234', 1),
('er', 're', '2015-08-23 17:34:25', 2, 'm', NULL, 2, 0, 4, 3, 4, 're', 1),
('feeqeq', 'fe', '2015-08-23 17:36:23', 1, 'm', NULL, 2, 0, 3, 3, 4, 'qeqeq', 1),
('2', '23', '2015-08-23 17:39:52', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
('25', '23', '2015-08-23 17:40:47', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
('g', 'g', '2015-08-23 17:42:38', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
('gt', 'gttt', '2015-08-23 17:45:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
('gt2', 'gttt', '2015-08-23 17:46:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
('gt3', 'gttt', '2015-08-23 17:46:29', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
('gt4', 'qe', '2015-08-23 17:47:39', 1, 'f', NULL, 3, 0, 1, 3, 4, 'qe', 1),
('Maxi', 'pepe', '2015-08-23 17:49:27', 2, 'm', NULL, 3, 20, 100, 2, 1, 'maxi-cantarell@hotmail.com', 1),
('fdfdafdafdfa', 'fadfad', '2015-08-23 17:56:42', 1, 'm', NULL, 2, 234, 5245, 3, 4, 'fadfadfa', 1),
('45245245', '45', '2015-08-23 18:05:48', 1, 'm', NULL, 2, 5454, 545, 3, 4, '454', 1),
('425245', '5245', '2015-08-23 18:11:13', 2, 'm', NULL, 2, 42524, 42524, 3, 4, '42524', 1),
('LeanBiker', 'pepe', '2015-08-23 18:28:28', 1, 'm', NULL, 1, 21, 23, 3, 4, 'easa', 1),
('646', '6464', '2015-08-23 18:38:28', 1, 'm', NULL, 2, 446, 464, 3, 4, '4646', 1),
('gdfa', 'fad', '2015-08-23 18:51:10', 1, 'm', NULL, 1, 234, 245, 3, 4, 'fad', 1),
('lucas', '7410', '2015-08-24 22:20:29', 2, 'm', NULL, 2, 15, 174, 1, 3, 'luks_manga@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `IdGrupo` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` varchar(50) NOT NULL UNIQUE KEY,
  `IdUsuarioCreador` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  CONSTRAINT `UsuCread` FOREIGN KEY (`IdUsuarioCreador`) REFERENCES `usuarios` (`IdUsuario`)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario-grupos`
--

CREATE TABLE IF NOT EXISTS `usuario-grupos` (
  `IdUsuarioGrupo` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdUsuario` int(11) NOT NULL,
  `IdGrupo` int(11) NOT NULL,
  CONSTRAINT `Grupo` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`IdGrupo`),
  CONSTRAINT `UsuarioGrupos` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE IF NOT EXISTS `historiales` (
  `IdHistoria` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdAccion` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `Fecha de Accion` datetime NOT NULL,
  `Fecha de Utilizacion` date NOT NULL,
  CONSTRAINT `Historial-Accion` FOREIGN KEY (`IdAccion`) REFERENCES `acciones` (`IdAccion`),
  CONSTRAINT `HistorialReceta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  CONSTRAINT `HistorialUsu` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial-horarios`
--

CREATE TABLE IF NOT EXISTS `historial-horarios` (
  `IdRecetaHorario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdHistorial` int(11) NOT NULL,
  `IdHorario` int(11) NOT NULL,
  CONSTRAINT `Historial-Horarios` FOREIGN KEY (`IdHistorial`) REFERENCES `historiales` (`IdHistoria`),
  CONSTRAINT `Horario` FOREIGN KEY (`IdHorario`) REFERENCES `horarios` (`IdHorario`)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias`
--

CREATE TABLE IF NOT EXISTS `preferencias` (
  `IdPreferencia` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdIngrediente` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  CONSTRAINT `Ingredientes` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingredientes` (`IdIngrediente`),
  CONSTRAINT `PrefUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`)
);

INSERT INTO `preferencias` (`IdIngrediente`, `IdUsuario`, `Fecha`) VALUES
(4, 29, '2015-09-16 00:00:00'),
(7, 29, '2015-10-01 00:00:00'),
(14, 29, '2015-10-06 00:00:00');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `IdPuntuacion` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdReceta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Puntuacion` int(11) NOT NULL,
  CONSTRAINT `PuntuacionRece` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  CONSTRAINT `PuntuacionUsu` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`)
);

INSERT INTO `puntuaciones` (`IdReceta`, `IdUsuario`, `Fecha`, `Puntuacion`) VALUES
(1, 29, '2015-10-06 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-condimentos`
--

CREATE TABLE IF NOT EXISTS `receta-condimentos` (
  `IdRecetaCondimento` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdReceta` int(11) NOT NULL,
  
  `IdCondimento` int(11) NOT NULL,
  CONSTRAINT `Receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`Idreceta`),
  CONSTRAINT `Condimentos` FOREIGN KEY (`IdCondimento`) REFERENCES `condimentos` (`IdCondimento`)
);
