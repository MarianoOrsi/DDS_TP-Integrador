DELIMITER $$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_BuscarGruposDeUsuario`(IN usuarioid INT)
begin
SELECT * FROM grupos WHERE IdGrupo IN (SELECT IdGrupo FROM `usuario-grupos` WHERE IdUsuario = usuarioId);
END$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_Recetacalificadasxsexocontexturacalificacion`(IN `sexo` VARCHAR(1), IN `idcont` INT, IN `calif` INT)
SELECT recetas.IdReceta, recetas.Receta
from recetas inner join 
puntuaciones on puntuaciones.IdReceta=recetas.IdReceta inner JOIN
usuarios on puntuaciones.IdUsuario=usuarios.IdUsuario
where puntuaciones.Puntuacion=calif and usuarios.IdContextura=idcont and usuarios.Sexo=sexo
limit 10$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_recetasxdieta`(IN `iddiet` INT)
SELECT recetas.IdReceta, recetas.Receta FROM recetas
where recetas.IdDieta>=iddiet$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_Recetaxcalificacionyestacion`(IN `nota` INT, IN `idestacion` INT)
select recetas.IdReceta, recetas.Receta FROM recetas inner join `receta-estaciones` on recetas.IdReceta= `receta-estaciones`.IdReceta inner JOIN puntuaciones on puntuaciones.IdReceta=recetas.IdReceta
where puntuaciones.Puntuacion=nota and `receta-estaciones`.IdEstacion=idestacion$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_recetaxcond`(IN `idcond` INT)
SELECT recetas.IdReceta,recetas.Receta
from recetas inner join 
`receta-ingredientes` on `receta-ingredientes`.`IdReceta`=recetas.IdReceta
WHERE `receta-ingredientes`.`Tipo`=2 and `receta-ingredientes`.`IdIngrediente`=idcond
LIMIT 5$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_RecetaxPiramide`(IN `idPiram` INT)
select recetas.IdReceta, recetas.Receta
from recetas
where recetas.IdPiramide=idpiram
limit 5$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `sp_recetaxpreferencias`(IN `idUsu` INT)
SELECT recetas.IdReceta,recetas.Receta
from preferencias inner JOIN 
ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente inner JOIN
`receta-ingredientes` on`receta-ingredientes`.IdIngrediente=ingredientes.IdIngrediente inner JOIN
recetas on recetas.IdReceta=`receta-ingredientes`.`IdReceta`
where preferencias.IdUsuario=idusu
limit 3$$

/*--------------------------------------------------------------------------------------------------------*/

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

CREATE PROCEDURE `UsuariosDeGrupo`(IN `idGrupoParam` INT)
    NO SQL
select * from usuarios usu inner join `usuario-grupos` ug on usu.IdUsuario = ug.IdUsuario where ug.IdGrupo = idGrupoParam$$

/*--------------------------------------------------------------------------------------------------------*/

CREATE PROCEDURE `VerPreferencias`(IN `IdUsu` INT)
SELECT IdPreferencia, preferencias.IdIngrediente, IdUsuario, ingredientes.Ingrediente FROM preferencias inner join ingredientes on preferencias.IdIngrediente=ingredientes.IdIngrediente
where idusuario=IdUsu$$

/*--------------------------------------------------------------------------------------------------------*/

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