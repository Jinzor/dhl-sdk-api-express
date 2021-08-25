<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\RequestBuilder;

use Dhl\Express\Api\RequestPickupBuilderInterface;
use Dhl\Express\Model\RateRequest;
use Dhl\Express\Model\Request\Insurance;
use Dhl\Express\Model\Request\Rate\Package;
use Dhl\Express\Model\Request\Rate\ShipmentDetails;
use Dhl\Express\Model\Request\Rate\ShipperAddress;
use Dhl\Express\Model\Request\Recipient;
use Dhl\Express\Model\Request\Shipment\Shipper;
use Dhl\Express\Traits\NormalizeUom;

/**
 * Rate Request Builder.
 *
 * @author   Ronny Gertler <ronny.gertler@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class PickupRequestBuilder implements RequestPickupBuilderInterface
{
    /**
     * The collected data used to build the rate request.
     *
     * @var array
     */
    private $data = [];

    use NormalizeUom;

    public function build() {
        // Build shipper
        $shipper = new Shipper(
            $this->data['shipper']['countryCode'],
            $this->data['shipper']['postalCode'],
            $this->data['shipper']['city'],
            $this->data['shipper']['streetLines'],
            $this->data['shipper']['name'],
            $this->data['shipper']['company'],
            $this->data['shipper']['phone'],
            $this->data['shipper']['email']
        );

        // Build recipient
        $recipient = new Recipient(
            $this->data['recipient']['countryCode'],
            $this->data['recipient']['postalCode'],
            $this->data['recipient']['city'],
            $this->data['recipient']['streetLines'],
            $this->data['recipient']['name'],
            $this->data['recipient']['company'],
            $this->data['recipient']['phone'],
            $this->data['recipient']['email']
        );


        // build shipment details
        $shipmentDetails = new ShipmentDetails(
            $this->data['unscheduledPickup'],
            $this->data['termsOfTrade'],
            $this->data['contentType'],
            $this->data['readyAtTimestamp'],
            $this->data['isValueAddedServicesRequested'],
            $this->data['nextBusinessDayIndicator']
        );

        // build packages
        $packages = [];
        foreach ($this->data['packages'] as $package) {
            $packages[] = new Package(
                $package['sequenceNumber'],
                $package['weight'],
                $package['weightUOM'],
                $package['length'],
                $package['width'],
                $package['height'],
                $package['dimensionsUOM']
            );
        }

        // build insurance
        $insurance = null;
        if (array_key_exists('insurance', $this->data)) {
            $insurance = new Insurance(
                $this->data['insurance']['value'],
                $this->data['insurance']['currencyType']
            );
        }

        $request = new RateRequest(
            $shipperAddress,
            $this->data['shipperAccountNumber'],
            $recipientAddress,
            $shipmentDetails,
            $packages,
            $insurance
        );

        $this->data = [];

        return $request;
    }

    public function setServiceType(string $serviceType): RequestPickupBuilderInterface {
        $this->data['serviceType'] = $serviceType;
        return $this;
    }

    public function setBillingAccountNumber(string $accountNumber): RequestPickupBuilderInterface {
        $this->data['billingAccountNumber'] = $accountNumber;
        return $this;
    }

    public function setPickupDate(\DateTime $pickupDate): RequestPickupBuilderInterface {
        $this->data['pickupDate'] = $pickupDate;
    }

    public function setPickupLocationCloseTime(string $time): RequestPickupBuilderInterface {
        $this->data['pickupLocationCloseTime'] = $time;
    }

    public function setShipper(
        string $countryCode,
        string $postalCode,
        string $city,
        array $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): RequestPickupBuilderInterface {
        $this->data['shipper'] = [
            'countryCode' => $countryCode,
            'postalCode'  => $postalCode,
            'city'        => $city,
            'streetLines' => $streetLines,
            'name'        => $name,
            'company'     => $company,
            'phone'       => $phone,
            'email'       => $email,
        ];

        return $this;
    }

    public function setRecipient(
        string $countryCode,
        string $postalCode,
        string $city,
        array $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): RequestPickupBuilderInterface {
        $this->data['recipient'] = [
            'countryCode' => $countryCode,
            'postalCode'  => $postalCode,
            'city'        => $city,
            'streetLines' => $streetLines,
            'name'        => $name,
            'company'     => $company,
            'phone'       => $phone,
            'email'       => $email,
        ];
        return $this;
    }

    public function addPackage(
        int $sequenceNumber,
        float $weight,
        string $weightUOM,
        float $length,
        float $width,
        float $height,
        string $dimensionsUOM,
        string $customerReferences
    ): RequestPickupBuilderInterface {
        $weightDetails = $this->normalizeWeight($weight, strtoupper($weightUOM));
        $dimensionsDetails = $this->normalizeDimensions($length, $width, $height, strtoupper($dimensionsUOM));

        $this->data['packages'][] = [
            'sequenceNumber' => $sequenceNumber,
            'weight'         => round((float)$weightDetails['weight'], 3),
            'weightUOM'      => $weightDetails['uom'],
            'length'         => $dimensionsDetails['length'],
            'width'          => $dimensionsDetails['width'],
            'height'         => $dimensionsDetails['height'],
            'dimensionsUOM'  => $dimensionsDetails['uom'],
        ];

        return $this;
    }
}
