<?php

namespace BoolXY\Trendyol\Services;

use BoolXY\Trendyol\Abstracts\AbstractService;
use BoolXY\Trendyol\Builders\ApproveClaimLineItemsRequestBuilder;
use BoolXY\Trendyol\Builders\CreateClaimIssueRequestBuilder;
use BoolXY\Trendyol\Builders\GetClaimsRequestBuilder;
use BoolXY\Trendyol\Interfaces\IService;
use BoolXY\Trendyol\Requests\ClaimService\GetClaimsIssueReasons;

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
