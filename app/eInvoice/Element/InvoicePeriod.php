<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class InvoicePeriod
{
    public static function add($data)
    {
        // <cac:InvoicePeriod>
        // <cbc:StartDate>2024-07-01</cbc:StartDate>
        // <cbc:EndDate>2024-07-31</cbc:EndDate>
        // <cbc:Description>Monthly</cbc:Description>
        // </cac:InvoicePeriod>

        $defaultSample = [
            'startDate' => date('Y-m-d', strtotime('-5 minutes')),
            'endDate' => date('Y-m-d', strtotime('+5 minutes')),
            'description' => 'Monthly',
        ];

        if ($data === null) {
            $data['startDate'] = $data['startDate'] ?? $defaultSample['startDate'];
            $data['endDate'] = $data['endDate'] ?? $defaultSample['endDate'];
            $data['description'] = $data['description'] ?? $defaultSample['description'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'InvoicePeriod',
                Element::create(Schema::CBC->value.'StartDate', $data['startDate']),
                Element::create(Schema::CBC->value.'EndDate', $data['endDate']),
                Element::create(Schema::CBC->value.'Description', $data['description']),
            ),
        ];

        return implode($elements);
    }
}
