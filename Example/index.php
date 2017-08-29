<?php

use Dvaqueiro\Example\Models\SorteoPrimitiva;
use Dvaqueiro\ObjectSerializer\SerializerFacade;

require __DIR__.'/../vendor/autoload.php';

$outFormat = 'json';

$propertyMaps = array(
    'fecha' => 'fecha_sorteo',
    'diaSemana' => 'dia_semana',
    'idSorteo' => 'id_sorteo',
    'gameId' => 'game_id',
    'anyo' => 'anyo', //se podría omitir por ser iguales
    'premioBote' => 'premio_bote',
    'apuestas' => 'apuestas',
    'recaudacion' => 'recaudacion',
    'combinacion' => 'combinacion', //Este se usa para las dos entidades, sorteo y joker
    'totalPremios' => 'premios',
    'escrutinio' => 'escrutinio',
    'tipo' => 'tipo',
    'categoria' => 'categoria',
    'premio' => 'premio',
    'ganadores' => 'ganadores',
    'sorteoJoker' => 'joker',
    'gameID' => 'gameid',
    'idSorteoAsociado' => 'relsorteoid_asociado',
    'bote' => 'bote_joker',
    'activo' => 'activo',
    'escrutinioJoker' => 'escrutinio_joker',
    'ordenEscrutinio' => 'orden_escrutinio',
);

$serializer = new SerializerFacade(SorteoPrimitiva::class, $propertyMaps);
$serializer->setIgnoredAttributes(array('extracciones'));

$sorteo = $serializer->deserialize(file_get_contents(__DIR__.'/Fixtures/sorteo.xml'), SerializerFacade::XML);

$out = $serializer->serialize($sorteo, $outFormat);


switch ($outFormat) {
    case 'csv':
        header("Content-type: text/csv");
        break;
    case 'xml':
        header("Content-type: text/xml");
        break;
    case 'json':
        header("Content-Type:application/json");
        break;
}

echo($out);
