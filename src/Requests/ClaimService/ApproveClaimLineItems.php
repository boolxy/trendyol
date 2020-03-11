<?php

namespace BoolXY\Trendyol\Requests\ClaimService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class ApproveClaimLineItems extends AbstractRequest implements IRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return self::METHOD_PUT;
    }

    /**
     * @inheritDoc
     */
    public function getPathPattern(): string
    {
        return 'claims/$claimId/items/approve';
    }
}
