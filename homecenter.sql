/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : homecenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-03 01:39:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombrearea` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', 'CENTRO DE SERVICIO');

-- ----------------------------
-- Table structure for `categoria_incidencia`
-- ----------------------------
DROP TABLE IF EXISTS `categoria_incidencia`;
CREATE TABLE `categoria_incidencia` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecategoria` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria_incidencia
-- ----------------------------
INSERT INTO `categoria_incidencia` VALUES ('1', 'PUNTUALIDAD', '1');
INSERT INTO `categoria_incidencia` VALUES ('2', 'RESPONSABILIDAD', '1');
INSERT INTO `categoria_incidencia` VALUES ('3', 'COMPROMISO', '1');
INSERT INTO `categoria_incidencia` VALUES ('4', 'RESPETO', '1');
INSERT INTO `categoria_incidencia` VALUES ('5', 'HONESTIDAD', '1');
INSERT INTO `categoria_incidencia` VALUES ('6', 'TRABAJO EN EQUIPO', '1');

-- ----------------------------
-- Table structure for `detalle_ejecutar_evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ejecutar_evaluacion`;
CREATE TABLE `detalle_ejecutar_evaluacion` (
  `iddetalleejecutarevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idejecutarevaluacion` int(11) DEFAULT NULL,
  `idpreguntaevaluacion` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalleejecutarevaluacion`),
  KEY `detalle_ejecutar` (`idejecutarevaluacion`),
  KEY `detalle_pregunta` (`idpreguntaevaluacion`),
  CONSTRAINT `detalle_ejecutar` FOREIGN KEY (`idejecutarevaluacion`) REFERENCES `ejecutar_evaluacion` (`idejecutarevaluacion`),
  CONSTRAINT `detalle_pregunta` FOREIGN KEY (`idpreguntaevaluacion`) REFERENCES `pregunta_evaluacion` (`idpreguntaevaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detalle_ejecutar_evaluacion
-- ----------------------------
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('82', '13', '1', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('83', '13', '4', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('84', '13', '5', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('85', '13', '2', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('86', '13', '6', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('87', '13', '7', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('88', '13', '3', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('89', '13', '8', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('90', '13', '9', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('91', '14', '1', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('92', '14', '4', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('93', '14', '5', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('94', '14', '2', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('95', '14', '6', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('96', '14', '7', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('97', '14', '3', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('98', '14', '8', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('99', '14', '9', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('100', '16', '1', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('101', '16', '4', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('102', '16', '5', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('103', '16', '2', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('104', '16', '6', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('105', '16', '7', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('106', '16', '3', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('107', '16', '8', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('108', '16', '9', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('109', '17', '1', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('110', '17', '4', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('111', '17', '5', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('112', '17', '2', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('113', '17', '6', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('114', '17', '7', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('115', '17', '3', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('116', '17', '8', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('117', '17', '9', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('118', '18', '1', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('119', '18', '4', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('120', '18', '5', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('121', '18', '2', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('122', '18', '6', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('123', '18', '7', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('124', '18', '3', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('125', '18', '8', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('126', '18', '9', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('127', '19', '1', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('128', '19', '4', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('129', '19', '5', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('130', '19', '2', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('131', '19', '6', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('132', '19', '7', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('133', '19', '3', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('134', '19', '8', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('135', '19', '9', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('136', '20', '1', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('137', '20', '4', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('138', '20', '5', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('139', '20', '2', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('140', '20', '6', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('141', '20', '7', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('142', '20', '3', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('143', '20', '8', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('144', '20', '9', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('145', '21', '10', '4');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('146', '21', '11', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('147', '21', '12', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('148', '21', '13', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('149', '21', '14', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('150', '21', '15', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('151', '21', '16', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('152', '21', '17', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('153', '21', '18', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('154', '22', '19', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('155', '22', '21', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('156', '22', '22', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('157', '22', '24', '5');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('158', '23', '25', '2');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('159', '23', '26', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('160', '23', '28', '1');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('161', '23', '29', '3');
INSERT INTO `detalle_ejecutar_evaluacion` VALUES ('162', '23', '31', '2');

-- ----------------------------
-- Table structure for `ejecutar_evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `ejecutar_evaluacion`;
CREATE TABLE `ejecutar_evaluacion` (
  `idejecutarevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idcolaborador` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `puntajetotal` int(11) DEFAULT NULL,
  `resultado` varchar(100) DEFAULT NULL,
  `idevaluacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idejecutarevaluacion`),
  KEY `fk_ejecutar_usuario` (`idusuario`),
  KEY `idcolaborador` (`idcolaborador`),
  CONSTRAINT `ejecutar_evaluacion_ibfk_1` FOREIGN KEY (`idcolaborador`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `fk_ejecutar_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ejecutar_evaluacion
-- ----------------------------
INSERT INTO `ejecutar_evaluacion` VALUES ('13', '6', '3', '36', 'BUENO', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('14', '7', '3', '33', 'BUENO', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('16', '8', '3', '30', 'BUENO', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('17', '10', '3', '28', 'BUENO', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('18', '9', '3', '21', 'REGULAR', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('19', '11', '3', '12', 'MALO', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('20', '12', '3', '45', 'EXCELENTE', '1');
INSERT INTO `ejecutar_evaluacion` VALUES ('21', '6', '3', '28', 'BUENO', '2');
INSERT INTO `ejecutar_evaluacion` VALUES ('22', '2', '3', '18', 'BUENO', '5');
INSERT INTO `ejecutar_evaluacion` VALUES ('23', '2', '3', '11', 'MALO', '6');

-- ----------------------------
-- Table structure for `evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idperiodo` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`),
  KEY `fk_evaluacion_periodo` (`idperiodo`),
  KEY `fk_evaluacion_usuario` (`idusuario`),
  CONSTRAINT `fk_evaluacion_periodo` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`idperiodo`),
  CONSTRAINT `fk_evaluacion_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------
INSERT INTO `evaluacion` VALUES ('1', '1', 'EVALUACION ENERO', '3', '0');
INSERT INTO `evaluacion` VALUES ('2', '1', 'EVALUACION JUNIO', '3', '1');
INSERT INTO `evaluacion` VALUES ('3', '2', 'EVALUACION JULIO', '3', '0');
INSERT INTO `evaluacion` VALUES ('4', '2', 'EVALUACION DICIEMBRE', '3', '0');
INSERT INTO `evaluacion` VALUES ('5', '6', 'EVALUACION ABRIL', '3', '1');
INSERT INTO `evaluacion` VALUES ('6', '7', 'EVALUACION AGOSTO', '3', '1');

-- ----------------------------
-- Table structure for `incidencia`
-- ----------------------------
DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `idincidencia` int(11) NOT NULL AUTO_INCREMENT,
  `idtipoincidencia` int(11) DEFAULT NULL,
  `idcolaborador` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `horaregistro` time DEFAULT NULL,
  PRIMARY KEY (`idincidencia`),
  KEY `fk_incidencia_tipo` (`idtipoincidencia`),
  KEY `fk_incidencia_categoria` (`idcategoria`),
  KEY `idcolaborador` (`idcolaborador`),
  CONSTRAINT `fk_incidencia_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_incidencia` (`idcategoria`),
  CONSTRAINT `fk_incidencia_tipo` FOREIGN KEY (`idtipoincidencia`) REFERENCES `tipo_incidencia` (`idtipoincidencia`),
  CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`idcolaborador`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incidencia
-- ----------------------------

-- ----------------------------
-- Table structure for `periodo`
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
  `idperiodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreperiodo` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idperiodo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periodo
-- ----------------------------
INSERT INTO `periodo` VALUES ('1', 'PRIMER SEMESTRE 2015', '1');
INSERT INTO `periodo` VALUES ('2', 'SEGUNDO SEMESTRE 2015', '0');
INSERT INTO `periodo` VALUES ('3', 'PRIMER SEMESTRE 2016', '0');
INSERT INTO `periodo` VALUES ('4', 'SEGUNDO SEMESTRE 2016', '0');
INSERT INTO `periodo` VALUES ('5', 'PRIMER SEMESTRE 2016', '2');
INSERT INTO `periodo` VALUES ('6', 'PRIMER SEMESTRE 2021', '1');
INSERT INTO `periodo` VALUES ('7', 'PRIMER SEMESTRE 2017', '1');

-- ----------------------------
-- Table structure for `pregunta`
-- ----------------------------
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpregunta`),
  KEY `fk_pregunta_usuario` (`idusuario`),
  KEY `fk_pregunta_categoria` (`idcategoria`),
  CONSTRAINT `fk_pregunta_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_incidencia` (`idcategoria`),
  CONSTRAINT `fk_pregunta_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pregunta
-- ----------------------------
INSERT INTO `pregunta` VALUES ('1', '3', 'Cumple con puntualidad su horario de trabajo.', '1');
INSERT INTO `pregunta` VALUES ('2', '3', 'Cumple con responsabilidad todas las actividades que se le asigna.', '2');
INSERT INTO `pregunta` VALUES ('3', '3', 'Es comprometido con la visiÃ³n y misiÃ³n de la empresa.', '3');
INSERT INTO `pregunta` VALUES ('4', '3', 'Cumple con puntualidad las tareas asignadas.', '1');
INSERT INTO `pregunta` VALUES ('5', '3', 'Cumple con puntualidad en reportar reclamos.', '1');
INSERT INTO `pregunta` VALUES ('6', '3', 'Es responsable con los objetos de valor asignados.', '2');
INSERT INTO `pregunta` VALUES ('7', '3', 'Es responsable con guardar la confidencialidad de los clientes.', '2');
INSERT INTO `pregunta` VALUES ('8', '3', 'EstÃ¡ comprometido en brindar la mejor atenciÃ³n posible.', '3');
INSERT INTO `pregunta` VALUES ('9', '3', 'EstÃ¡ comprometido en realizar sus tareas de manera eficiente y eficaz.', '3');

-- ----------------------------
-- Table structure for `pregunta_evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `pregunta_evaluacion`;
CREATE TABLE `pregunta_evaluacion` (
  `idpreguntaevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idevaluacion` int(11) DEFAULT NULL,
  `idpregunta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpreguntaevaluacion`),
  KEY `fk_pregunta_pregunta` (`idpregunta`),
  KEY `fk_pregunta_evaluacion` (`idevaluacion`),
  CONSTRAINT `fk_pregunta_evaluacion` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`),
  CONSTRAINT `fk_pregunta_pregunta` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pregunta_evaluacion
-- ----------------------------
INSERT INTO `pregunta_evaluacion` VALUES ('1', '1', '1');
INSERT INTO `pregunta_evaluacion` VALUES ('2', '1', '2');
INSERT INTO `pregunta_evaluacion` VALUES ('3', '1', '3');
INSERT INTO `pregunta_evaluacion` VALUES ('4', '1', '4');
INSERT INTO `pregunta_evaluacion` VALUES ('5', '1', '5');
INSERT INTO `pregunta_evaluacion` VALUES ('6', '1', '6');
INSERT INTO `pregunta_evaluacion` VALUES ('7', '1', '7');
INSERT INTO `pregunta_evaluacion` VALUES ('8', '1', '8');
INSERT INTO `pregunta_evaluacion` VALUES ('9', '1', '9');
INSERT INTO `pregunta_evaluacion` VALUES ('10', '2', '1');
INSERT INTO `pregunta_evaluacion` VALUES ('11', '2', '4');
INSERT INTO `pregunta_evaluacion` VALUES ('12', '2', '5');
INSERT INTO `pregunta_evaluacion` VALUES ('13', '2', '2');
INSERT INTO `pregunta_evaluacion` VALUES ('14', '2', '6');
INSERT INTO `pregunta_evaluacion` VALUES ('15', '2', '7');
INSERT INTO `pregunta_evaluacion` VALUES ('16', '2', '3');
INSERT INTO `pregunta_evaluacion` VALUES ('17', '2', '8');
INSERT INTO `pregunta_evaluacion` VALUES ('18', '2', '9');
INSERT INTO `pregunta_evaluacion` VALUES ('19', '5', '1');
INSERT INTO `pregunta_evaluacion` VALUES ('20', '5', '5');
INSERT INTO `pregunta_evaluacion` VALUES ('21', '5', '2');
INSERT INTO `pregunta_evaluacion` VALUES ('22', '5', '7');
INSERT INTO `pregunta_evaluacion` VALUES ('24', '5', '8');
INSERT INTO `pregunta_evaluacion` VALUES ('25', '6', '1');
INSERT INTO `pregunta_evaluacion` VALUES ('26', '6', '4');
INSERT INTO `pregunta_evaluacion` VALUES ('27', '6', '5');
INSERT INTO `pregunta_evaluacion` VALUES ('28', '6', '6');
INSERT INTO `pregunta_evaluacion` VALUES ('29', '6', '2');
INSERT INTO `pregunta_evaluacion` VALUES ('30', '6', '7');
INSERT INTO `pregunta_evaluacion` VALUES ('31', '6', '8');
INSERT INTO `pregunta_evaluacion` VALUES ('32', '6', '9');

-- ----------------------------
-- Table structure for `tipo_incidencia`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_incidencia`;
CREATE TABLE `tipo_incidencia` (
  `idtipoincidencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipoincidencia` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtipoincidencia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_incidencia
-- ----------------------------
INSERT INTO `tipo_incidencia` VALUES ('1', 'EXITO');
INSERT INTO `tipo_incidencia` VALUES ('2', 'FRACASO');

-- ----------------------------
-- Table structure for `tipo_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES ('1', 'ADMINISTRADOR');
INSERT INTO `tipo_usuario` VALUES ('2', 'SUB GERENTE');
INSERT INTO `tipo_usuario` VALUES ('3', 'GERENTE');
INSERT INTO `tipo_usuario` VALUES ('4', 'COLABORADOR');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idtipousuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `clave_plana` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `idarea` int(11) DEFAULT NULL,
  `idregistra` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('2', '1', 'HUILDER ', 'MERA', null, null, 'hmera@usat.edu.pe', '202cb962ac59075b964b07152d234b70', '123', '1', null, null, null, null, null);
INSERT INTO `usuario` VALUES ('3', '2', 'HUILDER ', 'MERA', null, null, 'hmera@usat.edu.pe', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1', null, null, null, null, null);
INSERT INTO `usuario` VALUES ('4', '3', 'HUILDER ', 'MERA', null, null, 'hmera@usat.edu.pe', '827ccb0eea8a706c4c34a16891f84e7b', '12345', '1', null, null, null, null, null);
INSERT INTO `usuario` VALUES ('6', '4', 'ANGELICA', 'VILLALOBOS', '956735864', 'POMALCA', null, null, null, '1', '2005-05-11', '2015-05-21', '47277727', '1', '3');
INSERT INTO `usuario` VALUES ('7', '4', 'ROSA', 'TORERO', '950678793', '', null, null, null, '1', '1993-01-15', '2015-05-01', '45678900', '1', '3');
INSERT INTO `usuario` VALUES ('8', '4', 'LOURDES', 'BACA', '987055345', '', null, null, null, '1', '1992-08-08', '2015-06-16', '45678900', '1', '3');
INSERT INTO `usuario` VALUES ('9', '4', 'EDINSON CESAR', 'REMIGIO LOPEZ', '994568347', '', null, null, null, '1', '1991-01-29', '2015-06-16', '12345678', '1', '3');
INSERT INTO `usuario` VALUES ('10', '4', 'MIGUEL ANGEL', 'SANCHEZ FLORES', '987655483', '', null, null, null, '1', '1992-08-12', '2015-06-16', '45678900', '1', '3');
INSERT INTO `usuario` VALUES ('11', '4', 'ARTEMO', 'GUERRERO ', '987457483', '', null, null, null, '1', '1992-05-28', '2015-06-16', '45678000', '1', '3');
INSERT INTO `usuario` VALUES ('12', '4', 'GABRIELA', 'MENDOZA', '965835488', '', null, null, null, '1', '1995-06-05', '2015-06-16', '45673454', '1', '3');
