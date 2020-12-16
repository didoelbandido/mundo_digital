
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
`nombre` text not null,
`descripcion` text not null,
`estado` int(10) unsigned NOT NULL,
`foto` varchar(200) null,
`nivel` varchar(45) NOT NULL,
`obje` text not null,
`conva` text not null,
`link` text not null,
 PRIMARY KEY (`idcurso`) USING BTREE,
 KEY `FK_curso_1` (`estado`),
CONSTRAINT `FK_curso_1` FOREIGN KEY (`estado`) REFERENCES `estado_curso` (`codestado`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

insert into `curso` (`idcurso`,`nombre`,`descripcion`,`estado`,`foto`,`nivel`,`obje`,`conva`,`link`) values
('CUR001','Orientaciones para la ejecución del proceso de traslado de estudiantes de formación inicial docente de carreras profesionales a programas de estudios licenciados en EESP','El curso tiene la finalidad de brindar a las Escuelas de Educación Superior Pedagógica (EESP) la guía necesaria para ejecutar con efectividad los procesos de traslado a programas de estudios licenciados y convalidación respectiva de sus estudiantes de Formación Inicial Docente que al momento del licenciamiento de la institución se encuentren desarrollando currículos de carreras profesionales; ello, en el marco de lo regulado por la Vigésima Cuarta Disposición Complementaria Transitoria del Reglamento la Ley N° 30512, Ley de Institutos y Escuelas de Educación Superior y de la Carrera Pública de sus Docentes, aprobado por Decreto Supremo N° 010-2017-MINEDU.',1,'curso2.png','Medio','Proceso académico mediante el cual un estudiante que culmina estudios entre el I al VII ciclo de acuerdo al plan de estudios de una carrera profesional pasa a continuar con su formación académica de acuerdo al plan de estudios de un programa de estudios licenciado. Para el efecto su registro académico es sujeto de modificaciones en base a lo establecido en las tablas de convalidación y a decisiones de la EESP sobre el proceso de aprobación de los cursos reprogramados y pendientes que surgen como resultado del proceso de convalidación, que son aprobadas mediante resolución directoral de la EESP y respaldadas con actas de evaluación.','Proceso académico mediante el cual un estudiante que culmina estudios entre el I al VII ciclo de acuerdo al plan de estudios de una carrera profesional pasa a continuar con su formación académica de acuerdo al plan de estudios de un programa de estudios licenciado. Para el efecto su registro académico es sujeto de modificaciones en base a lo establecido en las tablas de convalidación y a decisiones de la EESP sobre el proceso de aprobación de los cursos reprogramados y pendientes que surgen como resultado del proceso de convalidación, que son aprobadas mediante resolución directoral de la EESP y respaldadas con actas de evaluación.','http://www.minedu.gob.pe/superiorpedagogica/producto/orientaciones-convalidacion-de-carrera-a-programa-en-eesp/'),
('CUR002','Curso virtual autoformativo de tecnología de la información y comunicación para la formación no presencial para docentes nombrados de IESP','El curso de tecnología de la información y comunicación es una acción formativa correspondiente al desarrollo profesional que promueve el fortalecimiento de competencias digitales haciendo uso de las TIC.',3,'curso1.jpg','Bajo','Promover el fortalecimiento de las capacidades en el uso de las TIC para el desempeño profesional en la educación no presencial; para los docentes de Institutos de Educación Superior Pedagógica públicos.','No Especificada','https://docs.google.com/uc?export=download&id=1uorQJ7DMJXVYEXqrdQMM71vg4F4E-fTX'),
('CUR003','Curso Mooc autoformativo “Habilidades Pedagógicas”','El curso de habilidades pedagógicas es de naturaleza MOOC cuya acción formativa corresponde al desarrollo profesional que promueve el fortalecimiento de competencias de los docentes formadores de IESP/EESP públicos y privados.',2,'logo_banner.png','Avanzado','Promover el fortalecimiento de las competencias y capacidades profesionales de los docentes formadores atendiendo a las necesidades formaticas, previamente identificadas.','El curso de habilidades pedagógicas está a cargo del Ministerio de Educacion.','http://www.minedu.gob.pe/superiorpedagogica/curso-de-habilidades-pedagogicas/');




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
`obje` text not null,
`link` text not null,
`dia` text not null,
`Mes` text not null,
 PRIMARY KEY (`idevento`) USING BTREE,
 KEY `FK_evento_1` (`estado`),
CONSTRAINT `FK_evento_1` FOREIGN KEY (`estado`) REFERENCES `estado_evento` (`codestado`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
insert into `evento` (`idevento`,`nombre`,`descripcion`,`estado`,`foto`,`obje`,`link`,`dia`,`Mes`) values
('EVN001','Evento Mooc autoformativo “Habilidades Pedagógicas” (2da Edición)','El curso de habilidades pedagógicas es de naturaleza MOOC cuya acción formativa corresponde al desarrollo profesional que promueve el fortalecimiento de competencias de los docentes formadores de IESP/EESP públicos y privados.',2,'evento1.png','A partir del 2015, el Minedu ha implementado el uso de contraseñas para las consultas de expedientes ingresados por la mesa de partes. Si usted ingresó un documento, su contraseña se encuentra impresa en el Ticket que le ha sido entregado en las ventanillas de la Mesa de Partes.','http://www.minedu.gob.pe/superiorpedagogica/curso-de-habilidades-pedagogicas/','03','NOVIEMBRE');



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
  `id_user` int(11) AUTO_INCREMENT ,
  `login` char(20) NOT NULL,
  `clave` text NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
   PRIMARY KEY (`id_user`) USING BTREE
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (`id_user`, `login`, `clave`, `id_tipo`, `descripcion`,`nombre`) VALUES
(0, 'efvillan@gmail.com', '$2y$10$qyXrYZUtRFN8OGWiA48y0uRuH8ItGT42a7sXJE0.2P\/CrIT8eAPcS', 1, 'Jefe','Esteban');


-- tabla Accesos
drop table if exists  `accesos`;
CREATE TABLE `accesos` (
  `idacceso` int(10) AUTO_INCREMENT,
  `idpagina` int(10) UNSIGNED NOT NULL,
  `estado` smallint(5) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`idacceso`) USING BTREE
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
in v_estado int(10),
in v_foto varchar(200),
in v_nivel varchar(45),
in v_obje text,
in v_conva text,
in v_link text,
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
insert into curso(`idcurso`,`nombre`,`descripcion`,`estado`,`foto`,`nivel`,`obje`,`conva`,`link`)values
(id,upper(v_nombre),v_descripcion,v_estado,v_foto,v_nivel,v_obje,v_conva,v_link );
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
select c.idcurso f1, c.nombre f2, c.descripcion f3,  ec.descripcion f4, c.foto f6, c.nivel f5, c.obje f7, c.conva f8, c.link f9
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
in v_obj text,
in v_link text,
in v_dia text,
in v_mes text,
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
insert into evento(`idevento`,`nombre`,`descripcion`,`estado`,`foto`,`obje`,`link`,`dia`,`Mes`)values
(id,upper(v_nombre),v_descripcion,v_estado,v_foto,v_obj,v_link,v_dia,upper(v_mes));
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
select c.idevento f1, c.nombre f2, c.descripcion f3,  ev.descripcion f5, c.foto f6, c.obje f7,c.link f8,c.dia f9, c.Mes f10
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


-- Listar Cursos Presencial,Online, Libro Digital
DROP PROCEDURE IF EXISTS `sp_reporte_curso`;

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reporte_curso` ()  BEGIN
select case when estado = 1  then 'Online' 
        when estado = 2 then 'Presencial' else 'Libro Digital' end as v1 ,count(*) as v2 from curso
group by
case when estado = 1 then 'Online' 
		when estado = 2 then 'Presencial'
        else 'Libro Digital' end;

END$$


-- Registrar Usuario

-- Registrar un nuevo evento

drop procedure if exists `sp_registrar_usuario`;

delimiter $$

create definer=`root`@`localhost` procedure `sp_registrar_usuario`(
in v_login VARCHAR(20),
in v_nombre VARCHAR(30),
in v_pass text,
out v_res bool)
begin 
declare exit handler for sqlexception
begin rollback;
set v_res=false;
end;

start transaction;
begin

insert into usuario(`id_user`, `login`, `clave`, `id_tipo`, `descripcion`,`nombre`)values
('',v_login,v_pass,2,'cliente',v_nombre);
end;
start transaction;
begin
declare id char(6);
set id = (Select count(*) from usuario);
insert into accesos(`idacceso`, `idpagina`, `estado`, `id_user`)values
('',1,1,id),
('',3,1,id),
('',4,1,id),
('',6,1,id);

end;

commit;
set v_res=true;

end $$

DELIMITER ;




