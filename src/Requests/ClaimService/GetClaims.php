<?php

namespace Boolxy\Trendyol\Requests\ClaimService;

use Boolxy\Trendyol\Abstracts\AbstractRequest;
use Boolxy\Trendyol\Interfaces\IRequest;

class GetClaims extends AbstractRequest implements IRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/claims?claimItemStatus=$status&cargoTrackingNumber=$cargoTrackingNumber'.
            '&cargoSenderNumber=$cargoSenderNumber&cargoTrackingLink=$cargoTrackingLink';
    }
}
