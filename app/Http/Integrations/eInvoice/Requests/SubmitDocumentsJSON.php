<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

use Spatie\ArrayToXml\ArrayToXml;

class SubmitDocumentsJSON extends Request implements HasBody
{
    use HasJsonBody;

    public $inputDocuments = [];
    public $documents = [];

    public $format = 'JSON'; // XML, JSON
    public $document = ''; // base64 encoded XML or JSON
    public $documentHash = ''; // SHA256
    public $codeNumber = 'INV12345'; // INV12345, CN23456, DN34567


    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct($inputDocuments, $id) {
        $this->inputDocuments = $inputDocuments;
        $this->codeNumber = $id;

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
            // dd(json_encode($document, JSON_UNESCAPED_SLASHES|JSON_PRESERVE_ZERO_FRACTION));
            $jsonFormat = json_encode($document, JSON_UNESCAPED_SLASHES|JSON_PRESERVE_ZERO_FRACTION);
            // dd($jsonFormat);
            // $xmlConverter = new ArrayToXml($document, 'Invoice');
            // $xmlFormat = ArrayToXml::convert($document, 'Invoice');


            \Log::debug($jsonFormat);
            // \Log::debug($xmlConverter->prettify()->toXml());
            // $base64Format = $this->base64Document($jsonFormat);

            $this->documents[] = [
                'format' => $this->format,
                'document' => $this->base64Document($jsonFormat),
                'documentHash' => $this->sha256Document($jsonFormat),
                'codeNumber' => $this->codeNumber,
            ];
        }
        // dd($this->documents);
    }
}
