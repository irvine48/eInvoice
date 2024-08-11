<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetNotifications extends Request
{
    public $queryArray = [];
    // public $dateFrom;
    // public $dateTo;
    // public $type;
    // public $language;
    // public $status;
    // public $channel;
    // public $pageNo;
    // public $pageSize;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($dateFrom = null, $dateTo = null, $type = null, $language = null, $status = null, $channel = null, $pageNo = null, $pageSize = null) {
        $this->queryArray['dateFrom'] = $dateFrom;
        $this->queryArray['dateTo'] = $dateTo;
        $this->queryArray['type'] = $type;
        $this->queryArray['language'] = $language;
        $this->queryArray['status'] = $status;
        $this->queryArray['channel'] = $channel;
        $this->queryArray['pageNo'] = $pageNo;
        $this->queryArray['pageSize'] = $pageSize;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        // dd('/api/v1.0/notifications/taxpayer?'.http_build_query($this->queryArray));
        return '/api/v1.0/notifications/taxpayer?'.http_build_query($this->queryArray);
    }
}
