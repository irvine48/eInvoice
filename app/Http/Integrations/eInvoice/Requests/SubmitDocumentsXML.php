<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class SubmitDocumentsXML extends Request implements HasBody
{
    use HasJsonBody;

    public $inputDocuments = [];
    public $documents = [];

    public $format = 'XML'; // XML, JSON
    public $document = ''; // base64 encoded XML or JSON
    public $documentHash = ''; // SHA256
    public $codeNumber = ''; // INV12345, CN23456, DN34567


    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct($inputDocuments, $invoiceNumber) {
        $this->inputDocuments = $inputDocuments;
        $this->codeNumber = $invoiceNumber;

        $this->prepareAllDocuments();
        // dd($this->documents);
    }

    protected function defaultHeaders(): array
    {
        // https://sdk.myinvois.hasil.gov.my/standard-header-parameters/
        return [
            'Accept' => 'application/json',
            'Accept-Language' => 'en',
            'Content-Type' => 'application/json',
        ];
    }

    protected function defaultBody(): array
    {
        $array = [
            'documents' => $this->documents,
        ];

        \Log::debug(json_encode($array));

        return $array;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documentsubmissions/';
    }

    public function sha256Document($document)
    {
        // $zDoc = gzcompress(json_encode($document), 9);

        return hash('sha256', ($document));
    }

    public function base64Document($document)
    {
        // $zDoc = gzcompress(json_encode($document), 9);

        return base64_encode(($document));
    }

    public function prepareAllDocuments()
    {
        $this->documents = [];
        foreach ($this->inputDocuments as $document) {

            // dd(($document));
            \Log::debug($document);

            $this->documents[] = [
                'format' => $this->format,
                'document' => $this->base64Document($document),
                'documentHash' => $this->sha256Document($document),
                'codeNumber' => $this->codeNumber,
            ];
        }
    }
}
