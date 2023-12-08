<?php

// Función para generar el código HTML de un tweet
function generarTweet($usuario, $contenido, $fecha) {
    $html = '<div class="tweet">';
    $html .= '<strong>' . $usuario . '</strong>';
    $html .= '<p>' . $contenido . '</p>';
    $html .= '<span class="fecha">' . $fecha . '</span>';
    $html .= '</div>';
    return $html;
}

// Array de tweets
$tweets = array(
    array(
        'usuario' => 'usuario1',
        'contenido' => 'Este es el primer tweet. ¡Hola, mundo!',
        'fecha' => '2023-11-29 12:00:00'
    ),
    array(
        'usuario' => 'usuario2',
        'contenido' => 'Segundo tweet. ¡PHP es genial!',
        'fecha' => '2023-11-29 12:30:00'
    ),
    array(
        'usuario' => 'usuario3',
        'contenido' => 'Hola',
        'fecha' => '2023-12-19 12:00:00'
    )
);

// Generar el documento HTML
$html = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        .tweet {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .fecha {
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>';

foreach ($tweets as $tweet) {
    $html .= generarTweet($tweet['usuario'], $tweet['contenido'], $tweet['fecha']);
}

$html .= '</body></html>';

// Imprimir el documento HTML
echo $html;
?>
