-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2025 a las 19:40:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pp_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `codCar` int(11) NOT NULL,
  `codFac` int(11) NOT NULL,
  `nomCar` varchar(200) DEFAULT NULL,
  `detCar` text DEFAULT NULL,
  `logCar` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codCar`, `codFac`, `nomCar`, `detCar`, `logCar`) VALUES
(1, 1, 'Ingenieria de Sistemas e Informatica', 'carrera de ingenieria', 'sistemas.png'),
(2, 1, 'Ingenieria Civil', 'carrera de ingenieria', 'civil.png'),
(3, 3, 'Contabilidad', 'carrera de ingenieria', 'contabilidad.png'),
(4, 3, 'Derecho', 'carrera de ingenieria', 'derecho.png'),
(5, 2, 'Emfermeria', 'carrera de ingenieria', 'emfermeria.png'),
(6, 2, 'Estomatologia', 'carrera de ingenieria', 'estomatologia.png'),
(7, 1, 'Ingenieria Ambiental y Recursos Humanos', 'carrera de ingenieria', 'ambiental.png'),
(8, 3, 'Educacion', 'carrera de ingenieria', 'educacion.png'),
(9, 1, 'Ingenieria Agronomia', 'carrera de ingenieria', 'agronomia.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `codEmp` int(11) NOT NULL,
  `nomEmp` varchar(150) DEFAULT NULL,
  `rucEmp` char(11) DEFAULT NULL,
  `dirEmp` varchar(200) DEFAULT NULL,
  `tefEmp` varchar(20) DEFAULT NULL,
  `lonEmp` varchar(30) DEFAULT NULL,
  `latEmp` varchar(30) DEFAULT NULL,
  `tipEmp` tinyint(4) DEFAULT NULL COMMENT '1 privada, 2 publica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`codEmp`, `nomEmp`, `rucEmp`, `dirEmp`, `tefEmp`, `lonEmp`, `latEmp`, `tipEmp`) VALUES
(1, 'Banco de Crédito del Perú', '20123456789', 'Av. República de Panamá 3055, San Isidro, Lima', '+51‑1‑3112000', '-77.02824', '-12.08961', 1),
(2, 'Interbank', '20198765432', 'Av. República de Panamá 3565, Miraflores, Lima', '+51‑1‑2118000', '-77.02858', '-12.12159', 1),
(3, 'Alicorp S.A.A.', '20111223344', 'Av. Santo Toribio 1440, San Isidro, Lima', '+51‑1‑2178888', '-77.03196', '-12.11267', 2),
(4, 'Backus y Johnston', '20155667788', 'Av. Argentina 175, Pueblo Libre, Lima', '+51‑1‑3304500', '-77.05080', '-12.07697', 2),
(5, 'BBVA Perú', '20122334455', 'Av. Juan de Arona 100, San Isidro, Lima', '+51‑1‑5136100', '-77.02810', '-12.11179', 1),
(6, 'Ferreyros S.A.', '20133445566', 'Av. República de Panamá 3490, San Isidro, Lima', '+51‑1‑2196000', '-77.02900', '-12.11990', 2),
(7, 'Nestlé Perú', '20455667788', 'Av. Los Álamos 123, Lima', '+51‑1‑6166600', '-77.04500', '-12.05500', 2),
(8, 'Rimac Seguros', '20466778899', 'Jr. Azángaro 346, Lima', '+51‑1‑3113400', '-77.02842', '-12.04237', 1),
(9, 'Supermercados Peruanos (Plaza Vea)', '20177889900', 'Av. El Polo 280, Santiago de Surco, Lima', '+51‑1‑2087700', '-77.01656', '-12.13717', 2),
(10, 'Entel Perú', '20488990011', 'Av. Elmer Faucett 6110, Callao', '+51‑1‑5192000', '-77.13135', '-12.04750', 2),
(11, 'AJE Group (Big Cola)', '20500112233', 'Av. Javier Prado Este 3500, Lima', '+51‑1‑2646000', '-77.03924', '-12.09050', 2),
(12, 'Cementos Pacasmayo', '20411998877', 'Av. Grau 100, Pacasmayo, La Libertad', '+51‑44‑292071', '-79.74400', '-7.42400', 2),
(13, 'InRetail Perú Corp', '20522334455', 'Av. Manuel Olguín 353, Surco, Lima', '+51‑1‑2111400', '-77.04600', '-12.15900', 2),
(14, 'Grupo Gloria S.A.', '20166554433', 'Av. Nicolás Arriola 1234, Lima', '+51‑1‑5177000', '-77.00400', '-12.02200', 2),
(15, 'Grupo Romero (Alicorp)', '20155660077', 'Av. República de Panamá 3555, Lima', '+51‑1‑2199000', '-77.02850', '-12.11950', 2),
(16, 'Graña y Montero (GyM)', '20188776655', 'Av. Ricardo Palma 644, Miraflores, Lima', '+51‑1‑4444400', '-77.03000', '-12.12200', 2),
(17, 'Corporación Aceros Arequipa', '20433221100', 'Av. Aviación 2425, Lima', '+51‑1‑6160000', '-77.00000', '-12.05500', 2),
(18, 'Minsur S.A.', '20444332211', 'Av. Juan Pardo de Zela 219, Lima', '+51‑1‑2012000', '-77.02800', '-12.05200', 2),
(19, 'Southern Copper Corporation Perú', '20455443322', 'Jr. Sánchez Cerro 243, Lima', '+51‑1‑6185000', '-77.03500', '-12.04300', 2),
(20, 'Pesquera Exalmar S.A.A.', '20466554433', 'Av. Santo Toribio 177, San Isidro, Lima', '+51‑1‑2116600', '-77.03300', '-12.10900', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_areas`
--

CREATE TABLE `empresas_areas` (
  `codEA` int(11) NOT NULL,
  `codEmp` int(11) NOT NULL,
  `nomEA` varchar(150) DEFAULT NULL,
  `aneEA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresas_areas`
--

INSERT INTO `empresas_areas` (`codEA`, `codEmp`, `nomEA`, `aneEA`) VALUES
(1, 1, 'Área de Finanzas', 'AF'),
(2, 2, 'Área de Tecnología e Innovación', 'TI'),
(3, 3, 'Área de Producción Industrial', 'PI'),
(4, 4, 'Área de Logística y Distribución', 'LD'),
(5, 5, 'Área Legal y Cumplimiento', 'LC'),
(6, 6, 'Área de Mantenimiento Mecánico', 'MM'),
(7, 7, 'Área de Calidad y Seguridad Alimentaria', 'QA'),
(8, 8, 'Área de Gestión de Riesgos', 'GR'),
(9, 9, 'Área de Marketing y Publicidad', 'MK'),
(10, 10, 'Área de Soporte Técnico', 'ST'),
(11, 11, 'Área de Comercio Exterior', 'CE'),
(12, 12, 'Área de Investigación y Desarrollo', 'ID'),
(13, 13, 'Área de Compras y Abastecimiento', 'CA'),
(14, 14, 'Área de Recursos Humanos', 'RH'),
(15, 15, 'Área de Estrategia Corporativa', 'EC'),
(16, 16, 'Área de Obras Civiles', 'OC'),
(17, 17, 'Área de Seguridad Industrial', 'SI'),
(18, 18, 'Área de Responsabilidad Social', 'RS'),
(19, 19, 'Área de Proyectos Mineros', 'PM'),
(20, 20, 'Área de Contabilidad y Finanzas', 'CF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `codEst` int(11) NOT NULL,
  `tdpEst` char(1) DEFAULT NULL COMMENT 'D dni, P pasaporte',
  `docEst` varchar(20) DEFAULT NULL,
  `nomEst` varchar(100) DEFAULT NULL,
  `appEst` varchar(100) DEFAULT NULL,
  `apmEst` varchar(100) DEFAULT NULL,
  `fnaEst` date DEFAULT NULL,
  `celEst` char(15) DEFAULT NULL,
  `emaEst` varchar(150) DEFAULT NULL,
  `sexEst` tinyint(4) DEFAULT NULL COMMENT '0 femenino, 1 masculino, 2 indefinido',
  `nroEst` varchar(12) DEFAULT NULL COMMENT 'codigo de alumno',
  `dirEst` varchar(150) DEFAULT NULL,
  `pasEst` varchar(150) DEFAULT NULL,
  `codCar` int(11) DEFAULT NULL,
  `regEst` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`codEst`, `tdpEst`, `docEst`, `nomEst`, `appEst`, `apmEst`, `fnaEst`, `celEst`, `emaEst`, `sexEst`, `nroEst`, `dirEst`, `pasEst`, `codCar`, `regEst`) VALUES
(1, 'D', '7028123', 'Julio', 'Bonet', 'Ramón', '2001-10-22', '+51 940 688 550', 'nicolasmugica@higueras.es', 0, 'A000001', 'Alameda Lupita Sanabria 1, Sevilla, 20469', 'iDl3XRPb*4', 9, '2025-07-17 02:05:15'),
(2, 'D', '89720554', 'Simón', 'Perera', 'Viana', '1999-10-23', '+51 921 742 558', 'sauraroldan@hotmail.com', 1, 'A000002', 'Acceso Albert Ortiz 96, Santa Cruz de Tenerife, 73872', 'h8)26OmK#(', 1, '2025-07-17 02:05:15'),
(3, 'D', '71913995', 'René', 'Beltrán', 'Quintero', '1999-10-15', '+51 924 70 85 6', 'soledadrius@cobo.net', 2, 'A000003', 'Paseo de Mariano Coll 66, Murcia, 81296', 'L0XgfeLJ&+', 9, '2025-07-17 02:05:15'),
(4, 'D', '97485847', 'Rafa', 'Gomila', 'Nieto', '2000-04-30', '+51 983 354 601', 'anselmaflores@ferrera.net', 0, 'A000004', 'Paseo de Brígida Cañellas 827, Vizcaya, 49756', 'Ysk$O8EtpE', 6, '2025-07-17 02:05:15'),
(5, 'D', '25832896', 'Otilia', 'Escrivá', 'Piñeiro', '2006-05-25', '+51 916 684 286', 'martidonato@yahoo.com', 2, 'A000005', 'Calle de Delia Pont 81, Ciudad, 47995', 't87Q@sgN$$', 1, '2025-07-17 02:05:15'),
(6, 'D', '18494273', 'Luis', 'Cañadas', 'Palacios', '2004-11-26', '+51 949 790 021', 'andreochoa@rivera.org', 2, 'A000006', 'Ronda Francisco José Iglesias 87, Madrid, 05313', 'a5k&D!srq9', 4, '2025-07-17 02:05:15'),
(7, 'D', '99120218', 'Carmelo', 'Palomares', 'Caraballo', '2005-12-17', '+51 994 956 840', 'olgaalcaraz@gmail.com', 0, 'A000007', 'Camino de Águeda Viñas 264, Soria, 70832', 'QKx4cdN1)6', 2, '2025-07-17 02:05:15'),
(8, 'D', '48225524', 'Julia', 'Colina', 'Tejada', '2000-01-04', '+51 930 289 423', 'nestorfigueroa@arevalo.net', 1, 'A000008', 'Rambla Violeta Monzó 640, Cádiz, 53972', 'rNeFfw%X8p', 7, '2025-07-17 02:05:15'),
(9, 'D', '53884735', 'Manuela', 'Zambrano', 'Verge', '2001-09-05', '+51 914 308 426', 'luismena@arias.net', 0, 'A000009', 'Callejón de Vicente Sabater 25, Jaén, 70215', 'EK#9d%vA@X', 3, '2025-07-17 02:05:15'),
(10, 'D', '89643570', 'Enrique', 'Chaparro', 'Nieto', '2003-02-12', '+51 947 958 726', 'anacleto43@campos.com', 1, 'A000010', 'Urbanización Pablo Casals 7, Zaragoza, 83006', 'B67m#pWKz1', 10, '2025-07-17 02:05:15'),
(11, 'D', '65493217', 'Benito', 'Ródenas', 'Nájera', '1998-12-09', '+51 961 591 274', 'cristinaherraiz@hotmail.com', 1, 'A000011', 'Calle de Belén Zúñiga 23, Valladolid, 22188', 'Xpv&)r4!YA', 2, '2025-07-17 02:05:15'),
(12, 'D', '11937958', 'Cayetana', 'Orts', 'Canales', '2004-08-31', '+51 982 758 051', 'armandoarrieta@vera.net', 0, 'A000012', 'Ronda Francisco Javier Rivas 95, Lugo, 39897', 'K3un79e@pw', 8, '2025-07-17 02:05:15'),
(13, 'D', '98645210', 'Agustín', 'Sanz', 'Nieto', '2002-06-20', '+51 973 470 319', 'mariano22@silva.com', 2, 'A000013', 'Travesía Noelia Robles 22, Cuenca, 36471', '9&EpKmTc6x', 3, '2025-07-17 02:05:15'),
(14, 'D', '40982366', 'Amparo', 'Hita', 'Orts', '1999-03-15', '+51 952 415 362', 'teofilo64@arroyo.net', 1, 'A000014', 'Calle de Camila Roig 79, Albacete, 96138', 's8@aF&y3Uw', 1, '2025-07-17 02:05:15'),
(15, 'D', '81234055', 'Eusebio', 'Ferrera', 'Doménech', '2001-01-01', '+51 905 794 708', 'eugenio13@valls.info', 0, 'A000015', 'Plaza de Ramona Vera 557, Badajoz, 39742', 'LxM4q@D$Fp', 6, '2025-07-17 02:05:15'),
(16, 'D', '52873164', 'Luisa', 'Caballero', 'Grau', '2000-05-10', '+51 977 985 364', 'ignacioaracil@menendez.net', 2, 'A000016', 'Camino de Elías Arévalo 10, Almería, 17632', 'Ze4n$L1!(f', 4, '2025-07-17 02:05:15'),
(17, 'D', '79483396', 'Asunción', 'Valenzuela', 'Cortés', '1999-11-18', '+51 964 482 295', 'trinidadmarquez@escudero.com', 0, 'A000017', 'Paseo de Margarita Reche 56, Burgos, 18631', 'mU&)A3RtQ8', 7, '2025-07-17 02:05:15'),
(18, 'D', '39852741', 'Lázaro', 'Borja', 'Vico', '2002-02-02', '+51 947 460 470', 'desideriopadilla@arias.com', 1, 'A000018', 'Glorieta Matías Arcos 13, Girona, 60412', 'xp2#E3yKu!', 5, '2025-07-17 02:05:15'),
(19, 'D', '25391086', 'Irene', 'Navarrete', 'Morera', '2003-04-06', '+51 954 764 381', 'vicentaescribano@arias.org', 2, 'A000019', 'Camino de Encarna López 15, Málaga, 24671', 'J9ErL&o#1B', 2, '2025-07-17 02:05:15'),
(20, 'D', '14829634', 'Cecilio', 'Roldán', 'Escudero', '2005-07-27', '+51 918 562 016', 'carmenzafra@delafuente.org', 1, 'A000020', 'Travesía de Margarita Godoy 90, Granada, 11940', 'v$TeW%Ng34', 5, '2025-07-17 02:05:15'),
(21, NULL, NULL, 'george', 'rosales tintaya', NULL, NULL, NULL, 'grosalestintaya@gmail.com', NULL, NULL, NULL, NULL, 1, '2025-07-30 22:46:54'),
(22, NULL, NULL, 'GONZALO ALEJANDRO', 'TINTAYA FARFAN', NULL, NULL, NULL, 'alejandro.tintayafarfan16@gmail.com', NULL, NULL, NULL, NULL, 2, '2025-08-14 15:39:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `codFac` int(11) NOT NULL,
  `nomFac` varchar(100) DEFAULT NULL,
  `tipoFac` tinyint(4) DEFAULT NULL,
  `detFac` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`codFac`, `nomFac`, `tipoFac`, `detFac`) VALUES
(1, 'Facultad de Ingeniería', 0, 'UTEA – Universidad Tecnológica de los Andes, Sede Abancay'),
(2, 'Facultad de Ciencias de la Salud', 0, 'UTEA – Universidad Tecnológica de los Andes, Sede Abancay'),
(3, 'Facultad de Ciencias Jurídicas, Contables y Sociales', 0, 'UTEA – Universidad Tecnológica de los Andes, Sede Abancay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas`
--

CREATE TABLE `practicas` (
  `codPra` int(11) NOT NULL,
  `codEst` int(11) NOT NULL,
  `codTrab` int(11) NOT NULL,
  `codEA` int(11) NOT NULL,
  `codSem` int(11) NOT NULL,
  `codUsu` int(11) NOT NULL,
  `codCar` int(11) NOT NULL,
  `titPra` varchar(300) DEFAULT NULL,
  `iniPra` date DEFAULT NULL,
  `finPra` date DEFAULT NULL,
  `hraPra` int(11) DEFAULT NULL,
  `resPra` text DEFAULT NULL,
  `arcPra` varchar(300) DEFAULT NULL,
  `imgPra` varchar(300) DEFAULT NULL,
  `estPra` tinyint(4) DEFAULT NULL COMMENT '0 pendiente, 1 publicado',
  `regPra` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `practicas`
--

INSERT INTO `practicas` (`codPra`, `codEst`, `codTrab`, `codEA`, `codSem`, `codUsu`, `codCar`, `titPra`, `iniPra`, `finPra`, `hraPra`, `resPra`, `arcPra`, `imgPra`, `estPra`, `regPra`) VALUES
(1, 1, 2, 5, 10, 1, 4, 'Apoyo en desarrollo de sistemas web', '2023-03-15', NULL, 360, 'Desarrolló módulos web en Laravel y MySQL.', 'reporte_practica_1.pdf', 'evidencia_1.jpg', 0, '2023-06-10 10:00:00'),
(2, 2, 4, 8, 11, 2, 2, 'Prácticas en gestión administrativa', '2023-02-01', NULL, 400, 'Brindó soporte en procesos contables y archivo.', 'reporte_practica_2.pdf', 'evidencia_2.jpg', 0, '2023-05-12 14:00:00'),
(3, 3, 6, 3, 12, 3, 7, 'Asistente en laboratorio de alimentos', '2023-01-20', '2023-05-30', 300, 'Realizó análisis microbiológicos y calidad.', 'reporte_practica_3.pdf', 'evidencia_3.jpg', 1, '2023-04-25 11:15:00'),
(4, 4, 5, 4, 13, 4, 6, 'Prácticas en obra civil', '2023-04-01', '2023-08-01', 450, 'Apoyó en topografía y supervisión de obras.', 'reporte_practica_4.pdf', 'evidencia_4.jpg', 1, '2023-06-20 09:30:00'),
(5, 5, 7, 6, 14, 5, 3, 'Asistente en asesoría legal', '2023-03-10', '2023-07-20', 320, 'Elaboró minutas, contratos y demandas.', 'reporte_practica_5.pdf', 'evidencia_5.jpg', 1, '2023-07-01 10:45:00'),
(6, 6, 8, 9, 15, 6, 1, 'Práctica en soporte técnico TI', '2023-02-20', '2023-06-30', 390, 'Brindó mantenimiento de redes y software.', 'reporte_practica_6.pdf', 'evidencia_6.jpg', 1, '2023-06-15 11:10:00'),
(7, 7, 9, 2, 16, 7, 5, 'Asistente de investigación agronómica', '2023-01-10', '2023-05-25', 280, 'Recolectó datos de campo y analizó cultivos.', 'reporte_practica_7.pdf', 'evidencia_7.jpg', 1, '2023-05-01 09:20:00'),
(8, 8, 10, 10, 17, 8, 2, 'Apoyo en análisis contable', '2023-03-05', '2023-07-15', 350, 'Elaboró balances mensuales y registros.', 'reporte_practica_8.pdf', 'evidencia_8.jpg', 1, '2023-07-05 08:30:00'),
(9, 9, 11, 1, 18, 9, 6, 'Supervisor de prácticas ambientales', '2023-04-01', '2023-08-15', 400, 'Monitoreo de impactos y residuos sólidos.', 'reporte_practica_9.pdf', 'evidencia_9.jpg', 1, '2023-08-01 10:10:00'),
(10, 10, 12, 11, 19, 10, 8, 'Asistente en cocina y servicios', '2023-02-15', '2023-06-20', 320, 'Participó en producción de platos y atención.', 'reporte_practica_10.pdf', 'evidencia_10.jpg', 1, '2023-06-10 12:00:00'),
(11, 11, 13, 7, 10, 11, 4, 'Auxiliar de laboratorio clínico', '2023-01-12', '2023-05-18', 300, 'Procesamiento de muestras y apoyo técnico.', 'reporte_practica_11.pdf', 'evidencia_11.jpg', 1, '2023-05-10 13:15:00'),
(12, 12, 14, 5, 11, 12, 7, 'Apoyo en análisis de alimentos', '2023-03-01', '2023-07-10', 370, 'Evaluación bromatológica y prácticas de higiene.', 'reporte_practica_12.pdf', 'evidencia_12.jpg', 1, '2023-07-01 09:00:00'),
(13, 13, 15, 12, 12, 13, 9, 'Asistente de enfermería en hospital', '2023-02-10', '2023-06-25', 360, 'Toma de signos, atención básica y apoyo.', 'reporte_practica_13.pdf', 'evidencia_13.jpg', 1, '2023-06-15 08:00:00'),
(14, 14, 16, 8, 13, 14, 7, 'Prácticas en estomatología preventiva', '2023-03-15', '2023-07-20', 330, 'Apoyó en limpiezas, fluorización y charlas.', 'reporte_practica_14.pdf', 'evidencia_14.jpg', 1, '2023-07-10 11:00:00'),
(15, 15, 17, 4, 14, 15, 3, 'Asistente en centro jurídico gratuito', '2023-02-28', '2023-07-08', 340, 'Elaboró escritos legales y atención a usuarios.', 'reporte_practica_15.pdf', 'evidencia_15.jpg', 1, '2023-07-01 10:00:00'),
(16, 16, 18, 6, 15, 16, 1, 'Soporte técnico de sistemas educativos', '2023-01-20', '2023-05-25', 310, 'Configuración de aulas virtuales.', 'reporte_practica_16.pdf', 'evidencia_16.jpg', 1, '2023-05-10 09:30:00'),
(17, 17, 19, 9, 16, 17, 2, 'Asistente en planificación financiera', '2023-02-05', '2023-06-10', 280, 'Elaboración de proyecciones y presupuestos.', 'reporte_practica_17.pdf', 'evidencia_17.jpg', 1, '2023-06-01 08:20:00'),
(18, 18, 20, 6, 17, 18, 5, 'Prácticas en cultivos alternativos', '2023-03-10', '2023-07-18', 360, 'Manejo y evaluación de cultivos orgánicos.', 'reporte_practica_18.pdf', 'evidencia_18.jpg', 1, '2023-07-05 09:40:00'),
(19, 19, 1, 3, 18, 19, 6, 'Supervisor de prácticas forestales', '2023-01-25', '2023-06-15', 300, 'Inventario forestal y uso sostenible.', 'reporte_practica_19.pdf', 'evidencia_19.jpg', 1, '2023-06-01 07:55:00'),
(20, 20, 3, 7, 19, 20, 8, 'Gestión de redes sociales institucionales', '2023-03-01', '2023-07-01', 350, 'Planificó y ejecutó publicaciones semanales.', 'reporte_practica_20.pdf', 'evidencia_20.jpg', 1, '2023-06-10 08:40:00'),
(21, 11, 4, 14, 2, 1, 2, 'asistente de riego', '2025-07-01', '2025-08-09', 360, 'a2sw', 'documento.pdf', 'imagen.jpg', 0, '2025-07-31 07:44:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `codSem` int(11) NOT NULL,
  `nomSem` varchar(50) DEFAULT NULL,
  `iniSem` date DEFAULT NULL,
  `finSem` date DEFAULT NULL,
  `regSem` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`codSem`, `nomSem`, `iniSem`, `finSem`, `regSem`) VALUES
(1, '2015-I', '2015-03-02', '2015-07-17', '2015-02-15 08:00:00'),
(2, '2015-II', '2015-08-03', '2015-12-11', '2015-07-15 08:00:00'),
(3, '2016-I', '2016-03-01', '2016-07-15', '2016-02-10 09:00:00'),
(4, '2016-II', '2016-08-01', '2016-12-10', '2016-07-10 09:00:00'),
(5, '2017-I', '2017-03-06', '2017-07-14', '2017-02-15 08:30:00'),
(6, '2017-II', '2017-08-07', '2017-12-15', '2017-07-12 08:30:00'),
(7, '2018-I', '2018-03-05', '2018-07-13', '2018-02-20 08:00:00'),
(8, '2018-II', '2018-08-06', '2018-12-14', '2018-07-18 08:00:00'),
(9, '2019-I', '2019-03-04', '2019-07-12', '2019-02-22 08:00:00'),
(10, '2019-II', '2019-08-05', '2019-12-13', '2019-07-17 08:00:00'),
(11, '2020-I', '2020-03-09', '2020-07-17', '2020-02-28 08:00:00'),
(12, '2020-II', '2020-08-10', '2020-12-18', '2020-07-30 08:00:00'),
(13, '2021-I', '2021-03-08', '2021-07-16', '2021-02-25 08:00:00'),
(14, '2021-II', '2021-08-09', '2021-12-17', '2021-07-29 08:00:00'),
(15, '2022-I', '2022-03-07', '2022-07-15', '2022-02-24 08:00:00'),
(16, '2022-II', '2022-08-08', '2022-12-16', '2022-07-28 08:00:00'),
(17, '2023-I', '2023-03-06', '2023-07-14', '2023-02-23 08:00:00'),
(18, '2023-II', '2023-08-07', '2023-12-15', '2023-07-27 08:00:00'),
(19, '2024-I', '2024-03-04', '2024-07-12', '2024-02-21 08:00:00'),
(20, '2024-II', '2024-08-05', '2024-12-13', '2024-07-25 08:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `codTrab` int(11) NOT NULL,
  `nomTrab` varchar(100) DEFAULT NULL,
  `appTrab` varchar(100) DEFAULT NULL,
  `apmTrab` varchar(100) DEFAULT NULL,
  `tdoTrab` char(1) DEFAULT NULL COMMENT 'P pasaporte, D dni, C carnet estranjeria',
  `docTrab` varchar(20) DEFAULT NULL,
  `sexTrab` tinytext DEFAULT NULL COMMENT '0 femenino, 1 masculino, 2 indefinido',
  `emaTrab` varchar(150) DEFAULT NULL,
  `celTrab` varchar(15) DEFAULT NULL,
  `fnaTrab` date DEFAULT NULL,
  `dirTrab` varchar(150) DEFAULT NULL,
  `rolTrab` tinyint(4) DEFAULT NULL COMMENT '1 administrativo, 2 docente',
  `estTra` tinyint(4) DEFAULT NULL COMMENT '1 activo, 0 inactivo',
  `regTrab` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`codTrab`, `nomTrab`, `appTrab`, `apmTrab`, `tdoTrab`, `docTrab`, `sexTrab`, `emaTrab`, `celTrab`, `fnaTrab`, `dirTrab`, `rolTrab`, `estTra`, `regTrab`) VALUES
(1, 'María', 'González', 'Ramos', 'D', '42345678', '2', 'maria.gonzalez@utea.edu.pe', '+51 921 345 678', '1978-05-12', 'Av. Los Incas 123, Abancay', 1, 1, '2022-01-10 09:15:00'),
(2, 'Carlos', 'Quispe', 'Huamán', 'D', '43123456', '1', 'carlos.quispe@utea.edu.pe', '+51 987 654 321', '1985-11-04', 'Jr. Cusco 456, Andahuaylas', 2, 1, '2022-02-05 11:00:00'),
(3, 'Rosa', 'Gutiérrez', 'Soto', 'D', '42349876', '0', 'rosa.gutierrez@utea.edu.pe', '+51 955 443 322', '1975-09-18', 'Calle Ayacucho 789, Cusco', 1, 1, '2021-12-01 10:30:00'),
(4, 'José', 'Palomino', 'Vargas', 'D', '42388764', '1', 'jose.palomino@utea.edu.pe', '+51 912 334 456', '1980-03-22', 'Av. Garcilaso 321, Cusco', 2, 1, '2023-03-10 08:00:00'),
(5, 'Lucía', 'Camacho', 'Paredes', 'D', '42654321', '2', 'lucia.camacho@utea.edu.pe', '+51 977 888 444', '1972-07-30', 'Jr. Manco Cápac 147, Abancay', 1, 0, '2023-05-18 14:20:00'),
(6, 'Miguel', 'Valverde', 'Reyes', 'D', '42778945', '1', 'miguel.valverde@utea.edu.pe', '+51 934 221 789', '1970-06-15', 'Calle Comercio 103, Cusco', 2, 1, '2021-09-21 16:45:00'),
(7, 'Andrea', 'Rojas', 'Cáceres', 'D', '43111983', '2', 'andrea.rojas@utea.edu.pe', '+51 954 332 198', '1982-08-29', 'Av. Perú 222, Andahuaylas', 1, 1, '2022-10-03 13:30:00'),
(8, 'Luis', 'Tito', 'Choque', 'D', '42600011', '1', 'luis.tito@utea.edu.pe', '+51 981 000 222', '1976-01-17', 'Jr. Arequipa 300, Abancay', 2, 1, '2020-06-20 07:50:00'),
(9, 'Carmen', 'Chávez', 'Mejía', 'D', '42378999', '2', 'carmen.chavez@utea.edu.pe', '+51 933 432 876', '1984-10-09', 'Calle Lima 450, Cusco', 1, 1, '2021-04-11 10:00:00'),
(10, 'Pedro', 'Salazar', 'Nina', 'D', '42100123', '1', 'pedro.salazar@utea.edu.pe', '+51 989 123 321', '1983-03-25', 'Pasaje Colón 88, Andahuaylas', 2, 1, '2022-11-28 08:10:00'),
(11, 'Patricia', 'Aquino', 'Vilca', 'D', '42345981', '2', 'patricia.aquino@utea.edu.pe', '+51 977 001 122', '1981-07-04', 'Av. Mariscal Cáceres 503, Cusco', 1, 0, '2020-08-16 09:30:00'),
(12, 'Daniel', 'Loayza', 'Rojas', 'D', '43121233', '1', 'daniel.loayza@utea.edu.pe', '+51 922 233 344', '1977-12-01', 'Jr. Junín 210, Abancay', 2, 1, '2023-01-12 12:00:00'),
(13, 'Verónica', 'Sánchez', 'Ruiz', 'D', '42900122', '2', 'veronica.sanchez@utea.edu.pe', '+51 944 555 121', '1986-09-10', 'Urb. Las Américas 16, Andahuaylas', 1, 1, '2022-07-22 10:15:00'),
(14, 'Jorge', 'Chirinos', 'Espinoza', 'D', '42334567', '1', 'jorge.chirinos@utea.edu.pe', '+51 965 889 334', '1974-04-12', 'Av. Ejército 250, Cusco', 2, 1, '2023-02-02 11:50:00'),
(15, 'Martha', 'Medina', 'Vallejos', 'D', '42771145', '2', 'martha.medina@utea.edu.pe', '+51 911 300 456', '1973-02-18', 'Calle Real 99, Abancay', 1, 1, '2023-03-25 09:40:00'),
(16, 'Óscar', 'Delgado', 'Arroyo', 'D', '42110029', '1', 'oscar.delgado@utea.edu.pe', '+51 922 221 011', '1987-10-14', 'Jr. Huancavelica 455, Andahuaylas', 2, 0, '2021-01-30 08:05:00'),
(17, 'Miriam', 'Reyna', 'Huamán', 'D', '42634255', '2', 'miriam.reyna@utea.edu.pe', '+51 966 321 999', '1980-06-06', 'Av. Abancay 200, Cusco', 1, 1, '2021-12-18 10:45:00'),
(18, 'Diego', 'Vargas', 'Soto', 'D', '43000444', '1', 'diego.vargas@utea.edu.pe', '+51 911 800 332', '1982-05-03', 'Jr. Amazonas 121, Cusco', 2, 1, '2022-09-09 07:40:00'),
(19, 'Natalia', 'Yupanqui', 'Valencia', 'D', '42550033', '2', 'natalia.yupanqui@utea.edu.pe', '+51 912 441 221', '1988-08-22', 'Av. La Cultura 300, Abancay', 1, 1, '2022-12-05 13:00:00'),
(20, 'Henry', 'Fernández', 'Ticona', 'D', '42421212', '1', 'henry.fernandez@utea.edu.pe', '+51 933 100 101', '1981-01-30', 'Calle Bolívar 88, Cusco', 2, 0, '2021-11-17 15:10:00'),
(21, 'lucho', 'rosales testrada', NULL, NULL, NULL, NULL, 'lucho@gmail.com', NULL, NULL, NULL, 2, NULL, NULL),
(22, 'george', 'rosales tintaya', NULL, NULL, NULL, NULL, 'grosalestintaya@gmail.com', NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores_carreras`
--

CREATE TABLE `trabajadores_carreras` (
  `codTC` int(11) NOT NULL,
  `codTrab` int(11) NOT NULL,
  `codCar` int(11) NOT NULL,
  `estTC` tinyint(4) DEFAULT NULL COMMENT '1 activo, 0 finalizado',
  `regTC` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `trabajadores_carreras`
--

INSERT INTO `trabajadores_carreras` (`codTC`, `codTrab`, `codCar`, `estTC`, `regTC`) VALUES
(1, 1, 2, 1, '2023-03-01 08:00:00'),
(2, 2, 1, 1, '2023-03-01 08:10:00'),
(3, 3, 5, 1, '2023-03-02 08:15:00'),
(4, 4, 3, 1, '2023-03-02 08:20:00'),
(5, 5, 4, 1, '2023-03-03 08:25:00'),
(6, 6, 2, 1, '2023-03-03 08:30:00'),
(7, 7, 7, 1, '2023-03-04 08:35:00'),
(8, 8, 1, 1, '2023-03-04 08:40:00'),
(9, 9, 6, 1, '2023-03-05 08:45:00'),
(10, 10, 3, 1, '2023-03-05 08:50:00'),
(11, 11, 8, 1, '2023-03-06 08:55:00'),
(12, 12, 2, 1, '2023-03-06 09:00:00'),
(13, 13, 3, 1, '2023-03-07 09:05:00'),
(14, 14, 4, 1, '2023-03-07 09:10:00'),
(15, 15, 6, 1, '2023-03-08 09:15:00'),
(16, 16, 9, 1, '2023-03-08 09:20:00'),
(17, 17, 7, 1, '2023-03-09 09:25:00'),
(18, 18, 1, 1, '2023-03-09 09:30:00'),
(19, 19, 5, 1, '2023-03-10 09:35:00'),
(20, 20, 2, 1, '2023-03-10 09:40:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codUsu` int(11) NOT NULL,
  `codTrab` int(11) NOT NULL,
  `pasUsu` varchar(150) DEFAULT NULL,
  `regUsu` datetime DEFAULT NULL,
  `rol` enum('admin','docente','supervisor') DEFAULT 'docente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codUsu`, `codTrab`, `pasUsu`, `regUsu`, `rol`) VALUES
(1, 1, '123', '2023-01-10 08:15:00', 'docente'),
(2, 2, '123', '2023-01-11 09:20:00', 'docente'),
(3, 3, 'UTEA#Usr2025c', '2023-01-12 10:25:00', 'docente'),
(4, 4, 'UTEA#Usr2025d', '2023-01-13 11:30:00', 'docente'),
(5, 5, '1234', '2023-01-14 12:35:00', 'docente'),
(6, 6, 'UTEA#Usr2025f', '2023-01-15 13:40:00', 'docente'),
(7, 7, 'UTEA#Usr2025g', '2023-01-16 14:45:00', 'docente'),
(8, 8, 'UTEA#Usr2025h', '2023-01-17 15:50:00', 'docente'),
(9, 9, 'UTEA#Usr2025i', '2023-01-18 16:55:00', 'docente'),
(10, 10, 'UTEA#Usr2025j', '2023-01-19 17:00:00', 'docente'),
(11, 11, 'UTEA#Usr2025k', '2023-01-20 08:10:00', 'docente'),
(12, 12, 'UTEA#Usr2025l', '2023-01-21 09:15:00', 'docente'),
(13, 13, 'UTEA#Usr2025m', '2023-01-22 10:20:00', 'docente'),
(14, 14, 'UTEA#Usr2025n', '2023-01-23 11:25:00', 'docente'),
(15, 15, 'UTEA#Usr2025o', '2023-01-24 12:30:00', 'docente'),
(16, 16, 'UTEA#Usr2025p', '2023-01-25 13:35:00', 'docente'),
(17, 17, 'UTEA#Usr2025q', '2023-01-26 14:40:00', 'docente'),
(18, 18, 'UTEA#Usr2025r', '2023-01-27 15:45:00', 'docente'),
(19, 19, 'UTEA#Usr2025s', '2023-01-28 16:50:00', 'docente'),
(20, 20, 'UTEA#Usr2025t', '2023-01-29 17:55:00', 'docente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`codCar`),
  ADD KEY `codFac` (`codFac`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`codEmp`);

--
-- Indices de la tabla `empresas_areas`
--
ALTER TABLE `empresas_areas`
  ADD PRIMARY KEY (`codEA`),
  ADD KEY `fk_empresas_areas_1` (`codEmp`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`codEst`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`codFac`);

--
-- Indices de la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD PRIMARY KEY (`codPra`),
  ADD KEY `codEst` (`codEst`),
  ADD KEY `codTrab` (`codTrab`),
  ADD KEY `codAE` (`codEA`),
  ADD KEY `codSem` (`codSem`),
  ADD KEY `codUsu` (`codUsu`),
  ADD KEY `codCar` (`codCar`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`codSem`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`codTrab`);

--
-- Indices de la tabla `trabajadores_carreras`
--
ALTER TABLE `trabajadores_carreras`
  ADD PRIMARY KEY (`codTC`),
  ADD KEY `codTrab` (`codTrab`),
  ADD KEY `codCar` (`codCar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codUsu`),
  ADD KEY `codTrab` (`codTrab`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `codCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `codEmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `empresas_areas`
--
ALTER TABLE `empresas_areas`
  MODIFY `codEA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `codEst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `codFac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `practicas`
--
ALTER TABLE `practicas`
  MODIFY `codPra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `codSem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `codTrab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `trabajadores_carreras`
--
ALTER TABLE `trabajadores_carreras`
  MODIFY `codTC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `fk_carreras_1` FOREIGN KEY (`codFac`) REFERENCES `facultad` (`codFac`);

--
-- Filtros para la tabla `empresas_areas`
--
ALTER TABLE `empresas_areas`
  ADD CONSTRAINT `fk_empresas_areas_1` FOREIGN KEY (`codEmp`) REFERENCES `empresas` (`codEmp`);

--
-- Filtros para la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD CONSTRAINT `practicas_ibfk_1` FOREIGN KEY (`codSem`) REFERENCES `semestre` (`codSem`),
  ADD CONSTRAINT `practicas_ibfk_2` FOREIGN KEY (`codEst`) REFERENCES `estudiantes` (`codEst`),
  ADD CONSTRAINT `practicas_ibfk_3` FOREIGN KEY (`codCar`) REFERENCES `carreras` (`codCar`),
  ADD CONSTRAINT `practicas_ibfk_4` FOREIGN KEY (`codEA`) REFERENCES `empresas_areas` (`codEA`);

--
-- Filtros para la tabla `trabajadores_carreras`
--
ALTER TABLE `trabajadores_carreras`
  ADD CONSTRAINT `fk_trabajadores_carreras_1` FOREIGN KEY (`codTrab`) REFERENCES `trabajadores` (`codTrab`),
  ADD CONSTRAINT `fk_trabajadores_carreras_2` FOREIGN KEY (`codCar`) REFERENCES `carreras` (`codCar`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_1` FOREIGN KEY (`codTrab`) REFERENCES `trabajadores` (`codTrab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
