<?php
/**
 * See LICENSE.md for license details.
 */
namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

use Dhl\Express\Webservice\Soap\Type\Common\ShipTimestamp;

/**
 * This node provides information on where the package should be picked up by DHL courier.
 *
 * @api
 * @author   Rico Sonntag <rico.sonntag@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class PickupTimestamp extends ShipTimestamp
{
    /**
     * Output format.
     */
    const FORMAT = 'Y-m-d\TH:i:s \G\M\TP';
}
