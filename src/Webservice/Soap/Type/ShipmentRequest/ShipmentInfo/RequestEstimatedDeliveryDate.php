<?php

namespace Dhl\Express\Webservice\Soap\Type\ShipmentRequest\ShipmentInfo;

use Dhl\Express\Webservice\Soap\Type\Common\YesNo;

class RequestEstimatedDeliveryDate extends YesNo
{
    /**
     * DHL's service commitment as quoted at booking/shipment creation. QDDC
     * builds in clearance time, and potentially other special operational non-transport component(s),
     * when relevant.
     */
    const TYPE_QDDC = "QDDC";

    /**
     * the fastest ("docs") transit time as quoted to the customer at booking or shipment
     * creation. When clearance or any other non-transport operational component is expected to impact
     * transit time, QDDF does not constitute DHL's service commitment.
     */
    const TYPE_QDDF = "QDDF";
}