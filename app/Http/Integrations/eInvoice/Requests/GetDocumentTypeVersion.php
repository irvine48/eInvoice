<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDocumentTypeVersion extends Request
{
    protected readonly string $documentId;
    protected readonly string $versionId;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($documentId, $versionId) {
        $this->documentId = (int)$documentId;
        $this->versionId = (int)$versionId;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documenttypes/'.$this->documentId.'/versions/'.$this->versionId;
    }
}
