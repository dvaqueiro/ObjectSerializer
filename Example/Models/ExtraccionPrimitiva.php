<?php

namespace Dvaqueiro\Example\Models;

/**
 * Description of ExtraccionPrimitiva
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class ExtraccionPrimitiva
{
    private $numero;
    private $tipo;

    function __construct($numero, $tipo)
    {
        $this->numero = $numero;
        $this->tipo = $tipo;
    }

    function getNumero()
    {
        return $this->numero;
    }

    function getTipo()
    {
        return $this->tipo;
    }
}