<?php

namespace App\SampleData;

use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DocumentSampleJson
{
    public function getSampleData($invoiceNumber, $supplier, $buyer)
    {
        $faker = Faker::create();

        // Sample Data
        $date = date('Y-m-d', strtotime('-5 minutes'));
        $time = date('H:i:s\Z', strtotime('-5 minutes'));

        $json = [
            "_D" => "urn:oasis:names:specification:ubl:schema:xsd:Invoice-2",
            "_A" => "urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2",
            "_B" => "urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2",
            "Invoice" => [
                [
                    "ID" => [
                        [
                            "_" => $invoiceNumber
                        ]
                    ],
                    "IssueDate" => [
                        [
                            "_" => $date
                        ]
                    ],
                    "IssueTime" => [
                        [
                            "_" => $time
                        ]
                    ],
                    "InvoiceTypeCode" => [
                        [
                            "_" => "01",
                            "listVersionID" => "1.0"
                        ]
                    ],
                    // / ubl:Invoice / cbc:DocumentCurrencyCode**
                    "DocumentCurrencyCode" => [
                        [
                            "_" => "MYR"
                        ]
                    ],
                    // Billing Period - (e.g., Daily, Weekly, Biweekly, Monthly, Bimonthly, Quarterly, Half-yearly, Yearly, Others / Not Applicable)
                    "InvoicePeriod" => [
                        [
                            "StartDate" => [
                                [
                                    "_" => $date
                                ]
                            ],
                            "EndDate" => [
                                [
                                    "_" => $date
                                ]
                            ],
                            "Description" => [
                                [
                                    "_" => "Daily"
                                ]
                            ]
                        ]
                    ],
                    "BillingReference" => [
                        [
                            "AdditionalDocumentReference" => [
                                [
                                    "ID" => [
                                        [
                                            "_" => $invoiceNumber
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],

                    "AccountingSupplierParty" => [
                        [
                            "Party" => [
                                [
                                    "IndustryClassificationCode" => [
                                        [
                                            "_" => "47912",
                                            "name" => "Retail sale of any kind of product over the Internet"
                                        ]
                                    ],
                                    "PartyIdentification" => [
                                        [
                                            "ID" => [
                                                [
                                                    "_" => $supplier['TIN'],
                                                    "schemeID" => "TIN"
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => $supplier['TINValue'],
                                                    "schemeID" => $supplier['TINType']
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => "NA",
                                                    "schemeID" => "SST"
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => "NA",
                                                    "schemeID" => "TTX"
                                                ]
                                            ]
                                        ]
                                    ],

                                    "PostalAddress" => [
                                        [
                                            "CityName" => [
                                                [
                                                    "_" => $supplier['City']
                                                ]
                                            ],
                                            "CountrySubentityCode" => [
                                                [
                                                    "_" => "01"
                                                ]
                                            ],
                                            "AddressLine" => [
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => $supplier['Address']
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => "NA"
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => "NA"
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "Country" => [
                                                [
                                                    "IdentificationCode" => [
                                                        [
                                                            "_" => "MYS",
                                                            "listID" => "ISO3166-1",
                                                            "listAgencyID" => "6"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    "PartyLegalEntity" => [
                                        [
                                            "RegistrationName" => [
                                                [
                                                    "_" => $supplier['BusinessName']
                                                ]
                                            ]
                                        ]
                                    ],
                                    "Contact" => [
                                        [
                                            "Telephone" => [
                                                [
                                                    "_" => $supplier['Telephone']
                                                ]
                                            ],
                                            "ElectronicMail" => [
                                                [
                                                    "_" => $supplier['ElectronicMail']
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    "AccountingCustomerParty" => [
                        [
                            "Party" => [
                                [
                                    "PartyIdentification" => [
                                        [
                                            "ID" => [
                                                [
                                                    "_" => $buyer['TIN'],
                                                    "schemeID" => "TIN"
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => $buyer['TINValue'],
                                                    "schemeID" => $buyer['TINType']
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => "NA",
                                                    "schemeID" => "SST"
                                                ]
                                            ]
                                        ],
                                        [
                                            "ID" => [
                                                [
                                                    "_" => "NA",
                                                    "schemeID" => "TTX"
                                                ]
                                            ]
                                        ]
                                    ],
                                    "PostalAddress" => [
                                        [
                                            "CityName" => [
                                                [
                                                    "_" => $buyer['City']
                                                ]
                                            ],
                                            "CountrySubentityCode" => [
                                                [
                                                    "_" => "01"
                                                ]
                                            ],
                                            "AddressLine" => [
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => $buyer['Address']
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => "NA"
                                                        ]
                                                    ]
                                                ],
                                                [
                                                    "Line" => [
                                                        [
                                                            "_" => "NA"
                                                        ]
                                                    ]
                                                ]
                                            ],
                                            "Country" => [
                                                [
                                                    "IdentificationCode" => [
                                                        [
                                                            "_" => "MYS",
                                                            "listID" => "ISO3166-1",
                                                            "listAgencyID" => "6"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    "PartyLegalEntity" => [
                                        [
                                            "RegistrationName" => [
                                                [
                                                    "_" => $buyer['BusinessName']
                                                ]
                                            ]
                                        ]
                                    ],
                                    "Contact" => [
                                        [
                                            "Telephone" => [
                                                [
                                                    "_" => $buyer['Telephone']
                                                ]
                                            ],
                                            "ElectronicMail" => [
                                                [
                                                    "_" => $buyer['ElectronicMail']
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],

                    "TaxTotal" => [
                        [
                            // Total Tax Amount**
                            "TaxAmount" => [
                                [
                                    "_" => 3.5,
                                    "currencyID" => "MYR"
                                ]
                            ],
                            // Rounding Amount
                            "TaxSubtotal" => [
                                [
                                    // Total Taxable Amount Per Tax Type
                                    "TaxableAmount" => [
                                        [
                                            "_" => 40.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ],
                                    // Total Tax Amount Per Tax Type**
                                    "TaxAmount" => [
                                        [
                                            "_" => 4.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ],

                                    // Details of Tax Exemption (Invoice level tax exemption)~
                                    // Amount Exempted from Tax (Invoice level tax exemption)~
                                    // Tax Type**
                                    "TaxCategory" => [
                                        [
                                            "ID" => [
                                                [
                                                    "_" => "01"
                                                ]
                                            ],
                                            "TaxScheme" => [
                                                [
                                                    "ID" => [
                                                        [
                                                            "_" => "OTH",
                                                            "schemeID" => "UN/ECE 5153",
                                                            "schemeAgencyID" => "6"
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ],
                                    // Invoice Additional Discount Amount
                                    // Invoice Additional Fee Amount
                                ]
                            ]
                        ]
                    ],

                    // Total Excluding Tax**
                    "LegalMonetaryTotal" => [
                        [
                            // Total Net Amount
                            "LineExtensionAmount" => [
                                [
                                "_" => 40.0,
                                "currencyID" => "MYR"
                                ]
                            ],
                            // Total Excluding Tax**
                            "TaxExclusiveAmount" => [
                                [
                                "_" => 40.0,
                                "currencyID" => "MYR"
                                ]
                            ],
                            // Total Including Tax**
                            "TaxInclusiveAmount" => [
                                [
                                "_" => 44.0,
                                "currencyID" => "MYR"
                                ]
                            ],
                            // Total Discount Value
                            "AllowanceTotalAmount" => [
                                [
                                "_" => 5.0,
                                "currencyID" => "MYR"
                                ]
                            ],
                            // Total Payable Amount**
                            "PayableAmount" => [
                                [
                                "_" => 44.0,
                                "currencyID" => "MYR"
                                ]
                            ],

                            // Total Fee / Charge Amount
                            //
                        ]
                    ],

                    // Invoice Line
                    "InvoiceLine" => [
                        [
                            "ID" => [
                                [
                                    "_" => "01"
                                ]
                            ],
                            "InvoicedQuantity" => [
                                [
                                    "_" => 2.0,
                                    "unitCode" => "H87" // piece https://sdk.myinvois.hasil.gov.my/codes/unit-types/
                                ]
                            ],
                            "LineExtensionAmount" => [
                                [
                                    "_" => 40.0,
                                    "currencyID" => "MYR"
                                ]
                            ],
                            // Discount
                            "AllowanceCharge" => [
                                [
                                    // Discount Rate
                                    "ChargeIndicator" => [
                                        [
                                            "_" => false
                                        ]
                                    ],
                                    "MultiplierFactorNumeric" => [
                                        [
                                            "_" => 1.0
                                        ]
                                    ],
                                    // Discount Amount
                                    "Amount" => [
                                        [
                                            "_" => 5.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ],
                                    "AllowanceChargeReason" => [
                                        [
                                            "_" => "Item Discount"
                                        ]
                                    ],
                                ]
                            ],
                            "TaxTotal" => [
                                [
                                    "TaxAmount" => [
                                        [
                                            "_" => 4.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ],
                                    "TaxSubtotal" => [
                                        [
                                            // Mandatory if tax exemption is applicable
                                            "TaxableAmount" => [
                                                [
                                                    "_" => 35.0,
                                                    "currencyID" => "MYR"
                                                ]
                                            ],
                                            "TaxAmount" => [
                                                [
                                                    "_" => 3.5,
                                                    "currencyID" => "MYR"
                                                ]
                                            ],
                                            "TaxCategory" => [
                                                [
                                                    "ID" => [
                                                        [
                                                            "_" => "01"
                                                        ]
                                                    ],
                                                    "Percent" => [
                                                        [
                                                            "_" => 10.0
                                                        ]
                                                    ],
                                                    "TaxScheme" => [
                                                        [
                                                            "ID" => [
                                                                [
                                                                    "_" => "OTH",
                                                                    "schemeID" => "UN/ECE 5153",
                                                                    "schemeAgencyID" => "6"
                                                                ]
                                                            ]
                                                        ]
                                                    ],
                                                ],
                                            ],
                                        ]
                                    ],
                                ]
                            ],
                            "Item" => [
                                [
                                    "CommodityClassification" => [
                                        [
                                            "ItemClassificationCode" => [
                                                [
                                                    "_" => "008",
                                                    "listID" => "CLASS"
                                                ]
                                            ]
                                        ]
                                    ],
                                    "Description" => [
                                        [
                                            "_" => $faker->ean13
                                        ]
                                    ]
                                ]
                            ],
                            "Price" => [
                                [
                                    "PriceAmount" => [
                                        [
                                            "_" => 20.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ]
                                ]
                            ],

                            "ItemPriceExtension" => [
                                [
                                    "Amount" => [
                                        [
                                            "_" => 40.0,
                                            "currencyID" => "MYR"
                                        ]
                                    ]
                                ]
                            ],


                        ]
                    ],

                    // Signature
                    // "Signature" => [
                    //     [
                    //         "_" => "urn:oasis:names:specification:ubl:signature:Invoice",
                    //         "SignatureMethod" => "urn:oasis:names:specification:ubl:dsig:enveloped:xades",
                    //     ]
                    // ],

                    // / ubl:Invoice / cbc:TaxCurrencyCode (Optional)~
                    // "TaxCurrencyCode" => [
                    //     [
                    //         "_" => "MYR"
                    //     ]
                    // ],
                    // Exchange Rate


                    // Payment Mode
                    // Supplier’s Bank Account Number
                    // Payment Terms
                    // PrePayment Amount
                    // PrePayment Date
                    // PrePayment Time
                    // PrePayment Reference Number
                    // Bill Reference Number


                    //

                    // Shipping Recipient’s Name
                    // Shipping Recipient’s Address
                    // Shipping Recipient’s TIN
                    // Shipping Recipient’s Registration Number
                    // Reference Number of Customs Form No.1, 9, etc.
                    // Incoterms
                    // Free Trade Agreement (FTA) Information [For export only, if applicable]
                    // Authorisation Number for Certified Exporter (e.g., ATIGA number) [For export only, if applicable]
                    // Reference Number of Customs Form No.2
                    // Details of other charges
                ]
            ]
        ];

        return $json;
    }
}
