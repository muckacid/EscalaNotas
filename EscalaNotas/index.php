
<?php   
    require "clases/EscalaNota.php";


    $notaMinima = $_GET["notaMinima"];
    $notaMaxima = $_GET["notaMaxima"];
    $punMax = $_GET["puntajeMaximo"];
    $porEx = $_GET["porcentajeExigencia"];
    $notaAprovacion = $_GET["notaAprovacion"];
    $incremento = $_GET["incremento"];
    

    //http://localhost/EscalaNotas/?notaMinima=1&notaMaxima=7&puntajeMaximo=100&porcentajeExigencia=60&notaAprovacion=4&incremento=1
    //echo "notaMinima:$notaMinima,notaMaxima:$notaMaxima,puntajeMaximo:$punMax,porcentajeExigencia:$porEx,notaAprovacion:$notaAprovacion,incremento:$incremento";

    $escala = new EscalaNota($notaMinima,  $notaMaxima, $punMax, $porEx, $notaAprovacion, $incremento); 

    if(isset($_GET["puntaje"])){
        $puntaje = $_GET["puntaje"];
        $nota = $escala->calcularNota($puntaje);
        $data = array();
        $data[] = array( "$puntaje" => "$nota");
        echo json_encode($data);
    }
    else{
        $es = $escala->obtenerEscala();
        echo json_encode($es);
    }

    //Porcentaje de aprovacion , puntaje maximo
    //$nota = new Nota($porcentajeDeExigencia,$puntajeMaximo);



?>
