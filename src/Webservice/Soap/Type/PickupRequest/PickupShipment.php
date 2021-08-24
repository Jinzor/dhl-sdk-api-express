<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

use Dhl\Express\Webservice\Soap\Type\Common\Billing;
use Dhl\Express\Webservice\Soap\Type\Common\UnitOfMeasurement;
use Dhl\Express\Webservice\Soap\Type\RateRequest\Ship;

/**
 * The requested shipment.
 *
 * @api
 */
class PickupShipment
{

    /**
     * The shipment info section.
     *
     * @var ShipmentInfo
     */
    private $ShipmentInfo;

    /**
     * @var PickupTimestamp
     */
    private $PickupTimestamp;

    /**
     * @var PickupLocationCloseTime
     */
    private $PickupLocationCloseTime;

    /**
     * @var $SpecialPickupInstruction
     */
    private $SpecialPickupInstruction;

    /**
     * @var PickupLocation
     */
    private $PickupLocation;

    /**
     * @var InternationalDetail
     */
    private $InternationalDetail;

    /**
     * @var Ship
     */
    private $Ship;

    /**
     * @var Packages
     */
    private $Packages;

    /**
     * Constructor.
     *
     * @throws \Exception
     */
    public function __construct(
        $pickupTimestamp,
        $pickupLocation,
        $specialPickupInstruction,
        Ship $ship,
        Packages $packages,
        $unitOfMeasurement
    )
    {
        $this->setPickupTimestamp($pickupTimestamp)
            ->setPickupLocation($pickupLocation)
            ->setSpecialPickupInstruction($specialPickupInstruction)
            ->setShip($ship)
            ->setPackages($packages)
            ->setUnitOfMeasurement($unitOfMeasurement);
    }

    /**
     * Returns the next business day.
     *
     * @return null|NextBusinessDay
     */
    public function getNextBusinessDay()
    {
        return $this->NextBusinessDay;
    }

    /**
     * Sets the next business day.
     *
     * @param string|bool $nextBusinessDay The next business day (either Y/N or true/false)
     *
     * @return self
     */
    public function setNextBusinessDay($nextBusinessDay)
    {
        $this->NextBusinessDay = new NextBusinessDay($nextBusinessDay);
        return $this;
    }

    /**
     * Returns the ship section.
     *
     * @return Ship
     */
    public function getShip()
    {
        return $this->Ship;
    }

    /**
     * Sets the ship section.
     *
     * @param Ship $ship The ship section
     *
     * @return self
     */
    public function setShip(Ship $ship)
    {
        $this->Ship = $ship;
        return $this;
    }

    /**
     * Returns the packages section.
     *
     * @return Packages
     */
    public function getPackages()
    {
        return $this->Packages;
    }

    /**
     * Sets the packages section.
     *
     * @param Packages $packages The packages
     *
     * @return self
     */
    public function setPackages(Packages $packages)
    {
        $this->Packages = $packages;
        return $this;
    }

    /**
     * Returns the ship timestamp.
     *
     * @return PickupTimestamp
     */
    public function getPickupTimestamp()
    {
        return $this->PickupTimestamp;
    }

    /**
     * Sets the ship timestamp.
     *
     * @param int|string|\DateTime $pickupTimestamp The pickup timestamp (int timestamp, date string or \DateTime instance)
     *
     * @return self
     * @throws \Exception
     */
    public function setPickupTimestamp($pickupTimestamp)
    {
        if (!$pickupTimestamp instanceof PickupTimestamp) {
            $pickupTimestamp = new PickupTimestamp($pickupTimestamp);
        }
        $this->PickupTimestamp = $pickupTimestamp;
        return $this;
    }

    public function getPickupLocation()
    {
        return $this->PickupLocation;
    }

    public function setPickupLocation($pickupLocation)
    {
        $this->PickupLocation = new PickupLocation($pickupLocation);
        return $this;
    }

    /**
     * Returns the unit of measurement.
     *
     * @return UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->UnitOfMeasurement;
    }

    /**
     * Sets the unit of measurement.
     *
     * @param string $unitOfMeasurement The unit of measurement
     *
     * @return self
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->UnitOfMeasurement = new UnitOfMeasurement($unitOfMeasurement);
        return $this;
    }

    /**
     * Returns the billing section.
     *
     * @return null|Billing
     */
    public function getBilling()
    {
        return $this->Billing;
    }

    /**
     * Sets the billing section.
     *
     * @param Billing $billing The billing section
     *
     * @return self
     */
    public function setBilling(Billing $billing)
    {
        $this->Billing = $billing;
        return $this;
    }

    public function getSpecialPickupInstruction()
    {
        return $this->SpecialPickupInstruction;
    }

    private function setSpecialPickupInstruction($specialPickupInstruction)
    {
        $this->SpecialPickupInstruction = new SpecialPickupInstruction($specialPickupInstruction);
        return $this;
    }
}
