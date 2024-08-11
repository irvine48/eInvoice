<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class ID
{
    public static function add($data)
    {
        $defaultSample = [
            'invoiceNumber' => '151891-1981'
        ];

        if ($data === null) {
            $data['invoiceNumber'] = $data['invoiceNumber'] ?? $defaultSample['invoiceNumber'];
        }

        $elements = [
            Element::create( Schema::CBC->value.'ID', $data['invoiceNumber']),
        ];

        return implode($elements);
    }
}
