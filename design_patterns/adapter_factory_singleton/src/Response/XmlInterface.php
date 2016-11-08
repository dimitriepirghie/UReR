<?php

namespace Urer\Response;

interface XmlInterface
{
    /**
     * Read the xml data.
     *
     * @return mixed
     */
    public function readXml();

    /**
     * Validate the xml schema.
     *
     * @return mixed
     */
    public function validate();

    /**
     * To string implementation.
     *
     * @return string
     */
    public function __toString();
}