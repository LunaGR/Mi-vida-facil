create database contactos;

use contactos;

create table contactos (
	id int primary key auto_increment,
    nombre varchar (15),
    telefono int (10),
    info varchar (20)
);

