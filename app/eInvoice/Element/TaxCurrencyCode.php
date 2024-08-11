<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class TaxCurrencyCode
{
    public static function add($data)
    {
        $defaultSample = [
            'taxCurrencyCode' => 'MYR',
        ];

        if ($data === null) {
            $data['taxCurrencyCode'] = $data['taxCurrencyCode'] ?? $defaultSample['taxCurrencyCode'];
        }

        $elements = [
            Element::create(Schema::CBC->value.'TaxCurrencyCode', $data['taxCurrencyCode']),
        ];

        return implode($elements);
    }
}
