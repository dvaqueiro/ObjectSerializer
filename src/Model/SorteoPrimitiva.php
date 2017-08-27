<?php

namespace ObjectSerializer\Model;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class SorteoPrimitiva
{
    private $diaSemana;

    /**
     *
     * @var \DateTimeInterface $fecha
     */
    private $fecha;

    /**
     *
     * @var int $idSorteo
     */
    private $idSorteo;

    /**
     *
     * @var \DateTimeInterface $apertura
     */
    private $apertura;
    private $gameId;
    private $anyo;

    /**
     *
     * @var int|string
     */
    private $apuestas;

    /**
     *
     * @var int|string $premioBote
     */
    private $premioBote;

    /**
     *
     * @var integer|string|null $recaudacion
     */
    private $recaudacion;

    /**
     *
     * @var string
     */
    private $combinacion;

    /**
     *
     * @var integer|string
     */
    private $totalPremios;

    /**
     *
     * @var PremioPrimitiva[]
     */
    private $premios;

    /**
     *
     * @var Joker
     */
    private $sorteoJoker;

    /**
     *
     * @param \DateTimeInterface $fecha
     * @param int $idSorteo
     * @param string $gameId
     */
    function __construct(\DateTimeInterface $fecha, $idSorteo, $gameId)
    {
        $this->fecha = $fecha;
        $this->idSorteo = $idSorteo;
        $this->gameId = $gameId;
    }

    /**
     *
     * @param string $diaSemana
     */
    function setDiaSemana($diaSemana)
    {
        $this->diaSemana = $diaSemana;
    }

    /**
     *
     * @param integer|string|null $recaudacion
     */
    function setRecaudacion($recaudacion)
    {
        $this->recaudacion = (int) $recaudacion;
    }

    /**
     *
     * @param Joker $sorteoJoker
     */
    function setSorteoJoker($sorteoJoker)
    {
        $this->sorteoJoker = $sorteoJoker;
    }

    /**
     *
     * @param int|string $premioBote
     */
    function setPremioBote($premioBote)
    {
        $this->premioBote = (int) $premioBote;
    }

    /**
     *
     * @param int|string $anyo
     */
    function setAnyo($anyo)
    {
        $this->anyo = (int) $anyo;
    }

    /**
     *
     * @param \DateTimeInterface $apertura
     */
    function setApertura($apertura)
    {
        $this->apertura = $apertura;
    }

    /**
     *
     * @param integer|string $apuestas
     */
    function setApuestas($apuestas)
    {
        $this->apuestas = (int) $apuestas;
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
     * @param integer|string $totalPremios
     */
    function setTotalPremios($totalPremios)
    {
        $this->totalPremios = (int) $totalPremios;
    }

    /**
     *
     * @param PremioPrimitiva[] $premios
     */
    function setPremios(array $premios)
    {
        $this->premios = $premios;
    }

    /**
     *
     * @return string
     */
    function getDiaSemana()
    {
        return $this->diaSemana;
    }

    /**
     *
     * @return \DateTimeInterface
     */
    function getFecha()
    {
        return $this->fecha;
    }

    /**
     *
     * @return string
     */
    function getIdSorteo()
    {
        return $this->idSorteo;
    }

    /**
     *
     * @return \DateTimeInterface
     */
    function getApertura()
    {
        return $this->apertura;
    }

    /**
     *
     * @return string
     */
    function getGameId()
    {
        return $this->gameId;
    }

    /**
     *
     * @return int
     */
    function getAnyo()
    {
        return $this->anyo;
    }

    /**
     *
     * @return int
     */
    function getPremioBote()
    {
        return $this->premioBote;
    }

    /**
     *
     * @return integer
     */
    function getRecaudacion()
    {
        return $this->recaudacion;
    }

    /**
     *
     * @return Joker
     */
    function getSorteoJoker()
    {
        return $this->sorteoJoker;
    }

    /**
     *
     * @return integer
     */
    function getApuestas()
    {
        return $this->apuestas;
    }

    /**
     *
     * @return string
     */
    function getCombinacion()
    {
        return $this->combinacion;
    }

    /**
     *
     * @return type
     */
    function getTotalPremios()
    {
        return $this->totalPremios;
    }

    /**
     *
     * @return PremioPrimitiva[]
     */
    function getPremios()
    {
        return $this->premios;
    }
}