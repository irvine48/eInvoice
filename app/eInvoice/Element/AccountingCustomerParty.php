<?php

namespace App\eInvoice\Element;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;
use Eightfold\XMLBuilder\Cdata;

use App\Enums\Schema;

class AccountingCustomerParty
{
    public static function add($pass_data)
    {
        $data = [
            'TIN_type' => $pass_data['TINType'],
            'partyIdentification' => [
                'TIN' => $pass_data['TIN'],
                'TYPE' => $pass_data['TINValue'],
                'SST' => 'NA',
                'TTX' => 'NA'
            ],
            'postalAddress' => [
                'cityName' => 'Kuala Lumpur',
                'postalZone' => '50480',
                'countrySubentityCode' => '14',
                'addressLines' => [
                    'Lot 66',
                    'Bangunan Merdeka',
                    'Persiaran Jaya'
                ],
                'country' => [
                    'identificationCode' => 'MYS'
                ]
            ],
            'partyLegalEntity' => [
                'registrationName' => "Buyer's Name"
            ],
            'contact' => [
                'telephone' => '60123456780',
                'electronicMail' => $pass_data['ElectronicMail']
            ]
        ];

        $elements = [
            Element::create(Schema::CAC->value.'AccountingCustomerParty',
                // Element::create(Schema::CBC->value.'AdditionalAccountID', $data['additionalAccountID'])->props('schemeAgencyName CertEX'),
                Element::create(Schema::CAC->value.'Party',
                    // Element::create(Schema::CBC->value.'IndustryClassificationCode', $data['industryClassificationCode'])->props('name Wholesale of computer hardware, software and peripherals'),
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['partyIdentification']['TIN'])
                            ->props('schemeID TIN')
                    ),
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['partyIdentification']['TYPE'])
                            ->props('schemeID '.$data['TIN_type'])
                    ),
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['partyIdentification']['SST'])
                            ->props('schemeID SST')
                    ),
                    Element::create(Schema::CAC->value.'PartyIdentification',
                        Element::create(Schema::CBC->value.'ID', $data['partyIdentification']['TTX'])
                            ->props('schemeID TTX')
                    ),
                    Element::create(Schema::CAC->value.'PostalAddress',
                        Element::create(Schema::CBC->value.'CityName', $data['postalAddress']['cityName']),
                        Element::create(Schema::CBC->value.'PostalZone', $data['postalAddress']['postalZone']),
                        Element::create(Schema::CBC->value.'CountrySubentityCode', $data['postalAddress']['countrySubentityCode']),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['postalAddress']['addressLines'][0])
                        ),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['postalAddress']['addressLines'][1])
                        ),
                        Element::create(Schema::CAC->value.'AddressLine',
                            Element::create(Schema::CBC->value.'Line', $data['postalAddress']['addressLines'][2])
                        ),
                        Element::create(Schema::CAC->value.'Country',
                            Element::create(Schema::CBC->value.'IdentificationCode', $data['postalAddress']['country']['identificationCode'])
                                ->props('listID ISO3166-1', 'listAgencyID 6')
                        )
                    ),
                    Element::create(Schema::CAC->value.'PartyLegalEntity',
                        Element::create(Schema::CBC->value.'RegistrationName', $data['partyLegalEntity']['registrationName'])
                    ),
                    Element::create(Schema::CAC->value.'Contact',
                        Element::create(Schema::CBC->value.'Telephone', $data['contact']['telephone']),
                        Element::create(Schema::CBC->value.'ElectronicMail', $data['contact']['electronicMail'])
                    )
                )
            ),
        ];

        return implode($elements);
    }
}
