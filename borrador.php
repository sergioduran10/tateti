<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/**
 * Aliaga, Celeste - FAI-3757 - Tecn. Univ. Desarrollo Web -
 * mail: celeste.aliaga@est.fi.uncoma.edu.ar - GitHub: wintermaddness
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

/** Módulo x: mostrarJuego - 
 * Dado un arreglo de Juegos, le solicita al usuario qué juego quiere ver.
 * @param array $juegos
 */
function mostrarJuego($juegos) {
    // Teniendo en cuenta el caso 2 - boolean $bandera, int $numeroJuego, $puntosO, $puntosX, string $jugadorX, $jugadorO, 
    //Se muestra en pantalla la cant. de juegos guardados:
    echo "El programa cuenta con un total de ".count($juegos)." juegos.\n";
    //Se utiliza $bandera para salir del bucle:
    $bandera = true;
    do {
        //Se pide al usuario que ingrese el nro de juego que quiere ver:
        echo "| ¿Cuál juego desea ver?: ";
        $numeroJuego = trim(fgets(STDIN));
        if ($numeroJuego > 0 && $numeroJuego <= count($juegos)) {
            $jugadorX = $juegos[$numeroJuego - 1]["jugadorCruz"];
            $jugadorO = $juegos[$numeroJuego - 1]["jugadorCirculo"];
            $puntosX = $juegos[$numeroJuego - 1]["puntosCruz"];
            $puntosO = $juegos[$numeroJuego - 1]["puntosCirculo"];
            //Se imprimen los resultados en pantalla:
            echo "*************************************\n";
            echo "Juego TATETI: ".$numeroJuego."";
            if ($puntosX > $puntosO) {
                echo " (ganó X)\n";
            } elseif ($puntosX < $puntosO) {
                echo " (ganó O)\n";
            } else {
                echo " (empate)\n";
            }
            echo "Jugador X: ".$jugadorX." obtuvo ".$puntosX." puntos.\n";
            echo "Jugador O: ".$jugadorO." obtuvo ".$puntosO." puntos.\n";
            echo "*************************************\n";
            $bandera = false;
        } else {
            //Se muestra en pantalla un cartel de error:
            echo "ERROR. Por favor, ingrese un número válido.\n";
            $bandera = true;
        }
    } while ($bandera);
}

/** Módulo 4: datosJuegos - 
 * Dado un número de juego, la función retorna los resultados del juego guardado en $coleccionJuegos.
 * @param int $numero
 * @param array $arrayColeccion
 */
function datosJuego($numero, $arrayColeccion) {
    //Teniendo en cuenta el caso 3 - inciso 4 - int $n, $puntosX, $puntosO
    $n = count($arrayColeccion);
    if ($numero == 0 || $numero <= $n) {
        $puntosX = $arrayColeccion[$numero]["puntosCruz"];
        $puntosO = $arrayColeccion[$numero]["puntosCirculo"];
        //Se imprimen los resultados en pantalla:
        echo "*************************************\n";
        echo "Juego TATETI: ".$numero."";
        if ($puntosX > $puntosO) {
            echo " (ganó X)\n";
        } elseif ($puntosX < $puntosO) {
            echo " (ganó O)\n";
        }
        echo "Jugador X: ".$arrayColeccion[$numero]["jugadorCruz"]." obtuvo ".$puntosX." puntos.\n";
        echo "Jugador O: ".$arrayColeccion[$numero]["jugadorCirculo"]." obtuvo ".$puntosO." puntos.\n";
        echo "*************************************\n";
    }
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

/** Módulo 6: primerJuegoGanado - 
 *  Retorna el índice del primer juego ganado por el nombre ingresado por parámetro, sino -1.
 * @param array $arrayJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerJuegoGanado($arrayJuegos, $nombreJugador) {
    //inciso 6 - int $i, $n, $indice
    $i = 0;
    $n = count($arrayJuegos);
    $indice = -1;
    while ($i < $n) {
        if ($arrayJuegos[$i]["puntosCruz"] > 1 || $arrayJuegos[$i]["puntosCirculo"] > 1) {
            if (strtoupper($arrayJuegos[$i]["jugadorCruz"]) == $nombreJugador || strtoupper($arrayJuegos[$i]["jugadorCirculo"] == $nombreJugador)) {
                $indice = $i;
            }
        }
        $i = $i + 1;
    }
    return $indice;
}

/** Módulo 8: elegirSimbolo - 
 * Solicita al usuario un simbolo y lo valida antes de retornarlo.
 * @return string
 */
function elegirSimbolo() {
    //inciso 8 - string $simbolo
    echo "Elija un símbolo (X-O): ";
    $simbolo = strtoupper(trim(fgets(STDIN)));
    while (is_numeric($simbolo) || !($simbolo == "X" || $simbolo == "O")) {
        echo "ERROR. Elija un símbolo válido (X-O): ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
    }
    return $simbolo;
}

/** Módulo 9: juegosGanados - 
 * Recorre la colección de juegos y retorna la cant. de juegos ganados (sin contar los empates).
 * @param array $arrayJuegos
 * @return int
 */
function juegosGanados($arrayJuegos) {
    //inciso 9 - int $cantJuegosGanados, $n, $i
    $cantJuegosGanados = 0;
    $n = count($arrayJuegos);
    for ($i=0; $i<$n; $i++) {
        if ($arrayJuegos[$i]["puntosCruz"] > 1) {
            $cantJuegosGanados = $cantJuegosGanados + 1;
        } elseif ($arrayJuegos[$i]["puntosCirculo"] > 1) {
            $cantJuegosGanados = $cantJuegosGanados + 1;
        }
    }
    return $cantJuegosGanados;
}

/** Módulo 10: calcularPorcentaje - 
 * Contabiliza la cant. de juegos ganados por símbolo y calcula el porcentaje.
 * @param string $simbolo
 * @param array $arrayColeccion
 * @return float
 */
function calcularPorcentaje($simbolo, $arrayColeccion) {
    //inciso 10 - int $n, $i, $cantGanados, $cantGanadosSimboloX, $cantGanadosSimboloO, float $porcentaje
    $n = count($arrayColeccion);
    $cantGanados = juegosGanados($arrayColeccion);
    $cantGanadosSimboloX = 0;
    $cantGanadosSimboloO = 0;
    for ($i=0; $i<$n; $i++) {
        if ($simbolo == "X" && $arrayColeccion[$i]["puntosCruz"] > $arrayColeccion[$i]["puntosCirculo"]) {
            $cantGanadosSimboloX = $cantGanadosSimboloX + 1;
            echo "Cant. X: ".$cantGanadosSimboloX."\n";
        } elseif ($simbolo == "O" && $arrayColeccion[$i]["puntosCirculo"] > $arrayColeccion[$i]["puntosCruz"]) {
            $cantGanadosSimboloO = $cantGanadosSimboloO + 1;
            echo "Cant. X: ".$cantGanadosSimboloO."\n";
        }
    }
    if ($cantGanadosSimboloX > 0) {
        $porcentaje = ($cantGanadosSimboloX * 100)/$cantGanados;
    } elseif ($cantGanadosSimboloO > 0) {
        $porcentaje = ($cantGanadosSimboloO * 100)/$cantGanados;
    }
    return $porcentaje;
}

function resumenJugador($arrayColeccion, $nombreJugador) {
    //inciso 7 - 
    $n = count($arrayColeccion);
    $cantGanadosJugadorX = 0;
    $cantGanadosJugadorO = 0;
    $cantPerdidosJugadorX = 0;
    $cantPerdidosJugadorO = 0;
    $cantEmpatesJugadorX = 0;
    $cantEmpatesJugadorO = 0;
    $puntosAcumulados = 0;
    //Se obtiene la cant. de juegos ganados por $nombreJugador:
    for ($i=0; $i<$n; $i++) {
        if (strtoupper($arrayColeccion[$i]["jugadorCruz"]) == $nombreJugador) {
            if ($arrayColeccion[$i]["puntosCruz"] > $arrayColeccion[$i]["puntosCirculo"]) {    
                $cantGanadosJugadorX = $cantGanadosJugadorX + 1;
                $puntosAcumulados = $puntosAcumulados + $arrayColeccion[$i]["puntosCruz"];
            } elseif ($arrayColeccion[$i]["puntosCruz"] < $arrayColeccion[$i]["puntosCirculo"]) {
                $cantPerdidosJugadorX = $cantPerdidosJugadorX + 1;
            } else {
                $cantEmpatesJugadorX = $cantEmpatesJugadorX + 1;
                $puntosAcumulados = $puntosAcumulados + $arrayColeccion[$i]["puntosCruz"];
            }
        } elseif (strtoupper($arrayColeccion[$i]["jugadorCirculo"]) == $nombreJugador) {
            if ($arrayColeccion[$i]["puntosCirculo"] > $arrayColeccion[$i]["puntosCruz"]) {
                $cantGanadosJugadorO = $cantGanadosJugadorO + 1;
                $puntosAcumulados = $puntosAcumulados + $arrayColeccion[$i]["puntosCirculo"];
            } elseif ($arrayColeccion[$i]["puntosCirculo"] < $arrayColeccion[$i]["puntosCruz"]) {
                $cantPerdidosJugadorO = $cantPerdidosJugadorO + 1;;
            } else {
                $cantEmpatesJugadorO = $cantEmpatesJugadorO + 1;
                $puntosAcumulados = $puntosAcumulados + $arrayColeccion[$i]["puntosCirculo"];
            }    
        }
    }
    $cantGanados = $cantGanadosJugadorX + $cantGanadosJugadorO;
    $cantPerdidos = $cantPerdidosJugadorX + $cantPerdidosJugadorO;
    $cantEmpates = $cantEmpatesJugadorX + $cantEmpatesJugadorO;
    //Con los resultados, se arma el arreglo resumen de $jugador:
    $jugador = [
        "nombre" => [$nombreJugador], //string
        "juegosGanados" => [$cantGanados], //int
        "juegosPerdidos" => [$cantPerdidos], //int
        "juegosEmpatados" => [$cantEmpates], //int
        "puntosAcumulados" => [$puntosAcumulados], //int
    ];
    return $jugador;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/**
 * int $opcion, $numeroIndice, 
 * string $nombre, $simboloElegido, 
 * float
 * boolean $salir, 
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
            //print_r($partidasGuardadas);
            break;
        case 2:
            //Si el usuario elije la opción 2 - Se muestra un juego almacenado en $coleccionJuegos.
            echo "\n>> MOSTRAR UN JUEGO\n";
            mostrarJuego($partidasGuardadas);
            break;
        case 3: 
            //Si el usuario elije la opción 3 - Se muestra el primer juego ganador del nombre ingresado por el usuario.
            echo "\n>> MOSTRAR EL PRIMER JUEGO GANADOR\n";
            echo "| Cantidad de juegos ganados (sin contar los empates): ".juegosGanados($partidasGuardadas)."\n";
            //Se le pide un nombre al usuario para mostrar el 1er juego ganado:
            echo "Nombre del jugador: ";
            $nombre = strtoupper(trim(fgets(STDIN)));
            //Se obtiene el índice del 1er juego ganado por $nombre:
            $numeroIndice = primerJuegoGanado($partidasGuardadas, $nombre);
            echo "Indice del 1er juego ganado por ".$nombre.": ".$numeroIndice."\n";
            //Se realiza una verificación antes de mostrar el juego:
            if ($numeroIndice == -1) {
                echo "El jugador ".$nombre." no ganó ningún juego.\n";
            } else {
                datosJuego($numeroIndice, $partidasGuardadas);
            }
            break;
        case 4:
            //Si el usuario elije la opción 4 - Se muestra el porcentaje de juegos ganados por simbolo elegido (X-O).
            echo "\n>> PORCENTAJE DE JUEGOS GANADOS POR SIMBOLO (X-O)\n";
            $simboloElegido = elegirSimbolo();
            echo "| Símbolo elegido: ".$simboloElegido."\n";
            echo "Porcentaje de partidas ganadas por ".$simboloElegido.": ".calcularPorcentaje($simboloElegido, $partidasGuardadas)."%\n";
            break;
        case 5:
            //Si el usuario elije la opción 5 - Se muestra el resumen de jugador que se haya ingresado.
            echo "\n>> RESUMEN DE JUGADOR\n";
            echo "Nombre del jugador: ";
            $nombre = strtoupper(trim(fgets(STDIN)));
            $resumen = resumenJugador($partidasGuardadas, $nombre);
            echo "Resumen de jugador (".$nombre."): \n";
            print_r($resumen);
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