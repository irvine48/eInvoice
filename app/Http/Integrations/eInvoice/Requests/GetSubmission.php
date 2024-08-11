<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSubmission extends Request
{
    public $submissionUid = null;
    public $queryArray = [];

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($submissionUid = null, $pageNo = null, $pageSize = null) {
        $this->submissionUid = $submissionUid;
        $this->queryArray['pageNo'] = $pageNo;
        $this->queryArray['pageSize'] = $pageSize;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/api/v1.0/documentsubmissions/'.$this->submissionUid.'?'.http_build_query($this->queryArray);
    }
}
