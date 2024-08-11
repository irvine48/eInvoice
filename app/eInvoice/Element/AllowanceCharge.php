<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class AllowanceCharge
{
    public static function add($data)
    {
        // <cac:AllowanceCharge>
        // <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        // <cbc:AllowanceChargeReason>Sample Description</cbc:AllowanceChargeReason>
        // <cbc:Amount currencyID="MYR">100</cbc:Amount>
        // </cac:AllowanceCharge>

        $defaultSample = [
            'chargeIndicator' => false,
            'allowanceChargeReason' => 'Sample Description',
            'amount' => 100.00,
        ];

        if ($data === null) {
            $data['chargeIndicator'] = $data['chargeIndicator'] ?? $defaultSample['chargeIndicator'];
            $data['allowanceChargeReason'] = $data['allowanceChargeReason'] ?? $defaultSample['allowanceChargeReason'];
            $data['amount'] = $data['amount'] ?? $defaultSample['amount'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'AllowanceCharge',
                Element::create(Schema::CBC->value.'ChargeIndicator', $data['chargeIndicator']),
                Element::create(Schema::CBC->value.'AllowanceChargeReason', $data['allowanceChargeReason']),
                Element::create(Schema::CBC->value.'Amount', $data['amount'])->props('currencyID MYR'),
            ),
        ];

        return implode($elements);
    }
}
