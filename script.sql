-- Para usar o DAO do framework é necessário criar um usuário com o nome: splitphp_readonlyuser@localhost
SELECT user, host, authentication_string FROM mysql.user;
SELECT * FROM mysql.user;

create user 'splitphp_readonlyuser'@'172.18.0.1' IDENTIFIED BY 'thiago123';

create user 'thiago'@'localhost' IDENTIFIED BY 'thiago';

ALTER USER 'splitphp_readonlyuser'@'172.18.0.1' IDENTIFIED BY 'thiagoqqq';


create database crudsplitphp;

use crudsplitphp;

create table people (

    id int(5) primary key not null auto_increment,
    name text(30) not null,
    email varchar(30) not null,    
    cellphone int(9) not null,
    cpf bigint(11) not null,
    address varchar(40)  
    
);

insert into people (name, email, cellphone, cpf, address) 
values 
    ('teste1', 'testando1@email.com', 3142, 12345678912, 'Rua abc'),
    ('teste2', 'teste2@email.com', 45, 98765432198, 'Rua 123')
;

