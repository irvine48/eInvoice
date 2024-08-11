<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class Signature
{
    public static function add($data)
    {
        // <cac:Signature>
        // <cbc:ID>urn:oasis:names:specification:ubl:signature:Invoice</cbc:ID>
        // <cbc:SignatureMethod>urn:oasis:names:specification:ubl:dsig:enveloped:xades</cbc:SignatureMethod>
        // </cac:Signature>

        $defaultSample = [
            'id' => 'urn:oasis:names:specification:ubl:signature:Invoice',
            'signature_method' => 'urn:oasis:names:specification:ubl:dsig:enveloped:xades',
        ];

        if ($data === null) {
            $data['id'] = $data['id'] ?? $defaultSample['id'];
            $data['signature_method'] = $data['signature_method'] ?? $defaultSample['signature_method'];
        }

        $elements = [
            Element::create( Schema::CAC->value.'Signature',
                Element::create( Schema::CBC->value.'ID', $data['id']),
                Element::create(Schema::CBC->value.'SignatureMethod', $data['signature_method']),
            ),
        ];

        return implode($elements);
    }
}
