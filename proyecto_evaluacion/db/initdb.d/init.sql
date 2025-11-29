CREATE DATABASE IF NOT EXISTS evaluacion_nube;
USE evaluacion_nube;

CREATE TABLE IF NOT EXISTS log (
    hora VARCHAR(50),
    actividad VARCHAR(255),
    estado VARCHAR(100),
    imagen VARCHAR(255)
);
INSERT INTO log (hora, actividad, estado, imagen) VALUES
('12:05', 'Inicio de servicio levantando contenedores', 'OK', 'static/img/imagen.png'),
('12:49', 'Carga Datos Tabla', 'OK', 'static/img/imagen2.png'),
('12:50', 'Carga Datos Tabla', 'OK', 'static/img/imagen2.png'),
('13:00', 'Logo', 'OK', 'static/img/logo.png'),
('14:00', 'Verificacion Contenedores', 'OK', 'static/img/imagen3.png');
