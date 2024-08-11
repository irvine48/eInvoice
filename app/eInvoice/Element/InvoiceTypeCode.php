<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class InvoiceTypeCode
{
    public static function add($data)
    {
        $defaultSample = [
            'listVersionId' => '1.0',
            'invoiceTypeCode' => '01'
        ];

        if ($data === null) {
            $data['listVersionId'] = $data['listVersionId'] ?? $defaultSample['listVersionId'];
            $data['invoiceTypeCode'] = $data['invoiceTypeCode'] ?? $defaultSample['invoiceTypeCode'];

        }

        $elements = [
            Element::create(Schema::CBC->value.'InvoiceTypeCode', $data['invoiceTypeCode'])->props('listVersionID '.$data['listVersionId']),
        ];

        return implode($elements);
    }
}
