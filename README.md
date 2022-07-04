# test

Pasos para las pruebas

1. Crear la base de datos.

CREATE DATABASE testapidb;

2. Seleccionar la base de datos

use testapidb;

3. Crear la tabla 

CREATE TABLE IF NOT EXISTS `Empleado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `email` varchar(50),
  `edad` int NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

4. Registrar algunos datos de prueba 

INSERT INTO `Empleado` (`id`, `nombre`, `email`, `edad`, `puesto`, `creado`) VALUES 
(1, 'John Doe', 'johndoe@gmail.com', 32, 'Administrador', '2012-06-01 02:12:30'),
(2, 'David Costa', 'sam.mraz1996@yahoo.com', 29, 'Gerente General', '2013-03-03 01:20:10'),
(3, 'Todd Martell', 'liliane_hirt@gmail.com', 36, 'Consultor', '2014-09-20 03:10:25'),
(4, 'Adela Marion', 'michael2004@yahoo.com', 42, 'Marketing', '2015-04-11 04:11:12'),
(5, 'Matthew Popp', 'krystel_wol7@gmail.com', 48, 'Vendedor', '2016-01-04 05:20:30'),
(6, 'Alan Wallin', 'neva_gutman10@hotmail.com', 37, 'IT', '2017-01-10 06:40:10'),
(7, 'Joyce Hinze', 'davonte.maye@yahoo.com', 44, 'Chofer', '2017-05-02 02:20:30'),
(8, 'Donna Andrews', 'joesph.quitz@yahoo.com', 49, 'Control Inventario', '2018-01-04 05:15:35'),
(9, 'Andrew Best', 'jeramie_roh@hotmail.com', 51, 'Desarrollador', '2019-01-02 02:20:30'),
(10, 'Joel Ogle', 'summer_shanah@hotmail.com', 45, 'RRHH', '2020-02-01 06:22:50');

5. Bajar la rama main luego ir a la carpeta test/config

        private $host = "tu ip o localhost";
        private $database_name = "testapidb";
        private $username = "tuuser";
        private $password = "tupass";
   Guardar los cambios

6- ejecutar php -S 127.0.0.1:8080 por terminal para hacer pruebas
      



