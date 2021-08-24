<?php

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

use Dhl\Express\Webservice\Soap\Type\Common\AlphaNumeric;

class SpecialPickupInstruction extends AlphaNumeric
{
    const MAX_LENGTH = 75;
}