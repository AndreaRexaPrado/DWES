create DATABASE IF NOT EXISTS gesventa;

use gesventa;

DROP TABLE IF EXISTS proveedores;
create table proveedores
(
	cif varchar(15) primary key,
	nom_emp varchar(30) ,
	direccion varchar(45) ,
	poblacion varchar(30) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS productos;
create table productos
(
	cod int(2) primary key,
	nom_prod varchar(40) ,
	pvp decimal(7,2) ,
	prov varchar(15) ,
	imagen varchar(100) ,

  	CONSTRAINT `fk_Productos_Proveedores`
	FOREIGN KEY (`prov`)  
  	REFERENCES proveedores (`cif`)
	ON DELETE CASCADE
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS clientes;
create table clientes
(
	dni varchar(10) primary key,
	nom_cli varchar(45) ,
	ap_cli varchar(45) ,
	direccion varchar(45) ,
	poblacion varchar(30) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS cliProd;
create table cliProd
(
	cod int(2) ,
	dni varchar(10) ,
	cantidad int(2) default 1,

	PRIMARY KEY (`cod`, `dni`),

  	FOREIGN KEY (`cod`)    
	REFERENCES productos(`cod`)
	ON DELETE CASCADE
	ON UPDATE CASCADE,   

	FOREIGN KEY (`dni`)
	REFERENCES clientes(`dni`)
	ON DELETE CASCADE
	ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS usuarios;
create table usuarios
(
	usr varchar(12) ,
	pass varchar(200) ,
	PRIMARY KEY (`usr`, `pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

insert into usuarios values('jcarlos','ce8a1c43066be8c2a40067e1ba1b64e197b26bd4');
insert into usuarios values('javi','9e179d6b17c660dea1ef2200340757532921389d');
insert into usuarios values('ana','beec983e1d29e81bde7148cec004bbbc9e1034f5');


insert into proveedores values('J04131348','Logitech','C/ Faisán, 13'   ,'Leganés');
insert into proveedores values('D7767763A','Ozone'   ,'C/ Miralrio, 61' ,'Trescantos');
insert into proveedores values('P3941094I','Razer'   ,'C/ Vieja, 12'    ,'Madrid');
insert into proveedores values('A36109494','HP'      ,'Av. de Burgos, 7','Madrid');
insert into proveedores values('S9939407D','Acer'    ,'C/ Campillo'     ,'Alcobendas');
insert into proveedores values('R93200509','BenQ'    ,'C/ Velázquez, 80','Madrid');

insert into clientes values('75502678A','Jose'  ,'Martínez' ,'C/ Campoamor, 45, 2B','San Sebastián de los Reyes');
insert into clientes values('84458881Y','Pedro' ,'Alcántara','C/ Real, 10, Bajo A' ,'Alcobendas');
insert into clientes values('82192764X','Marta' ,'Enríquez' ,'C/ Serrano, 90, 4B'  ,'Madrid');
insert into clientes values('62840035X','Eva'   ,'Fernández','C/ Amistad, 7, 3C','Alcobendas');
insert into clientes values('11313629K','Juan'  ,'Gallego'  ,'C/ Palestina, 15, 1D','Trescantos');
insert into clientes values('88271071S','Carlos','Dolado'   ,'C/ Paz, 2, 1A','Alcorcón');
insert into clientes values('56675805X','Manuel','García'   ,'C/ Cruz, 1, 2B','Leganés');
insert into clientes values('05754861P','Sara'  ,'Aparicio' ,'C/ Granja, 8, 2C','Madrid');
insert into clientes values('08455766T','Marcos','Cubero'   ,'C/ Peral, 6, 4A','Trescantos');
insert into clientes values('07331465P','Sandra','Dalmau'   ,'C/ Hierro, 3, 3A','San Sebastián de los Reyes');
insert into clientes values('28127765F','Mario' ,'Velilla'  ,'Av. Soria, 86, 7B','Madrid');

insert into productos values('1', 'Z323',                   51.90,  'J04131348', 'auriculares-mp3.jpg');
insert into productos values('2', 'Z623',                   209,    'J04131348', 'batmanbot.jpeg');
insert into productos values('3', 'Z906',                   399,    'J04131348', 'cargador.jpg');
insert into productos values('4', 'Z506',             	    125,    'J04131348', 'auriculares-mp3.jpg');
insert into productos values('11','Argon',				    50,	    'D7767763A', 'regulador-botella-argon.jpg');
insert into productos values('12','Neon',		    		35,     'D7767763A', 'neon.jpg');
insert into productos values('13','Ocelote',                59.90,  'D7767763A', 'raton-ocelote-gaming.jpg');
insert into productos values('22','Death Stalker',          299.99, 'P3941094I' ,'razer-deathstalker-chroma-keyboard.jpg');
insert into productos values('23','Orb Weaver',             129.99, 'P3941094I', 'orbweaverchroma.png');
insert into productos values('24','Black Widow',            149,    'P3941094I', 'envy-phoenix-810-401lns.jpg');
insert into productos values('31','Envy Phoenix 810-401ns', 2599,   'A36109494', 'envy-phoenix-810-401lns.jpg');
insert into productos values('32','Envy Recline 23-k301ns', 1399,   'A36109494', 'pavillon-500-354ns.jpg');
insert into productos values('33','Pavilion 500-354ns',     499,    'A36109494', 'pavillon-500-354ns.jpg');



insert into cliProd values(3, '75502678A',1);
insert into cliProd values(11,'75502678A',1);
insert into cliProd values(23,'75502678A',1);
insert into cliProd values(3, '84458881Y',1);
insert into cliProd values(22,'84458881Y',1);
insert into cliProd values(2, '82192764X',2);
insert into cliProd values(13,'82192764X',2);
insert into cliProd values(22,'82192764X',2);
insert into cliProd values(1, '62840035X',1);
insert into cliProd values(4, '88271071S',1);
insert into cliProd values(31,'88271071S',1);
insert into cliProd values(11,'88271071S',1);
insert into cliProd values(22,'56675805X',1);
insert into cliProd values(12,'56675805X',1);
insert into cliProd values(32,'05754861P',1);
insert into cliProd values(4, '05754861P',1);
insert into cliProd values(12,'05754861P',1);
insert into cliProd values(24,'08455766T',1);
insert into cliProd values(3, '07331465P',1);
insert into cliProd values(12,'07331465P',1);
insert into cliProd values(22,'07331465P',1);
insert into cliProd values(1, '28127765F',1);
insert into cliProd values(24,'28127765F',1);

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
	cant int(3), 
	primary key(numf, numl)
);

ALTER TABLE facturas
ADD FOREIGN KEY (dni) REFERENCES clientes(dni);

ALTER TABLE lineas
ADD FOREIGN KEY (numf) REFERENCES facturas(numf);

ALTER TABLE `facturas` CHANGE `fecha` `fecha` DATETIME NULL DEFAULT NULL;

ALTER TABLE lineas
ADD FOREIGN KEY (numl) REFERENCES facturas(numf);

ALTER TABLE `clientes` ADD `usr` VARCHAR(12) 
CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER poblacion;

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