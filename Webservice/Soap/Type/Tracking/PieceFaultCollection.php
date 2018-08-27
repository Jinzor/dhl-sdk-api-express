<?php
/**
 * See LICENSE.md for license details.
 */

namespace Dhl\Express\Webservice\Soap\Type\Tracking;

/**
 * PieceFaultCollection class.
 *
 * @api
 * @package  Dhl\Express\Api
 * @author   Ronny Gertler <ronny.gertler@netresearch.de>
 * @license  https://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     https://www.netresearch.de/
 */
class PieceFaultCollection implements \ArrayAccess, \Iterator, \Countable
{
    /**
     * @var PieceFault[]
     */
    protected $ArrayOfPieceFaultItem = [];

    /**
     * @param PieceFault[] $ArrayOfPieceFaultItem
     */
    public function __construct(array $ArrayOfPieceFaultItem)
    {
        $this->ArrayOfPieceFaultItem = $ArrayOfPieceFaultItem;
    }

    /**
     * @return PieceFault[]
     */
    public function getArrayOfPieceFaultItem(): array
    {
        return $this->ArrayOfPieceFaultItem;
    }

    /**
     * @param PieceFault[] $ArrayOfPieceFaultItem
     * @return self
     */
    public function setArrayOfPieceFaultItem(array $ArrayOfPieceFaultItem): self
    {
        $this->ArrayOfPieceFaultItem = $ArrayOfPieceFaultItem;

        return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return bool true on success or false on failure
     */
    public function offsetExists($offset): bool
    {
        return isset($this->ArrayOfPieceFaultItem[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return PieceFault
     */
    public function offsetGet($offset): PieceFault
    {
        return $this->ArrayOfPieceFaultItem[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param PieceFault $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->ArrayOfPieceFaultItem[] = $value;
        } else {
            $this->ArrayOfPieceFaultItem[$offset] = $value;
        }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->ArrayOfPieceFaultItem[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return PieceFault Return the current element
     */
    public function current(): PieceFault
    {
        return current($this->ArrayOfPieceFaultItem);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
        next($this->ArrayOfPieceFaultItem);
    }

    /**
     * Iterator implementation
     *
     * @return bool Return the validity of the current position
     */
    public function valid(): bool
    {
        return $this->key() !== null;
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key(): ?string
    {
        return key($this->ArrayOfPieceFaultItem);
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
        reset($this->ArrayOfPieceFaultItem);
    }

    /**
     * Countable implementation
     *
     * @return PieceFault Return count of elements
     */
    public function count(): PieceFault
    {
        return count($this->ArrayOfPieceFaultItem);
    }
}
