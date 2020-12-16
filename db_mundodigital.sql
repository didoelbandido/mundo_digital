
DROP DATABASE IF EXISTS db_mundodigital;

create database if not exists db_mundodigital;
use db_mundodigital;

-- Creando mensajes
drop table if exists  `mensaje_contacto`;
create table `mensaje_contacto`(
`idmensaje` char(6)  not null unique ,
`nombre` varchar(50) not null,
`email` varchar(100) not null,
`phone` int(9) unsigned not null,
`message` text not null,
primary key (`idmensaje`) 
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into `mensaje_contacto` (`idmensaje`,`nombre`,`email`,`phone`,`message`)values
('MEN001','Esteban','bitanelbandid@gmail.com','942404311','Hola queria saber como ingreso un curso nuevo'),
('MEN002','sayi','sayirvt@gmail.com','942402311','Hola queria saber como ingreso un curso nuevo');


-- Creando  tabla estado
DROP TABLE IF EXISTS `estado_curso`;
CREATE TABLE `estado_curso` (
  `codestado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`codestado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into `estado_curso` (`codestado`,`descripcion`) values
(1,'Online'),
(2,'Presencial'),
(3,'Lectura');




-- Creando tabla Curso
drop table if exists  `curso`;
create table `curso`(
`idcurso` char(6) not null unique,
`nombre` varchar(50) not null,
`descripcion` text not null,
`docente` varchar(50) not null,
`estado` int(10) unsigned NOT NULL,
`foto` varchar(200) null,
 PRIMARY KEY (`idcurso`) USING BTREE,
 KEY `FK_curso_1` (`estado`),
CONSTRAINT `FK_curso_1` FOREIGN KEY (`estado`) REFERENCES `estado_curso` (`codestado`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into `curso` (`idcurso`,`nombre`,`descripcion`,`docente`,`estado`,`foto`) values
('CUR001','Curso de Excel','Es un curso que te practico','Juan Pereaz',1,null),
('CUR002','Curso de PHP','Es un curso que teorico','Lorem',3,null),
('CUR003','Photoshop UCV','Es un curso que te practico, necesario tableta grafica','Juan Lurdes',2,null);



-- Creando  tabla estado
DROP TABLE IF EXISTS `estado_evento`;
CREATE TABLE `estado_evento` (
  `codestado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`codestado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into `estado_evento` (`codestado`,`descripcion`) values
(1,'Online'),
(2,'Presencial');



-- Creando tabla de Evento
drop table if exists  `evento`;
create table `evento`(
`idevento` char(6) not null unique,
`nombre` varchar(50) not null,
`descripcion` text not null,
`estado` int(10) unsigned NOT NULL,
`foto` varchar(200) null,
 PRIMARY KEY (`idevento`) USING BTREE,
 KEY `FK_evento_1` (`estado`),
CONSTRAINT `FK_evento_1` FOREIGN KEY (`estado`) REFERENCES `estado_evento` (`codestado`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
insert into `evento` (`idevento`,`nombre`,`descripcion`,`estado`,`foto`) values
('EVN001','Infomatica para Grandes','Es un evento que te practico',1,null);



-- Creando tabla accesso
drop table if exists  `paginas`;
CREATE TABLE `paginas` (
  `idpagina` int(10) UNSIGNED NOT NULL,
  `controlador` varchar(250) NOT NULL,
  `metodo` varchar(250) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `paginas` (`idpagina`, `controlador`, `metodo`) VALUES
(1, 'curso', 'index'),
(2, 'curso', 'doSave'),
(3, 'curso', 'doList'),
(4, 'evento', 'index'),
(5, 'evento', 'doSave'),
(6, 'evento', 'doList');


-- Creando Tabla Usuarios
drop table if exists  `usuario`;
CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `login` char(20) NOT NULL,
  `clave` text NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (`id_user`, `login`, `clave`, `id_tipo`, `descripcion`,`nombre`) VALUES
(1, 'efvillan@gmail.com', '$2y$10$qyXrYZUtRFN8OGWiA48y0uRuH8ItGT42a7sXJE0.2P\/CrIT8eAPcS', 1, 'Jefe','Esteban');


-- tabla Accesos
drop table if exists  `accesos`;
CREATE TABLE `accesos` (
  `idacceso` int(10) UNSIGNED NOT NULL,
  `idpagina` int(10) UNSIGNED NOT NULL,
  `estado` smallint(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO `accesos` (`idacceso`, `idpagina`, `estado`, `id_user`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1);



-- Procedimientos almacenados

-- Listar mensajes

drop procedure if exists `sp_listar_mensajes`;

delimiter $$

create definer=`root`@`localhost` procedure `sp_listar_mensajes`()
begin
select idmensaje f1, nombre f2, email f3, phone f4, message f5
from mensaje_contacto;
end $$

DELIMITER ;


-- Registrar un mensaje

drop procedure if exists `sp_registrar_mensaje`;

delimiter $$

create definer=`root`@`localhost` procedure `sp_registrar_mensaje`(
in v_nombre varchar(50),
v_email varchar(100),
v_phone int, 
v_message text, 
out v_res bool)
begin 
declare exit handler for sqlexception
begin rollback;
set v_res=false;
end;

start transaction;
begin
declare num  int;
declare id char(6);
set num=(Select count(*)+1 from mensaje_contacto);
set id = concat(left('MEN00', 6 - char_length(num)),num);
insert into mensaje_contacto(idmensaje,nombre,email,phone,message)values
(id,upper(v_nombre),upper(v_email),v_phone,upper(v_message));
end;
commit;
set v_res=true;

end $$

DELIMITER ;



-- Listar Estado_Curso

DROP PROCEDURE IF EXISTS `sp_listar_estado`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_estado`()
BEGIN
select codestado f1,descripcion f2 from estado_curso ;
END $$

DELIMITER ;


-- Registrar Curso

drop procedure if exists `sp_registrar_curso`;

delimiter $$

create definer=`root`@`localhost` procedure `sp_registrar_curso`(
in v_nombre VARCHAR(50),
in v_descripcion text,
in v_docente varchar(50),
in v_estado int(10),
in v_foto varchar(200),
out v_res bool)
begin 
declare exit handler for sqlexception
begin rollback;
set v_res=false;
end;

start transaction;
begin
declare num  int;
declare id char(6);
set num=(Select count(*)+1 from curso);
set id = concat(left('CUR00', 6 - char_length(num)),num);
insert into curso(idcurso,nombre,descripcion,docente,estado,foto)values
(id,upper(v_nombre),v_descripcion,upper(v_docente),v_estado,v_foto);
end;
commit;
set v_res=true;

end $$

DELIMITER ;


-- Listar Curso

DROP PROCEDURE IF EXISTS `sp_listar_curso`;

DELIMITER $$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_curso`()
BEGIN
select c.idcurso f1, c.nombre f2, c.descripcion f3, c.docente f4, ec.descripcion f5, c.foto f6
from curso c inner join estado_curso ec on c.estado=ec.codestado;
END $$


DELIMITER ;




-- Listar Estado_Evento

DROP PROCEDURE IF EXISTS `sp_listar_estado_evento`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_estado_evento`()
BEGIN
select codestado f1,descripcion f2 from estado_evento ;
END $$

DELIMITER ;

-- Registrar un nuevo evento

drop procedure if exists `sp_registrar_evento`;

delimiter $$

create definer=`root`@`localhost` procedure `sp_registrar_evento`(
in v_nombre VARCHAR(50),
in v_descripcion text,
in v_estado int(10),
in v_foto varchar(200),
out v_res bool)
begin 
declare exit handler for sqlexception
begin rollback;
set v_res=false;
end;

start transaction;
begin
declare num  int;
declare id char(6);
set num=(Select count(*)+1 from evento);
set id = concat(left('EVN00', 6 - char_length(num)),num);
insert into evento(idevento,nombre,descripcion,estado,foto)values
(id,upper(v_nombre),v_descripcion,v_estado,v_foto);
end;
commit;
set v_res=true;

end $$

DELIMITER ;


-- Listar eventos

DROP PROCEDURE IF EXISTS `sp_listar_evento`;

DELIMITER $$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_evento`()
BEGIN
select c.idevento f1, c.nombre f2, c.descripcion f3,  ev.descripcion f5, c.foto f6
from evento c inner join estado_evento ev on c.estado=ev.codestado;
END $$


DELIMITER ;


-- Validar Usuario
DROP PROCEDURE IF EXISTS `sp_validarUsuario`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validarUsuario` (IN `v_user` CHAR(20), IN `v_clave` TEXT)  BEGIN
select id_user v1, login v2, clave v3,id_tipo v4, descripcion v5, nombre v6 from  usuario

where login=v_user;

END $$

DELIMITER ;


-- Listar acceso
DROP PROCEDURE IF EXISTS `sp_listar_accesos`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_accesos` (IN `v_id_user` INT)  BEGIN
select p.idpagina v1 ,concat
(p.controlador,p.metodo) v2
from accesos a inner join paginas p on a.idpagina=p.idpagina where a.id_user=v_id_user and a.estado=1;
END $$



