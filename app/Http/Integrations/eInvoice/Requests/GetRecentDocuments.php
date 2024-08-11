<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetRecentDocuments extends Request
{
    public $queryArray = [];

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct($pageNo = null, $pageSize = null, $submissionDateFrom = null, $submissionDateTo = null, $issueDateFrom, $issueDateTo = null, $direction = null, $status = null, $documentType = null, $receiverIdType = null, $receiverId = null, $issuerIdType = null, $issuerId = null, $receiverTin = null, $issuerTin = null) {
        $this->queryArray['pageNo'] = $pageNo;
        $this->queryArray['pageSize'] = $pageSize;
        $this->queryArray['submissionDateFrom'] = $submissionDateFrom;
        $this->queryArray['submissionDateTo'] = $submissionDateTo;
        $this->queryArray['issueDateFrom'] = $issueDateFrom;
        $this->queryArray['issueDateTo'] = $issueDateTo;
        $this->queryArray['direction'] = $direction;
        $this->queryArray['status'] = $status;
        $this->queryArray['documentType'] = $documentType;
        $this->queryArray['receiverIdType'] = $receiverIdType;
        $this->queryArray['receiverId'] = $receiverId;
        $this->queryArray['issuerIdType'] = $issuerIdType;
        $this->queryArray['issuerId'] = $issuerId;
        $this->queryArray['receiverTin'] = $receiverTin;
        $this->queryArray['issuerTin'] = $issuerTin;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        // dd('/api/v1.0/documents/recent?'.http_build_query($this->queryArray));
        return '/api/v1.0/documents/recent?'.http_build_query($this->queryArray);
    }
}
