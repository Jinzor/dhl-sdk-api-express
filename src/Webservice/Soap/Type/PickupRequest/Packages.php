<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

/**
 * The packages section details the weight and dimensions of the individual pieces of the shipment.
 * For example, the shipper may tender a single shipment with multiple pieces, and each piece may have a
 * distinct shipping label. In this context, a RequestedPackage node represents each individual piece,
 * and there is a limitation of 50 RequestedPackage nodes in the request.
 *
 * @api
 * @author   Rico Sonntag <rico.sonntag@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class Packages extends \Dhl\Express\Webservice\Soap\Type\RateRequest\Packages
{
}
