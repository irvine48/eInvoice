<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class IssueTime
{
    public static function add($data)
    {

        $defaultSample = [
            'issueTime' => date('H:i:s\Z', strtotime('-5 minutes')),
        ];

        if ($data === null) {
            $data['issueTime'] = $data['issueTime'] ?? $defaultSample['issueTime'];
        }

        $elements = [
            Element::create(Schema::CBC->value.'IssueTime', $data['issueTime']),
        ];

        return implode($elements);
    }
}
