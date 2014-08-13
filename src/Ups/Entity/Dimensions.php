<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

class Dimensions implements NodeInterface
{
    /**
     * @deprecated
     */
    public $Length;
    /**
     * @deprecated
     */
    public $Width;
    /**
     * @deprecated
     */
    public $Height;

    /**
     * @var
     */
    private $length;
    /**
     * @var
     */
    private $width;
    /**
     * @var
     */
    private $height;

    private $unitOfMeasurement;




    function __construct($response = null)
    {
        $this->setUnitOfMeasurement(new UnitOfMeasurement);
        if (null != $response) {
            if (isset($response->Length)) {
                $this->Length = $response->Length;
            }
            if (isset($response->Width)) {
                $this->Width = $response->Width;
            }
            if (isset($response->Height)) {
                $this->Height = $response->Height;
            }
        }
    }

    /**
     * @param null|DOMDocument $document
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Dimensions');
        $node->appendChild($document->createElement('Length', $this->getLength()));
        $node->appendChild($document->createElement('Height', $this->getHeight()));
        $node->appendChild($document->createElement('Width', $this->getWidth()));
        $node->appendChild($this->getUnitOfMeasurement()->toNode($document));
        return $node;
    }

    /**
     * @return UnitOfMeasurement
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    /**
     * @param UnitOfMeasurement $unitOfMeasurement
     * @return $this
     */
    public function setUnitOfMeasurement(UnitOfMeasurement $unitOfMeasurement)
    {
        $this->UnitOfMeasurement = $unitOfMeasurement;
        $this->unitOfMeasurement = $unitOfMeasurement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->Height = $height;
        $this->height = $height;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->Length = $length;
        $this->length = $length;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->Width = $width;
        $this->width = $width;
    }

} 