<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ValidateTaxpayersTin extends Request
{
    public $tin = '';
    public $idType = '';
    public $idValue = '';

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($tin, $idType, $idValue) {
        $this->tin = $tin;
        $this->idType = $idType;
        $this->idValue = $idValue;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/taxpayer/validate/'.$this->tin.'?idType='.$this->idType.'&idValue='.$this->idValue;
    }
}
