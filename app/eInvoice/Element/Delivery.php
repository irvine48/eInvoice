<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class Delivery
{
    public static function add($data)
    {
        // <cac:Delivery>
        // <cac:DeliveryParty>
        // <cac:PartyIdentification>
        // <cbc:ID schemeID="TIN">Recipient's TIN</cbc:ID>
        // </cac:PartyIdentification>
        // <cac:PartyIdentification>
        // <cbc:ID schemeID="BRN">Recipient's BRN</cbc:ID>
        // </cac:PartyIdentification>
        // <cac:PostalAddress>
        // <cbc:CityName>Kuala Lumpur</cbc:CityName>
        // <cbc:PostalZone>50480</cbc:PostalZone>
        // <cbc:CountrySubentityCode>14</cbc:CountrySubentityCode>
        // <cac:AddressLine>
        // <cbc:Line>Lot 66</cbc:Line>
        // </cac:AddressLine>
        // <cac:AddressLine>
        // <cbc:Line>Bangunan Merdeka</cbc:Line>
        // </cac:AddressLine>
        // <cac:AddressLine>
        // <cbc:Line>Persiaran Jaya</cbc:Line>
        // </cac:AddressLine>
        // <cac:Country>
        // <cbc:IdentificationCode listID="ISO3166-1" listAgencyID="6">MYS</cbc:IdentificationCode>
        // </cac:Country>
        // </cac:PostalAddress>
        // <cac:PartyLegalEntity>
        // <cbc:RegistrationName>Recipient's Name</cbc:RegistrationName>
        // </cac:PartyLegalEntity>
        // </cac:DeliveryParty>
        // <cac:Shipment>
        // <cbc:ID>1234</cbc:ID>
        // <cac:FreightAllowanceCharge>
        // <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        // <cbc:AllowanceChargeReason>Service charge</cbc:AllowanceChargeReason>
        // <cbc:Amount currencyID="MYR">100</cbc:Amount>
        // </cac:FreightAllowanceCharge>
        // </cac:Shipment>
        // </cac:Delivery>

        $defaultSample = [
            'TIN' => 'Recipient\'s TIN',
            'BRN' => 'Recipient\'s BRN',

            'cityName' => 'Kuala Lumpur',
            'postalZone' => '50480',
            'countrySubentityCode' => '14',
            'addressLine' => [
                'Lot 66',
                'Bangunan Merdeka',
                'Persiaran Jaya',
            ],
            'identificationCode' => 'MYS',

            'registrationName' => 'Recipient\'s Name',

            'shipmentId' => '1234',
            'chargeIndicator' => 'true',
            'allowanceChargeReason' => 'Service charge',
            'amount' => '100',
        ];

        if ($data === null) {
            $data['TIN'] = $data['TIN'] ?? $defaultSample['TIN'];
            $data['BRN'] = $data['BRN'] ?? $defaultSample['BRN'];
            $data['cityName'] = $data['cityName'] ?? $defaultSample['cityName'];
            $data['postalZone'] = $data['postalZone'] ?? $defaultSample['postalZone'];
            $data['countrySubentityCode'] = $data['countrySubentityCode'] ?? $defaultSample['countrySubentityCode'];
            $data['addressLine'] = $data['addressLine'] ?? $defaultSample['addressLine'];
            $data['identificationCode'] = $data['identificationCode'] ?? $defaultSample['identificationCode'];
            $data['registrationName'] = $data['registrationName'] ?? $defaultSample['registrationName'];
            $data['shipmentId'] = $data['shipmentId'] ?? $defaultSample['shipmentId'];
            $data['chargeIndicator'] = $data['chargeIndicator'] ?? $defaultSample['chargeIndicator'];
            $data['allowanceChargeReason'] = $data['allowanceChargeReason'] ?? $defaultSample['allowanceChargeReason'];
            $data['amount'] = $data['amount'] ?? $defaultSample['amount'];
        }

        $elements = [
            Element::create(Schema::CAC->value.'Delivery',
                Element::create(Schema::CAC->value.'DeliveryParty',
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['TIN'])->props('schemeID TIN')
                    ),
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['BRN'])->props('schemeID BRN')
                    ),
                    Element::create(Schema::CAC->value.'PostalAddress',
                        Element::create(Schema::CBC->value.'CityName', $data['cityName']),
                        Element::create(Schema::CBC->value.'PostalZone', $data['postalZone']),
                        Element::create(Schema::CBC->value.'CountrySubentityCode', $data['countrySubentityCode']),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['addressLine'][0])
                        ),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['addressLine'][1])
                        ),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['addressLine'][2])
                        ),
                        Element::create(Schema::CAC->value.'Country',
                            Element::create(Schema::CBC->value.'IdentificationCode', $data['identificationCode'])->props('listID ISO3166-1', 'listAgencyID 6')
                        )
                    ),
                    Element::create(Schema::CAC->value.'PartyLegalEntity',
                        Element::create(Schema::CBC->value.'RegistrationName', $data['registrationName'])
                    )
                ),
                Element::create(Schema::CAC->value.'Shipment',
                    Element::create(Schema::CBC->value.'ID', $data['shipmentId']),
                    Element::create(Schema::CAC->value.'FreightAllowanceCharge',
                        Element::create(Schema::CBC->value.'ChargeIndicator', $data['chargeIndicator']),
                        Element::create(Schema::CBC->value.'AllowanceChargeReason', $data['allowanceChargeReason']),
                        Element::create(Schema::CBC->value.'Amount', $data['amount'])->props('currencyID MYR')
                    )
                )
            )
        ];

        return implode($elements);
    }
}
