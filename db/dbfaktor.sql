-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2019 a las 18:15:11
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbfaktor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradora`
--

CREATE TABLE `aseguradora` (
  `idAseguradora` int(11) NOT NULL,
  `nombreAseguradra` varchar(50) NOT NULL,
  `direccionAseguradora` varchar(45) NOT NULL,
  `pagina` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aseguradora`
--

INSERT INTO `aseguradora` (`idAseguradora`, `nombreAseguradra`, `direccionAseguradora`, `pagina`) VALUES
(1, 'aseguradora monterrey', 'calle Francisco villa numero 8f', 'www.aseguradoramonterrer.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casomedico`
--

CREATE TABLE `casomedico` (
  `idCasoMedico` int(11) NOT NULL,
  `siniestro` varchar(45) DEFAULT NULL,
  `fechaCasoMedico` datetime DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `rolMedicoEnCaso` varchar(45) DEFAULT NULL,
  `honorariosMedico` double DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `documentosCasoMedico_iddocumentosCasoMedico` int(11) NOT NULL,
  `Paciente_idPaciente` int(11) NOT NULL,
  `Aseguradora_idAseguradora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoscasomedico`
--

CREATE TABLE `documentoscasomedico` (
  `iddocumentosCasoMedico` int(11) NOT NULL,
  `pdfCartaAprobacion` varchar(45) DEFAULT NULL,
  `pdfFacturaHonorarios` varchar(45) DEFAULT NULL,
  `xmlFacturaHonorarios` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentospersonal`
--

CREATE TABLE `documentospersonal` (
  `idDocumentosPersonal` int(11) NOT NULL,
  `identificacion` varchar(200) DEFAULT NULL,
  `cedulaBancaria` varchar(200) DEFAULT NULL,
  `cedulaFiscal` varchar(200) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `nombrePaciente` varchar(45) DEFAULT NULL,
  `apellidoPatPaciente` varchar(45) DEFAULT NULL,
  `apellidoMatPaciente` varchar(45) DEFAULT NULL,
  `hospital` varchar(45) DEFAULT NULL,
  `cuartoHospital` varchar(45) DEFAULT NULL,
  `numTelefonoPaciente` varchar(45) DEFAULT NULL,
  `emailPaciente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `passwordUsuario` varchar(45) DEFAULT NULL,
  `nombreUsuario` varchar(45) DEFAULT NULL,
  `apellidoPatUsuario` varchar(45) DEFAULT NULL,
  `apellidoMatUsuario` varchar(45) DEFAULT NULL,
  `direccionUsuario` varchar(45) DEFAULT NULL,
  `numTelefonoUsuario` varchar(45) DEFAULT NULL,
  `numCuenta` varchar(45) DEFAULT NULL,
  `bancoAfiliado` varchar(45) DEFAULT NULL,
  `folioFiscal` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `fechaCreacionUser` datetime DEFAULT NULL,
  `rolUsuario` varchar(45) DEFAULT NULL,
  `DocumentosPersonal_idDocumentosPersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_aseguradora`
--

CREATE TABLE `usuario_has_aseguradora` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Aseguradora_idAseguradora` int(11) NOT NULL,
  `usuarioAseguradora` varchar(45) DEFAULT NULL,
  `passwodAseguradora` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aseguradora`
--
ALTER TABLE `aseguradora`
  ADD PRIMARY KEY (`idAseguradora`);

--
-- Indices de la tabla `casomedico`
--
ALTER TABLE `casomedico`
  ADD PRIMARY KEY (`idCasoMedico`,`documentosCasoMedico_iddocumentosCasoMedico`),
  ADD KEY `fk_CasoMedico_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_CasoMedico_documentosCasoMedico1_idx` (`documentosCasoMedico_iddocumentosCasoMedico`),
  ADD KEY `fk_CasoMedico_Paciente1_idx` (`Paciente_idPaciente`),
  ADD KEY `fk_CasoMedico_Aseguradora1_idx` (`Aseguradora_idAseguradora`);

--
-- Indices de la tabla `documentoscasomedico`
--
ALTER TABLE `documentoscasomedico`
  ADD PRIMARY KEY (`iddocumentosCasoMedico`);

--
-- Indices de la tabla `documentospersonal`
--
ALTER TABLE `documentospersonal`
  ADD PRIMARY KEY (`idDocumentosPersonal`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`DocumentosPersonal_idDocumentosPersonal`),
  ADD KEY `fk_Usuario_DocumentosPersonal1_idx` (`DocumentosPersonal_idDocumentosPersonal`);

--
-- Indices de la tabla `usuario_has_aseguradora`
--
ALTER TABLE `usuario_has_aseguradora`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Aseguradora_idAseguradora`),
  ADD KEY `fk_Usuario_has_Aseguradora_Aseguradora1_idx` (`Aseguradora_idAseguradora`),
  ADD KEY `fk_Usuario_has_Aseguradora_Usuario1_idx` (`Usuario_idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aseguradora`
--
ALTER TABLE `aseguradora`
  MODIFY `idAseguradora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `casomedico`
--
ALTER TABLE `casomedico`
  MODIFY `idCasoMedico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentoscasomedico`
--
ALTER TABLE `documentoscasomedico`
  MODIFY `iddocumentosCasoMedico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentospersonal`
--
ALTER TABLE `documentospersonal`
  MODIFY `idDocumentosPersonal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casomedico`
--
ALTER TABLE `casomedico`
  ADD CONSTRAINT `fk_CasoMedico_Aseguradora1` FOREIGN KEY (`Aseguradora_idAseguradora`) REFERENCES `aseguradora` (`idAseguradora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_Paciente1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_documentosCasoMedico1` FOREIGN KEY (`documentosCasoMedico_iddocumentosCasoMedico`) REFERENCES `documentoscasomedico` (`iddocumentosCasoMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_DocumentosPersonal1` FOREIGN KEY (`DocumentosPersonal_idDocumentosPersonal`) REFERENCES `documentospersonal` (`idDocumentosPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_aseguradora`
--
ALTER TABLE `usuario_has_aseguradora`
  ADD CONSTRAINT `fk_Usuario_has_Aseguradora_Aseguradora1` FOREIGN KEY (`Aseguradora_idAseguradora`) REFERENCES `aseguradora` (`idAseguradora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Aseguradora_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
