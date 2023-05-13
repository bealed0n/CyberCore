CREATE TABLE tb_pedidos (
  id_pedido                         INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_cliente                    VARCHAR (512) NULL,
  ci_cliente                        VARCHAR (512) NULL,
  celular_cliente                   VARCHAR (512) NULL,
  celular_referencia_cliente        VARCHAR (512) NULL,
  email_cliente                     VARCHAR (512) NULL,
  direccion_cliente                 VARCHAR (512) NULL,
  id_direccion_cliente              VARCHAR (512) NULL,
  costo_pedido                      VARCHAR (512) NULL,
  costo_delivery                    VARCHAR (512) NULL,
  obs                               VARCHAR (512) NULL,
  id_carrito                        VARCHAR (512) NULL,
  id_motoquero_asignado             VARCHAR (512) NULL,
  estado_pedido                     VARCHAR (512) NULL,
  user_creacion                     VARCHAR (512) NULL,
  user_actualizacion                VARCHAR (512) NULL,
  user_eliminacion                  VARCHAR (512) NULL,
  fyh_creacion                      DATETIME NULL,
  fyh_actualizacion                 DATETIME NULL,
  fyh_eliminacion                   DATETIME NULL,
  estado                            VARCHAR (255) NULL
);

