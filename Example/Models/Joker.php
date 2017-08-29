<?php

namespace Dvaqueiro\Example\Models;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class Joker
{
    private $gameID;
    private $idSorteoAsociado;
    private $combinacion;

    /**
     *
     * @var integer|string $bote
     */
    private $bote;

    /**
     *
     * @var bool|string $bote
     */
    private $activo;

    /**
     *
     * @param string $gameID
     * @param string $idSorteoAsociado
     */
    function __construct($gameID, $idSorteoAsociado)
    {
        $this->gameID = $gameID;
        $this->idSorteoAsociado = $idSorteoAsociado;
    }

    /**
     *
     * @param integer $bote
     */
    function setBote($bote)
    {
        $this->bote = $bote;
    }

    /**
     * 
     * @param boolean $activo
     */
    function setActivo($activo)
    {
        $this->activo = (bool) $activo;
    }

    /**
     *
     * @param string $combinacion
     */
    function setCombinacion($combinacion)
    {
        $this->combinacion = $combinacion;
    }

    /**
     *
     * @return string
     */
    function getGameID()
    {
        return $this->gameID;
    }

    /**
     *
     * @return string
     */
    function getIdSorteoAsociado()
    {
        return $this->idSorteoAsociado;
    }

    /**
     *
     * @return integer
     */
    function getBote()
    {
        return $this->bote;
    }

    /**
     *
     * @return bool
     */
    function isActivo()
    {
        return $this->activo;
    }

    /**
     *
     * @return string
     */
    function getCombinacion()
    {
        return $this->combinacion;
    }
}