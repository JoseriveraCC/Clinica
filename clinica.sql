CREATE DATABASE clinica;
USE clinica;

CREATE TABLE paciente (
    correo varchar(200),
    nombre VARCHAR(200) NOT NULL,
    apellido VARCHAR(200) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(300),
    PRIMARY KEY (correo)
);

CREATE TABLE consulta (
	consulta INT AUTO_INCREMENT,
    fecha DATE,
    correo VARCHAR(200) NOT NULL,
    primary key (consulta),
    foreign key(correo) references paciente(correo)
);

CREATE TABLE trabajo (
    trabajo INT AUTO_INCREMENT,
    nombre VARCHAR(100),
    PRIMARY KEY (trabajo)
);

CREATE TABLE precio (
    precioid INT AUTO_INCREMENT,
    precio INT,
    PRIMARY KEY (precioid)
);

CREATE TABLE odontologo (
    dpi INT,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    telefono INT,
    PRIMARY KEY (dpi)
);

CREATE TABLE cita (
    cita INT AUTO_INCREMENT,
    fecha DATE,
    hora DATE,
    trabajo INT,
    precioid INT,
    consulta INT,
    dpi INT,
    PRIMARY KEY (cita),
    FOREIGN KEY (consulta) REFERENCES consulta(consulta),
    FOREIGN KEY (dpi) REFERENCES odontologo(dpi),
    FOREIGN KEY (precioid) REFERENCES precio(precioid),
    FOREIGN KEY (trabajo) REFERENCES trabajo(trabajo)
);

CREATE TABLE horarios (
    horarios INT AUTO_INCREMENT,
    hora_Inicio DATE,
    hora_Fin DATE,
    PRIMARY KEY (horarios)
); 

CREATE TABLE clinica_horarios (
	horarios INT,
    clinica INT,
    FOREIGN KEY (horarios) REFERENCES horarios(horarios),
	FOREIGN KEY (clinica) REFERENCES clinica(clinica)
);

CREATE TABLE clinica (
    clinica INT AUTO_INCREMENT,
    direccion VARCHAR(255),
    telefono INT,
    PRIMARY KEY (clinica)
);

CREATE TABLE cuartos (
    cuartos INT AUTO_INCREMENT,
    PRIMARY KEY (cuartos)
);

CREATE TABLE clinica_cuartos (
	clinica INT,
    cuartos INT,
    PRIMARY KEY (clinica, cuartos),
	FOREIGN KEY (clinica) REFERENCES clinica(clinica),
    FOREIGN KEY (cuartos) REFERENCES cuartos(cuartos)
);

CREATE TABLE instrumentos (
    instrumentos INT AUTO_INCREMENT,
    serie INT,
    nombre VARCHAR(100),
    fecha_compra DATE,
    PRIMARY KEY (instrumentos)
);

CREATE TABLE instrumentos_cuartos (
	cuartos INT,
    instrumentos INT,
    PRIMARY KEY (cuartos, instrumentos),
    FOREIGN KEY (cuartos) REFERENCES cuartos(cuartos)
);

CREATE TABLE odontologo_clinica (
	dpi INT,
    clinica INT,
    PRIMARY KEY (dpi, clinica),
    FOREIGN KEY (dpi) REFERENCES odontologo(dpi),
    FOREIGN KEY (clinica) REFERENCES clinica(clinica)
);