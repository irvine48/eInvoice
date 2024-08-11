<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class BillingReference
{
    public static function add($data)
    {
        // <cac:BillingReference>
        // <cac:AdditionalDocumentReference>
        // <cbc:ID>151891-1981</cbc:ID>
        // </cac:AdditionalDocumentReference>
        // </cac:BillingReference>

        $defaultSample = [
            'id' => '151891-1981',
        ];

        if ($data === null) {
            $data['invoiceNumber'] = $data['invoiceNumber'] ?? $defaultSample['invoiceNumber'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'BillingReference',
                Element::create(Schema::CAC->value.'AdditionalDocumentReference',
                    Element::create(Schema::CBC->value.'ID', $data['invoiceNumber']),
                ),
            ),
        ];

        return implode($elements);
    }
}
