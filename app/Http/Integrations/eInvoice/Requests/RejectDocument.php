<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;


class RejectDocument extends Request implements HasBody
{
    use HasJsonBody;

    public $queryArray = [];

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::PUT;

    public function __construct($uuid = null, $reason = 'Wrong invoice details') {
        $this->queryArray['uuid'] = $uuid;
        $this->queryArray['reason'] = $reason;
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

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documents/state/'.$this->queryArray['uuid'].'/state';
    }

    protected function defaultBody(): array
    {
        return [
            'status' => 'rejected',
            'reason' => $this->queryArray['reason'],
        ];
    }
}
