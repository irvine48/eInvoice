<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class AdditionalDocumentReference
{
    public static function add($data)
    {
        // <cac:AdditionalDocumentReference>
        // <cbc:ID>L1</cbc:ID>
        // <cbc:DocumentType>CustomsImportForm</cbc:DocumentType>
        // </cac:AdditionalDocumentReference>

        $defaultSample = [
            'id' => 'L1',
            'documentType' => 'CustomsImportForm',
            'documentDescription' => null,
        ];

        if ($data === null) {
            $data['id'] = $data['id'] ?? $defaultSample['id'];
            $data['documentType'] = $data['documentType'] ?? $defaultSample['documentType'];
            $data['documentDescription'] = $data['documentDescription'] ?? $defaultSample['documentDescription'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'AdditionalDocumentReference',
                Element::create(Schema::CBC->value.'ID', $data['id'] ?? 'NA'),
                Element::create(Schema::CBC->value.'DocumentType', $data['documentType'] ?? 'NA'),
                Element::create(Schema::CBC->value.'DocumentDescription', $data['documentDescription'] ?? 'NA')
            ),
        ];

        return implode($elements);
    }
}
