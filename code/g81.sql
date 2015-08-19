-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2015 a las 05:32:31
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g81`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `IdAccion` int(11) NOT NULL,
  `Accion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`IdAccion`, `Accion`) VALUES
(1, 'Seleccion'),
(2, 'Calificacion'),
(3, 'Consulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condimentos`
--

CREATE TABLE IF NOT EXISTS `condimentos` (
  `IdCondimento` int(11) NOT NULL,
  `Condimento` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contexturas`
--

CREATE TABLE IF NOT EXISTS `contexturas` (
  `IdContextura` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contexturas`
--

INSERT INTO `contexturas` (`IdContextura`, `Nombre`, `Descripcion`) VALUES
(1, 'Pequeña', 'Pequeña'),
(2, 'Mediana', 'Mediana'),
(3, 'Grande', 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas`
--

CREATE TABLE IF NOT EXISTS `dietas` (
  `IdDieta` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas`
--

INSERT INTO `dietas` (`IdDieta`, `Nombre`) VALUES
(1, 'Normal'),
(2, 'Vegano'),
(3, 'Vegetariano'),
(4, 'Ovolactovegetariano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dificultades`
--

CREATE TABLE IF NOT EXISTS `dificultades` (
  `IdDificultad` int(11) NOT NULL,
  `Dificultad` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dificultades`
--

INSERT INTO `dificultades` (`IdDificultad`, `Dificultad`) VALUES
(1, 'Facil'),
(2, 'Media'),
(3, 'Dificil'),
(4, 'Muy Dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE IF NOT EXISTS `estaciones` (
  `IdEstacion` int(11) NOT NULL,
  `Estacion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`IdEstacion`, `Estacion`) VALUES
(1, 'Verano'),
(2, 'Otoño'),
(3, 'Invierno'),
(4, 'Primavera'),
(5, 'Navidad'),
(6, 'Pascuas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `IdGrupo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IdUsuarioCreador` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE IF NOT EXISTS `historiales` (
  `IdHistoria` int(11) NOT NULL,
  `IdAccion` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `Fecha de Accion` datetime NOT NULL,
  `Fecha de Utilizacion` date NOT NULL,
  `IdHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `IdHorario` int(11) NOT NULL,
  `Horario` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`IdHorario`, `Horario`) VALUES
(1, 'Desayuno'),
(2, 'Almuerzo'),
(3, 'Merienda'),
(4, 'Cena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `IdIngrediente` int(11) NOT NULL,
  `Ingrediente` varchar(50) NOT NULL,
  `Porcion` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE IF NOT EXISTS `pasos` (
  `IdPasos` int(11) NOT NULL,
  `Paso` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesos-ideales`
--

CREATE TABLE IF NOT EXISTS `pesos-ideales` (
  `IdPesos-Ideales` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Altura` int(11) NOT NULL,
  `MedidaTorax` int(11) NOT NULL,
  `MedidaCintura` int(11) NOT NULL,
  `MedidaCadera` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `PesoMinimo` int(11) NOT NULL,
  `PesoMaximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piramides`
--

CREATE TABLE IF NOT EXISTS `piramides` (
  `IdPiramide` int(11) NOT NULL,
  `Sector` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Contraindicaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preexistentes`
--

CREATE TABLE IF NOT EXISTS `preexistentes` (
  `IdPreexistente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preexistentes`
--

INSERT INTO `preexistentes` (`IdPreexistente`, `Nombre`) VALUES
(1, 'Diabetes'),
(2, 'Hipertension'),
(3, 'Celiasis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias`
--

CREATE TABLE IF NOT EXISTS `preferencias` (
  `IdPreferencia` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento`
--

CREATE TABLE IF NOT EXISTS `procedimiento` (
  `IdProcedimiento` int(11) NOT NULL,
  `IdPaso1` int(11) NOT NULL,
  `IdPaso2` int(11) NOT NULL,
  `IdPaso3` int(11) NOT NULL,
  `IdPaso4` int(11) NOT NULL,
  `IdPaso5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE IF NOT EXISTS `puntuaciones` (
  `IdPuntuacion` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-estaciones`
--

CREATE TABLE IF NOT EXISTS `receta-estaciones` (
  `IdRecetaEstacion` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdEstacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-horarios`
--

CREATE TABLE IF NOT EXISTS `receta-horarios` (
  `IdRecetaHorario` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingredientes`
--

CREATE TABLE IF NOT EXISTS `receta-ingredientes` (
  `IdRecetaIngrediente` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL COMMENT '0 Ing. Principal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `IdReceta` int(11) NOT NULL,
  `Receta` varchar(50) NOT NULL,
  `IdDificultad` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProcedimiento` int(11) NOT NULL,
  `IdPiramide` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE IF NOT EXISTS `rutinas` (
  `IdRutina` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`IdRutina`, `Nombre`, `Descripcion`) VALUES
(1, 'Nada', 'Sedentaria con nada de ejercicio'),
(2, 'Leve', 'Sedentaria con algo de ejercicio (-30 min.)'),
(3, 'Mediano', 'Sedentaria con ejercicio (+30 min.)'),
(4, 'Fuerte', 'Activa sin ejercicio adicional'),
(5, 'Intensivo', 'Activa con ejercicio adicional (+30 min.)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario-grupos`
--

CREATE TABLE IF NOT EXISTS `usuario-grupos` (
  `IdUsuarioGrupo` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contraseña` varchar(25) NOT NULL,
  `Fecha de Creacion` datetime NOT NULL,
  `IdContextura` int(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Trabajo` varchar(50) DEFAULT NULL,
  `IdRutina` int(11) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Altura` int(11) NOT NULL,
  `IdPreexistente` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`IdAccion`);

--
-- Indices de la tabla `condimentos`
--
ALTER TABLE `condimentos`
  ADD PRIMARY KEY (`IdCondimento`);

--
-- Indices de la tabla `contexturas`
--
ALTER TABLE `contexturas`
  ADD PRIMARY KEY (`IdContextura`);

--
-- Indices de la tabla `dietas`
--
ALTER TABLE `dietas`
  ADD PRIMARY KEY (`IdDieta`);

--
-- Indices de la tabla `dificultades`
--
ALTER TABLE `dificultades`
  ADD PRIMARY KEY (`IdDificultad`);

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`IdEstacion`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`IdGrupo`),
  ADD UNIQUE KEY `Grupo` (`Nombre`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`IdHistoria`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`IdHorario`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`IdIngrediente`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`IdPasos`);

--
-- Indices de la tabla `pesos-ideales`
--
ALTER TABLE `pesos-ideales`
  ADD PRIMARY KEY (`IdPesos-Ideales`);

--
-- Indices de la tabla `piramides`
--
ALTER TABLE `piramides`
  ADD PRIMARY KEY (`IdPiramide`);

--
-- Indices de la tabla `preexistentes`
--
ALTER TABLE `preexistentes`
  ADD PRIMARY KEY (`IdPreexistente`);

--
-- Indices de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD PRIMARY KEY (`IdPreferencia`);

--
-- Indices de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`IdProcedimiento`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`IdPuntuacion`);

--
-- Indices de la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  ADD PRIMARY KEY (`IdRecetaEstacion`);

--
-- Indices de la tabla `receta-horarios`
--
ALTER TABLE `receta-horarios`
  ADD PRIMARY KEY (`IdRecetaHorario`);

--
-- Indices de la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  ADD PRIMARY KEY (`IdRecetaIngrediente`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`IdReceta`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`IdRutina`);

--
-- Indices de la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  ADD PRIMARY KEY (`IdUsuarioGrupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `IdAccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `condimentos`
--
ALTER TABLE `condimentos`
  MODIFY `IdCondimento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contexturas`
--
ALTER TABLE `contexturas`
  MODIFY `IdContextura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `dietas`
--
ALTER TABLE `dietas`
  MODIFY `IdDieta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `dificultades`
--
ALTER TABLE `dificultades`
  MODIFY `IdDificultad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  MODIFY `IdEstacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `IdGrupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `IdHistoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `IdHorario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `IdIngrediente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `IdPasos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pesos-ideales`
--
ALTER TABLE `pesos-ideales`
  MODIFY `IdPesos-Ideales` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `piramides`
--
ALTER TABLE `piramides`
  MODIFY `IdPiramide` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preexistentes`
--
ALTER TABLE `preexistentes`
  MODIFY `IdPreexistente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `IdPreferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `IdProcedimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `IdPuntuacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  MODIFY `IdRecetaEstacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `receta-horarios`
--
ALTER TABLE `receta-horarios`
  MODIFY `IdRecetaHorario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  MODIFY `IdRecetaIngrediente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `IdReceta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `IdRutina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  MODIFY `IdUsuarioGrupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;