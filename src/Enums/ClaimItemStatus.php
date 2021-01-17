<?php

namespace Boolxy\Trendyol\Enums;

use Boolxy\Trendyol\Abstracts\AbstractEnum;
use Boolxy\Trendyol\Interfaces\IEnum;

final class ClaimItemStatus extends AbstractEnum implements IEnum
{
    const CREATED = 'Created';

    const WAITING_IN_ACTION = 'WaitingInAction';

    const ACCEPTED = 'Accepted';

    const REJECTED = 'Rejected';

    const CANCELLED = 'Cancelled';

    const UNRESOLVED = 'Unresolved';
}
