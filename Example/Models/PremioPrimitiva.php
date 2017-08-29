<?php

namespace Dvaqueiro\Example\Models;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class PremioPrimitiva
{
    private $tipo;
    private $categoria;

    /**
     *
     * @var float
     */
    private $premio;

    /**
     *
     * @var integer
     */
    private $ganadores;

    /**
     * 
     * @param string $tipo
     * @param integer $categoria
     * @param string $premio
     * @param integer $ganadores
     */
    function __construct($tipo, $categoria, $premio, $ganadores)
    {
        $this->tipo = $tipo;
        $this->categoria = $categoria;
        $this->premio = $this->ParseFloat($premio);
        $this->ganadores = (int) $ganadores;
    }

    function getTipo()
    {
        return $this->tipo;
    }

    function getCategoria()
    {
        return $this->categoria;
    }

    /**
     *
     * @return float
     */
    function getPremio()
    {
        return $this->premio;
    }

    /**
     *
     * @return integer
     */
    function getGanadores()
    {
        return $this->ganadores;
    }

    private function ParseFloat($floatString)
    {
        $floatString = str_replace(".", "", $floatString);
        $floatString = str_replace(",", ".", $floatString);
        return floatval($floatString);
    }
}