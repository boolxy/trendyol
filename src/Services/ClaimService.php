<?php

namespace Boolxy\Trendyol\Services;

use Boolxy\Trendyol\Abstracts\AbstractService;
use Boolxy\Trendyol\Builders\ApproveClaimLineItemsRequestBuilder;
use Boolxy\Trendyol\Builders\CreateClaimIssueRequestBuilder;
use Boolxy\Trendyol\Builders\GetClaimsRequestBuilder;
use Boolxy\Trendyol\Interfaces\IService;
use Boolxy\Trendyol\Requests\ClaimService\GetClaimsIssueReasons;

class ClaimService extends AbstractService implements IService
{
    /**
     * @return GetClaimsRequestBuilder
     */
    public function gettingClaims(): GetClaimsRequestBuilder
    {
        return new GetClaimsRequestBuilder($this->requestManager);
    }

    /**
     * @return ApproveClaimLineItemsRequestBuilder
     */
    public function approvingClaimLineItems(): ApproveClaimLineItemsRequestBuilder
    {
        return new ApproveClaimLineItemsRequestBuilder($this->requestManager);
    }

    /**
     * @return mixed
     */
    public function getClaimsIssueReasons()
    {
        $request = GetClaimsIssueReasons::create();

        return $this->requestManager->process($request);
    }

    /**
     * @return CreateClaimIssueRequestBuilder
     */
    public function creatingClaimIssue(): CreateClaimIssueRequestBuilder
    {
        return new CreateClaimIssueRequestBuilder($this->requestManager);
    }
}
