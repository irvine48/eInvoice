<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDocument extends Request
{
    public $queryArray = [];

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($ulid) {
        $this->queryArray['ulid'] = $ulid;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documents/'.$this->queryArray['ulid'].'/raw';
    }
}
