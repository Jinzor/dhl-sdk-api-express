<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Api;

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
     * @return RequestPickupBuilderInterface
     */
    public function setBillingAccountNumber(string $accountNumber): RequestPickupBuilderInterface;

    /**
     * Sets the Pickup date
     *
     * @param \DateTime $pickupDate
     * @return RequestPickupBuilderInterface
     */
    public function setPickupDate(\DateTime $pickupDate): RequestPickupBuilderInterface;

    /**
     * @param string $time
     * @return RequestPickupBuilderInterface
     */
    public function setPickupLocationCloseTime(string $time): RequestPickupBuilderInterface;

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
     * @return RequestPickupBuilderInterface
     */
    public function setShipper(
        string $countryCode,
        string $postalCode,
        string $city,
        array $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): RequestPickupBuilderInterface;

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
     * @return RequestPickupBuilderInterface
     */
    public function setRecipient(
        string $countryCode,
        string $postalCode,
        string $city,
        array $streetLines,
        string $name,
        string $company,
        string $phone,
        string $email = null
    ): RequestPickupBuilderInterface;

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
     * @return RequestPickupBuilderInterface
     */
    public function addPackage(
        int $sequenceNumber,
        float $weight,
        string $weightUOM,
        float $length,
        float $width,
        float $height,
        string $dimensionsUOM,
        string $customerReferences
    ): RequestPickupBuilderInterface;

}
