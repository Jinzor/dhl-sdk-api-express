<?php

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

use Dhl\Express\Webservice\Soap\Type\Common\Billing;
use Dhl\Express\Webservice\Soap\Type\Common\UnitOfMeasurement;
use Dhl\Express\Webservice\Soap\Type\PickupRequest\ShipmentInfo\ServiceType;

class ShipmentInfo
{

    /**
     * The Billing structure functions as a more robust alternative to the single Account field, and allows
     * for using a payer account different than the shipper account (to allow for bill-to receiver or bill-to
     * third party). The web service requester should use either the Account field or the Billing structure
     * to communicate account information, and DHL recommends the Billing structure.
     *
     * @var null|Billing
     */
    private $Billing;

    /**
     * The shipping product requested for this shipment, corresponding to the DHL Global Product codes.
     *
     * @var ServiceType
     */
    private $ServiceType;

    /**
     * The UnitOfMeasurement node conveys the unit of measurements used in the operation. This single value
     * corresponds to the units of weight and measurement which are used throughout the message processing.
     * The value of ‘SI’ corresponds to KG and CM, respectively, while the value of ‘SU’ corresponds to
     * LB and IN, respectively.
     *
     * @var UnitOfMeasurement
     */
    private $UnitOfMeasurement;

}