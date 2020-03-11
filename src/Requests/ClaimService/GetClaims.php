<?php

namespace BoolXY\Trendyol\Requests\ClaimService;

use BoolXY\Trendyol\Abstracts\AbstractRequest;
use BoolXY\Trendyol\Interfaces\IRequest;

class GetClaims extends AbstractRequest implements IRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * @inheritDoc
     */
    public function getPathPattern(): string
    {
        return 'suppliers/$supplierId/claims?claimItemStatus=$status&cargoTrackingNumber=$cargoTrackingNumber'.
            '&cargoSenderNumber=$cargoSenderNumber&cargoTrackingLink=$cargoTrackingLink';
    }
}
