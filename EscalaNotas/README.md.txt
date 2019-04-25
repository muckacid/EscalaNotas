Pryecto dedicado a web en el cual se calcula una escala de notas con los siguientes valores por url:
$notaMinima,  $notaMaxima, $punMax, $porEx, $notaAprovacion, $incremento
//http://........./EscalaNotas/?notaMinima=1&notaMaxima=7&puntajeMaximo=100&porcentajeExigencia=60&notaAprovacion=4&incremento=1
Se puede envier un parametro adicional para obtener una nota especifica:
http://.........../EscalaNotas/?notaMinima=1&notaMaxima=7&puntajeMaximo=100&porcentajeExigencia=60&notaAprovacion=4&incremento=1&puntaje=3
El formato de retorno es a travez de json.