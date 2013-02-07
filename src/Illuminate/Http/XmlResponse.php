<?php namespace Illuminate\Http;

use Illuminate\Support\Contracts\XmlSerializer;

/**
 * Response represents an HTTP response in XML format.
 *
 * @author Max Ehsan <contact@laravelbook.com>
 */
class XmlResponse extends \Symfony\Component\HttpFoundation\Response
{
    protected $data;

    /**
     * Constructor.
     *
     * @param mixed   $data    The response data
     * @param integer $status  The response status code
     * @param array   $headers An array of response headers
     */
    public function __construct($data = null, $status = 200, $headers = array())
    {
        parent::__construct('', $status, $headers);

        if (null === $data) {
            $data = new \ArrayObject();
        }
        $this->setData($data);
    }

    /**
     * {@inheritDoc}
     */
    public static function create($data = null, $status = 200, $headers = array())
    {
        return new static($data, $status, $headers);
    }

    /**
     * Sets the data to be sent as xml.
     *
     * @param mixed $data
     * @return XmlResponse
     */
    public function setData($data = array())
    {
        $this->data = XmlSerializer::serialize($data);
        return $this->update();
    }

    /**
     * Updates the content and headers according to the json data and callback.
     *
     * @return XmlResponse
     */
    protected function update()
    {
        $this->headers->set('Content-Type', 'text/xml');
        return $this->setContent($this->data);
    }
}
