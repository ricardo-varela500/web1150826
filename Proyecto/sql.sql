
CREATE DATABASE sistema_usuarios;

CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(120),
    correo VARCHAR(120) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(255),
    fecha_nacimiento DATE,
    created_at TIMESTAMP DEFAULT now()
);

CREATE TABLE login_users (
    id SERIAL PRIMARY KEY,
    usuario VARCHAR(100) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    rol VARCHAR(20) NOT NULL DEFAULT 'admin' CHECK (rol IN ('admin','usuario')),
    created_at TIMESTAMP DEFAULT now()
);

INSERT INTO login_users (usuario, password, rol)
VALUES ('admin', crypt('457905', gen_salt('bf')), 'admin');


