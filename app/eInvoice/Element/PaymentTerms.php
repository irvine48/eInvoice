<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class PaymentTerms
{
    public static function add($data)
    {
        // <cac:PaymentTerms>
        // <cbc:Note>Payment method is cash</cbc:Note>
        // </cac:PaymentTerms>

        $defaultSample = [
            'note' => 'Payment method is cash',
        ];

        if ($data === null) {
            $data['note'] = $data['note'] ?? $defaultSample['note'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'PaymentTerms',
                Element::create(Schema::CBC->value.'Note', $data['note']),
            ),
        ];

        return implode($elements);
    }
}
