<?php

namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

/**
 * Class PackageServiceOptions
 * @package Ups\Entity
 */
class PackageServiceOptions implements NodeInterface
{
    /**
     * @var COD
     */
    private $cod;

    /**
     * @var DeclaredValue
     */
    private $declaredValue;

    /**
     * @var InsuredValue
     */
    private $insuredValue;

    /**
     * @var string
     */
    private $earliestDeliveryTime;

    /**
     * @var string
     */
    private $hazardousMaterialsCode;

    /**
     * @var string
     */
    private $holdForPickup;

    /**
     * @param null $parameters
     */
    public function __construct($parameters = null)
    {
        if (null !== $parameters) {
            if (isset($parameters->COD)) {
                $this->setCOD(new COD($parameters->COD));
            }
            if (isset($parameters->DeclaredValue)) {
                $this->setDeclaredValue(new DeclaredValue($parameters->DeclaredValue));
            }
            if (isset($parameters->InsuredValue)) {
                $this->setInsuredValue(new InsuredValue($parameters->InsuredValue));
            }
            if (isset($parameters->EarliestDeliveryTime)) {
                $this->setEarliestDeliveryTime($parameters->EarliestDeliveryTime);
            }
            if (isset($parameters->HazardousMaterialsCode)) {
                $this->setHazardousMaterialsCode($parameters->HazardousMaterialsCode);
            }
            if (isset($parameters->HoldForPickup)) {
                $this->setHoldForPickup($parameters->HoldForPickup);
            }
        }
    }

    /**
     * @param null|DOMDocument $document
     *
     * TODO: this seem to be awfully incomplete
     *
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('PackageServiceOptions');

        if ($this->getInsuredValue()) {
            $node->appendChild($this->getInsuredValue()->toNode($document));
        }
        if ($this->getDeclaredValue()) {
            $node->appendChild($this->getDeclaredValue()->toNode($document));
        }

        return $node;
    }

    /**
     * @return DeclaredValue|null
     */
    public function getDeclaredValue()
    {
        return $this->declaredValue;
    }

    /**
     * @param $var
     */
    public function setDeclaredValue($var)
    {
        $this->declaredValue = $var;
    }

    /**
     * @return InsuredValue|null
     */
    public function getInsuredValue()
    {
        return $this->insuredValue;
    }

    /**
     * @param $var
     */
    public function setInsuredValue($var)
    {
        $this->insuredValue = $var;
    }

    /**
     * @return COD|null
     */
    public function getCOD()
    {
        return $this->cod;
    }

    /**
     * @param $var
     */
    public function setCOD($var)
    {
        $this->cod = $var;
    }

    /**
     * @return string|null
     */
    public function getEarliestDeliveryTime()
    {
        return $this->earliestDeliveryTime;
    }

    /**
     * @param $var
     */
    public function setEarliestDeliveryTime($var)
    {
        $this->earliestDeliveryTime = $var;
    }

    /**
     * @return string|null
     */
    public function getHazardousMaterialsCode()
    {
        return $this->hazardousMaterialsCode;
    }

    /**
     * @param $var
     */
    public function setHazardousMaterialsCode($var)
    {
        $this->hazardousMaterialsCode = $var;
    }

    /**
     * @return string|null
     */
    public function getHoldForPickup()
    {
        return $this->holdForPickup;
    }

    /**
     * @param $var
     */
    public function setHoldForPickup($var)
    {
        $this->holdForPickup = $var;
    }
}
