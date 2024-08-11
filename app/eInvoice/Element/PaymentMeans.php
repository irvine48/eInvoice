<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class PaymentMeans
{
    public static function add($data)
    {
        // <cac:PaymentMeans>
        // <cbc:PaymentMeansCode>01</cbc:PaymentMeansCode>
        // <cac:PayeeFinancialAccount>
        // <cbc:ID>1234567890</cbc:ID>
        // </cac:PayeeFinancialAccount>
        // </cac:PaymentMeans>
        // <cac:PaymentTerms>

        $defaultSample = [
            'paymentMeansCode' => '01',
            'id' => '1234567890',
        ];

        if ($data === null) {
            $data['paymentMeansCode'] = $data['paymentMeansCode'] ?? $defaultSample['paymentMeansCode'];
            $data['id'] = $data['id'] ?? $defaultSample['id'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'PaymentMeans',
                Element::create(Schema::CBC->value.'PaymentMeansCode', $data['paymentMeansCode']),
                Element::create(Schema::CAC->value.'PayeeFinancialAccount',
                    Element::create(Schema::CBC->value.'ID', $data['id']),
                ),
            ),
        ];

        return implode($elements);
    }
}
