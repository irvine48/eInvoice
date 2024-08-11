<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class TaxTotal
{
    public static function add($data)
    {
        // <cac:TaxTotal>
        // <cbc:TaxAmount currencyID="MYR">87.63</cbc:TaxAmount>
        // <cac:TaxSubtotal>
        // <cbc:TaxableAmount currencyID="MYR">87.63</cbc:TaxableAmount>
        // <cbc:TaxAmount currencyID="MYR">87.63</cbc:TaxAmount>
        // <cac:TaxCategory>
        // <cbc:ID>01</cbc:ID>
        // <cac:TaxScheme>
        // <cbc:ID schemeID="UN/ECE 5153" schemeAgencyID="6">OTH</cbc:ID>
        // </cac:TaxScheme>
        // </cac:TaxCategory>
        // </cac:TaxSubtotal>
        // </cac:TaxTotal>

        $defaultSample = [
            'taxAmount' => 87.63,
            'taxableAmount' => 87.63,
            'taxCategoryID' => '01',
            'taxSchemeID' => 'OTH',
            'taxSchemeAgencyID' => '6',
            'taxSchemeSchemeID' => 'UN/ECE 5153',
        ];

        if ($data === null) {
            $data['taxAmount'] = $data['taxAmount'] ?? $defaultSample['taxAmount'];
            $data['taxableAmount'] = $data['taxableAmount'] ?? $defaultSample['taxableAmount'];
            $data['taxCategoryID'] = $data['taxCategoryID'] ?? $defaultSample['taxCategoryID'];
            $data['taxSchemeID'] = $data['taxSchemeID'] ?? $defaultSample['taxSchemeID'];

            $data['taxSchemeAgencyID'] = $data['taxSchemeAgencyID'] ?? $defaultSample['taxSchemeAgencyID'];
            $data['taxSchemeSchemeID'] = $data['taxSchemeSchemeID'] ?? $defaultSample['taxSchemeSchemeID'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'TaxTotal',
                Element::create(Schema::CBC->value.'TaxAmount', $data['taxAmount'])->props('currencyID MYR'),
                Element::create(Schema::CAC->value.'TaxSubtotal',
                    Element::create(Schema::CBC->value.'TaxableAmount', $data['taxableAmount'])->props('currencyID MYR'),
                    Element::create(Schema::CBC->value.'TaxAmount', $data['taxAmount'])->props('currencyID MYR'),
                    Element::create(Schema::CAC->value.'TaxCategory',
                        Element::create(Schema::CBC->value.'ID', $data['taxCategoryID']),
                        Element::create(Schema::CAC->value.'TaxScheme',
                            Element::create(Schema::CBC->value.'ID', $data['taxSchemeID'])->props('schemeID '.$data['taxSchemeSchemeID'], 'schemeAgencyID '.$data['taxSchemeAgencyID'])
                        )
                    )
                )
            ),
        ];

        return implode($elements);
    }
}
