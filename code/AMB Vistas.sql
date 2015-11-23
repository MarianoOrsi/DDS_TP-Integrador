-- --------------------------------------------------------
--
-- Estructura de vista para la vista `Puntos`
--

create view Puntos as (
select puntuaciones.IdReceta, avg(puntuaciones.Puntuacion) as Puntaje from puntuaciones group by puntuaciones.IdReceta
)
