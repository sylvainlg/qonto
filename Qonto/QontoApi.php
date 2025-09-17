<?php

namespace neyric\Qonto;

use neyric\Qonto\ApiResource\ApiExternalTransfers;
use neyric\Qonto\Core\ApiClient;
use neyric\Qonto\Core\ApiSerializer;

use neyric\Qonto\ApiResource\ApiAttachments;
use neyric\Qonto\ApiResource\ApiLabels;
use neyric\Qonto\ApiResource\ApiMemberships;
use neyric\Qonto\ApiResource\ApiOrganizations;
use neyric\Qonto\ApiResource\ApiTransactions;

class QontoApi
{
    public string $login;

    public string $secretKey;

    public string $baseUrl;

    /**
     * @var ApiClient
     */
    public ApiClient $client;

    /**
     * @var ApiSerializer
     */
    public ApiSerializer $serializer;

    /**
     * @var ApiAttachments
     */
    public ApiAttachments $Attachments;

    /**
     * @var ApiLabels
     */
    public ApiLabels $Labels;

    /**
     * @var ApiMemberships
     */
    public ApiMemberships $Memberships;

    /**
     * @var ApiOrganizations
     */
    public ApiOrganizations $Organizations;

    /**
     * @var ApiTransactions
     */
    public ApiTransactions $Transactions;

    /**
     * @var ApiExternalTransfers
     */
    public ApiExternalTransfers $ExternalTransers;


    public function __construct(string $login, string $secretKey, string $baseUrl = 'https://thirdparty.qonto.com/v2') {
        $this->login  = $login;
        $this->secretKey = $secretKey;
        $this->baseUrl = $baseUrl;

        // utils for ApiResource (hosted on main Api object so they 
        // are instantiated only once, and not once per resource)
        $this->client = new ApiClient($login, $secretKey, $baseUrl);
        $this->serializer = new ApiSerializer();

        // Api resources
        $this->Attachments = new ApiAttachments($this);
        $this->Labels = new ApiLabels($this);
        $this->Memberships = new ApiMemberships($this);
        $this->Organizations = new ApiOrganizations($this);
        $this->Transactions = new ApiTransactions($this);
        $this->ExternalTransers = new ApiExternalTransfers($this);
    }

}
