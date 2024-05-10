CREATE DATABASE Hospital;
drop database Hospital;

create	database hospital;
use hospital;
CREATE TABLE  MEDICAMENTOS (
    ID_MEDICAMENTO CHAR(5) PRIMARY KEY,
    NOMBRE VARCHAR(50),
    SUBSTANCIA VARCHAR(50),
    VIA_ADMINISTRACION VARCHAR(50),
    CANTIDAD INT(4),
    EXCIPIENTE CHAR(10),
    INDICACIONES VARCHAR(50),
    CONTRAINDICACIONES VARCHAR(50),
    REACCIONES VARCHAR(50),
    CONTROLADO TINYINT(1)
);
INSERT INTO MEDICAMENTOS (ID_MEDICAMENTO, NOMBRE, SUBSTANCIA, VIA_ADMINISTRACION, CANTIDAD, EXCIPIENTE, INDICACIONES, CONTRAINDICACIONES, REACCIONES, CONTROLADO)
VALUES 
('M001', 'Paracetamol', 'Paracetamol', 'Oral', 100, 'Lactosa', 'Alivio del dolor y reducción de la fiebre', 'Hipersensibilidad al paracetamol', 'Náuseas, vómitos, reacciones alérgicas', 0),
('M002', 'Ibuprofeno', 'Ibuprofeno', 'Oral', 50, 'Almidón de maíz', 'Alivio del dolor, inflamación y fiebre', 'Asma, úlcera péptica', 'Dolor abdominal, indigestión, úlcera', 0),
('M003', 'Amoxicilina', 'Amoxicilina', 'Oral', 80, 'Celulosa microcristalina', 'Tratamiento de infecciones bacterianas', 'Alergia a las penicilinas', 'Náuseas, diarrea, erupción cutánea', 0),
('M004', 'Omeprazol', 'Omeprazol', 'Oral', 60, 'Sacarosa', 'Tratamiento de úlceras gástricas y esofagitis', 'Hipertensión arterial, hipersensibilidad', 'Dolor de cabeza, mareos, diarrea', 0),
('M005', 'Loratadina', 'Loratadina', 'Oral', 40, 'Almidón pregelatinizado', 'Alivio de los síntomas de la alergia', 'Glaucoma, retención urinaria', 'Somnolencia, dolor de cabeza, sequedad bucal', 0),
('M006', 'Dipirona', 'Metamizol', 'Intravenosa', 30, 'Agua para inyección', 'Alivio del dolor y fiebre', 'Asma, anemia', 'Reacciones alérgicas, agranulocitosis', 0),
('M007', 'Metformina', 'Metformina', 'Oral', 70, 'Estearato de magnesio', 'Tratamiento de la diabetes tipo 2', 'Insuficiencia renal, acidosis láctica', 'Náuseas, diarrea, malestar estomacal', 0),
('M008', 'Ciprofloxacino', 'Ciprofloxacino', 'Oral', 90, 'Povidona', 'Tratamiento de infecciones bacterianas', 'Epilepsia, trastornos del ritmo cardíaco', 'Náuseas, diarrea, mareos', 0),
('M009', 'Atorvastatina', 'Atorvastatina', 'Oral', 60, 'Celulosa microcristalina', 'Reducción del colesterol', 'Enfermedad hepática, embarazo', 'Dolor muscular, dolor de cabeza, mareos', 0),
('M010', 'Sertralina', 'Sertralina', 'Oral', 50, 'Fosfato de calcio', 'Tratamiento de la depresión y trastornos de ansiedad', 'Uso con inhibidores de la MAO', 'Náuseas, diarrea, insomnio', 0);


CREATE TABLE  PACIENTES (
    NUMERO_ISSSTE CHAR(10) PRIMARY KEY,
    RFC CHAR(10),
    CURP CHAR(18),
    NOMBRE VARCHAR(50),
    APELLIDO_PATERNO VARCHAR(30),
    APELLIDO_MATERNO VARCHAR(30),
    FECHA_NACIMIENTO DATETIME,
    SEXO CHAR(1),
    TIPO_SANGUINEO CHAR(1),
    FACTOR_RH CHAR(1),
    CALLE VARCHAR(50),
    COLONIA VARCHAR(50),
    CIUDAD VARCHAR(50),
    CP CHAR(5)
);
INSERT INTO PACIENTES (NUMERO_ISSSTE, RFC, CURP, NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, FECHA_NACIMIENTO, SEXO, TIPO_SANGUINEO, FACTOR_RH, CALLE, COLONIA, CIUDAD, CP)
VALUES 
('7593628504', 'URJ465389', 'CURP75493721947365', 'María', 'García', 'López', '1990-07-15', 'F', 'A', '+', 'Calle 1', 'Centro', 'Ciudad de México', '12345'),
('7649320567', 'JRL654032', 'CURP74389230472639', 'Juan', 'Martínez', 'Pérez', '1985-03-20', 'M', 'B', '-', 'Avenida 2', 'Reforma', 'Monterrey', '76549'),
('9864503284', 'KRL574839', 'CURP87549302846326', 'Luis', 'Hernández', 'Gómez', '1978-11-10', 'M', 'O', '+', 'Calle 3', 'Independencia', 'Guadalajara', '98765'),
('7493835439', 'LKR849364', 'CURP84736283028263', 'Ana', 'Sánchez', 'Rodríguez', '2000-05-25', 'F', 'AB', '-', 'Boulevard 4', 'Las Flores', 'Puebla', '34827'),
('9483648394', 'PÑL748394', 'CURP78545457138931', 'Carlos', 'López', 'Hernández', '1998-09-03', 'M', 'A', '+', 'Calle 5', 'Las Palmas', 'Tijuana', '09832');

CREATE TABLE DETALLE_CONSULTA (
    ID_CONSULTA INT,
    ID_MEDICAMENTO CHAR(5),
    PRESCRIPCION TEXT,
    PRIMARY KEY (ID_CONSULTA, ID_MEDICAMENTO)
);

CREATE TABLE  CONSULTAS (
    ID_CONSULTA INT PRIMARY KEY,
    ID_MEDICO CHAR(10),
    NUMERO_ISSSTE CHAR(10),
    INDICACIONES TEXT,
    FECHA DATETIME
);

CREATE TABLE  MEDICOS (
    ID_MEDICO CHAR(10),
    APELLIDO_PATERNO VARCHAR(30),
    APELLIDO_MATERNO VARCHAR(30),
    NOMBRE VARCHAR(50),
    ESPECIALIDAD VARCHAR(50),
    FECHA_TITULACION DATETIME
);

INSERT INTO MEDICOS (ID_MEDICO, APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRE, ESPECIALIDAD, FECHA_TITULACION)
VALUES 
('M1', 'Gómez', 'Pérez', 'Juan', 'Pediatria', '2020-05-15'),
('M2', 'Martínez', 'López', 'Billie', 'Cardiologia', '2019-10-20'),
('M3', 'escutia', 'gonzales', 'Leonardo', 'Cirugia General', '2018-08-30');



