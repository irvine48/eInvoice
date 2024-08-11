<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class DocumentCurrencyCode
{
    public static function add($data)
    {

        $defaultSample = [
            'documentCurrencyCode' => 'MYR',
        ];

        if ($data == null) {
            $data['documentCurrencyCode'] = $data['documentCurrencyCode'] ?? $defaultSample['documentCurrencyCode'];
        }

        $elements = [
            Element::create(Schema::CBC->value.'DocumentCurrencyCode', $data['documentCurrencyCode']),
        ];

        return implode($elements);
    }
}
