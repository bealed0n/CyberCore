CREATE TABLE tb_delivery (
  id_delivery         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_pedido                         VARCHAR (512) NULL,
  id_carrito                        VARCHAR (512) NULL,
  id_repartidor_asignado             VARCHAR (512) NULL,
  estado_delivery                   VARCHAR (512) NULL,
  user_creacion       VARCHAR (512) NULL,
  user_actualizacion  VARCHAR (512) NULL,
  user_eliminacion    VARCHAR (512) NULL,
  fyh_creacion        DATETIME NULL,
  fyh_actualizacion   DATETIME NULL,
  fyh_eliminacion     DATETIME NULL,
  estado              VARCHAR (255) NULL
);