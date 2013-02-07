<?php namespace Illuminate\Support\Contracts;

interface XmlableInterface {

    /**
     * Convert the object to its XML representation.
     *
     * @param  string  $rootElement
     * @param  string  $xmlVersion
     * @param  string  $xmlEncoding
     * @return string
     */
    public function toXml($rootElement = 'items', $xmlVersion = '1.0', $xmlEncoding = 'UTF-8');

}