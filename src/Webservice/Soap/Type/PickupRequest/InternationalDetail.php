<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\PickupRequest;

use Dhl\Express\Webservice\Soap\Type\Common\Content;
use Dhl\Express\Webservice\Soap\Type\PickupRequest\InternationalDetail\Commodities;

/**
 * The InternationalDetail section conveys data elements for international shipping.
 *
 * @api
 */
class InternationalDetail
{
    /**
     * @var Commodities
     */
    private $Commodities;

    /**
     * @var null|Content
     */
    private $Content;

    /**
     * Constructor.
     *
     * @param Commodities $commodities The commodities
     */
    public function __construct(Commodities $commodities)
    {
        $this->setCommodities($commodities);
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
}
