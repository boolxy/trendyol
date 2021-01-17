<?php

namespace Boolxy\Trendyol\Requests\ClaimService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class CreateClaimIssue extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'claims/$claimId/issue?claimIssueReasonId=$claimIssueReasonId&'.
            'claimItemIdList=$claimItemIdList&description=$description';
    }
}
