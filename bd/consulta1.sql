
/* Realizar una consulta que permita conocer cuál es el producto que más stock tiene.*/
USE konecta
GO
SELECT ID,Nombre, Stock
FROM producto
ORDER BY Stock DESC
LIMIT 1;

