<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Api;

use Dhl\Express\Api\Data\ShipmentRequestInterface;
use Dhl\Express\Webservice\Soap\Type\ShipmentRequest\InternationalDetail\ExportDeclaration\ExportDeclaration;

/**
 * Shipment Request Builder.
 *
 * @author   Ronny Gertler <ronny.gertler@netresearch.de>
 * @link     https://www.netresearch.de/
 */
interface RequestPickupBuilderInterface
{
    /**
     * Sets the serviceType.
     *
     * @param string $serviceType
     *
     * @return RequestPickupBuilderInterface
     */
    public function setServiceType(string $serviceType): RequestPickupBuilderInterface;

    /**
     * Sets the billing account number.
     *
     * @param string $accountNumber
     *
     * @return ShipmentRequestBuilderInterface
     */
    public function setBillingAccountNumber(string $accountNumber): ShipmentRequestBuilderInterface;


    public function setPickupDate(\DateTime $pickupDate);

    public function setPickupLocationCloseTime();

    /**
     * Sets the shipper.
     *
     * @param string $countryCode
     * @param string $postalCode
     * @param string $city
     * @param string[] $streetLines
     * @param string $name
     * @param string $company
     * @param string $phone
     * @param string|null $email
     *
     * @return ShipmentRequestBuilderInterface
     */
    public function setShipper(
        string $countryCode,
        string $postalCode,
        string $city,
        array  $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): ShipmentRequestBuilderInterface;

    /**
     * Sets the recipient.
     *
     * @param string $countryCode
     * @param string $postalCode
     * @param string $city
     * @param string[] $streetLines
     * @param string $name
     * @param string $company
     * @param string $phone
     * @param string|null $email
     *
     * @return ShipmentRequestBuilderInterface
     */
    public function setRecipient(
        string $countryCode,
        string $postalCode,
        string $city,
        array  $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): ShipmentRequestBuilderInterface;

    /**
     * Adds a package to the list of packages.
     *
     * @param int $sequenceNumber
     * @param float $weight
     * @param string $weightUOM
     * @param float $length
     * @param float $width
     * @param float $height
     * @param string $dimensionsUOM
     * @param string $customerReferences
     *
     * @return ShipmentRequestBuilderInterface
     */
    public function addPackage(
        int    $sequenceNumber,
        float  $weight,
        string $weightUOM,
        float  $length,
        float  $width,
        float  $height,
        string $dimensionsUOM,
        string $customerReferences
    ): RequestPickupBuilderInterface;

}
