create database cursophpmercado;

CREATE TABLE produtos (
    id serial primary key,
    nome varchar(255),
    preco decimal(10,2),
    datavalidade timestamp
)