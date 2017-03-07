<?php
/**
 * Created by PhpStorm.
 * User: deanoj
 * Date: 07/03/2017
 * Time: 16:10
 */

namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

class DeliveryConfirmation
{
    public $DCISType;
    public $DCISNumber;

    public function __construct($response = null)
    {
        if (null != $response) {
            if (isset($response->DCISType)) {
                $this->setDCISType($response->DCISType);
            }
            if (isset($response->DCISNumber)) {
                $this->setDCISNumber($response->DCISNumber);
            }
        }
    }

    /**
     * @param null|DOMDocument $document
     *
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('DeliveryConfirmation');
        $node->appendChild($document->createElement('DCISType', $this->getDCISType()));

        if ($this->getDCISNumber()) {
            $node->appendChild($document->createElement('DCISNumber', $this->getDCISNumber()));
        }

        return $node;
    }

    /**
     * @return string
     */
    public function getDCISType()
    {
        return $this->DCISType;
    }

    /**
     * @param string $DCISType
     */
    public function setDCISType($DCISType)
    {
        $this->DCISType = $DCISType;
    }

    /**
     * @return string
     */
    public function getDCISNumber()
    {
        return $this->DCISNumber;
    }

    /**
     * @param string $DCISNumber
     */
    public function setDCISNumber($DCISNumber)
    {
        $this->DCISNumber = $DCISNumber;
    }
}