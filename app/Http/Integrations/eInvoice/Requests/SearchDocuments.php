<?php

namespace App\Http\Integrations\eInvoice\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class SearchDocuments extends Request
{
    // '/api/v1.0/documents/search?&uuid={uuid}&submissionDateFrom={submissionDateFrom}&submissionDateTo={submissionDateTo}&pageSize={pageSize}&issueDateFrom={issueDateFrom}&issueDateTo={issueDateTo}&direction={direction}&status={status}&documentType={documentType}&receiverId={receiverId}&receiverIdType={receiverIdType}&issuerTin={issuerTin}'

    public $queryArray = [];

    /**
     * The HTTP method
     */
    protected Method $method = Method::GET;

    public function __construct($uuid = null, $submissionDateFrom = null, $submissionDateTo = null, $pageSize = null, $issueDateFrom, $issueDateTo = null, $direction = null, $status = null, $documentType = null, $receiverIdType = null, $receiverId = null, $issuerTin = null) {
        $this->queryArray['uuid'] = $uuid;
        $this->queryArray['submissionDateFrom'] = $submissionDateFrom;
        $this->queryArray['submissionDateTo'] = $submissionDateTo;
        $this->queryArray['pageSize'] = $pageSize;
        $this->queryArray['issueDateFrom'] = $issueDateFrom;
        $this->queryArray['issueDateTo'] = $issueDateTo;
        $this->queryArray['direction'] = $direction;
        $this->queryArray['status'] = $status;
        $this->queryArray['documentType'] = $documentType;
        $this->queryArray['receiverId'] = $receiverId;
        $this->queryArray['receiverIdType'] = $receiverIdType;
        $this->queryArray['issuerTin'] = $issuerTin;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        // dd('/api/v1.0/documents/search?'.http_build_query($this->queryArray));
        return '/api/v1.0/documents/search?'.http_build_query($this->queryArray);
    }
}
