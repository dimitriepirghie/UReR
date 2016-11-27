<?php

namespace Urer\Response;

class XmlResponseAdapter implements JsonInterface
{
    /**
     * @var XmlResponse
     */
    private $response;

    /**
     * XmlResponseAdapter constructor.
     *
     * @param XmlResponse $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Read the json string.
     *
     * @return mixed
     */
    public function readJson()
    {
        $xml = $this->response->readXml();

        return $this->xmlToJson($xml);
    }

    /**
     * To string implementation.
     *
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    /**
     * Convert xml structure to json.
     *
     * @param $xml
     * @return string
     */
    protected function xmlToJson($xml)
    {
        // TODO: Implement xmlToJson() method.
    }
}