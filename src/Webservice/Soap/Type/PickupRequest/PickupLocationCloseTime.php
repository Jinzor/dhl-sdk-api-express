<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

/**
 * This node identifies the closing time of your pickup location in local time.
 * It needs to be provided in the following 24-hours time format: HH:mm
 */
class PickupLocationCloseTime extends \Dhl\Express\Webservice\Soap\Type\ShipmentRequest\PickupLocationCloseTime
{
    const FORMAT = 'H:i';
}
