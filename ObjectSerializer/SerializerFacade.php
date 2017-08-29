<?php

namespace Dvaqueiro\ObjectSerializer;

use DateTime;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
class SerializerFacade implements SerializerFacadeInterface
{
    const JSON = 'json';
    const XML = 'xml';
    const CSV = 'csv';
    const PHPDOC = 'Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor';
    const REFLECTION = 'Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor';

    private static $allowedFormats = array('json', 'xml', 'csv');
    private $class;
    private $normalizer;
    private $serializer;

    /**
     *
     * @param string $class className to serialize data
     * @param array[] $propertyMaps property -> keys maps
     * @param string $propertyAccesor PHPDOC|REFLECTION
     * @param array[] $config
     *      DateTimeNormalizer -> config['dateTimeFormat']
     *      XmlEncoder -> config['rootNodeName'] <br>
     *      CsvEncoder -> config['delimiter']<br>
     *                    config['enclosure']<br>
     *                    config['escapeChar']<br>
     *                    config['keySeparator']<br>
     *      Normalizer -> config['ignoredAttributes']
     */
    function __construct($class, $propertyMaps, $config = array(), $propertyInfo = self::PHPDOC)
    {
        $this->class = $class;
        $this->setUpConfig($config);
        $nameConverter = new ArrayMapNameConverter($propertyMaps);
        $this->normalizer = new ObjectNormalizer(null, $nameConverter, null, new $propertyInfo());

        $this->serializer = new Serializer(
            array(new DateTimeNormalizer($this->config['dateTimeFormat']), $this->normalizer, new ArrayDenormalizer()),
            array(new JsonEncoder(), new XmlEncoder($this->config['rootNodeName']),
            new CsvEncoder($this->config['delimiter'], $this->config['enclosure'], $this->config['escapeChar'],
                $this->config['keySeparator']))
        );
    }

    private function setUpConfig($config)
    {
        $_default = array(
            'dateTimeFormat' => DateTime::RFC3339,
            'rootNodeName' => $this->getClassNameFromFullQualifiedClassName(),
            'delimiter' => ',',
            'enclosure' => '"',
            'escapeChar' => '\\',
            'keySeparator' => '.',
        );

        $this->config = array_merge($_default, $config);
    }

    private function getClassNameFromFullQualifiedClassName()
    {
        $path = explode('\\', $this->class);
        return array_pop($path);
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize($data, $format, $context = array())
    {
        $this->checkAllowedFormat($format);
        return $this->serializer->deserialize($data, $this->class, $format, $context);
    }

    private function checkAllowedFormat($format)
    {
        if(!in_array($format, static::$allowedFormats)) {
            throw new NotAllowedFormatException("The format {$format} does not appear to be valid in this context");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($object, $format, $context = array())
    {
        $this->checkAllowedFormat($format);
        return $this->serializer->serialize($object, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function setIgnoredAttributes($ignoredAttributes)
    {
        return $this->normalizer->setIgnoredAttributes($ignoredAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function setNormalizationCallbacks($callbacks)
    {
        return $this->normalizer->setCallbacks($callbacks);
    }
}