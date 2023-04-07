create database proyecto;
use proyecto;
-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-01-2022 a las 11:37:05
-- Versión del servidor: 5.7.36-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Pais`
--

CREATE TABLE `Pais` (
  `IdPais` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NomPais` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Album`
--

CREATE TABLE `Album` (
  `IdAlbum` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Foto`
--

CREATE TABLE `Foto` (
  `IdFoto` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `IdUsuario` int(4) NOT NULL,
  `NomFoto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Album` int(4) NOT NULL,
  `Fichero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NomUsuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL UNIQUE KEY,
  `Clave` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Sexo` int(2) NOT NULL,
  `FNacimiento` date NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Pais` int(4) NOT NULL,
  `Foto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Album`
--
ALTER TABLE `Album`
  ADD KEY `Usuario_fk` (`Usuario`);

--
-- Indices de la tabla `Foto`
--
ALTER TABLE `Foto`
  ADD KEY `usuario_foto` (`IdUsuario`),
  ADD KEY `album_foto_fk` (`Album`);

--

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD KEY `ForeignKeyPais` (`Pais`);

--

-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Album`
--
ALTER TABLE `Album`
  ADD CONSTRAINT `Usuario_fk` FOREIGN KEY (`Usuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Foto`
--
ALTER TABLE `Foto`
  ADD CONSTRAINT `usuario_foto` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario`(`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_foto_fk` FOREIGN KEY (`Album`) REFERENCES `Album` (`IdAlbum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `ForeignKeyPais` FOREIGN KEY (`Pais`) REFERENCES `Pais` (`IdPais`) ON DELETE CASCADE ON UPDATE CASCADE;
  
--
-- Inserción de datos en la tabla Pais
--

INSERT INTO pais (NomPais)
VALUES
('Afganistán'),
('Albania'),
('Alemania'),
('Andorra'),
('Angola'),
('Antigua y Barbuda'),
('Arabia Saudita'),
('Argelia'),
('Argentina'),
('Armenia'),
('Australia'),
('Austria'),
('Azerbaiyán'),
('Bahamas'),
('Bangladés'),
('Barbados'),
('Baréin'),
('Bélgica'),
('Belice'),
('Benín'),
('Bielorrusia'),
('Birmania / Myanmar'),
('Bolivia'),
('Bosnia y Herzegovina'),
('Botsuana'),
('Brasil'),
('Brunéi'),
('Bulgaria'),
('Burkina Faso'),
('Burundi'),
('Bután'),
('Cabo Verde'),
('Camboya'),
('Camerún'),
('Canadá'),
('Catar'),
('Chad'),
('Chile'),
('China'),
('Chipre'),
('Ciudad del Vaticano'),
('Colombia'),
('Comoras'),
('Corea del Norte'),
('Corea del Sur'),
('Costa de Marfil'),
('Costa Rica'),
('Croacia'),
('Cuba'),
('Dinamarca'),
('Dominica'),
('Ecuador'),
('Egipto'),
('El Salvador'),
('Emiratos Árabes Unidos'),
('Eritrea'),
('Eslovaquia'),
('Eslovenia'),
('España'),
('Estados Unidos'),
('Estonia'),
('Etiopía'),
('Filipinas'),
('Finlandia'),
('Fiyi'),
('Francia'),
('Gabón'),
('Gambia'),
('Georgia'),
('Ghana'),
('Granada'),
('Grecia'),
('Guatemala'),
('Guyana'),
('Guinea'),
('Guinea-Bissau'),
('Guinea Ecuatorial'),
('Haití'),
('Honduras'),
('Hungría'),
('India'),
('Indonesia'),
('Irak'),
('Irán'),
('Irlanda'),
('Islandia'),
('Islas Marshall'),
('Islas Salomón'),
('Israel'),
('Italia'),
('Jamaica'),
('Japón'),
('Jordania'),
('Kazajistán'),
('Kenia'),
('Kirguistán'),
('Kiribati'),
('Kuwait'),
('Laos'),
('Lesoto'),
('Letonia'),
('Líbano'),
('Liberia'),
('Libia'),
('Liechtenstein'),
('Lituania'),
('Luxemburgo'),
('Macedonia del Norte'),
('Madagascar'),
('Malasia'),
('Malaui'),
('Maldivas'),
('Malí'),
('Malta'),
('Marruecos'),
('Mauricio'),
('Mauritania'),
('México'),
('Micronesia'),
('Moldavia'),
('Mónaco'),
('Mongolia'),
('Montenegro'),
('Mozambique'),
('Namibia'),
('Nauru'),
('Nepal'),
('Nicaragua'),
('Níger'),
('Nigeria'),
('Noruega'),
('Nueva Zelanda'),
('Omán'),
('Países Bajos'),
('Pakistán'),
('Palaos'),
('Panamá'),
('Papúa Nueva Guinea'),
('Paraguay'),
('Perú'),
('Polonia'),
('Portugal'),
('Reino Unido'),
('República Centroafricana'),
('República Checa'),
('República de Macedonia'),
('República del Congo'),
('República Democrática del Congo'),
('República Dominicana'),
('Ruanda'),
('Rumanía'),
('Rusia'),
('Samoa'),
('San Cristóbal y Nieves'),
('San Marino'),
('San Vicente y las Granadinas'),
('Santa Lucía'),
('Santo Tomé y Príncipe'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leona'),
('Singapur'),
('Siria'),
('Somalia'),
('Sri Lanka'),
('Suazilandia'),
('Sudáfrica'),
('Sudán'),
('Sudán del Sur'),
('Suecia'),
('Suiza'),
('Surinam'),
('Tailandia'),
('Tanzania'),
('Tayikistán'),
('Timor Oriental'),
('Togo'),
('Tonga'),
('Trinidad y Tobago'),
('Túnez'),
('Turkmenistán'),
('Turquía'),
('Tuvalu'),
('Ucrania'),
('Uganda'),
('Uruguay'),
('Uzbekistán'),
('Vanuatu'),
('Venezuela'),
('Vietnam'),
('Yemen'),
('Yibuti'),
('Zambia'),
('Zimbabue');

  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;