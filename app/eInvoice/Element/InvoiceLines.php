<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class InvoiceLines
{
    public static function add($data)
    {
        // <cac:InvoiceLine>
        // <cbc:ID>1234</cbc:ID>
        // <cbc:InvoicedQuantity unitCode="C62">1</cbc:InvoicedQuantity>
        // <cbc:LineExtensionAmount currencyID="MYR">1436.50</cbc:LineExtensionAmount>
        // <cac:AllowanceCharge>
        // <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        // <cbc:AllowanceChargeReason>Sample Description</cbc:AllowanceChargeReason>
        // <cbc:MultiplierFactorNumeric>0.15</cbc:MultiplierFactorNumeric>
        // <cbc:Amount currencyID="MYR">100</cbc:Amount>
        // </cac:AllowanceCharge>
        // <cac:AllowanceCharge>
        // <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        // <cbc:AllowanceChargeReason>Sample Description</cbc:AllowanceChargeReason>
        // <cbc:MultiplierFactorNumeric>0.10</cbc:MultiplierFactorNumeric>
        // <cbc:Amount currencyID="MYR">100</cbc:Amount>
        // </cac:AllowanceCharge>
        // <cac:TaxTotal>
        // <cbc:TaxAmount currencyID="MYR">0</cbc:TaxAmount>
        // <cac:TaxSubtotal>
        // <cbc:TaxableAmount currencyID="MYR">1460.50</cbc:TaxableAmount>
        // <cbc:TaxAmount currencyID="MYR">0</cbc:TaxAmount>
        // <cbc:Percent>6.00</cbc:Percent>
        // <cac:TaxCategory>
        // <cbc:ID>E</cbc:ID>
        // <cbc:TaxExemptionReason>Exempt New Means of Transport</cbc:TaxExemptionReason>
        // <cac:TaxScheme>
        // <cbc:ID schemeID="UN/ECE 5153" schemeAgencyID="6">OTH</cbc:ID>
        // </cac:TaxScheme>
        // </cac:TaxCategory>
        // </cac:TaxSubtotal>
        // </cac:TaxTotal>
        // <cac:Item>
        // <cbc:Description>Laptop Peripherals</cbc:Description>
        // <cac:OriginCountry>
        // <cbc:IdentificationCode>MYS</cbc:IdentificationCode>
        // </cac:OriginCountry>
        // <cac:CommodityClassification>
        // <cbc:ItemClassificationCode listID="PTC">9800.00.0010</cbc:ItemClassificationCode>
        // </cac:CommodityClassification>
        // <cac:CommodityClassification>
        // <cbc:ItemClassificationCode listID="CLASS">003</cbc:ItemClassificationCode>
        // </cac:CommodityClassification>
        // </cac:Item>
        // <cac:Price>
        // <cbc:PriceAmount currencyID="MYR">17</cbc:PriceAmount>
        // </cac:Price>
        // <cac:ItemPriceExtension>
        // <cbc:Amount currencyID="MYR">100</cbc:Amount>
        // </cac:ItemPriceExtension>
        // </cac:InvoiceLine>

        // Example usage
        $data = [
            'ID' => '1234',
            'InvoicedQuantity' => '1',
            'unitCode' => 'C62',
            'LineExtensionAmount' => '1436.50',
            'currencyID' => 'MYR',
            'AllowanceCharges' => [
                [
                    'ChargeIndicator' => false,
                    'AllowanceChargeReason' => 'Sample Description',
                    'MultiplierFactorNumeric' => '0.15',
                    'Amount' => '100'
                ],
                [
                    'ChargeIndicator' => true,
                    'AllowanceChargeReason' => 'Sample Description',
                    'MultiplierFactorNumeric' => '0.10',
                    'Amount' => '100'
                ]
            ],
            'TaxTotal' => [
                'TaxAmount' => '0',
                'TaxSubtotal' => [
                    'TaxableAmount' => '1460.50',
                    'TaxAmount' => '0',
                    'BaseUnitMeasure' => '1',
                    'PerUnitAmount' => '10',
                    'Percent' => '6.00',
                    'TaxCategory' => [
                        'ID' => 'E',
                        'TaxExemptionReason' => 'Exempt New Means of Transport',
                        'TaxScheme' => [
                            'ID' => 'OTH',
                            'schemeID' => 'UN/ECE 5153',
                            'schemeAgencyID' => '6'
                        ]
                    ]
                ]
            ],
            'Item' => [
                'Description' => 'Laptop Peripherals',
                'OriginCountry' => [
                    'IdentificationCode' => 'MYS'
                ],
                'CommodityClassifications' => [
                    [
                        'ItemClassificationCode' => '9800.00.0010',
                        'listID' => 'PTC'
                    ],
                    [
                        'ItemClassificationCode' => '003',
                        'listID' => 'CLASS'
                    ]
                ]
            ],
            'Price' => [
                'PriceAmount' => '17'
            ],
            'ItemPriceExtension' => [
                'Amount' => '100'
            ]
        ];

        $allowanceCharges = [];
        foreach ($data['AllowanceCharges'] as $allowanceCharge) {
            $allowanceCharges[] =
                Element::create(Schema::CAC->value.'AllowanceCharge',
                    Element::create(Schema::CBC->value.'ChargeIndicator', $allowanceCharge['ChargeIndicator'] ? 'true' : 'false'),
                    Element::create(Schema::CBC->value.'AllowanceChargeReason', $allowanceCharge['AllowanceChargeReason']),
                    Element::create(Schema::CBC->value.'MultiplierFactorNumeric', $allowanceCharge['MultiplierFactorNumeric']),
                    Element::create(Schema::CBC->value.'Amount', $allowanceCharge['Amount'])->props('currencyID '.$data['currencyID'])
                );
        }

        $taxTotal = [
            Element::create(Schema::CAC->value.'TaxTotal',
                Element::create(Schema::CBC->value.'TaxAmount', $data['TaxTotal']['TaxAmount'])->props('currencyID ' . $data['currencyID']),
                Element::create(Schema::CAC->value.'TaxSubtotal',
                    Element::create(Schema::CBC->value.'TaxableAmount', $data['TaxTotal']['TaxSubtotal']['TaxableAmount'])->props('currencyID ' . $data['currencyID']),
                    Element::create(Schema::CBC->value.'TaxAmount', $data['TaxTotal']['TaxSubtotal']['TaxAmount'])->props('currencyID ' . $data['currencyID']),
                    // Element::create(Schema::CBC->value.'BaseUnitMeasure', $data['TaxTotal']['TaxSubtotal']['BaseUnitMeasure'])->props('unitCode ' . $data['unitCode']),
                    // Element::create(Schema::CBC->value.'PerUnitAmount', $data['TaxTotal']['TaxSubtotal']['PerUnitAmount'])->props('currencyID ' . $data['currencyID']),
                    Element::create(Schema::CBC->value.'Percent', $data['TaxTotal']['TaxSubtotal']['Percent']),
                    Element::create(Schema::CAC->value.'TaxCategory',
                        Element::create(Schema::CBC->value.'ID', $data['TaxTotal']['TaxSubtotal']['TaxCategory']['ID']),
                        Element::create(Schema::CBC->value.'TaxExemptionReason', $data['TaxTotal']['TaxSubtotal']['TaxCategory']['TaxExemptionReason']),
                        Element::create(Schema::CAC->value.'TaxScheme',
                            Element::create(Schema::CBC->value.'ID', $data['TaxTotal']['TaxSubtotal']['TaxCategory']['TaxScheme']['ID'])->props(
                                'schemeID ' . $data['TaxTotal']['TaxSubtotal']['TaxCategory']['TaxScheme']['schemeID'],
                                'schemeAgencyID ' . $data['TaxTotal']['TaxSubtotal']['TaxCategory']['TaxScheme']['schemeAgencyID']
                            )
                        )
                    )
                )
            ),
        ];

        // for item
        $CommodityClassifications = [];
        foreach ($data['Item']['CommodityClassifications'] as $commodityClassification) {
            $CommodityClassifications[] =
                Element::create(Schema::CAC->value.'CommodityClassification',
                    Element::create(Schema::CBC->value.'ItemClassificationCode', $commodityClassification['ItemClassificationCode'])->props('listID ' . $commodityClassification['listID'])
                )
            ;
        }
        // for item end

        $item = [
            Element::create(Schema::CAC->value.'Item',
            Element::create(Schema::CBC->value.'Description', $data['Item']['Description']),
            Element::create(Schema::CAC->value.'OriginCountry',
                Element::create(Schema::CBC->value.'IdentificationCode', $data['Item']['OriginCountry']['IdentificationCode'])
            ),
            implode($CommodityClassifications),
            ),
        ];

        $price = [
            Element::create(Schema::CAC->value.'Price',
                Element::create(Schema::CBC->value.'PriceAmount', $data['Price']['PriceAmount'])->props('currencyID ' . $data['currencyID'])
            ),
        ];

        $itemPriceExtension = [
            Element::create(Schema::CAC->value.'ItemPriceExtension',
                Element::create(Schema::CBC->value.'Amount', $data['ItemPriceExtension']['Amount'])->props('currencyID ' . $data['currencyID'])
            )
        ];

        $elements = [
            Element::create(Schema::CAC->value.'InvoiceLine',
                Element::create(Schema::CBC->value.'ID', $data['ID']),
                Element::create(Schema::CBC->value.'InvoicedQuantity', $data['InvoicedQuantity'])->props('unitCode '.$data['unitCode']),
                Element::create(Schema::CBC->value.'LineExtensionAmount', $data['LineExtensionAmount'])->props('currencyID '.$data['currencyID']),
                implode($allowanceCharges),
                implode($taxTotal),
                implode($item),
                implode($price),
                implode($itemPriceExtension),
            ),
        ];

        return implode($elements);
    }
}
