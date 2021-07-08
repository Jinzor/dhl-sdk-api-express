<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\ShipmentRequest;

use Dhl\Express\Webservice\Soap\Type\Common\Content;
use Dhl\Express\Webservice\Soap\Type\ShipmentRequest\InternationalDetail\Commodities;
use Dhl\Express\Webservice\Soap\Type\ShipmentRequest\InternationalDetail\ExportDeclaration\ExportDeclaration;
use Dhl\Express\Webservice\Soap\Type\ShipmentRequest\InternationalDetail\ExportReference;

/**
 * The InternationalDetail section conveys data elements for international shipping.
 *
 * @api
 * @author   Rico Sonntag <rico.sonntag@netresearch.de>
 * @link     https://www.netresearch.de/
 */
class InternationalDetail
{
    /**
     * @var Commodities
     */
    private $Commodities;

    /**
     * @var ExportDeclaration
     */
    private $ExportDeclaration;

    /**
     * @var null|Content
     */
    private $Content;

    /**
     * @var null|ExportReference
     */
    private $ExportReference;

    /**
     * Constructor.
     *
     * @param Commodities $commodities The commodities
     */
    public function __construct(Commodities $commodities, ExportDeclaration $exportDeclaration = null)
    {
        $this->setCommodities($commodities);
        if ($exportDeclaration) {
            $this->setExportDeclaration($exportDeclaration);
        }
    }

    /**
     * Returns the commodities.
     *
     * @return Commodities
     */
    public function getCommodities()
    {
        return $this->Commodities;
    }

    /**
     * Sets the commodities.
     *
     * @param Commodities $commodities The commodities
     *
     * @return InternationalDetail
     */
    public function setCommodities(Commodities $commodities)
    {
        $this->Commodities = $commodities;
        return $this;
    }

    /**
     * Sets export declaration.
     *
     * @param ExportDeclaration $exportDeclaration
     *
     * @return InternationalDetail
     */
    public function setExportDeclaration(ExportDeclaration $exportDeclaration)
    {
        $this->ExportDeclaration = $exportDeclaration;
        return $this;
    }

    /**
     * @return ExportDeclaration
     */
    public function getExportDeclaration()
    {
        return $this->ExportDeclaration;
    }

    /**
     * Returns the content.
     *
     * @return null|Content
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Sets the content.
     *
     * @param string $content The content
     *
     * @return InternationalDetail
     */
    public function setContent($content)
    {
        $this->Content = new Content($content);
        return $this;
    }

    /**
     * Returns the export reference.
     *
     * @return null|ExportReference
     */
    public function getExportReference()
    {
        return $this->ExportReference;
    }

    /**
     * Sets the export reference.
     *
     * @param string $exportReference The export reference
     *
     * @return InternationalDetail
     */
    public function setExportReference($exportReference)
    {
        $this->ExportReference = new ExportReference($exportReference);
        return $this;
    }
}
