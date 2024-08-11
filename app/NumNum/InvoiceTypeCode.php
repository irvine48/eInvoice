<?php

namespace App\NumNum;

/**
 * All possible Unit Codes that can be used
 * To extend, see also: https://sdk.myinvois.hasil.gov.my/codes/e-invoice-types/
 */
class InvoiceTypeCode
{
    const INVOICE = "01";
    const CREDIT_NOTE = "02";
    const DEBIT_NOTE = "03";
    const REFUND_NOTE = "04";
    const SELF_BILLED_INVOICE = "11";
    const SELF_BILLED_CREDIT_NOTE = "12";
    const SELF_BILLED_DEBIT_NOTE = "13";
    const SELF_BILLED_REFUND_NOTE = "14";
}
