<?php
/**
* See LICENSE.md for license details.
*/
namespace Dhl\Express\Webservice\Soap\Type\PickupResponse;

use Dhl\Express\Webservice\Soap\Type\PickupResponse\PackagesResults\PackageResult;

/**
 * The packages result provides the DHL piece ID associated to each RequestedPackage from the SoapPickupRequest.
 *
 * @api
 */
class PackagesResults
{
    /**
     * The package result list.
     *
     * @var PackageResult[]
     */
    private $PackageResult;

    /**
     * Returns the package result list.
     *
     * @return PackageResult[]
     */
    public function getPackageResult()
    {
        return $this->PackageResult;
    }
}
