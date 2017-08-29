<?php

namespace Dvaqueiro\Example\Models;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class SorteoPrimitiva
{
    /**
     *
     * @var \DateTimeInterface $fecha
     */
    private $fecha;
    private $diaSemana;

    /**
     *
     * @var string $idSorteo
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
     * @var string|null
     */
    private $combinacion;

    private $extracciones;

    /**
     *
     * @var integer|string
     */
    private $totalPremios;

    /**
     *
     * @var PremioPrimitiva[]
     */
    private $escrutinio;

    /**
     *
     * @var Joker
     */
    private $sorteoJoker;

    /**
     *
     * @var PremioJoker[]
     */
    private $escrutinioJoker;

    /**
     *
     * @param \DateTimeInterface $fecha
     * @param string $idSorteo
     * @param string $gameId
     */
    function __construct(\DateTimeInterface $fecha, $idSorteo, $gameId)
    {
        $this->fecha = $fecha;
        $this->idSorteo = $idSorteo;
        $this->gameId = $gameId;
        $this->extracciones = array();
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
        $recaudacion = ($recaudacion !== null) ? (int) $recaudacion : null;
        $this->recaudacion = $recaudacion;
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
        $this->setExtracciones($combinacion);
    }

    private function setExtracciones($combinacion)
    {
        if (preg_match_all('@(\d+)\s@', $combinacion, $matches1) !== false) {
            foreach ($matches1[0] as $match) {
                $this->extracciones[] = new ExtraccionPrimitiva(trim($match), 'N');
            }
        }

        if (preg_match_all('@([A-Z]).(\d+).@', $combinacion, $matches2) !== false) {
            foreach ($matches2[2] as $key => $match) {
                $this->extracciones[] = new ExtraccionPrimitiva($match, $matches2[1][$key]);
            }
        }
    }

    /**
     *
     * @param integer|string|null $totalPremios
     */
    function setTotalPremios($totalPremios)
    {
        $this->totalPremios = (int) $totalPremios;
    }

    /**
     *
     * @param PremioPrimitiva[] $escrutinio
     */
    function setEscrutinio(array $escrutinio)
    {
        $this->escrutinio = $escrutinio;
    }

    /**
     *
     * @param PremioJoker[] $escrutinioJoker
     */
    function setEscrutinioJoker(array $escrutinioJoker)
    {
        $this->escrutinioJoker = $escrutinioJoker;
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
    function getEscrutinio()
    {
        return $this->escrutinio;
    }

    /**
     *
     * @return PremioJoker[]
     */
    function getEscrutinioJoker()
    {
        return $this->escrutinioJoker;
    }

    function getExtracciones()
    {
        return $this->extracciones;
    }
}