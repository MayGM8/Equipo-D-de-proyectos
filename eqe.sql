/*
---------------------------------------------------------------------------------------------------------------------
********************************  DISEÑO DE PROYECTOS DE SISTEMAS DE INFORMATICOS - 5CV80  *********************************
*********************  UNIDAD PROFESIONAL DE INGENIERIA Y CIENCIAS SOCIALES Y ADMINISTRATIVAS - UPIICSA|  *******************
                                    =====================>|| Equipo E ||<=======================
---------------------------------------------------------------------------------------------------------------------                                    
        Integrantes                     ||    Coevaluacion
-----------------------------------------------------------------------------------------------------------------------
    * Jimenez Valenzuela Guillermo      ||      1
    * Mendoza Lozano Mauricio           ||      1
    * Ornelas Garcia Israel Fernando    ||      1
    * Gomez Medina Maydelin Lucero      ||      1

----------------------------------------------------------------------------------------------------------------------
*/
DROP DATABASE IF EXISTS eqe;
CREATE DATABASE eqe;


DROP USER IF EXISTS 'invitado'@'localhost';
CREATE USER 'invitado'@'localhost' IDENTIFIED BY 'invitado';
GRANT ALL PRIVILEGES ON *.* TO 'invitado'@'localhost';
FLUSH PRIVILEGES;

USE eqe;

-- Tabla "Producto"
CREATE TABLE Producto (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50),
    marca VARCHAR(150),
    descripcion TEXT,
    costo DECIMAL(10,2),    
    stock ENUM ('disponible', 'agotado')
);

INSERT INTO eqe.Producto (nombre, marca, descripcion, costo, stock)
VALUES 
    ('Reloj de Pulsera', 'Timezone', 'Reloj de pulsera analógico con correa de cuero', 79.99, 'disponible'),
    ('Perfume Floral', 'Blossom Fragrances', 'Perfume floral con notas de jazmín y rosa', 59.99, 'disponible'),
    ('Gafas de Sol', 'Sunshine Optics', 'Gafas de sol con montura de acetato y lentes polarizadas', 129.99, 'disponible'),
    ('Bolsa de Mano', 'Fashion Avenue', 'Bolsa de mano de cuero sintético con cierre de cremallera', 49.99, 'disponible'),
    ('Camisa de Algodón', 'Cotton Classics', 'Camisa de algodón de manga larga con estampado a rayas', 39.99, 'disponible'),
    ('Zapatillas Deportivas', 'Active Footwear', 'Zapatillas deportivas con suela amortiguada y diseño moderno', 89.99, 'disponible'),
    ('Paleta de Sombras', 'Colorful Cosmetics', 'Paleta de sombras de ojos con una variedad de tonos', 24.99, 'disponible'),
    ('Bolso de Cuero', 'Luxury Leather', 'Bolso de cuero genuino con asas y correa ajustable', 149.99, 'disponible'),
    ('Chaqueta de Mezclilla', 'Denim Trends', 'Chaqueta de mezclilla con botones y bolsillos en el frente', 69.99, 'disponible'),
    ('Sudadera con Capucha', 'Urban Style', 'Sudadera con capucha y bolsillo canguro, ideal para clima frío', 54.99, 'disponible'),
    ('Pendientes de Plata', 'Silver Elegance', 'Pendientes de plata esterlina con piedras preciosas incrustadas', 79.99, 'disponible'),
    ('Billetera de Cuero', 'Classic Leather', 'Billetera de cuero genuino con múltiples compartimentos', 39.99, 'disponible'),
    ('Vestido de Noche', 'Evening Glam', 'Vestido de noche elegante con detalles de encaje y escote pronunciado', 149.99, 'disponible'),
    ('Lámpara de Mesa', 'Lighting Innovations', 'Lámpara de mesa con base de cerámica y pantalla de tela', 69.99, 'disponible'),
    ('Pantalones Vaqueros', 'Denim Deluxe', 'Pantalones vaqueros de corte recto y lavado oscuro', 59.99, 'disponible'),
    ('Cartera de Cuero', 'Premium Accessories', 'Cartera de cuero genuino con múltiples ranuras para tarjetas', 49.99, 'disponible'),
    ('Reloj Inteligente', 'Tech Innovations', 'Reloj inteligente con pantalla táctil y funciones avanzadas', 199.99, 'disponible'),
    ('Lápiz Labial', 'Beauty Essentials', 'Lápiz labial de larga duración con acabado mate', 19.99, 'disponible'),
    ('Reloj de Pared', 'Timeless Decor', 'Reloj de pared de estilo vintage con números romanos', 79.99, 'disponible'),
    ('Botella de Agua', 'Hydration Nation', 'Botella de agua reutilizable de acero inoxidable, capacidad de 500 ml', 29.99, 'disponible'),
    ('Calcetines Estampados', 'Fun Socks', 'Calcetines de algodón con diseños divertidos y coloridos', 9.99, 'disponible'),
    ('Mochila Resistente', 'Adventure Gear', 'Mochila resistente al agua con múltiples compartimentos', 59.99, 'disponible'),
    ('Blazer de Terciopelo', 'Velvet Elegance', 'Blazer de terciopelo con corte ajustado y solapa satinada', 129.99, 'disponible'),
    ('Caja de Herramientas', 'Pro Tools', 'Caja de herramientas de metal con varios compartimentos y asa de transporte', 49.99, 'disponible'),
    ('Pendientes de Aro', 'Modern Jewelry', 'Pendientes de aro de acero inoxidable con diseño minimalista', 24.99, 'disponible'),
    ('Set de Brochas de Maquillaje', 'Beauty Glam', 'Set de brochas de maquillaje con cerdas suaves y mango de madera', 39.99, 'disponible'),
    ('Cámara Instantánea', 'Snapshots', 'Cámara instantánea con impresión de fotos al instante', 89.99, 'disponible');
-- Tabla "Usuario"
CREATE TABLE Usuario (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50),
    telefono VARCHAR(50),
    rol VARCHAR(50)
);

INSERT INTO eqe.Usuario (nombre, telefono, rol)
VALUES 
    ('Juan Perez', '555-1234', 'Administrador'),
    ('María García', '555-5678', 'Usuario'),
    ('Luis Hernandez', '555-9012', 'Usuario'),
    ('Lucía Rodríguez', '555-2345', 'Usuario');


-- Tabla "Venta"
CREATE TABLE Venta (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    forma_pago ENUM('Efectivo', 'Tarjeta de credito','Tarjeta de debito','Transferencia bancaria'),
    id_usuario INT,
    total DECIMAL(10,2),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id)
);

INSERT INTO eqe.Venta (forma_pago, id_usuario, total)
VALUES 
    ('Tarjeta de credito', 1, 150.50),
    ('Efectivo', 2, 75.25),
    ('Transferencia bancaria', 3, 200.00),
    ('Tarjeta de debito', 3, 50.75),
    ('Efectivo', 2, 120.00),
    ('Tarjeta de credito', 3, 90.50),
    ('Transferencia bancaria', 2, 180.75),
    ('Efectivo', 2, 300.00),
    ('Tarjeta de debito', 3, 75.25),
    ('Tarjeta de credito', 4, 110.00),
    ('Transferencia bancaria', 2, 250.50),
    ('Efectivo', 1, 80.25),
    ('Tarjeta de debito', 1, 160.00),
    ('Tarjeta de credito', 3, 40.50),
    ('Efectivo', 2, 95.75),
    ('Transferencia bancaria', 2, 210.00),
    ('Tarjeta de debito', 1, 55.25),
    ('Tarjeta de credito', 2, 130.00),
    ('Efectivo', 2, 220.50),
    ('Transferencia bancaria', 4, 65.25);

-- Tabla "Cliente"
CREATE TABLE Cliente (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    direccion VARCHAR(50),
    nombre VARCHAR(50),
    telefono VARCHAR(50)
);


INSERT INTO Cliente (direccion, nombre, telefono)
VALUES
    ('Calle Principal 123', 'Juan Pérez', '555-1234'),
    ('Avenida Central 456', 'María Gómez', '555-5678'),
    ('Calle Secundaria 789', 'Pedro López', '555-9012'),
    ('Boulevard Norte 321', 'Ana Rodríguez', '555-3456'),
    ('Callejón Este 654', 'Luisa Hernández', '555-7890'),
    ('Avenida Sur 987', 'Carlos Ramírez', '555-2345'),
    ('Calle Oeste 210', 'Laura Castro', '555-6789'),
    ('Avenida Principal 543', 'Miguel Torres', '555-0123'),
    ('Calle Central 876', 'Sofía Martínez', '555-4567'),
    ('Boulevard Norte 109', 'Jorge Sánchez', '555-8901');


-- Tabla "PlanDeAbono"
CREATE TABLE PlanDeAbono (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titulo_plan VARCHAR(50),
    meses_sin_intereses INT,
    comision DECIMAL(10,2),
    plazo INT
);


INSERT INTO PlanDeAbono (titulo_plan, meses_sin_intereses, comision, plazo)
VALUES
    ('Contado', 1, 0.0, 1),
    ('3 meses', 3, 0.3, 3),
    ('6 meses', 6, 0.7, 6),
    ('12 meses', 12, 0.9, 12);

-- Tabla "Apartado"
CREATE TABLE Apartado (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_cliente INT,
    restante DECIMAL(10,2),
    id_plan INT,
    total DECIMAL(10,2),
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id),
    FOREIGN KEY (id_plan) REFERENCES PlanDeAbono(id)
);


-- Tabla "Abono"
CREATE TABLE Abono (
    id_apartado INT,
    monto DECIMAL(10,2),
    saldo_anterior DECIMAL(10,2),
    saldo_actual DECIMAL(10,2),
    FOREIGN KEY (id_apartado) REFERENCES Apartado(id)
);




-- Tabla "prod_venta"
CREATE TABLE prod_venta (
    no_ticket INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_producto INT,
    id_venta INT,
    FOREIGN KEY (id_producto) REFERENCES Producto(id),
    FOREIGN KEY (id_venta) REFERENCES Venta(id)
);



-- Tabla "prod_venta"
CREATE TABLE prod_apartado (
    no_ticket INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_producto INT,
    id_apartado INT,
    FOREIGN KEY (id_producto) REFERENCES Producto(id),
    FOREIGN KEY (id_apartado) REFERENCES Apartado(id)
);

