<?php namespace Illuminate\Support;

class XmlSerializer {

    public static function serialize($data, $rootElement = 'items', $xmlVersion = '1.0', $xmlEncoding = 'UTF-8')
    {
        $xml = new XmlWriter();
        $xml->openMemory();
        $xml->startDocument($xmlVersion, $xmlEncoding);
        $xml->startElement($rootElement);
        static::writeXmlRecursive($xml, $data);
        $xml->endElement();

        return $xml->outputMemory(true);
    }

    /**
     * Write XML as per Associative Array
     *
     * @param object  $xml  XMLWriter Object
     * @param array   $data Associative Data Array
     */
    private static function writeXmlRecursive(XMLWriter $xml, $data = array())
    {
        foreach ($data as $key => $value) {
            if ( is_array( $value ) ) {
                $xml->startElement($key);
                static::writeXmlRecursive($xml, $value);
                $xml->endElement();
                continue;
            }

            $xml->writeElement($key, $value);
        }
    }
}
