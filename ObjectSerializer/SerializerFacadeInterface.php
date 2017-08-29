<?php

namespace Dvaqueiro\ObjectSerializer;

/**
 *
 * @author Daniel Vaqueiro <danielvc4 at gmail.com>
 */
interface SerializerFacadeInterface
{

    /**
     * Deserializes data into the given type.
     *
     * @param mixed  $data
     * @param string $type
     * @param string $format
     * @param array  $context
     *
     * @return object
     */
    public function deserialize($data, $format, $context = array());

    /**
     * Serializes data in the appropriate format.
     *
     * @param mixed  $data    any data
     * @param string $format  format name
     * @param array  $context options normalizers/encoders have access to
     *
     * @return string
     */
    public function serialize($object, $format, $context = array());

    /**
     * Set ignored attributes for normalization and denormalization.
     *
     * @param array $ignoredAttributes
     *
     * @return self
     */
    public function setIgnoredAttributes($ignoredAttributes);

    /**
     * Set normalization callbacks.
     *
     * @param callable[] $callbacks help normalize the result
     *
     * @return self
     *
     * @throws InvalidArgumentException if a non-callable callback is set
     */
    public function setNormalizationCallbacks($callbacks);
}