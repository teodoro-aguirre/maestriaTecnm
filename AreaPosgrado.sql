/* Table 'docente' */
CREATE TABLE docente(
  curp VARCHAR(18) NOT NULL,
  `nPersonal` VARCHAR(10) NOT NULL,
  nombre VARCHAR(30) NOT NULL,
  `apellidoPaterno` VARCHAR(30) NOT NULL,
  `apellidoMaterno` VARCHAR(30),
  `nivelAcademico` VARCHAR(15) NOT NULL,
  correo VARCHAR(50) NOT NULL,
  PRIMARY KEY(curp)
);

/* Table 'alumno' */
CREATE TABLE alumno(
  `nControl` VARCHAR(8) NOT NULL,
  nombre VARCHAR(30) NOT NULL,
  `apellidoPaterno` VARCHAR(30) NOT NULL,
  `apellidoMaterno` VARCHAR(30),
  curp VARCHAR(18),
  correo VARCHAR(50) NOT NULL,
  PRIMARY KEY(`nControl`)
);

/* Table 'semestre' */
CREATE TABLE semestre
  (`idSemestre` INT NOT NULL, semestre VARCHAR NOT NULL, PRIMARY KEY(`idSemestre`))
  ;

/* Table 'entrevista' */
CREATE TABLE entrevista(
`idEntrevista` VARCHAR(10) NOT NULL, tipo VARCHAR(20) NOT NULL,
  PRIMARY KEY(`idEntrevista`)
);

/* Table 'preguntas' */
CREATE TABLE preguntas(
`idPregunta` VARCHAR(10) NOT NULL, pregunta VARCHAR(50) NOT NULL,
  PRIMARY KEY(`idPregunta`)
);

/* Table 'programaPosgrado' */
CREATE TABLE `programaPosgrado`
  (idpp VARCHAR(5) NOT NULL, `nombrePP` VARCHAR(30) NOT NULL, PRIMARY KEY(idpp))
  ;

/* Table 'tipoDocente' */
CREATE TABLE `tipoDocente`(
tipo VARCHAR(20) NOT NULL, `nivelAcademico` VARCHAR(15) NOT NULL,
  docente_curp VARCHAR(18) NOT NULL
);

/* Table 'tutoria' */
CREATE TABLE tutoria(
  `idTutoria` INT(10) NOT NULL,
  docente_curp VARCHAR(18) NOT NULL,
  `alumno_nControl` VARCHAR(8) NOT NULL,
  `semestre_idSemestre` INT NOT NULL,
  PRIMARY KEY(`idTutoria`)
);

/* Table 'docentepp' */
CREATE TABLE docentepp
  (`programaPosgrado_idpp` VARCHAR(5) NOT NULL, docente_curp VARCHAR(18) NOT NULL)
  ;

/* Table 'entrevistaTutoria' */
CREATE TABLE `entrevistaTutoria`(
`tutoria_idTutoria` INT(10) NOT NULL,
  `entrevista_idEntrevista` VARCHAR(10) NOT NULL
);

/* Table 'preguntasEntrevista' */
CREATE TABLE `preguntasEntrevista`(
`entrevista_idEntrevista` VARCHAR(10) NOT NULL,
  `preguntas_idPregunta` VARCHAR(10) NOT NULL
);

/* Table 'materia' */
CREATE TABLE materia(
`idMateira` VARCHAR(7) NOT NULL, `nombreMateria` VARCHAR(40) NOT NULL,
  PRIMARY KEY(`idMateira`)
);

/* Table 'cargaAcademica' */
CREATE TABLE `cargaAcademica`
  (`alumno_nControl` VARCHAR(8) NOT NULL, `materia_idMateira` VARCHAR(7) NOT NULL)
  ;

/* Table 'alumnoPosgrado' */
CREATE TABLE `alumnoPosgrado`(
`programaPosgrado_idpp` VARCHAR(5) NOT NULL,
  `alumno_nControl` VARCHAR(8) NOT NULL
);

/* Table 'respuestaAlumno' */
CREATE TABLE `respuestaAlumno`(
`alumno_nControl` VARCHAR(8) NOT NULL,
  `pregunta_idPregunta` VARCHAR(10) NOT NULL
);

/* Table 'semestreAlumno' */
CREATE TABLE `semestreAlumno`(
`semestre_idSemestre` INT NOT NULL, `alumno_nControl` VARCHAR(8) NOT NULL,
  promedio DECIMAL
);

/* Table 'beca' */
CREATE TABLE beca(
  `alumno_nControl` VARCHAR(8) NOT NULL,
  `tiempoBeca` DATE(MONTH) NOT NULL,
  `inicioBeca` DATE NOT NULL,
  `finBeca` DATE NOT NULL,
  `inicioEstudios` DATE NOT NULL,
  `finEstudios` DATE NOT NULL,
  `fechaTitulacion` DATE
);

/* Table 'resultadosproducto' */
CREATE TABLE resultadosproducto
  (`idResultado` INT NOT NULL, PRIMARY KEY(`idResultado`));

/* Table 'resultadoAlumno' */
CREATE TABLE `resultadoAlumno`(
`alumno_nControl` VARCHAR(10) NOT NULL, `resultados_idResultado` INT NOT NULL,
  `tutoria_idTutoria` INT(10) NOT NULL
);

/* Table 'producto' */
CREATE TABLE producto(
  `resultados_idResultado` INT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  `avance ` FLOAT NOT NULL
);

/* Table 'actividad' */
CREATE TABLE actividad(
  `resultados_idResultado` INT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  `avance ` FLOAT NOT NULL
);

/* Table 'resultadosactividad' */
CREATE TABLE resultadosactividad
  (`idResultado` INT NOT NULL, PRIMARY KEY(`idResultado`));

/* Relation 'docente_tipoDocente' */
ALTER TABLE `tipoDocente`
  ADD CONSTRAINT `docente_tipoDocente`
    FOREIGN KEY (docente_curp) REFERENCES docente (curp);

/* Relation 'programaPosgrado_docentepp' */
ALTER TABLE docentepp
  ADD CONSTRAINT `programaPosgrado_docentepp`
    FOREIGN KEY (`programaPosgrado_idpp`) REFERENCES `programaPosgrado` (idpp);

/* Relation 'alumno_cargaAcademica' */
ALTER TABLE `cargaAcademica`
  ADD CONSTRAINT `alumno_cargaAcademica`
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'materia_cargaAcademica' */
ALTER TABLE `cargaAcademica`
  ADD CONSTRAINT `materia_cargaAcademica`
    FOREIGN KEY (`materia_idMateira`) REFERENCES materia (`idMateira`);

/* Relation 'programaPosgrado_alumnoPosgrado' */
ALTER TABLE `alumnoPosgrado`
  ADD CONSTRAINT `programaPosgrado_alumnoPosgrado`
    FOREIGN KEY (`programaPosgrado_idpp`) REFERENCES `programaPosgrado` (idpp);

/* Relation 'alumno_alumnoPosgrado' */
ALTER TABLE `alumnoPosgrado`
  ADD CONSTRAINT `alumno_alumnoPosgrado`
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'alumno_respuestaAlumno' */
ALTER TABLE `respuestaAlumno`
  ADD CONSTRAINT `alumno_respuestaAlumno`
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'pregunta_respuestaAlumno' */
ALTER TABLE `respuestaAlumno`
  ADD CONSTRAINT `pregunta_respuestaAlumno`
    FOREIGN KEY (`pregunta_idPregunta`) REFERENCES preguntas (`idPregunta`);

/* Relation 'semestre_semestreAlumno' */
ALTER TABLE `semestreAlumno`
  ADD CONSTRAINT `semestre_semestreAlumno`
    FOREIGN KEY (`semestre_idSemestre`) REFERENCES semestre (`idSemestre`);

/* Relation 'alumno_semestreAlumno' */
ALTER TABLE `semestreAlumno`
  ADD CONSTRAINT `alumno_semestreAlumno`
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'alumno_beca' */
ALTER TABLE beca
  ADD CONSTRAINT alumno_beca
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'alumno_resultadoAlumno' */
ALTER TABLE `resultadoAlumno`
  ADD CONSTRAINT `alumno_resultadoAlumno`
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'resultados_resultadoAlumno' */
ALTER TABLE `resultadoAlumno`
  ADD CONSTRAINT `resultados_resultadoAlumno`
    FOREIGN KEY (`resultados_idResultado`)
      REFERENCES resultadosproducto (`idResultado`);

/* Relation 'resultados_producto' */
ALTER TABLE producto
  ADD CONSTRAINT resultados_producto
    FOREIGN KEY (`resultados_idResultado`)
      REFERENCES resultadosproducto (`idResultado`);

/* Relation 'resultados_actividad' */
ALTER TABLE actividad
  ADD CONSTRAINT resultados_actividad
    FOREIGN KEY (`resultados_idResultado`)
      REFERENCES resultadosproducto (`idResultado`);

/* Relation 'docente_tutoria' */
ALTER TABLE tutoria
  ADD CONSTRAINT docente_tutoria
    FOREIGN KEY (docente_curp) REFERENCES docente (curp);

/* Relation 'docente_docentepp' */
ALTER TABLE docentepp
  ADD CONSTRAINT docente_docentepp
    FOREIGN KEY (docente_curp) REFERENCES docente (curp);

/* Relation 'alumno_tutoria' */
ALTER TABLE tutoria
  ADD CONSTRAINT alumno_tutoria
    FOREIGN KEY (`alumno_nControl`) REFERENCES alumno (`nControl`);

/* Relation 'semestre_tutoria' */
ALTER TABLE tutoria
  ADD CONSTRAINT semestre_tutoria
    FOREIGN KEY (`semestre_idSemestre`) REFERENCES semestre (`idSemestre`);

/* Relation 'tutoria_resultadoAlumno' */
ALTER TABLE `resultadoAlumno`
  ADD CONSTRAINT `tutoria_resultadoAlumno`
    FOREIGN KEY (`tutoria_idTutoria`) REFERENCES tutoria (`idTutoria`);

/* Relation 'tutoria_entrevistaTutoria' */
ALTER TABLE `entrevistaTutoria`
  ADD CONSTRAINT `tutoria_entrevistaTutoria`
    FOREIGN KEY (`tutoria_idTutoria`) REFERENCES tutoria (`idTutoria`);

/* Relation 'entrevista_entrevistaTutoria' */
ALTER TABLE `entrevistaTutoria`
  ADD CONSTRAINT `entrevista_entrevistaTutoria`
    FOREIGN KEY (`entrevista_idEntrevista`) REFERENCES entrevista (`idEntrevista`)
  ;

/* Relation 'entrevista_preguntasEntrevista' */
ALTER TABLE `preguntasEntrevista`
  ADD CONSTRAINT `entrevista_preguntasEntrevista`
    FOREIGN KEY (`entrevista_idEntrevista`) REFERENCES entrevista (`idEntrevista`)
  ;

/* Relation 'preguntas_preguntasEntrevista' */
ALTER TABLE `preguntasEntrevista`
  ADD CONSTRAINT `preguntas_preguntasEntrevista`
    FOREIGN KEY (`preguntas_idPregunta`) REFERENCES preguntas (`idPregunta`);
