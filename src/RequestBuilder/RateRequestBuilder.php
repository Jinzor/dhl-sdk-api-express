<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\RequestBuilder;

use Dhl\Express\Api\RateRequestBuilderInterface;
use Dhl\Express\Model\RateRequest;
use Dhl\Express\Model\Request\Insurance;
use Dhl\Express\Model\Request\Rate\Package;
use Dhl\Express\Model\Request\Rate\RecipientAddress;
use Dhl\Express\Model\Request\Rate\ShipmentDetails;
use Dhl\Express\Model\Request\Rate\ShipperAddress;
use Dhl\Express\Traits\NormalizeUom;
use InvalidArgumentException;

/**
 * Rate Request Builder.
 *
 * @author   Ronny Gertler <ronny.gertler@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class RateRequestBuilder implements RateRequestBuilderInterface
{
    /**
     * The collected data used to build the rate request.
     *
     * @var mixed[]
     */
    private $data = [];

    use NormalizeUom;

    public function setShipperAddress(
        $countryCode,
        $postalCode,
        $city
    ) {
        $this->data['shipperAddress'] = [
            'countryCode' => $countryCode,
            'postalCode' => $postalCode,
            'city' => $city,
        ];

        return $this;
    }

    public function setRecipientAddress(
        $countryCode,
        $postalCode,
        $city,
        array $streetLines
    ) {
        $this->data['recipientAddress'] = [
            'countryCode' => $countryCode,
            'postalCode' => $postalCode,
            'city' => $city,
            'streetLines' => $streetLines,
        ];

        return $this;
    }

    public function addPackage(
        $sequenceNumber,
        $weight,
        $weightUOM,
        $length,
        $width,
        $height,
        $dimensionsUOM
    ) {
        $weightDetails = $this->normalizeWeight($weight, strtoupper($weightUOM));
        $dimensionsDetails = $this->normalizeDimensions($length, $width, $height, strtoupper($dimensionsUOM));

        $this->data['packages'][] = [
            'sequenceNumber' => $sequenceNumber,
            'weight' => round((float) $weightDetails['weight'], 3),
            'weightUOM' => $weightDetails['uom'],
            'length' => $dimensionsDetails['length'],
            'width' => $dimensionsDetails['width'],
            'height' => $dimensionsDetails['height'],
            'dimensionsUOM' => $dimensionsDetails['uom'],
        ];

        return $this;
    }

    public function setIsUnscheduledPickup($unscheduledPickup)
    {
        $this->data['unscheduledPickup'] = $unscheduledPickup;
        return $this;
    }

    public function setShipperAccountNumber($accountNumber)
    {
        $this->data['shipperAccountNumber'] = $accountNumber;
        return $this;
    }

    public function setTermsOfTrade($termsOfTrade)
    {
        $this->data['termsOfTrade'] = $termsOfTrade;
        return $this;
    }

    public function setContentType($contentType)
    {
        $this->data['contentType'] = $contentType;
        return $this;
    }

    public function setReadyAtTimestamp($pickupTime)
    {
        $this->data['readyAtTimestamp'] = $pickupTime;
        return $this;
    }

    public function setInsurance($insuranceValue, $insuranceCurrency)
    {
        $this->data['insurance'] = [
            'value' => $insuranceValue,
            'currencyType' => $insuranceCurrency,
        ];
        return $this;
    }

    public function setIsValueAddedServicesRequested($requestValueAddedServices)
    {
        $this->data['isValueAddedServicesRequested'] = $requestValueAddedServices;
        return $this;
    }

    public function setNextBusinessDayIndicator($queryNextBusinessDay)
    {
        $this->data['nextBusinessDayIndicator'] = $queryNextBusinessDay;
        return $this;
    }

    public function build()
    {
        // build recipient address
        $recipientAddress = new RecipientAddress(
            $this->data['recipientAddress']['countryCode'],
            $this->data['recipientAddress']['postalCode'],
            $this->data['recipientAddress']['city'],
            $this->data['recipientAddress']['streetLines']
        );

        // build shipper address
        $shipperAddress = new ShipperAddress(
            $this->data['shipperAddress']['countryCode'],
            $this->data['shipperAddress']['postalCode'],
            $this->data['shipperAddress']['city']
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
}
