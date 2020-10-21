create database if not exists db_mundodigital;
use db_mundodigital;

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















