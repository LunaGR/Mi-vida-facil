create database contactos;

use contactos;

create table contactos (
	id int primary key auto_increment,
    nombre varchar (15),
    telefono int (10),
    info varchar (20)
);

insert into contactos ('nombre','telefono','info') values ('Luna', '697883327','hija');
insert into contactos ('nombre','telefono','info') values ('Ana Cristina', '627990876','hija');
insert into contactos ('nombre','telefono','info') values ('Maxi', '608667392','hijo');
insert into contactos ('nombre','telefono','info') values ('Paki', '600897766','hermana');


