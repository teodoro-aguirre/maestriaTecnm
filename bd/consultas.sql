-- Consulta de alumnos relacionados con el docente
SELECT alumno.nControl, alumno.nombre, alumno.apellidoPaterno, alumno.apellidoMaterno FROM alumno, tutoria, docente WHERE tutoria.docente_curp = "MXAR850113HVZLRB05" AND tutoria.docente_curp = docente.curp AND tutoria.alumno_nControl = alumno.nControl
