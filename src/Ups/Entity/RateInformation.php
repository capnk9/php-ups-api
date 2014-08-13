<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

class RateInformation implements NodeInterface
{

    /** @deprecated */
    public $NegotiatedRatesIndicator;


    /**
     * @var string
     */
    private $negotiatedratesindicator;


    /**
     * @param null|object $attributes
     */
    public function __construct($attributes = null)
    {
        if (null !== $attributes) {
            if (isset($attributes->NegotiatedRatesIndicator)) {
                $this->setCode($attributes->NegotiatedRatesIndicator);
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

        $node = $document->createElement('RateInformation');
        $node->appendChild($document->createElement('NegotiatedRatesIndicator', $this->getNegotiatedRatesIndicator()));
         return $node;
    }

    /**
     * @return string
     */
    public function getNegotiatedRatesIndicator()
    {
        return $this->negotiatedratesindicator;
    }

    /**
     * @param string $negotiatedratesindicator
     * @return $this
     */
    public function setNegotiatedRatesIndicator($negotiatedratesindicator)
    {
        $this->NegotiatedRatesIndicator = $negotiatedratesindicator;
        $this->negotiatedratesindicator = $negotiatedratesindicator;
        return $this;
    }


}
