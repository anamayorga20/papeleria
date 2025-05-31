-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS papeleria
  CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE papeleria;

CREATE TABLE categorias (
  id_categoria  INT AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(100) NOT NULL
);

CREATE TABLE clientes (
  id_cliente    INT AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(150) NOT NULL,
  correo        VARCHAR(150),
  telefono      VARCHAR(20),
  fecha_reg     DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
  id_producto     INT AUTO_INCREMENT PRIMARY KEY,
  nombre_producto VARCHAR(200) NOT NULL,
  precio          DECIMAL(10,2) NOT NULL,
  stock           INT          NOT NULL,
  id_categoria    INT          NOT NULL,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE pedidos (
  id_pedido     INT AUTO_INCREMENT PRIMARY KEY,
  id_cliente    INT          NOT NULL,
  fecha_pedido  DATETIME     DEFAULT CURRENT_TIMESTAMP,
  total         DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE detalle_pedidos (
  id_detalle      INT AUTO_INCREMENT PRIMARY KEY,
  id_pedido       INT          NOT NULL,
  id_producto     INT          NOT NULL,
  cantidad        INT          NOT NULL,
  precio_unitario DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_pedido)   REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);