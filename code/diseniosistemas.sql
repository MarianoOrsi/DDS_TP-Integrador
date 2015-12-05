-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2015 a las 01:34:50
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diseniosistemas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarCondimentosDeReceta`(IN recetaId INT)
begin
select con.Condimento from condimentos con
inner join `receta-condimentos` rec
on (con.IdCondimento = rec.IdCondimento)
where rec.IdReceta = recetaId;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarDificultadDeReceta`(IN recetaId INT)
begin
select Dificultad from dificultades dif
inner join recetas rec
on (dif.IdDificultad = rec.IdDificultad)
where rec.IdReceta = recetaId;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarGruposDeUsuario`(IN usuarioid INT)
begin
SELECT * FROM grupos WHERE IdGrupo IN (SELECT IdGrupo FROM `usuario-grupos` WHERE IdUsuario = usuarioId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_BuscarIngredientesDeReceta`(IN recetaID INT)
begin
select ing.Ingrediente, ing.Porcion, ing.Calorias
from ingredientes ing inner join `receta-ingredientes` rec
on (ing.IdIngrediente = REC.IdIngrediente)
WHERE rec.IdReceta = recetaId;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPasosDeReceta`(IN idReceta INT)
BEGIN
SELECT Descripcion, Foto FROM pasos
WHERE pasos.IdReceta = idReceta 
ORDER BY Paso;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_EsCreadorDeGrupo`(IN idGrupoParam INT, IN idUsuarioParam INT)
begin

declare esCreador int;

SELECT 
    @idUsuario_var:=IdUsuarioCreador
FROM
    grupos
WHERE
    IdGrupo = idGrupoParam;

if @idUsuario_var = idUsuarioParam then
	set esCreador = 1;
else
	set esCreador = 0;
end if;


select esCreador;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_GuardarRecetaVista`(IN usuarioId INT, IN recetaId INT)
begin
INSERT INTO historiales
(IdAccion, IdUsuario, IdReceta, `Fecha de Accion`, `Fecha de Utilizacion`)
VALUES
(3,usuarioId,recetaId, NOW(), NOW());
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_planificarReceta`(IN horarioId INT, IN recetaId INT, IN usuarioId INT)
BEGIN

DECLARE idHistoria_var INT DEFAULT 0;

SELECT hist.IdHistoria INTO idHistoria_var FROM historiales hist 
INNER JOIN `historial-horarios` histhor
on (hist.IdHistoria = histhor.IdHistorial)
WHERE 
hist.IdUsuario = usuarioId AND
DATE(hist.`Fecha de Accion`) = DATE(NOW()) AND
hist.IdAccion = 1 AND
histhor.IdHorario = horarioId;

IF idHistoria_var <> 0 THEN

	UPDATE historiales
    SET IdReceta = recetaId
    WHERE IdHistoria = @idHistoria_var;
    
ELSE
	
    INSERT INTO historiales
    (IdAccion,IdUsuario,IdReceta,`Fecha de Accion`,`Fecha de Utilizacion`)
    VALUES
    (1,usuarioId,recetaId,NOW(),DATE(NOW()));
    
    SET @idHistoria_var = (SELECT IdHistoria FROM historiales ORDER BY IdHistoria DESC LIMIT 1);
    
    INSERT INTO `historial-horarios`
    (IdHistorial,IdHorario)
    VALUES
    (@idHistoria_var,horarioId);
    
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_puntuar`(IN idrec INT, IN idUsu INT, IN puntos int)
begin
SELECT @idUsuario_var:=idusuario FROM `puntuaciones` WHERE `puntuaciones`.`IdReceta` = idrec and puntuaciones.IdUsuario=idusu;

if @idUsuario_var = idUsu then

	update puntuaciones set Puntuacion=puntos where puntuaciones.IdReceta=idrec and IdUsuario=idusu;
else
	INSERT INTO `puntuaciones`(`IdReceta`, `IdUsuario`, `Fecha`, `Puntuacion`) VALUES (idRec,IdUsu,now(),puntos);
end if;
INSERT INTO `historiales`(`IdAccion`, `IdUsuario`, `IdReceta`, `Fecha de Accion`) VALUES (2,IdUsu,idRec,now());
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Recetacalificadasxsexocontexturacalificacion`(IN `sexo` VARCHAR(1), IN `idcont` INT, IN `calif` INT)
SELECT recetas.IdReceta, recetas.Receta
from recetas inner join 
puntuaciones on puntuaciones.IdReceta=recetas.IdReceta inner JOIN
usuarios on puntuaciones.IdUsuario=usuarios.IdUsuario
where puntuaciones.Puntuacion=calif and usuarios.IdContextura=idcont and usuarios.Sexo=sexo
limit 10$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recetasxdieta`(IN `iddiet` INT)
SELECT recetas.IdReceta, recetas.Receta FROM recetas
where recetas.IdDieta>=iddiet$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Recetaxcalificacionyestacion`(IN `nota` INT, IN `idestacion` INT)
if nota>0 and idestacion>0 then
select recetas.IdReceta, recetas.Receta, puntos.Puntaje,estaciones.Estacion FROM recetas inner join `receta-estaciones` on recetas.IdReceta= `receta-estaciones`.IdReceta inner join `estaciones` on estaciones.IdEstacion= `receta-estaciones`.`IdEstacion` inner JOIN puntos on puntos.IdReceta=recetas.IdReceta
where puntos.Puntaje BETWEEN nota and nota+0.99 and `receta-estaciones`.IdEstacion=idestacion;
ELSEIF nota<1 and idestacion>0 then
select recetas.IdReceta, recetas.Receta, puntos.Puntaje,estaciones.Estacion FROM recetas inner join `receta-estaciones` on recetas.IdReceta= `receta-estaciones`.IdReceta inner join `estaciones` on estaciones.IdEstacion= `receta-estaciones`.`IdEstacion` inner JOIN puntos on puntos.IdReceta=recetas.IdReceta
where `receta-estaciones`.IdEstacion=idestacion;
ELSEIF  nota>0 and idestacion<1 then
select recetas.IdReceta, recetas.Receta, puntos.Puntaje,estaciones.Estacion FROM recetas  inner JOIN puntos on puntos.IdReceta=recetas.IdReceta inner join `receta-estaciones` on recetas.IdReceta= `receta-estaciones`.IdReceta  inner join `estaciones` on estaciones.IdEstacion= `receta-estaciones`.`IdEstacion`
where puntos.Puntaje BETWEEN nota and nota+0.99;
ELSE
select recetas.IdReceta, recetas.Receta, puntos.Puntaje,estaciones.Estacion FROM recetas inner join `receta-estaciones` on recetas.IdReceta= `receta-estaciones`.IdReceta inner join `estaciones` on estaciones.IdEstacion= `receta-estaciones`.`IdEstacion` inner JOIN puntos on puntos.IdReceta=recetas.IdReceta;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recetaxcond`(IN `idcond` INT)
SELECT recetas.IdReceta,recetas.Receta
from recetas inner join 
`receta-condimentos` on `receta-condimentos`.`IdReceta`=recetas.IdReceta
WHERE `receta-condimentos`.`Idcondimento`=idcond
LIMIT 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RecetaxPiramide`(IN `idPiram` INT)
select recetas.IdReceta, recetas.Receta
from recetas
where recetas.IdPiramide=idpiram
limit 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recetaxpreferencias`(IN `idUsu` INT)
SELECT recetas.IdReceta,recetas.Receta
from preferencias inner JOIN 
ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente inner JOIN
`receta-ingredientes` on`receta-ingredientes`.IdIngrediente=ingredientes.IdIngrediente inner JOIN
recetas on recetas.IdReceta=`receta-ingredientes`.`IdReceta`
where preferencias.IdUsuario=idusu
limit 3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_RegistrarUsuario`(
    
IN usuario_param VARCHAR(50),
IN pass_param VARCHAR(25),
IN sexo_param VARCHAR(1),
IN dieta VARCHAR(50),
IN rutina VARCHAR(50),
IN complexion VARCHAR(50),
IN preexistentes VARCHAR(50),
IN altura_param INT,
IN edad_param INT,
IN email_param VARCHAR(40)
    
)
BEGIN
select @idDieta_var := IdDieta from dietas where Nombre = dieta;
SELECT 
    @idRutina_var:=IdRutina
FROM
    rutinas
WHERE
    Nombre = rutina;
SELECT 
    @idComplexion_var:=IdContextura
FROM
    contexturas
WHERE
    Nombre = complexion;
SELECT 
    @idPreexistentes_var:=IdPreexistente
FROM
    preexistentes
WHERE
    Nombre = preexistentes;

insert into usuarios
(Usuario,Contrase,fechaCreacion,IdContextura,Sexo,IdRutina,Edad,Altura,IdPreexistente,IdDieta,Email,`IdPesos-Ideales`)
VALUES
(usuario_param,pass_param,NOW(),@idComplexion_var,sexo_param,@idRutina_var,edad_param,altura_param,@idPreexistentes_var,@idDieta_var,`email_param`,1);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UsuariosDeGrupo`(IN `idGrupoParam` INT)
    NO SQL
select * from usuarios usu inner join `usuario-grupos` ug on usu.IdUsuario = ug.IdUsuario where ug.IdGrupo = idGrupoParam$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerPreferencias`(IN `IdUsu` INT)
SELECT IdPreferencia, preferencias.IdIngrediente, IdUsuario, ingredientes.Ingrediente FROM preferencias inner join ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente
where idusuario=IdUsu$$

DELIMITER ;

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
  `Tipo` varchar(50) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `condimentos`
--

INSERT INTO `condimentos` (`IdCondimento`, `Condimento`, `Tipo`, `imagen`) VALUES
(1, 'ajiPicante', '', 'img\\Condimentos\\aji-puta-pario.jpg'),
(2, 'ajiRePicante', '', 'img\\Condimentos\\aji-rocoto.jpg'),
(3, 'albaca', '', 'img\\Condimentos\\albaca.jpg'),
(4, 'azafran', '', 'img\\Condimentos\\Azafran.jpg'),
(5, 'canela', '', 'img\\Condimentos\\Canela.jpg'),
(6, 'cilantro', '', 'img\\Condimentos\\cilantro.jpg'),
(7, 'clavo', '', 'img\\Condimentos\\clavos_de_olor.jpg'),
(8, 'comino', '', 'img\\Condimentos\\comino.jpg'),
(9, 'jengibre', '', 'img\\Condimentos\\jengibre.jpg'),
(10, 'laurel', '', 'img\\Condimentos\\laurel.jpg'),
(11, 'menta', '', 'img\\Condimentos\\menta.jpg'),
(12, 'nuezMoscada', '', 'img\\Condimentos\\nuez_moscada.jpg'),
(13, 'oregano', '', 'img\\Condimentos\\oregano.jpg'),
(14, 'perejil', '', 'img\\Condimentos\\perejil.jpg'),
(15, 'pimientaNegra', '', 'img\\Condimentos\\pimienta-negra.jpg'),
(16, 'pimientaRoja', '', 'img\\Condimentos\\pimienta-roja.jpg'),
(17, 'romero', '', 'romero.jpg'),
(18, 'sal', '', 'img\\Condimentos\\sal.jpg'),
(19, 'tomillo', '', 'img\\Condimentos\\Tomillo.jpg');

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
(1, 'Peque', 'Peque'),
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
(2, 'Oto'),
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
-- Estructura de tabla para la tabla `historial-horarios`
--

CREATE TABLE IF NOT EXISTS `historial-horarios` (
  `IdRecetaHorario` int(11) NOT NULL,
  `IdHistorial` int(11) NOT NULL,
  `IdHorario` int(11) NOT NULL
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
  `Fecha de Utilizacion` date NOT NULL
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
-- Estructura de tabla para la tabla `ingrediente-preexistentes`
--

CREATE TABLE IF NOT EXISTS `ingrediente-preexistentes` (
  `IdIngredientePreexistentes` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `IdPreexistente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `IdIngrediente` int(11) NOT NULL,
  `Ingrediente` varchar(50) NOT NULL,
  `Porcion` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`IdIngrediente`, `Ingrediente`, `Porcion`, `Calorias`, `imagen`) VALUES
(1, 'aceiteGirasol', 100, 154, 'img\\Ingredientes\\aceite-de-girasol.jpg'),
(2, 'aceiteOliva', 100, 152, 'img\\Ingredientes\\aceite-oliva.jpg'),
(3, 'aceituna', 1, 9, 'img\\Ingredientes\\aceituna.jpg'),
(4, 'ajo', 1, 5, 'img\\Ingredientes\\ajo.jpg'),
(5, 'arroz', 50, 68, 'img\\Ingredientes\\arroz.jpg'),
(6, 'asado', 100, 59, 'img\\Ingredientes\\asado.jpg'),
(7, 'banana', 1, 89, 'img\\Ingredientes\\banana.jpg'),
(8, 'batata', 1, 56, 'img\\Ingredientes\\batata.jpg'),
(9, 'cebolla', 1, 58, 'img\\Ingredientes\\cebolla.jpg'),
(10, 'cebollaVerdeo', 5, 57, 'img\\Ingredientes\\cebolla-de-verdeo.jpg'),
(11, 'esparrago', 5, 65, 'img\\Ingredientes\\esparragos.jpg'),
(12, 'espinaca', 12, 78, 'img\\Ingredientes\\espinaca.jpg'),
(13, 'fideos', 50, 32, 'img\\Ingredientes\\fideos.jpg'),
(14, 'harinaTrigo', 50, 35, 'img\\Ingredientes\\harina-de-trigo.jpg'),
(15, 'harinaMaiz', 50, 54, 'img\\Ingredientes\\harina-del-maiz.jpg'),
(16, 'hongo', 1, 12, 'img\\Ingredientes\\hongo.jpg'),
(17, 'huevo', 1, 36, 'img\\Ingredientes\\huevo.jpg'),
(18, 'kiwi', 1, 34, 'img\\Ingredientes\\kiwi.jpg'),
(19, 'leche', 50, 41, 'img\\Ingredientes\\leche.jpg'),
(20, 'limon', 1, 29, 'img\\Ingredientes\\limon.jpg'),
(21, 'lomo', 100, 92, 'img\\Ingredientes\\lomo.jpg'),
(22, 'mandarina', 1, 59, 'img\\Ingredientes\\mandarina.jpg'),
(23, 'manteca', 20, 89, 'img\\Ingredientes\\manteca.jpg'),
(24, 'manzana', 1, 59, 'img\\Ingredientes\\manzana.jpg'),
(25, 'matambre', 100, 89, 'img\\Ingredientes\\matambre.jpg'),
(26, 'melon', 1, 340, 'img\\Ingredientes\\melon.jpg'),
(27, 'morron', 10, 9, 'img\\Ingredientes\\morron-rojo.jpg'),
(28, 'naranja.jpg', 1, 59, 'img\\Ingredientes\\naranja.jpg'),
(29, 'papa', 1, 50, 'img\\Ingredientes\\papas.jpg'),
(30, 'pepino', 1, 59, 'img\\Ingredientes\\pepinos.jpg'),
(31, 'pera', 1, 59, 'img\\Ingredientes\\Pera.jpg'),
(32, 'pescado', 30, 26, 'img\\Ingredientes\\pescado.jpg'),
(33, 'pina', 1, 257, 'img\\Ingredientes\\pina.jpg'),
(34, 'queso', 60, 38, 'img\\Ingredientes\\queso.jpg'),
(35, 'repollo', 1, 674, 'img\\Ingredientes\\repollo_morado.jpg'),
(36, 'sandia', 1, 102, 'img\\Ingredientes\\sandia.jpg'),
(37, 'tomate', 1, 38, 'img\\Ingredientes\\tomate.jpg'),
(38, 'vacio', 100, 98, 'img\\Ingredientes\\vacio.jpg'),
(39, 'vinoBlanco', 1, 268, 'img\\Ingredientes\\vino-blanco.jpg'),
(40, 'vinoTinto', 1, 126, 'img\\Ingredientes\\vino-timto.jpg'),
(41, 'zanahoria', 1, 34, 'img\\Ingredientes\\zanahoria.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE IF NOT EXISTS `pasos` (
  `IdPasos` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pesos-ideales`
--

INSERT INTO `pesos-ideales` (`IdPesos-Ideales`, `Sexo`, `Altura`, `MedidaTorax`, `MedidaCintura`, `MedidaCadera`, `Peso`, `PesoMinimo`, `PesoMaximo`) VALUES
(1, 'M', 183, 90, 75, 75, 80, 73, 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piramides`
--

CREATE TABLE IF NOT EXISTS `piramides` (
  `IdPiramide` int(11) NOT NULL,
  `Sector` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Contraindicaciones` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piramides`
--

INSERT INTO `piramides` (`IdPiramide`, `Sector`, `Descripcion`, `Contraindicaciones`) VALUES
(1, 'carne', 'desc1', 'nada'),
(2, 'frutas', 'perfectas', 'ni idea');

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
  `IdUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preferencias`
--

INSERT INTO `preferencias` (`IdPreferencia`, `IdIngrediente`, `IdUsuario`, `Fecha`) VALUES
(1, 4, 29, '2015-09-16 00:00:00'),
(2, 7, 29, '2015-10-01 00:00:00'),
(3, 14, 29, '2015-10-06 00:00:00');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `puntos`
--
CREATE TABLE IF NOT EXISTS `puntos` (
`IdReceta` int(11)
,`Puntaje` decimal(14,4)
);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`IdPuntuacion`, `IdReceta`, `IdUsuario`, `Fecha`, `Puntuacion`) VALUES
(1, 1, 29, '2015-10-06 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-condimentos`
--

CREATE TABLE IF NOT EXISTS `receta-condimentos` (
  `IdRecetaCondimento` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdCondimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-estaciones`
--

CREATE TABLE IF NOT EXISTS `receta-estaciones` (
  `IdRecetaEstacion` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdEstacion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta-estaciones`
--

INSERT INTO `receta-estaciones` (`IdRecetaEstacion`, `IdReceta`, `IdEstacion`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta-ingredientes`
--

CREATE TABLE IF NOT EXISTS `receta-ingredientes` (
  `IdRecetaIngrediente` int(11) NOT NULL,
  `IdReceta` int(11) NOT NULL,
  `IdIngrediente` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL COMMENT '0 Ing. Principal 1 Ing 2 Cond'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta-ingredientes`
--

INSERT INTO `receta-ingredientes` (`IdRecetaIngrediente`, `IdReceta`, `IdIngrediente`, `Tipo`) VALUES
(1, 1, 2, 2),
(2, 1, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `IdReceta` int(11) NOT NULL,
  `Receta` varchar(50) NOT NULL,
  `IdDificultad` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPiramide` int(11) NOT NULL,
  `IdDieta` int(11) NOT NULL,
  `Calorias` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`IdReceta`, `Receta`, `IdDificultad`, `IdUsuario`, `IdPiramide`, `IdDieta`, `Calorias`) VALUES
(1, 'carne con arroz', 1, 29, 1, 1, 90);

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
  `IdPesos-Ideales` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `Contrase`, `fechaCreacion`, `IdContextura`, `Sexo`, `Trabajo`, `IdRutina`, `Edad`, `Altura`, `IdPreexistente`, `IdDieta`, `Email`, `IdPesos-Ideales`) VALUES
(1, 'Leandrin', 'pepe', '0000-00-00 00:00:00', 3, 'm', NULL, 3, 0, 123, 1, 2, 'pepin', 1),
(2, 'd', 'pepe', '2015-08-23 16:42:59', 3, 'm', NULL, 3, 0, 123, 1, 3, 'pepin', 1),
(3, '425', 'twr', '2015-08-23 17:02:37', 1, 'm', NULL, 3, 0, 0, 3, 4, '24524', 1),
(4, 'fd', 'fda', '2015-08-23 17:05:43', 2, 'f', NULL, 3, 0, 452, 3, 4, 'fafd', 1),
(5, 'fdafad', 'fdafa', '2015-08-23 17:10:53', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(6, 'fdafadd', 'fdafa', '2015-08-23 17:11:37', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(7, 'fdafaddd', 'fdafa', '2015-08-23 17:12:15', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(8, 'fdafadddg', 'fdafa', '2015-08-23 17:12:28', 2, 'm', NULL, 1, 0, 134, 3, 4, 'adfad', 1),
(9, 'frgsfg', 'gsfgf', '2015-08-23 17:20:23', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
(10, 'frgsfgh', 'gsfgf', '2015-08-23 17:20:45', 1, 'f', NULL, 1, 0, 34, 3, 4, 'sfgsf', 1),
(11, 'the', 'hethe', '2015-08-23 17:21:54', 2, 'm', NULL, 2, 0, 2142, 3, 4, 'hethe', 1),
(12, '4254', '24524', '2015-08-23 17:26:56', 1, 'm', NULL, 1, 0, 2452, 3, 4, '452452', 1),
(13, '789', '789', '2015-08-23 17:28:16', 1, 'm', NULL, 3, 0, 789, 3, 4, '7789', 1),
(14, '46', '4', '2015-08-23 17:30:14', 2, 'm', NULL, 2, 0, 34, 3, 4, '4', 1),
(15, '423', '23', '2015-08-23 17:32:18', 1, 'm', NULL, 2, 0, 234, 3, 4, '234', 1),
(16, 'er', 're', '2015-08-23 17:34:25', 2, 'm', NULL, 2, 0, 4, 3, 4, 're', 1),
(17, 'feeqeq', 'fe', '2015-08-23 17:36:23', 1, 'm', NULL, 2, 0, 3, 3, 4, 'qeqeq', 1),
(18, '2', '23', '2015-08-23 17:39:52', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
(19, '25', '23', '2015-08-23 17:40:47', 1, 'm', NULL, 2, 0, 3, 3, 4, '234', 1),
(20, 'g', 'g', '2015-08-23 17:42:38', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(21, 'gt', 'gttt', '2015-08-23 17:45:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(22, 'gt2', 'gttt', '2015-08-23 17:46:01', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(23, 'gt3', 'gttt', '2015-08-23 17:46:29', 1, 'f', NULL, 1, 0, 34, 3, 4, 'r', 1),
(24, 'gt4', 'qe', '2015-08-23 17:47:39', 1, 'f', NULL, 3, 0, 1, 3, 4, 'qe', 1),
(25, 'Maxi', 'pepe', '2015-08-23 17:49:27', 2, 'm', NULL, 3, 20, 100, 2, 1, 'maxi-cantarell@hotmail.com', 1),
(26, 'fdfdafdafdfa', 'fadfad', '2015-08-23 17:56:42', 1, 'm', NULL, 2, 234, 5245, 3, 4, 'fadfadfa', 1),
(27, '45245245', '45', '2015-08-23 18:05:48', 1, 'm', NULL, 2, 5454, 545, 3, 4, '454', 1),
(28, '425245', '5245', '2015-08-23 18:11:13', 2, 'm', NULL, 2, 42524, 42524, 3, 4, '42524', 1),
(29, 'LeanBiker', 'pepe', '2015-08-23 18:28:28', 1, 'm', NULL, 1, 21, 23, 3, 4, 'easa', 1),
(30, '646', '6464', '2015-08-23 18:38:28', 1, 'm', NULL, 2, 446, 464, 3, 4, '4646', 1),
(31, 'gdfa', 'fad', '2015-08-23 18:51:10', 1, 'm', NULL, 1, 234, 245, 3, 4, 'fad', 1),
(32, 'lucas', '7410', '2015-08-24 22:20:29', 2, 'm', NULL, 2, 15, 174, 1, 3, 'luks_manga@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `puntos`
--
DROP TABLE IF EXISTS `puntos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `puntos` AS (select `puntuaciones`.`IdReceta` AS `IdReceta`,avg(`puntuaciones`.`Puntuacion`) AS `Puntaje` from `puntuaciones` group by `puntuaciones`.`IdReceta`);

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
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `UsuCread` (`IdUsuarioCreador`);

--
-- Indices de la tabla `historial-horarios`
--
ALTER TABLE `historial-horarios`
  ADD PRIMARY KEY (`IdRecetaHorario`),
  ADD KEY `Historial-Horarios` (`IdHistorial`),
  ADD KEY `Horario` (`IdHorario`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`IdHistoria`),
  ADD KEY `Historial-Accion` (`IdAccion`),
  ADD KEY `HistorialReceta` (`IdReceta`),
  ADD KEY `HistorialUsu` (`IdUsuario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`IdHorario`);

--
-- Indices de la tabla `ingrediente-preexistentes`
--
ALTER TABLE `ingrediente-preexistentes`
  ADD PRIMARY KEY (`IdIngredientePreexistentes`),
  ADD KEY `IPreexistente` (`IdPreexistente`),
  ADD KEY `IngredientePreexistentes` (`IdIngrediente`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`IdIngrediente`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`IdPasos`),
  ADD KEY `pasos-receta` (`IdReceta`);

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
  ADD PRIMARY KEY (`IdPreferencia`),
  ADD KEY `Ingredientes` (`IdIngrediente`),
  ADD KEY `PrefUsuario` (`IdUsuario`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`IdPuntuacion`),
  ADD KEY `PuntuacionRece` (`IdReceta`),
  ADD KEY `PuntuacionUsu` (`IdUsuario`);

--
-- Indices de la tabla `receta-condimentos`
--
ALTER TABLE `receta-condimentos`
  ADD PRIMARY KEY (`IdRecetaCondimento`),
  ADD KEY `Receta` (`IdReceta`),
  ADD KEY `Condimentos` (`IdCondimento`);

--
-- Indices de la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  ADD PRIMARY KEY (`IdRecetaEstacion`),
  ADD KEY `Estaciones` (`IdEstacion`),
  ADD KEY `RecetaEstacion` (`IdReceta`);

--
-- Indices de la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  ADD PRIMARY KEY (`IdRecetaIngrediente`),
  ADD KEY `RecetaIng` (`IdReceta`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`IdReceta`),
  ADD KEY `Receta-Dieta` (`IdDieta`),
  ADD KEY `Receta-Dificultad` (`IdDificultad`),
  ADD KEY `Receta-Piramides` (`IdPiramide`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`IdRutina`);

--
-- Indices de la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  ADD PRIMARY KEY (`IdUsuarioGrupo`),
  ADD KEY `Grupo` (`IdGrupo`),
  ADD KEY `UsuarioGrupos` (`IdUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD KEY `UsuRutina` (`IdRutina`),
  ADD KEY `Usuario-Contextura` (`IdContextura`),
  ADD KEY `Usuario-Dieta` (`IdDieta`),
  ADD KEY `Usuario-PesosIdeales` (`IdPesos-Ideales`),
  ADD KEY `Usuario-Preexistente` (`IdPreexistente`);

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
  MODIFY `IdCondimento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
-- AUTO_INCREMENT de la tabla `historial-horarios`
--
ALTER TABLE `historial-horarios`
  MODIFY `IdRecetaHorario` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `ingrediente-preexistentes`
--
ALTER TABLE `ingrediente-preexistentes`
  MODIFY `IdIngredientePreexistentes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `IdIngrediente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `IdPasos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pesos-ideales`
--
ALTER TABLE `pesos-ideales`
  MODIFY `IdPesos-Ideales` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `piramides`
--
ALTER TABLE `piramides`
  MODIFY `IdPiramide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `preexistentes`
--
ALTER TABLE `preexistentes`
  MODIFY `IdPreexistente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `IdPreferencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `IdPuntuacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `receta-condimentos`
--
ALTER TABLE `receta-condimentos`
  MODIFY `IdRecetaCondimento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  MODIFY `IdRecetaEstacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  MODIFY `IdRecetaIngrediente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `IdReceta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `UsuCread` FOREIGN KEY (`IdUsuarioCreador`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `historial-horarios`
--
ALTER TABLE `historial-horarios`
  ADD CONSTRAINT `Historial-Horarios` FOREIGN KEY (`IdHistorial`) REFERENCES `historiales` (`IdHistoria`),
  ADD CONSTRAINT `Horario` FOREIGN KEY (`IdHorario`) REFERENCES `horarios` (`IdHorario`);

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `Historial-Accion` FOREIGN KEY (`IdAccion`) REFERENCES `acciones` (`IdAccion`),
  ADD CONSTRAINT `HistorialReceta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  ADD CONSTRAINT `HistorialUsu` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `ingrediente-preexistentes`
--
ALTER TABLE `ingrediente-preexistentes`
  ADD CONSTRAINT `IPreexistente` FOREIGN KEY (`IdPreexistente`) REFERENCES `preexistentes` (`IdPreexistente`),
  ADD CONSTRAINT `IngredientePreexistentes` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingredientes` (`IdIngrediente`);

--
-- Filtros para la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD CONSTRAINT `pasos-receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `preferencias`
--
ALTER TABLE `preferencias`
  ADD CONSTRAINT `Ingredientes` FOREIGN KEY (`IdIngrediente`) REFERENCES `ingredientes` (`IdIngrediente`),
  ADD CONSTRAINT `PrefUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `PuntuacionRece` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`),
  ADD CONSTRAINT `PuntuacionUsu` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `receta-condimentos`
--
ALTER TABLE `receta-condimentos`
  ADD CONSTRAINT `Condimentos` FOREIGN KEY (`IdCondimento`) REFERENCES `condimentos` (`IdCondimento`),
  ADD CONSTRAINT `Receta` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `receta-estaciones`
--
ALTER TABLE `receta-estaciones`
  ADD CONSTRAINT `Estaciones` FOREIGN KEY (`IdEstacion`) REFERENCES `estaciones` (`IdEstacion`),
  ADD CONSTRAINT `RecetaEstacion` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `receta-ingredientes`
--
ALTER TABLE `receta-ingredientes`
  ADD CONSTRAINT `RecetaIng` FOREIGN KEY (`IdReceta`) REFERENCES `recetas` (`IdReceta`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `Receta-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  ADD CONSTRAINT `Receta-Dificultad` FOREIGN KEY (`IdDificultad`) REFERENCES `dificultades` (`IdDificultad`),
  ADD CONSTRAINT `Receta-Piramides` FOREIGN KEY (`IdPiramide`) REFERENCES `piramides` (`IdPiramide`);

--
-- Filtros para la tabla `usuario-grupos`
--
ALTER TABLE `usuario-grupos`
  ADD CONSTRAINT `Grupo` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`IdGrupo`),
  ADD CONSTRAINT `UsuarioGrupos` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `UsuRutina` FOREIGN KEY (`IdRutina`) REFERENCES `rutinas` (`IdRutina`),
  ADD CONSTRAINT `Usuario-Contextura` FOREIGN KEY (`IdContextura`) REFERENCES `contexturas` (`IdContextura`),
  ADD CONSTRAINT `Usuario-Dieta` FOREIGN KEY (`IdDieta`) REFERENCES `dietas` (`IdDieta`),
  ADD CONSTRAINT `Usuario-PesosIdeales` FOREIGN KEY (`IdPesos-Ideales`) REFERENCES `pesos-ideales` (`IdPesos-Ideales`),
  ADD CONSTRAINT `Usuario-Preexistente` FOREIGN KEY (`IdPreexistente`) REFERENCES `preexistentes` (`IdPreexistente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
