<?php

namespace BoolXY\Trendyol\Builders;

use BoolXY\Trendyol\Abstracts\AbstractRequestBuilder;
use BoolXY\Trendyol\Interfaces\IRequestBuilder;
use BoolXY\Trendyol\RequestManager;
use BoolXY\Trendyol\Requests\ClaimService\CreateClaimIssue;

class CreateClaimIssueRequestBuilder extends AbstractRequestBuilder implements IRequestBuilder
{
    /**
     * CreateClaimIssueRequestBuilder constructor.
     *
     * @param RequestManager $requestManager
     */
    public function __construct(RequestManager $requestManager)
    {
        parent::__construct($requestManager);

        $this->setRequest(new CreateClaimIssue());
    }

    /**
     * @param string $claimId
     *
     * @return $this
     */
    public function setClaimId(string $claimId): self
    {
        $this->request->addQueryParam('claimId', $claimId);

        return $this;
    }

    /**
     * @param int $claimIssueReasonId
     *
     * @return $this
     */
    public function setClaimIssueReasonId(int $claimIssueReasonId): self
    {
        $this->request->addQueryParam('claimIssueReasonId', $claimIssueReasonId);

        return $this;
    }

    /**
     * @param string $claimItemIdList
     *
     * @return $this
     */
    public function setClaimItemIdList(string $claimItemIdList): self
    {
        $this->request->addQueryParam('claimItemIdList', $claimItemIdList);

        return $this;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function addFile(string $path): self
    {
        $this->request->addMultipart([
            'name'     => basename($path),
            'contents' => fopen($path, 'r'),
        ]);

        return $this;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->process();
    }
}
