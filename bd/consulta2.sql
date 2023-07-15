/* Realizar una consulta que permita conocer cuál es el producto más vendido.*/
USE konecta
GO
SELECT v.FK_IdProducto as IdProducto , p.Nombre, MAX(v.Cantidad) as Cantidad
FROM venta as v
INNER JOIN producto as p
ON v.FK_IdProducto = p.ID LIMIT 1;

