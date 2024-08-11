<?php

namespace App\Http\Integrations\eInvoice;

use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\AuthorizationCodeGrant;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Helpers\OAuth2\OAuthConfig;

use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class Sandbox extends Connector
{
    // use AuthorizationCodeGrant;
    use AcceptsJson;
    use ClientCredentialsGrant;

    public readonly string $clientId;
    public readonly string $clientSecret;

    public function __construct($clientId, $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * The Base URL of the API.
     */
    public function resolveBaseUrl(): string
    {
        return 'https://preprod-api.myinvois.hasil.gov.my';
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setClientId($this->clientId)
            ->setClientSecret($this->clientSecret)
            ->setDefaultScopes(['InvoicingAPI'])
            ->setTokenEndpoint('/connect/token');
    }
}
