CREATE DATABASE notas; 
USE notas; 

/*USERS TABLE*/
CREATE TABLE users (
    id            INT(20) PRIMARY KEY AUTO_INCREMENT,
    nombre        VARCHAR(125) NOT NULL,
    apellidos     VARCHAR(250) NOT NULL, 
    email         VARCHAR(250) NOT NULL, 
    password      VARCHAR(125) NOT NULL,
    fecha         DATE
)Engine=InnoDb;

/*CATEGORIES TABLE*/

CREATE TABLE categories(
    id                    INT(20) PRIMARY KEY AUTO_INCREMENT,
    user_id_category      INT(20),
    nombre                VARCHAR(200) NOT NULL, 
    fecha                 DATE, 

    CONSTRAINT fk_user_id_category FOREIGN KEY(user_id_category) REFERENCES users(id)
)Engine=InnoDb; 

/*NOTES TABLE*/
CREATE TABLE notes (
    id                 INT(20) PRIMARY KEY AUTO_INCREMENT,
    user_id_notes      INT(20),
    category_id        INT(20),
    titulo             VARCHAR(125) NOT NULL, 
    descripcion        TEXT NOT NULL,
    fecha              DATE NOT NULL,

    CONSTRAINT fk_user_id  FOREIGN KEY(user_id_notes) REFERENCES users(id),
    CONSTRAINT fk_user_id_notes FOREIGN KEY(category_id) REFERENCES categories(id)
)Engine=InnoDb; 

