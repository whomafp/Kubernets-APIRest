CREATE TABLE `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `theorical_hours` varchar(5) NOT NULL,
  `practical_hours` varchar(5) NOT NULL,
  `total` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `major`(`id`, `name`) VALUES 
(1, 'Ingeniería en Sistemas computacionales'),
(2, 'Ingeniería en Gestión Empresarial'),
(3, 'Ingeniería en Lógistica'),
(4, 'Ingeniería en Electrónica'),
(5, 'Ingeniería en Lógistica'),
(6, 'Ingeniería en Mecatronica');

INSERT INTO `classes` (`major_id`, `name`, `theorical_hours`, `practical_hours`, `total`) VALUES
(1, 'Cálculo Diferencial', '3', '2', '5'),
(1, 'Cálculo Integral', '2', '2', '4'),
(1, 'Cálculo Vectoria', '3', '1', '4'),
(1, 'Ecuaciones Diferenciales', '5', '2', '7'),
(1, 'Leguajes y Automatas I', '1', '1', '2'),
(1, 'Leguajes y Automatas II', '2', '2', '4'),
(1, 'Programación Lógica y Funcional', '1', '2', '3'),
(1, 'Inteligencia Artificial', '2', '2', '4'),
(1, 'Fundamentos de Programación', '1', '2', '3'),
(1, 'Programación Orientada a Objetos', '2', '2', '5'),
(1, 'Graficación', '3', '2', '5'),
(1, 'Estructura de Datos', '2', '2', '4'),
(1, 'Métodos Númericos', '2', '2', '4'),
(1, 'Fundamentos de Telecomunicaciones', '3', '2', '5'),
(1, 'Redes de computadoras', '3', '2', '5'),
(1, 'Conmutación y Enrutamiento en Redes de Datos', '3', '2', '5'),
(1, 'Administación de redes', '3', '2', '5'),
(1, 'Taller de Ética', '3', '2', '5'),
(1, 'Contabilidad Financiera', '3', '2', '5'),
(1, 'Cultura empresarial', '3', '2', '5'),
(1, 'Tópicos Avanzados de Programación', '3', '2', '5'),
(1, 'Sistemas Operativos', '3', '2', '5'),
(1, 'Taller de Sistemas Operativos', '3', '2', '5'),
(1, 'Taller de Investigación I', '3', '2', '5'),
(1, 'Taller de Investigación II', '3', '2', '5'),
(1, 'Matemáticas discretas', '3', '2', '5'),
(1, 'Química', '3', '2', '5'),
(1, 'Investigación de operaciones', '3', '2', '5'),
(1, 'Fundamentos de base de datos', '3', '2', '5'),
(1, 'Taller de Base de Datos', '3', '2', '5'),
(1, 'Administración de Base de Datos', '3', '2', '5'),
(1, 'Taller de Administación', '3', '2', '5'),
(1, 'Probabilidad y Estadistica', '3', '2', '5'),
(1, 'Física General', '3', '2', '5'),
(1, 'Principios Eléctricos y Aplicaciones digitales', '3', '2', '5'),
(1, 'Arquitectura de Computadoras', '3', '2', '5'),
(1, 'Lenguajes de Interfaz', '3', '2', '5'),
(1, 'Sistemas programables', '3', '2', '5'),
(1, 'Gestión de proyectos de Software', '3', '2', '5'),
(1, 'Programación Web', '3', '2', '5');