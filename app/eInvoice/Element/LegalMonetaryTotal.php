<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class LegalMonetaryTotal
{
    // <cac:LegalMonetaryTotal>
    //     <cbc:LineExtensionAmount currencyID="MYR">1436.50</cbc:LineExtensionAmount>
    //     <cbc:TaxExclusiveAmount currencyID="MYR">1436.50</cbc:TaxExclusiveAmount>
    //     <cbc:TaxInclusiveAmount currencyID="MYR">1436.50</cbc:TaxInclusiveAmount>
    //     <cbc:AllowanceTotalAmount currencyID="MYR">1436.50</cbc:AllowanceTotalAmount>
    //     <cbc:ChargeTotalAmount currencyID="MYR">1436.50</cbc:ChargeTotalAmount>
    //     <cbc:PayableRoundingAmount currencyID="MYR">0.30</cbc:PayableRoundingAmount>
    //     <cbc:PayableAmount currencyID="MYR">1436.50</cbc:PayableAmount>
    // </cac:LegalMonetaryTotal>

    public static function add($data)
    {
        $defaultSample = [
            'lineExtensionAmount' => '1436.50',
            'taxExclusiveAmount' => '1436.50',
            'taxInclusiveAmount' => '1436.50',
            'allowanceTotalAmount' => '1436.50',
            'chargeTotalAmount' => '1436.50',
            'payableRoundingAmount' => '0.30',
            'payableAmount' => '1436.50',
        ];

        if ($data === null) {
            $data['lineExtensionAmount'] = $data['lineExtensionAmount'] ?? $defaultSample['lineExtensionAmount'];
            $data['taxExclusiveAmount'] = $data['taxExclusiveAmount'] ?? $defaultSample['taxExclusiveAmount'];
            $data['taxInclusiveAmount'] = $data['taxInclusiveAmount'] ?? $defaultSample['taxInclusiveAmount'];
            $data['allowanceTotalAmount'] = $data['allowanceTotalAmount'] ?? $defaultSample['allowanceTotalAmount'];
            $data['chargeTotalAmount'] = $data['chargeTotalAmount'] ?? $defaultSample['chargeTotalAmount'];
            $data['payableRoundingAmount'] = $data['payableRoundingAmount'] ?? $defaultSample['payableRoundingAmount'];
            $data['payableAmount'] = $data['payableAmount'] ?? $defaultSample['payableAmount'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'LegalMonetaryTotal',
                Element::create(Schema::CBC->value.'LineExtensionAmount', $data['lineExtensionAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'TaxExclusiveAmount', $data['taxExclusiveAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'TaxInclusiveAmount', $data['taxInclusiveAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'AllowanceTotalAmount', $data['allowanceTotalAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'ChargeTotalAmount', $data['chargeTotalAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'PayableRoundingAmount', $data['payableRoundingAmount'])->props('currencyID MYR'),
                Element::create(Schema::CBC->value.'PayableAmount', $data['payableAmount'])->props('currencyID MYR'),
            ),
        ];

        return implode($elements);
    }
}
