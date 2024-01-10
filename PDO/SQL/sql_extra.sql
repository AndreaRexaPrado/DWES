ALTER TABLE usuarios ADD rol varchar(3) DEFAULT 'cli';
ALTER TABLE usuarios ADD email varchar(30);

ALTER TABLE `productos` ADD `existencias` INT NOT NULL DEFAULT '0' AFTER `imagen`;

UPDATE productos SET existencias= 8
WHERE cod%2=1 AND cod >10;

CREATE TABLE facturas ( 
	numf int(10) auto_increment PRIMARY KEY, 
	fecha date, 
	dni varchar(10) NOT NULL );


CREATE TABLE lineas(
	numl int(2), 
	numf int(10),
	cod  int(10),
	cant in(3), 
	primary key(numf, numl)
)

ALTER TABLE facturas
ADD FOREIGN KEY (dni) REFERENCES clientes(dni);

ALTER TABLE lineas
ADD FOREIGN KEY (numf) REFERENCES facturas(numf);

ALTER TABLE `facturas` CHANGE `fecha` `fecha` DATETIME NULL DEFAULT NULL;

ALTER TABLE lineas
ADD FOREIGN KEY (numf) REFERENCES facturas(numf);

ALTER TABLE `clientes` ADD `usr` VARCHAR(12) 
CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER poblacion

<!-- primero tengo que incluir todos los clientes en usuarios con valor correcto-->

ALTER TABLE clientes
ADD FOREIGN KEY (usr) REFERENCES usuarios(usr);

UPDATE clientes 
SET usr= CONCAT( 
			lcase(substr(nom_cli, 1, 1)), 
			lcase(substr(ap_cli, 1, 1)), 
			substr(dni, 1, 3) 
		) ;
		

DELETE FROM facturas WHERE
numf NOT IN (
	SELECT DISTINCT numf FROM lineas
)


UPDATE productos
   SET existencias = CASE cod 
                      WHEN 1 THEN existencias-1
                      WHEN 11 THEN existencias-3
                      ELSE existencias-2
                      END
 WHERE cod IN(1, 11, 23);





