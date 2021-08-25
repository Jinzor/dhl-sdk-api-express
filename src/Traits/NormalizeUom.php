<?php

namespace Dhl\Express\Traits;

use Dhl\Express\Model\Request\Rate\Package;
use InvalidArgumentException;

trait NormalizeUom
{

    /**
     * Normalizes the weight and unit of measurement to the unit of measurement KG (kilograms) or LB (Pound)
     * supported by the DHL express webservice.
     *
     * @param float $weight The weight
     * @param string $uom The unit of measurement
     *
     * @return float[]|string[]
     *
     * @throws InvalidArgumentException
     */
    private function normalizeWeight($weight, $uom) {
        if (($uom === Package::UOM_WEIGHT_KG) || ($uom === Package::UOM_WEIGHT_LB)) {
            return [
                'weight' => $weight,
                'uom'    => $uom,
            ];
        }

        if ($uom === Package::UOM_WEIGHT_G) {
            return [
                'weight' => $weight / 1000,
                'uom'    => Package::UOM_WEIGHT_KG,
            ];
        }

        if ($uom === Package::UOM_WEIGHT_OZ) {
            return [
                'weight' => $weight / 16,
                'uom'    => Package::UOM_WEIGHT_LB,
            ];
        }

        throw new InvalidArgumentException(
            'Invalid weight unit of measurement'
        );
    }

    /**
     * Normalizes the dimensions to the unit of measurement CM (centimeter) or IN (inch) supported by the
     * DHL express webservice.
     *
     * @param float $length The length of a package
     * @param float $width The width of a package
     * @param float $height The height of a package
     * @param string $uom The unit of measurement
     *
     * @return float[]|string[]
     *
     * @throws InvalidArgumentException
     */
    private function normalizeDimensions($length, $width, $height, $uom) {
        if (($uom === Package::UOM_DIMENSION_CM) || ($uom === Package::UOM_DIMENSION_IN)) {
            return [
                'length' => $length,
                'width'  => $width,
                'height' => $height,
                'uom'    => $uom,
            ];
        }

        if ($uom === Package::UOM_DIMENSION_MM) {
            return [
                'length' => $length / 10,
                'width'  => $width / 10,
                'height' => $height / 10,
                'uom'    => Package::UOM_DIMENSION_CM,
            ];
        }

        if ($uom === Package::UOM_DIMENSION_M) {
            return [
                'length' => $length * 100,
                'width'  => $width * 100,
                'height' => $height * 100,
                'uom'    => Package::UOM_DIMENSION_CM,
            ];
        }

        if ($uom === Package::UOM_DIMENSION_FT) {
            return [
                'length' => $length * 12,
                'width'  => $width * 12,
                'height' => $height * 12,
                'uom'    => Package::UOM_DIMENSION_IN,
            ];
        }

        if ($uom === Package::UOM_DIMENSION_YD) {
            return [
                'length' => $length * 36,
                'width'  => $width * 36,
                'height' => $height * 36,
                'uom'    => Package::UOM_DIMENSION_IN,
            ];
        }

        throw new InvalidArgumentException(
            'Invalid dimensions unit of measurement'
        );
    }

}