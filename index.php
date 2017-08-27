<?php

use ObjectSerializer\Model\ResponseFormat\ResponseFactory;
use ObjectSerializer\Model\Serializer\SerializerFacade;
use ObjectSerializer\Model\SorteoPrimitiva;

require 'vendor/autoload.php';

$propertyMaps = array(
    'fecha' => 'fecha_sorteo',
    'diaSemana' => 'dia_semana',
    'idSorteo' => 'id_sorteo',
    'gameId' => array('game_id', 'gameid'), //por orden de anidación
    'anyo' => 'anyo', //se podría omitir por ser iguales
    'premioBote' => 'premio_bote',
    'apuestas' => 'apuestas',
    'recaudacion' => 'recaudacion',
    'combinacion' => 'combinacion', //Este se usa para las dos entidades, sorteo y joker
    'premios' => 'premios',
    'idSorteoAsociado' => 'relsorteoid_asociado',
    'bote' => 'bote_joker',
    'activo' => 'activo',
);

$dataOutType = SerializerFacade::XML;

$dataIn = file_get_contents(__DIR__.'/Resources/escrutinio.json');

$serializer = new SerializerFacade(SorteoPrimitiva::class, $propertyMaps);

$sorteo = $serializer->deserialize($dataIn, SerializerFacade::JSON);

var_dump($sorteo);
die();

$dataOut = $serializer->serialize($sorteo, $dataOutType);

ResponseFactory::make($dataOutType, $dataOut);
