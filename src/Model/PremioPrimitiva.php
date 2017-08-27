<?php

namespace ObjectSerializer\Model;

/**
 * Description of PremioPrimitiva
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class PremioPrimitiva
{
    private $tipo;
    private $categoria;
    private $premio;
    private $ganadores;

    /**
     * 
     * @param string $tipo
     * @param integer $categoria
     * @param float $premio
     * @param integer $ganadores
     */
    function __construct($tipo, $categoria, $premio, $ganadores)
    {
        $this->tipo = $tipo;
        $this->categoria = $categoria;
        $this->premio = $premio;
        $this->ganadores = $ganadores;
    }

}