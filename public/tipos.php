<?php
declare(strict_types=1);

// ---------- 3.1 Constantes y datos ----------

// Constante creada con define(): se evalúa cuando se ejecuta la línea
define('SEMILLA_LAB8', 'WEB2026-L8');

// Constante creada con const: se fija al compilar el archivo
const LAB_NUMERO = 8;

require_once __DIR__ . '/../lib/estudiante.php';
$est = cargar_estudiante();

// ---------- 3.2 Valores calculados con mi cédula ----------

// La huella es el sha256 de "cédula|semilla" (64 caracteres hexadecimales)
$huella = hash('sha256', $est['cedula'] . '|' . SEMILLA_LAB8);

$codigo = substr($huella, 0, 8);                          // string de 8 caracteres
$n1 = hexdec(substr($huella, 8, 2)) % 90 + 10;            // entero entre 10 y 99
$n2 = hexdec(substr($huella, 10, 2)) % 90 + 10;           // entero entre 10 y 99
$precio = round(hexdec(substr($huella, 12, 4)) / 100, 2); // float con 2 decimales
$activo = ($n1 % 2 === 0);                                // true si n1 es par

// Operaciones con n1 y n2
$suma = $n1 + $n2;
$division = round($n1 / $n2, 2); // "/" siempre puede dar decimales
$resto = $n1 % $n2;              // lo que sobra de la división entera
$cociente = intdiv($n1, $n2);    // división entera, sin decimales

$nulo = null;
$lista = [1, 2, 3];

// ---------- 3.3 Tipos de datos ----------

var_dump($codigo);
var_dump($n1);
var_dump($precio);
var_dump($activo);
var_dump($nulo);
var_dump($lista);

// Conversión de tipos (type juggling)
$suma_str = "5" + "10";      // el + convierte los dos strings numéricos a número: 15 (int)
$concat = "5" . "10";        // el punto concatena textos: "510" (string)
$cast_int = (int) "12abc";   // el cast toma los dígitos del inicio y descarta "abc": 12
$float_eq = (0.1 + 0.2 == 0.3); // false: 0.1 y 0.2 no se guardan exactos en binario, la suma da 0.30000000000000004
$loose = ("10" == "1e1");    // true: con == ambos son strings numéricos y se comparan como números (10 == 10)
$strict = ("10" === "1e1");  // false: con === se comparan los textos tal cual y son distintos

// ---------- 3.4 Salida para el autograde ----------

// define() devuelve false si la constante ya existe; el @ oculta el warning
$redefinir = @define('SEMILLA_LAB8', 'otra');

$resultado = [
    'codigo'   => $codigo,
    'n1'       => $n1,
    'n2'       => $n2,
    'suma'     => $suma,
    'division' => $division,
    'resto'    => $resto,
    'cociente' => $cociente,
    'precio'   => $precio,
    'activo'   => $activo,
    'tipos' => [
        'codigo' => gettype($codigo),
        'n1'     => gettype($n1),
        'precio' => gettype($precio),
        'activo' => gettype($activo),
        'nulo'   => gettype($nulo),
        'lista'  => gettype($lista),
    ],
    'juggling' => [
        'suma_str' => $suma_str,
        'concat'   => $concat,
        'cast_int' => $cast_int,
        'float_eq' => $float_eq,
        'loose'    => $loose,
        'strict'   => $strict,
    ],
    'constantes' => [
        'SEMILLA_LAB8' => constant('SEMILLA_LAB8'),
        'LAB_NUMERO'   => LAB_NUMERO,
        'redefinir'    => $redefinir,
    ],
];

echo "\n##JSON## " . json_encode($resultado) . "\n";
