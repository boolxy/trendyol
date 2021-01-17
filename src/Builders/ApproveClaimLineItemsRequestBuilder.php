<?php

namespace Boolxy\Trendyol\Builders;

use Boolxy\Trendyol\Abstracts\AbstractRequestBuilder;
use Boolxy\Trendyol\Interfaces\IRequestBuilder;
use Boolxy\Trendyol\RequestManager;
use Boolxy\Trendyol\Requests\ClaimService\ApproveClaimLineItems;

class ApproveClaimLineItemsRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * ApproveClaimLineItemsRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(new ApproveClaimLineItems([], [
            'params' => [],
        ]));
    }

    /**
     * @param int $claimId
     *
     * @return $this
     */
    public function setClaimId(int $claimId): self
    {
        $this->request->addQueryParam('claimId', $claimId);

        return $this;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function addClaimItemId(string $id): self
    {
        $this->request->addData('claimLineItemIdList', $id, true);

        return $this;
    }

    /**
     * @return mixed
     */
    public function approve()
    {
        return $this->process();
    }
}
