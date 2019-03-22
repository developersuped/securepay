create database agrosoft;


use agrosoft;

create table productos_categoria
(
  codigo      int primary key auto_increment,
  nombre      varchar(50),
  descripcion varchar(150),
  estado      int default 1
);

create table producto
(
  codigo      int primary key auto_increment,
  correlativo varchar(200),
  nombre      varchar(100),
  descripcion varchar(200),
  categoria   int,
  estado      int,
  constraint fk_producto_categoria foreign key (categoria)
    references productos_categoria (codigo)
);

create table rol
(
  codigo      int primary key auto_increment,
  nombre      varchar(50),
  descripcion varchar(200),
  estado      int default 1
);

create table users
(
  codigo         int primary key auto_increment,
  name           varchar(50),
  lastname       varchar(50),
  email          varchar(250),
  password       varchar(75),
  direccion      varchar(250),
  imagen         varchar(200),
  edad           int,
  rol            int,
  dui            varchar(20),
  telefono       varchar(20),
  estado         int default 1,
  created_at     timestamp,
  updated_at     time,
  remember_token varchar(200),
  constraint fk_user_rol foreign key (rol)
    references rol (codigo)
);

create table producto_proveedor
(
  codigo   int primary key auto_increment,
  user     int,
  producto int,
  estado   int,
  constraint fk_product_producto foreign key (producto)
    references producto (codigo),
  constraint fk_producto_usuario foreign key (user)
    references users (codigo)
);

drop table producto_proveedor;
drop table proveedor;
drop table image;
drop table publicacion;

create table pagina
(
  codigo   int primary key auto_increment,
  nombre   varchar(75),
  icono    varchar(75),
  url      varchar(100),
  template varchar(150),
  padre    int,
  estado   int default 1
);

create table rol_pagina
(
  codigo int primary key auto_increment,
  rol    int,
  pagina int,
  constraint fk_pagina_detalle foreign key (pagina)
    references pagina (codigo),
  constraint fk_rol_detalle foreign key (rol)
    references rol (codigo)
);


create table pedidos_estados
(
  codigo      int primary key auto_increment,
  nombre      varchar(100),
  descripcion varchar(250),
  estado      int
);

create table pedidos
(
  codigo        int primary key auto_increment,
  fecha_creada  timestamp,
  fecha_cerrada time,
  user          int,
  total         decimal(11, 2),
  estado        int,
  constraint fk_pedido_estado foreign key (estado)
    references pedidos_estados (codigo),
  constraint fk_pedido_user foreign key (user)
    references users (codigo)
);

create table pedido_detalle
(
  codigo          int primary key auto_increment,
  producto        int,
  pedido          int,
  precio_unitario decimal(9, 2),
  subtotal        decimal(11, 2),
  constraint fk_pedido_producto foreign key (producto)
    references producto (codigo),
  constraint fk_pedido_detail foreign key (pedido)
    references pedidos (codigo)
);


create table publicacion
(
  codigo           int primary key auto_increment,
  user             int,
  producto         int,
  titulo           varchar(250),
  is_negociable    int,
  detalle          text,
  precio_proveedor decimal(11, 2),
  precio_venta     decimal(11, 2),
  cantidad         int,
  estado           int,
  constraint fk_public_user foreign key (user)
    references users (codigo),
  constraint fk_public_producto foreign key (producto)
    references producto (codigo)
);

create table image
(
  codigo      int primary key auto_increment,
  publicacion int,
  url         text,
  estado      int,
  constraint fk_img_publicacion foreign key (publicacion)
    references publicacion (codigo)
);



create table carrito
(
  codigo int primary key auto_increment,
  user   int,
  constraint fk_carritoUser foreign key (user)
    references users (codigo)
);


create table carrito_detalle
(
  codigo      int primary key auto_increment,
  carrito     int,
  publicacion int,
  esatdo      int default 1,
  constraint fk_carrito_detalle foreign key (carrito)
    references carrito (codigo),
  constraint fk_public_carrito foreign key (publicacion)
    references publicacion (codigo)
);



select distinct p.codigo, p.nombre name, url, icono icon, template
from pagina p
       join rol_pagina rp on p.codigo = rp.pagina
       join rol r on rp.rol = r.codigo
where rol = 2
  and r.estado = 1
  and p.estado = 1
  and p.padre is null;


select p.nombre name, url, icono icon, template
from pagina p
       join rol_pagina rp on p.codigo = rp.pagina
       join rol r on r.codigo = rp.rol
where padre = ?
  and p.estado = 1
  and r.codigo = ?
  and r.estado = 1;


select p.codigo    publicacion,
       u.name      usuario,
       titulo,
       detalle,
       precio_venta,
       cantidad,
       prod.nombre producto,
       url         imagen
from publicacion p
       join users u on p.user = u.codigo
       join producto prod on p.producto = prod.codigo
       left join image i on p.codigo = i.publicacion
where p.estado = 1;

select *
from carrito;


select *
from carrito_detalle;


select u.name, p.titulo, p.detalle, p.precio_venta
from users u
       join carrito c on u.codigo = c.user
       join carrito_detalle cd on cd.carrito = c.codigo
       join publicacion p on cd.publicacion = p.codigo
where cd.esatdo = 1;