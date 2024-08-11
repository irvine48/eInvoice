<?php

namespace Modules\Frontend\Livewire\Api;

use Livewire\Component;

use App\Http\Integrations\eInvoice\Sandbox;
use App\Http\Integrations\eInvoice\Requests\GetAllDocumentTypes;
use App\Http\Integrations\eInvoice\Requests\GetDocumentType;
use App\Http\Integrations\eInvoice\Requests\GetDocumentTypeVersion;
use App\Http\Integrations\eInvoice\Requests\GetNotifications;

use App\Http\Integrations\eInvoice\Requests\ValidateTaxpayersTin;
use App\Http\Integrations\eInvoice\Requests\SubmitDocumentsJSON;
use App\Http\Integrations\eInvoice\Requests\SubmitDocumentsXML;
use App\Http\Integrations\eInvoice\Requests\CancelDocument;
use App\Http\Integrations\eInvoice\Requests\GetDocument;
use App\Http\Integrations\eInvoice\Requests\GetDocumentDetails;
use App\Http\Integrations\eInvoice\Requests\SearchDocuments;
use App\Http\Integrations\eInvoice\Requests\RejectDocument;
use App\Http\Integrations\eInvoice\Requests\GetRecentDocuments;

use App\SampleData\DocumentSampleJson;
use App\SampleData\DocumentSampleUBL21;
use App\SampleData\DocumentSampleXml;
use App\eInvoice\InvoiceGenerator;
use App\Http\Integrations\eInvoice\Requests\GetSubmission;

class LoginAsTaxPayerSystem extends Component
{
    public $clientId = 'MUST BE SAME CLIENT ID FROM SUPPLIER'; // CHANGE DEFAULT VALUE HERE
    public $clientSecret = 'MUST BE SAME CLIENT SECRET FROM SUPPLIER';// CHANGE DEFAULT VALUE HERE

    public $respondTokenExpiry = '';
    public $respondToken = '';
    public $respondTokenType = '';
    public $respondScope = '';

    public $requestBody = '';
    public $respondStatus = '';
    public $respondBody = '';

    public $jsonxml = '';
    public $supplierTin = 'Supplier TIN';
    public $supplierType = 'NRIC';
    public $supplierTinValue = '';
    public $supplierEmail = '';

    public $buyerTin = 'Buyer TIN';
    public $buyerType = 'NRIC';
    public $buyerTinValue = '';
    public $buyerEmail = '';

    public $documentId = 45;
    public $documentVersion = 1;

    public $queryDateFrom = null; // date('Y-m-d 00:00:00');
    public $queryDateTo = null; // date('Y-m-d 23:59:59');
    public $queryType = 2;
    public $queryLanguage = 'ms'; // ms, en
    public $queryStatus = 'pending'; // pending, batched, delivered, error
    public $queryChannel = 'email'; //email, push
    public $queryPage = 1;
    public $queryPageSize = 100;

    public $tin = '';
    public $tinType = 'NRIC';
    public $tinValue = '';

    public $documentUUID = '';
    public $submissionUid = '';

    public function render()
    {
        return view('frontend::api.livewire.login-as-taxpayer-system');
    }

    public function testGetToken()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            $this->respondTokenExpiry = $authenticator->getExpiresAt();
            $this->respondToken = $authenticator->getAccessToken();
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetAllDocumentTypes()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);
            // Requests
            $allDocumentTypes = $sandboxConnector->send(new GetAllDocumentTypes);

            $status = $allDocumentTypes->status();
            $body = $allDocumentTypes->body();

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetDocumentType()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);
            // Requests
            $allDocumentTypes = $sandboxConnector->send(new GetDocumentType($this->documentId));

            $status = $allDocumentTypes->status();
            $body = $allDocumentTypes->body();

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testDocumentTypeVersion()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);
            // Requests
            $allDocumentTypes = $sandboxConnector->send(new GetDocumentTypeVersion($this->documentId, $this->documentVersion));

            $status = $allDocumentTypes->status();
            $body = $allDocumentTypes->body();

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetNotifications()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);
            // Requests
            $allDocumentTypes = $sandboxConnector->send(new GetNotifications($this->queryDateFrom, $this->queryDateTo, $this->queryType, $this->queryLanguage, $this->queryStatus, $this->queryChannel, $this->queryPage, $this->queryPageSize));

            $status = $allDocumentTypes->status();
            $body = $allDocumentTypes->body();

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testValidateTaxpayersTin()
    {
        try {
            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);
            // Requests
            $allDocumentTypes = $sandboxConnector->send(new ValidateTaxpayersTin($this->tin, $this->tinType, $this->tinValue));

            $status = $allDocumentTypes->status();
            $body = $allDocumentTypes->body();

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    private function sampleJson($invoiceNumber)
    {
        $supplier = [
            'TIN' => $this->supplierTin ?? 'IGXXXXXXXXXX',
            'TINType' => $this->supplierType ?? 'NRIC',
            'TINValue' => $invoiceData['supplierTINValue'] ?? '880808088888',
            'BusinessName' => $invoiceData['supplierBusinessName'] ?? 'Supplier Business Name',
            'Address' => $invoiceData['supplierAddress'] ?? 'Supplier Address',
            'City' => $invoiceData['supplierCity'] ?? 'Supplier City',
            'CountrySubentityCode' => $invoiceData['supplierSubentityCode'] ?? '01',
            'Telephone' => $invoiceData['supplierTelephone'] ?? '60123456780',
            'ElectronicMail' => $this->supplierEmail ?? 'info@supplier.com',
        ];

        $buyer = [
            'TIN' => $this->buyerTin ?? 'IGXXXXXXXXXX',
            'TINType' => $this->buyerType ?? 'NRIC',
            'TINValue' => $invoiceData['buyerTINValue'] ?? '880808088888',
            'BusinessName' => $invoiceData['buyerBusinessName'] ?? 'Supplier Business Name',
            'Address' => $invoiceData['buyerAddress'] ?? 'Supplier Address',
            'City' => $invoiceData['buyerCity'] ?? 'Supplier City',
            'CountrySubentityCode' => $invoiceData['buyerSubentityCode'] ?? '01',
            'Telephone' => $invoiceData['buyerTelephone'] ?? '60123456780',
            'ElectronicMail' => $this->buyerEmail ?? 'info@buyer.com',
        ];

        $jsonInvoiceGenerator = new DocumentSampleJson;
        $json = $jsonInvoiceGenerator->getSampleData($invoiceNumber, $supplier, $buyer);
        return $json;
    }

    private function sampleXML($invoiceNumber)
    {
        $supplier = [
            'TIN' => $this->supplierTin ?? 'IGXXXXXXXXXX',
            'TINType' => $this->supplierType ?? 'NRIC',
            'TINValue' => $this->supplierTinValue ?? '880808088888',
            'BusinessName' => $invoiceData['supplierBusinessName'] ?? 'Supplier Business Name',
            'Address' => $invoiceData['supplierAddress'] ?? 'Supplier Address',
            'City' => $invoiceData['supplierCity'] ?? 'Supplier City',
            'CountrySubentityCode' => $invoiceData['supplierSubentityCode'] ?? '01',
            'Telephone' => $invoiceData['supplierTelephone'] ?? '60123456780',
            'ElectronicMail' => $this->supplierEmail ?? 'info@supplier.com',
        ];

        $buyer = [
            'TIN' => $this->buyerTin ?? 'IGXXXXXXXXXX',
            'TINType' => $this->buyerType ?? 'NRIC',
            'TINValue' => $this->buyerTinValue ?? '880808088888',
            'BusinessName' => $invoiceData['buyerBusinessName'] ?? 'Supplier Business Name',
            'Address' => $invoiceData['buyerAddress'] ?? 'Supplier Address',
            'City' => $invoiceData['buyerCity'] ?? 'Supplier City',
            'CountrySubentityCode' => $invoiceData['buyerSubentityCode'] ?? '01',
            'Telephone' => $invoiceData['buyerTelephone'] ?? '60123456780',
            'ElectronicMail' => $this->buyerEmail ?? 'info@buyer.com',
        ];

        $xmlInvoiceGenerator = new InvoiceGenerator;
        $xml = $xmlInvoiceGenerator->generateInvoiceXml(
            $invoiceNumber,
            $supplier,
            $buyer
        );

        return $xml;
    }

    public function testDocumentSubmission()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            // LHDN Helpdesk Request These Information
            \Log::debug($authenticator->getAccessToken());
            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            // Generate Sample Document
            $selectMethod = $this->jsonxml;
            $invoiceNumber = 'INV888'.rand(100000,999999);
            // $invoiceNumber = '151891-1981';
            if ($selectMethod == 'JSON') {
                $oneInvoiceDocument = $this->sampleJson($invoiceNumber);
                $this->requestBody = json_encode($oneInvoiceDocument, JSON_UNESCAPED_SLASHES|JSON_PRESERVE_ZERO_FRACTION);
                $documentTest = $sandboxConnector->send(new SubmitDocumentsJSON([$oneInvoiceDocument], $invoiceNumber));
            } else {

                $oneInvoiceDocument = $this->sampleXML($invoiceNumber);
                $this->requestBody = $oneInvoiceDocument;
                $documentTest = $sandboxConnector->send(new SubmitDocumentsXML([$oneInvoiceDocument], $invoiceNumber));
            }

            $status = $documentTest->status();
            $body = $documentTest->body();

            // LHDN Helpdesk Request These Information
            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testCancelDocument()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $uuid = $this->documentUUID;

            // $test = new CancelDocument($uuid, 'Wrong invoice details');
            // $body = $test->body()->all();
            // dd($body);

            $documentTest = $sandboxConnector->send(new CancelDocument($uuid, 'Wrong invoice details'));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testRejectDocument()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $uuid = $this->documentUUID;

            // $test = new CancelDocument($uuid, 'Wrong invoice details');
            // $body = $test->body()->all();
            // dd($body);

            $documentTest = $sandboxConnector->send(new RejectDocument($uuid, 'Wrong invoice details'));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetRecentDocuments()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $pageNo = 1;
            $pageSize = 20;
            $submissionDateFrom = date('Y-m-d\T00:00:00\Z', strtotime('yesterday'));
            $submissionDateTo = date('Y-m-d\T23:59:59\Z');
            $issueDateFrom = date('Y-m-d\T00:00:00\Z', strtotime('yesterday'));
            $issueDateTo = date('Y-m-d\T23:59:59\Z');
            $direction = 'Sent'; // Optional: direction of the document. Possible values: (Sent, Received)
            $status = 'Valid'; // Optional: status of the document. Possible values: (Valid, Invalid, Cancelled, Submitted)
            $documentType = '01';
            $receiverIdType = 'NRIC';
            $receiverId = null;
            $receiverTin = null; // For Sent
            $issuerIdType = 'NRIC';
            $issuerId = null;
            $issuerTin = null; // For Received

            $documentTest = $sandboxConnector->send(new GetRecentDocuments($pageNo, $pageSize, $submissionDateFrom, $submissionDateTo, $issueDateFrom, $issueDateTo, $direction, $status, $documentType, $receiverIdType, $receiverId, $issuerIdType, $issuerId, $receiverTin, $issuerTin));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetSubmission()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $pageNo = 1;
            $pageSize = 20;

            $submissionUid = $this->submissionUid;
            $documentTest = $sandboxConnector->send(new GetSubmission($submissionUid, $pageNo, $pageSize));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            dd($e);
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetDocument()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $pageNo = 1;
            $pageSize = 20;

            $uuid = $this->documentUUID;
            $documentTest = $sandboxConnector->send(new GetDocument($uuid));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testGetDocumentDetails()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $uuid = $this->documentUUID;
            $documentTest = $sandboxConnector->send(new GetDocumentDetails($uuid));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            $this->respondStatus = $e->getMessage();
        }
    }

    public function testSearchDocuments()
    {
        try {

            $sandboxConnector = new Sandbox($this->clientId, $this->clientSecret);
            // Get Token
            $authenticator = $sandboxConnector->getAccessToken();
            // Use Token
            $sandboxConnector->authenticate($authenticator);

            \Log::debug($authenticator->getAccessToken());

            \Log::debug($this->clientId);
            \Log::debug($this->clientSecret);

            $uuid = $this->documentUUID;
            $submissionDateFrom = date('Y-m-d\T00:00:00\Z', strtotime('yesterday'));
            $submissionDateTo = date('Y-m-d\T23:59:59\Z');
            $pageSize = 20;
            $issueDateFrom = date('Y-m-d\T00:00:00\Z', strtotime('yesterday'));
            $issueDateTo = date('Y-m-d\T23:59:59\Z');
            $direction = null; // Optional: direction of the document. Possible values: (Sent, Received)
            $status = null; // Optional: status of the document. Possible values: (Valid, Invalid, Cancelled, Submitted)
            $documentType = null;
            $receiverIdType = null;
            $receiverId = null;
            $issuerTin = null; // For Received

            $documentTest = $sandboxConnector->send(new SearchDocuments($uuid, $submissionDateFrom, $submissionDateTo, $pageSize, $issueDateFrom, $issueDateTo, $direction, $status, $documentType, $receiverIdType, $receiverId, $issuerTin));

            $status = $documentTest->status();
            $body = $documentTest->body();

            \Log::debug($body);

            $this->respondStatus = $status;
            $this->respondBody = $body;
        } catch (\Exception $e) {
            $this->respondStatus = $e->getMessage();
        }
    }
}
