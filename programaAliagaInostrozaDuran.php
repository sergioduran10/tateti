<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */

/**
 * Aliaga, Celeste - FAI-3757 - Tecn. Univ. Desarrollo Web -
 * mail: celeste.aliaga@est.f.uncoma.edu.ar - GitHub: wintermaddness
 * Duran, Sergio - FAI-3603 - Tecn. Univ. Desarrollo Web -
 * mail: sergio.duran@est.fi.uncoma.edu.ar - Github: sergioduran10
 * 
 *
 */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** Módulo 1: cargarJuegos -
 * Inicia un arreglo multidimensional con ejemplos de juegos para retornarlos.
 * @return array
 */
function cargarJuegos() {
    //inciso 1 - array $coleccionJuegos
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["jugadorCruz" => "Majo", "jugadorCirculo" => "David", "puntosCruz" => 6, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz" => "Juan", "jugadorCirculo" => "Majo", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[2] = ["jugadorCruz" => "Pedro", "jugadorCirculo" => "Celeste", "puntosCruz" => 4, "puntosCirculo" => 0];
    $coleccionJuegos[3] = ["jugadorCruz" => "Maria", "jugadorCirculo" => "Sergio", "puntosCruz" => 0, "puntosCirculo" => 3];
    $coleccionJuegos[4] = ["jugadorCruz" => "Jose", "jugadorCirculo" => "Juan", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[5] = ["jugadorCruz" => "Gabriel", "jugadorCirculo" => "Sandra", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz" => "Jorge", "jugadorCirculo" => "David", "puntosCruz" => 0, "puntosCirculo" => 6];
    $coleccionJuegos[7] = ["jugadorCruz" => "Karina", "jugadorCirculo" => "Majo", "puntosCruz" => 0, "puntosCirculo" => 4];
    $coleccionJuegos[8] = ["jugadorCruz" => "Sandra", "jugadorCirculo" => "Marcos", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz" => "Celeste", "jugadorCirculo" => "Sergio", "puntosCruz" => 0, "puntosCirculo" => 5];
    return $coleccionJuegos;
}

/** Módulo 2 - seleccionarOpcion - 
 * Muestra las opciones del menú en pantalla y le pide al usuario un número.
 * Verifica que el número sea válido (1-7).
 * @return int
 */
function seleccionarOpcion(){
    //inciso 2 - int $minimo, $maximo, $respuesta
    echo "\n+--------------------M E N Ú----------------------+\n";
    echo "1) Jugar al tateti \n";
    echo "2) Mostrar un juego \n";
    echo "3) Mostrar el primer juego ganador \n";
    echo "4) Mostrar porcentaje de juegos ganados \n";
    echo "5) Mostrar resumen de Jugador \n";
    echo "6) Mostrar listado de juegos Ordenado por jugador O \n";
    echo "7) Salir ";
    echo "\n+------------------------+------------------------+\n";
    //Declaramos los limites:
    $minimo = 1;
    $maximo = 7;
    //Modificamos y usamos la función solicitarNumeroEntre:
    $respuesta = solicitarNumero($minimo, $maximo);
    return $respuesta;  
}

/** Módulo 3: solicitarNumero - 
 * Solicita al usuario un número dentro del rango [$min, $max].
 * @param int $min
 * @param int $max
 * @return int 
 */
function solicitarNumero($min, $max)
{
    //inciso 3 - int $numero
    echo "Seleccione una opción (del ".$min." al ".$max."): ";
    $numero = trim(fgets(STDIN));
    while (!is_numeric($numero) || !($numero >= $min && $numero <= $max)) {
        echo "ERROR. Seleccione una opción entre ".$min." y ".$max.": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/**
 * Modulo 5: agregarJuego - 
 * Suma un juego a la coleccion de juegos ingresada por parámetro.
 * @param array $coleccionJuegos
 * @param array $juegoNuevo
 * @return array
 */
function agregarJuego($coleccionJuegos, $juegoNuevo)
{
    //inciso 5 - array_push — Agrega un nuevo juego al final de la colección
    array_push($coleccionJuegos, $juegoNuevo);
    return $coleccionJuegos;
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**
 * int $opcion
 * string
 * float
 * boolean $salir
 * array $juego, $partidasGuardadas, 
 */

//Inicialización de variables:
$salir = true;
$partidasGuardadas = cargarJuegos(); //la variable almacena los datos de la función que inicializa la coleccionJuegos

//Proceso:
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            //Si el usuario elije la opción 1 - Se inicia el juego Tateti.
            echo "\n>> ¡JUGUEMOS AL TA TE TI!\n";
            $juego = jugar();
            //agregamos una partida nueva a las ya antes guardadas
            $partidasGuardadas = agregarJuego($partidasGuardadas, $juego);
            //se muestran los resultados de la partida jugada (se invoca una función de tateti.php)
            imprimirResultado($juego);
            break;
        case 2:
            //Si el usuario elije la opción 2 - Se muestra un juego almacenado en $coleccionJuegos.
        
            break;
        case 3: 
            //Si el usuario elije la opción 3 - Se muestra el primer juego ganador del nombre ingresado por el usuario.
            
            break;
        case 4:
            //Si el usuario elije la opción 4 - Se muestra el porcentaje de juegos ganados por simbolo elegido (X-O).
            
            break;
        case 5:
            //Si el usuario elije la opción 5 - Se muestra el resumen de jugador que se haya ingresado.
           
            break;
        case 6:
            //Si el usuario elije la opción 6 - Se muestra un listado de juegos ordenados por jugador O.

            break;
        case 7:
            //Si el usuario elije la opción 7 - Sale del programa.
            $salir = false;
            break;
    }
} while ($salir);
echo "¡Ha salido del programa!";