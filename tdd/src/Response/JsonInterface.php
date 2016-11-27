<?php

namespace Urer\Response;

interface JsonInterface
{
    /**
     * Read the json string.
     *
     * @return mixed
     */
    public function readJson();

    /**
     * To string implementation.
     *
     * @return string
     */
    public function __toString();
}