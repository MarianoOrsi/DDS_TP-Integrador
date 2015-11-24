DELIMITER $$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_BuscarGruposDeUsuario`(IN usuarioid INT)
begin
SELECT * FROM grupos WHERE IdGrupo IN (SELECT IdGrupo FROM `usuario-grupos` WHERE IdUsuario = usuarioId);
END$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_Recetacalificadasxsexocontexturacalificacion`(IN `sexo` VARCHAR(1), IN `idcont` INT, IN `calif` INT)
SELECT recetas.IdReceta, recetas.Receta
from recetas inner join 
puntuaciones on puntuaciones.IdReceta=recetas.IdReceta inner JOIN
usuarios on puntuaciones.IdUsuario=usuarios.IdUsuario
where puntuaciones.Puntuacion=calif and usuarios.IdContextura=idcont and usuarios.Sexo=sexo
limit 10$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_recetasxdieta`(IN `iddiet` INT)
SELECT recetas.IdReceta, recetas.Receta FROM recetas
where recetas.IdDieta>=iddiet$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_Recetaxcalificacionyestacion`(IN `nota` INT, IN `idestacion` INT)
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
end if;$$
/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_recetaxcond`(IN `idcond` INT)
SELECT recetas.IdReceta,recetas.Receta
from recetas inner join 
`receta-condimentos` on `receta-condimentos`.`IdReceta`=recetas.IdReceta
WHERE `receta-condimentos`.`Idcondimento`=idcond
LIMIT 5$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_RecetaxPiramide`(IN `idPiram` INT)
select recetas.IdReceta, recetas.Receta
from recetas
where recetas.IdPiramide=idpiram
limit 5$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_recetaxpreferencias`(IN `idUsu` INT)
SELECT recetas.IdReceta,recetas.Receta
from preferencias inner JOIN 
ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente inner JOIN
`receta-ingredientes` on`receta-ingredientes`.IdIngrediente=ingredientes.IdIngrediente inner JOIN
recetas on recetas.IdReceta=`receta-ingredientes`.`IdReceta`
where preferencias.IdUsuario=idusu
limit 3$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `sp_RegistrarUsuario`(
    
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

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `UsuariosDeGrupo`(IN `idGrupoParam` INT)
    NO SQL
select * from usuarios usu inner join `usuario-grupos` ug on usu.IdUsuario = ug.IdUsuario where ug.IdGrupo = idGrupoParam$$

/*--------------------------------------------------------------------------------------------------------*/
delimiter $$
CREATE PROCEDURE `VerPreferencias`(IN `IdUsu` INT)
SELECT IdPreferencia, preferencias.IdIngrediente, IdUsuario, ingredientes.Ingrediente FROM preferencias inner join ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente
where idusuario=IdUsu$$

/*--------------------------------------------------------------------------------------------------------*/

delimiter $$
CREATE PROCEDURE `sp_EsCreadorDeGrupo`(IN idGrupoParam INT, IN idUsuarioParam INT)
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

/*--------------------------------------------------------------------------------------------------------*/

delimiter $$
CREATE PROCEDURE `sp_puntuar`(IN idrec INT, IN idUsu INT, IN puntos int)
begin
SELECT @idUsuario_var:=idusuario FROM `puntuaciones` WHERE `puntuaciones`.`IdReceta` = idrec and puntuaciones.IdUsuario=idusu;

if @idUsuario_var = idUsu then
	update puntuaciones set Puntuacion=puntos where puntuaciones.IdReceta=idrec and IdUsuario=idusu;
else
	INSERT INTO `puntuaciones`(`IdReceta`, `IdUsuario`, `Fecha`, `Puntuacion`) VALUES (idRec,IdUsu,now(),puntos);
end if;
end$$

delimiter $$
CREATE PROCEDURE `sp_buscarPasosDeReceta`(IN idReceta INT)
BEGIN
SELECT Descripcion, Foto FROM pasos
WHERE pasos.IdReceta = idReceta 
ORDER BY Paso;
END$$

delimiter $$
create procedure sp_BuscarIngredientesDeReceta (IN recetaID INT)
begin
select ing.Ingrediente, ing.Porcion, ing.Calorias
from ingredientes ing inner join `receta-ingredientes` rec
on (ing.IdIngrediente = REC.IdIngrediente)
WHERE rec.IdReceta = recetaId;
end$$

delimiter $$
create procedure sp_BuscarCondimentosDeReceta (IN recetaId INT)
begin
select con.Condimento from condimentos con
inner join `receta-condimentos` rec
on (con.IdCondimento = rec.IdCondimento)
where rec.IdReceta = recetaId;
end$$

delimiter $$
create procedure sp_BuscarDificultadDeReceta (IN recetaId INT)
begin
select Dificultad from dificultades dif
inner join recetas rec
on (dif.IdDificultad = rec.IdDificultad)
where rec.IdReceta = recetaId;
end$$

delimiter $$
create procedure sp_GuardarRecetaVista (IN usuarioId INT, IN recetaId INT)
begin
INSERT INTO historiales
(IdAccion, IdUsuario, IdReceta, `Fecha de Accion`, `Fecha de Utilizacion`)
VALUES
(3,usuarioId,recetaId, NOW(), NOW());
end
