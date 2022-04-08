-- Consulta de alumnos relacionados con el docente
SELECT alumno.nControl, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno FROM alumno, tutoria, docente WHERE tutoria.docente_curp = "MXAR850113HVZLRB05" AND tutoria.docente_curp = docente.curp AND tutoria.alumno_nControl = alumno.nControl

-- Consulta para carga academica del alumno
SELECT materia.idMateria, materia.nombreMateria, materia.creditos FROM materia, cargaAcademica, alumno
WHERE alumno.nControl=cargaAcademica.alumno_nControl AND materia.idMateria=cargaAcademica.materia_idMateria
AND alumno.nControl=''



-- Consulta del programa posgrado del alumno
SELECT programaPosgrado.nombrePP, programaPosgrado.abreviatura FROM programaPosgrado, alumno,alumnoPosgrado
WHERE alumno.nControl=alumnoPosgrado.alumno_nControl AND programaPosgrado.idpp=programaPosgrado_idpp
AND alumno.nControl="";

-- Consulta de promedio del semestre anterior
SELECT Max(semestre_idSemestre)-1, promedio FROM semestreAlumno
WHERE  alumno_nControl='';

-- Consulta de semestre actual
SELECT Max(semestre_idSemestre) FROM semestreAlumno
WHERE  alumno_nControl='';