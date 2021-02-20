<?php

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ApiJsonResponse implements JsonResponseInterface{
    public function make($response){
        $responseStatus = $response->getStatusCode();
        if($responseStatus == 200){
            return $response->getBody();
        }
        throw new BadRequestException($responseStatus);
    }
}