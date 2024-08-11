<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDocumentType extends Request
{
    protected readonly string $documentId;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($documentId) {
        $this->documentId = (int)$documentId;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documenttypes/'.$this->documentId;
    }
}
