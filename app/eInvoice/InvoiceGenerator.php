<?php

namespace App\eInvoice;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\eInvoice\Element\ID;
use App\eInvoice\Element\IssueDate;
use App\eInvoice\Element\IssueTime;
use App\eInvoice\Element\InvoiceTypeCode;
use App\eInvoice\Element\DocumentCurrencyCode;
use App\eInvoice\Element\TaxCurrencyCode;
use App\eInvoice\Element\InvoicePeriod;
use App\eInvoice\Element\BillingReference;
use App\eInvoice\Element\Signature;
use App\eInvoice\Element\AdditionalDocumentReference;
use App\eInvoice\Element\AccountingSupplierParty;
use App\eInvoice\Element\AccountingCustomerParty;
use App\eInvoice\Element\Delivery;
use App\eInvoice\Element\PaymentMeans;
use App\eInvoice\Element\PaymentTerms;
use App\eInvoice\Element\PrepaidPayment;
use App\eInvoice\Element\AllowanceCharge;
use App\eInvoice\Element\TaxTotal;
use App\eInvoice\Element\LegalMonetaryTotal;
use App\eInvoice\Element\InvoiceLines;

class InvoiceGenerator
{
    private $writer;

    public function __construct()
    {

    }

    public function generateInvoiceXml($invoiceNumber, $supplier, $buyer): string
    {


        $this->writer = Document::create('Invoice',

            ID::add(['invoiceNumber' => $invoiceNumber]),
            IssueDate::add(null),
            IssueTime::add(null),
            InvoiceTypeCode::add(null),
            DocumentCurrencyCode::add(null),
            TaxCurrencyCode::add(null),
            InvoicePeriod::add(null),
            BillingReference::add(['invoiceNumber' => $invoiceNumber]),
            Signature::add(null),
            // AdditionalDocumentReference::add(['id' =>'L1', 'documentType' => 'CustomsImportForm']), // multiple
            // AdditionalDocumentReference::add(['id' =>'FTA', 'documentType' => 'FreeTradeAgreement', 'documentDescription' => 'Sample Description']), // multiple
            // AdditionalDocumentReference::add(['id' =>'L1', 'documentType' => 'K2']), // multiple
            // AdditionalDocumentReference::add(['id' =>'L1']), // multiple
            AccountingSupplierParty::add($supplier),
            AccountingCustomerParty::add($buyer),
            // Delivery::add(null),
            PaymentMeans::add(null),
            PaymentTerms::add(null),
            PrepaidPayment::add(null),
            AllowanceCharge::add(['chargeIndicator' => 'false', 'allowanceChargeReason' => 'Sample Description', 'amount' => '100.00']),
            AllowanceCharge::add(['chargeIndicator' => 'true', 'allowanceChargeReason' => 'Service charge', 'amount' => '100.00']),
            TaxTotal::add(null),
            LegalMonetaryTotal::add(null),
            InvoiceLines::add(null), // multiple
            InvoiceLines::add(null), // multiple
            InvoiceLines::add(null), // multiple
            InvoiceLines::add(null), // multiple
        )
        ->props('xmlns urn:oasis:names:specification:ubl:schema:xsd:Invoice-2','xmlns:cac urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2','xmlns:cbc urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        return $this->writer->__toString();
    }
}
