<?php

namespace BoolXY\Trendyol\Requests\ClaimService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class CreateClaimIssue extends AbstractRequest implements IRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * @inheritDoc
     */
    public function getPathPattern(): string
    {
        return 'claims/$claimId/issue?claimIssueReasonId=$claimIssueReasonId&'.
            'claimItemIdList=$claimItemIdList&description=$description';
    }
}
