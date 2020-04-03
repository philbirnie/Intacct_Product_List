<?php
/**
 * ArAging
 *
 * @package    Intacct
 * @subpackage AccountsReceivable
 * @since      2020 Mar
 */

namespace Intacct\ProductList;

use Intacct\Functions\Common\GetList\FilterInterface;
use Intacct\Xml\XMLWriter;

class ProductList extends AbstractProductList
{

    /**
     * Write the function block XML
     *
     * @param XMLWriter $xml
     * @throw InvalidArgumentException
     */
    public function writeXml(XMLWriter &$xml)
    {
        $xml->startElement('function');
        $xml->writeAttribute('controlid', $this->getControlId());

        $xml->startElement('query');
        $xml->writeElement('object', 'ITEM');

        //Write Fields
        $xml->startElement('select');

        /** @var string $field Field */
        foreach ($this->getFields() as $field) {
            $xml->writeElement('field', $field);
        }

        $xml->endElement(); // select

        if ($this->getFilters()) {
            $xml->startElement('filter');

            /** @var FilterInterface $filter */
            foreach ($this->getFilters() as $filter) {
                $filter->writeXml($xml);
            }

            $xml->endElement(); // filter
        }

        $xml->endElement(); //query
        $xml->endElement(); //function
    }
}
