CREATE TABLE tb_repartidor (
  id                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres             VARCHAR (512) NULL,
  ap_paterno          VARCHAR (512) NULL,
  ap_materno          VARCHAR (512) NULL,
  rut                  VARCHAR (512) NULL,
  fecha_nacimiento    VARCHAR (512) NULL,
  sexo              VARCHAR (512) NULL,
  celular             VARCHAR (512) NULL,
  cargo               VARCHAR (512) NULL,
  email               VARCHAR (512) NULL,
  password            VARCHAR (512) NULL,
  token               VARCHAR (512) NULL,
  user_creacion       VARCHAR (512) NULL,
  user_actualizacion  VARCHAR (512) NULL,
  user_eliminacion    VARCHAR (512) NULL,
  fyh_creacion        DATETIME NULL,
  fyh_actualizacion   DATETIME NULL,
  fyh_eliminacion     DATETIME NULL,
  estado              VARCHAR (255) NULL
);

