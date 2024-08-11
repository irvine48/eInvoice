<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class PrepaidPayment
{
    public static function add($data)
    {
        // <cac:PrepaidPayment>
        // <cbc:ID>E12345678912</cbc:ID>
        // <cbc:PaidAmount currencyID="MYR">1.00</cbc:PaidAmount>
        // <cbc:PaidDate>2024-07-23</cbc:PaidDate>
        // <cbc:PaidTime>00:30:00Z</cbc:PaidTime>
        // </cac:PrepaidPayment>

        $defaultSample = [
            'id' => 'E12345678912',
            'paidAmount' => '1.00',
            'paidDate' => date('Y-m-d', strtotime('-5 minutes')),
            'paidTime' => date('H:i:s\Z', strtotime('-5 minutes')),
            'note' => 'Prepaid Payment'
        ];

        if ($data === null) {
            $data['id'] = $data['id'] ?? $defaultSample['id'];
            $data['paidAmount'] = $data['paidAmount'] ?? $defaultSample['paidAmount'];
            $data['paidDate'] = $data['paidDate'] ?? $defaultSample['paidDate'];
            $data['paidTime'] = $data['paidTime'] ?? $defaultSample['paidTime'];
            $data['note'] = $data['note'] ?? $defaultSample['note'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'PrepaidPayment',
                Element::create(Schema::CBC->value.'ID', $data['id']),
                Element::create(Schema::CBC->value.'PaidAmount', $data['paidAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'PaidDate', $data['paidDate']),
                Element::create(Schema::CBC->value.'PaidTime', $data['paidTime']),
                // Element::create(Schema::CBC->value.'Note', $data['note'])
            ),
        ];

        return implode($elements);
    }
}
