<?php

namespace Boolxy\Trendyol\Requests\ClaimService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class ApproveClaimLineItems extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_PUT;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'claims/$claimId/items/approve';
    }
}
