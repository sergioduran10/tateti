<?php
include_once("tateti.php");

/***************************************/
/******* DATOS DE LOS INTEGRANTES ******/
/***************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github
 * Aliaga, Celeste - FAI-3757 - Tecn. Univ. Desarrollo Web -
 * mail: celeste.aliaga@est.fi.uncoma.edu.ar - GitHub: wintermaddness
 * Duran, Sergio - FAI-3603 - Tecn. Univ. Desarrollo Web -
 * mail: sergio.duran@est.fi.uncoma.edu.ar - GitHub: sergioduran10
 * Inostroza, Maria - FAI-33748 - Tecn. Univ. Desarrollo Web -
 * mail: maria.inostroza@est.fi.uncoma.edu.ar - GitHub: mariainos
 */

/***************************************/
/******* DEFINICIÓN DE FUNCIONES *******/
/***************************************/

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

/** Módulo 4: mostrarJuego - 
 * Dado un número, la función retorna los resultados del juego guardado en $coleccionJuegos.
 * @param array $arrayColeccion
 */
function mostrarJuego($arrayColeccion) {
    //Teniendo en cuenta el caso 2 - inciso 4 - int $n, $puntosX, $puntosO, $numero
    $n = count($arrayColeccion) - 1;
    //Se invoca a la función solicitarNumero para obtener el nro de juego a mostrar:
    $numero = solicitarNumero(0, $n);
    if ($numero == 0 || $numero <= $n) {
        $puntosX = $arrayColeccion[$numero]["puntosCruz"];
        $puntosO = $arrayColeccion[$numero]["puntosCirculo"];
        //Se imprimen los resultados en pantalla:
        echo "\n*************************************\n";
        echo "Juego TATETI: ".$numero."";
        if ($puntosX > $puntosO) {
            echo " (ganó X)\n";
        } elseif ($puntosX < $puntosO) {
            echo " (ganó O)\n";
        } else {
            echo " (empate)\n";
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
 * Retorna el índice del primer juego ganado por el nombre ingresado por parámetro, sino -1.
 * @param array $arrayJuegos
 * @param string $nombreJugador
 * @return int
 */
function primerJuegoGanado($arrayJuegos, $nombreJugador) {
    //inciso 6 - int $i, $n, $indice, boolean $bandera
    $i = 0;
    $bandera = false;
    $n = count($arrayJuegos);
    $indice = -1;
    while ($i < $n && $bandera == false) {
        if ($arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"] && strtoupper($arrayJuegos[$i]["jugadorCruz"]) == $nombreJugador) {
            $indice = $i;
            $bandera = true;
        } elseif ($arrayJuegos[$i]["puntosCirculo"] > $arrayJuegos[$i]["puntosCruz"] && strtoupper($arrayJuegos[$i]["jugadorCirculo"]) == $nombreJugador) {
            $indice = $i;
            $bandera = true;
        }
        $i = $i + 1;
    }
    return $indice;
}

/** Módulo 7: resumenJugador - 
 * Dado el nombre de un jugador y un arreglo de juegos, la función retorna un resumen de dicho jugador.
 * @param array $arrayColeccion
 * @param string $nombreJugador
 * @return array
 */
function resumenJugador($arrayColeccion, $nombreJugador) {
    //inciso 7 - array $jugador, int $n, $i, $cantGanados, $cantPerdidos, $cantEmpates
    //int $cantGanadosJugadorX, $cantGanadosJugadorO, $cantPerdidosJugadorX, $cantPerdidosJugadorO
    //int $cantEmpatesJugadorX, $cantEmpatesJugadorO, $puntosAcumulados
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
        "nombre" => $nombreJugador, //string
        "juegosGanados" => $cantGanados, //int
        "juegosPerdidos" => $cantPerdidos, //int
        "juegosEmpatados" => $cantEmpates, //int
        "puntosAcumulados" => $puntosAcumulados //int
    ];
    return $jugador;
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
            //echo "Cant. X: ".$cantGanadosSimboloX."\n";
        } elseif ($simbolo == "O" && $arrayColeccion[$i]["puntosCirculo"] > $arrayColeccion[$i]["puntosCruz"]) {
            $cantGanadosSimboloO = $cantGanadosSimboloO + 1;
            //echo "Cant. O: ".$cantGanadosSimboloO."\n";
        }
    }
    if ($cantGanadosSimboloX > 0) {
        $porcentaje = ($cantGanadosSimboloX * 100)/$cantGanados;
    } elseif ($cantGanadosSimboloO > 0) {
        $porcentaje = ($cantGanadosSimboloO * 100)/$cantGanados;
    }
    return $porcentaje;
}

/** Módulo 11: comparar - 
 * Función para comparar que acompaña al módulo 12.
 * Devuelve -1, 0, 1 según sea el caso.
 * @param array $a
 * @param array $b
 * @return int
*/
function comparar($a, $b)
{
    //inciso 11 - int $resultado
    $resultado = 0;
    if ($a['jugadorCirculo'] < $b['jugadorCirculo']) {
        $resultado = -1;
    } elseif ($b['jugadorCirculo'] < $a['jugadorCirculo']) {
        $resultado = 1;
    }
    return $resultado;
}

/** Módulo 12: juegosCirculosOrdenados - 
 * Ordena los juegos alfabéticamente por nombre de jugador O.
 * UASORT: Ordena un array tal que los índices de este mantienen sus
 * correlaciones con los elementos del array con los que están asociados, 
 * usando una función de comparación definida por el usuario.
 * @param array $juegosO
 */
function juegosCirculosOrdenados($juegosO) {
    uasort($juegosO, 'comparar');
    print_r($juegosO);
}

/** Módulo 13: datosJuego - 
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
        //Se imprimen los resultados en pantalla (no se muestran los empates):
        echo "\n*************************************\n";
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

/**********************************/
/******* PROGRAMA PRINCIPAL *******/
/**********************************/

//Declaración de variables:
/**
 * int $opcion, $numeroIndice, $i
 * string $nombre, $simboloElegido
 * float --
 * boolean $salir, $bandera
 * array $juego, $partidasGuardadas, $resumen
 */

//Inicialización de variables:
$salir = true;
$partidasGuardadas = cargarJuegos(); //la variable almacena los datos de la función que inicializa la colección de juegos.

//Proceso:
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            //Si el usuario elije la opción 1 - Se inicia el juego Tateti.
            echo "\n>> ¡JUGUEMOS AL TA TE TI!\n";
            $juego = jugar();
            //Se agrega una partida nueva a las ya antes guardadas
            $partidasGuardadas = agregarJuego($partidasGuardadas, $juego);
            //se muestran los resultados de la partida jugada (se invoca una función de tateti.php)
            imprimirResultado($juego);
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
            echo "| Indice del 1er juego ganado por ".$nombre.": ".$numeroIndice."\n";
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
            echo "\n*************************************\n";
            echo "| Símbolo elegido: ".$simboloElegido."\n";
            echo "Porcentaje de partidas ganadas por ".$simboloElegido.": ".calcularPorcentaje($simboloElegido, $partidasGuardadas)."%\n";
            echo "*************************************\n";
            break;
        case 5:
            //Si el usuario elije la opción 5 - Se muestra el resumen de jugador que se haya ingresado.
            echo "\n>> RESUMEN DE JUGADOR\n";
            echo "Nombre del jugador: ";
            $nombre = strtoupper(trim(fgets(STDIN)));
            //Se verifica que el nombre ingresado se encuentre registrado dentro de la colección de juegos:
            $bandera = false;
            $i = 0;
            while ($i<count($partidasGuardadas) && $bandera == false) {
                if (strtoupper($partidasGuardadas[$i]["jugadorCruz"]) == $nombre || strtoupper($partidasGuardadas[$i]["jugadorCirculo"]) == $nombre) {
                    $registro = 1;
                    $bandera = true;
                } else {
                    $registro = 0;
                }
                $i = $i + 1;
            }
            //Se imprimen en pantalla los resultados:
            if ($registro == 1) {
                $resumen = resumenJugador($partidasGuardadas, $nombre);
                //print_r($resumen);
                echo "\n*************************************\n";
                echo "Nombre: ".$resumen["nombre"]."\n";
                echo "Juegos ganados: ".$resumen["juegosGanados"]."\n";
                echo "Juegos perdidos: ".$resumen["juegosPerdidos"]."\n";
                echo "Juegos empatados: ".$resumen["juegosEmpatados"]."\n";
                echo "Puntos acumulados: ".$resumen["puntosAcumulados"]."\n";
                echo "*************************************\n";
            } else {
                echo "ERROR. No se encontraron registros del jugador: ".$nombre."\n";
            }
            break;
        case 6:
            //Si el usuario elije la opción 6 - Se muestra un listado de juegos ordenados por jugador O.
            juegosCirculosOrdenados($partidasGuardadas);
            break;
        case 7:
            //Si el usuario elije la opción 7 - Sale del programa.
            $salir = false;
            break;
    }
} while ($salir);
echo "¡Ha salido del programa!";