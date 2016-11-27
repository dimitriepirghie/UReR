<?php

namespace Urer;

use Urer\Response\XmlResponse;
use Urer\Response\XmlResponseAdapter;

class Response
{
    /**
     * Output the response in a json format.
     *
     * @param Response\XmlResponse|Response\JsonResponse $response
     */
    public function output($response)
    {
        if ($response instanceof XmlResponse) {
            $response = new XmlResponseAdapter($response);
        }

        echo $response;
    }
}