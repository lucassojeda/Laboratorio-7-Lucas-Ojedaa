CREATE DATABASE tienda20244;

USE tienda20244;

CREATE TABLE Cliente (
    Cod_cli INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Email VARCHAR(100),
    Calle VARCHAR(100),
    Numero VARCHAR(10)
);


CREATE TABLE Producto (
    Cod_p INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Precio DECIMAL(10, 2) NOT NULL
);


CREATE TABLE Detalle (
    Cod INT AUTO_INCREMENT PRIMARY KEY,
    Descripcion TEXT NOT NULL,
    Origen VARCHAR(100),
    Cod_p INT,
    FOREIGN KEY (Cod_p) REFERENCES Producto(Cod_p)
);


CREATE TABLE Cliente_Producto (
    Cod_cli INT,
    Cod_p INT,
    Fecha DATE,
    PRIMARY KEY (Cod_cli, Cod_p),
    FOREIGN KEY (Cod_cli) REFERENCES Cliente(Cod_cli),
    FOREIGN KEY (Cod_p) REFERENCES Producto(Cod_p)
);
