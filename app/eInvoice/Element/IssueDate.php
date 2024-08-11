<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class IssueDate
{
    public static function add($data)
    {

        $defaultSample = [
            'issueDate' => date('Y-m-d', strtotime('-5 minutes')),
        ];

        if ($data === null) {
            $data['issueDate'] = $data['issueDate'] ?? $defaultSample['issueDate'];
        }

        $elements = [
            Element::create(Schema::CBC->value.'IssueDate', $data['issueDate']),
        ];

        return implode($elements);
    }
}
