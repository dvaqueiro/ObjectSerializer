<?php

namespace Dvaqueiro\Example\Models;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class PremioJoker
{
    private $tipo;

    /**
     *
     * @var integer
     */
    private $ganadores;

    /**
     *
     * @var integer
     */
    private $premio;

    /**
     *
     * @var integer
     */
    private $ordenEscrutinio;

    function __construct($tipo, $ganadores, $premio, $ordenEscrutinio)
    {
        $this->tipo = $tipo;
        $this->ganadores = $ganadores;
        $this->premio = (float) $premio;
        $this->ordenEscrutinio = (int) $ordenEscrutinio;
    }

    /**
     *
     * @return string
     */
    function getTipo()
    {
        return $this->tipo;
    }

    /**
     *
     * @return int
     */
    function getGanadores()
    {
        return $this->ganadores;
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
    function getOrdenEscrutinio()
    {
        return $this->ordenEscrutinio;
    }
}