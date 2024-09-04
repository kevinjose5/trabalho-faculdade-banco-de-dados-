para o bom funcionamento do sistema baixe o easyphp ele ja vem com gerenciador PHPmyAdmin e o banco de dados MySQL 
execute o codigo sql a seguir para a criação do banco de dados e das tabelas 

-- Criando o banco de dados
CREATE DATABASE nota_material;

-- Usando o banco de dados 
USE nota_material;

-- Criando a primeira tabela
CREATE TABLE nfiscal (
    idnota INT PRIMARY KEY AUTO_INCREMENT,
    chave VARCHAR(100),
    obra VARCHAR(100),
    notafiscal int (10)
);

-- Criando a segunda tabela
CREATE TABLE material (
    idmaterial INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(100),
    unitario float,
    valorunitario float,
    total float,
    idnota INT,
    FOREIGN KEY (idnota) REFERENCES NOTAS(idnota)
);
