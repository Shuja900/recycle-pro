<?php
/**
 * GetShippingDetailsResult
 *
 * PHP version 5
 *
 * @category Class
 * @package  RoyalMail\ClickAndDrop\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * ChannelShipper & Royal Mail Public API
 *
 * Import your orders, retrieve your orders and generate labels.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.24-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace RoyalMail\ClickAndDrop\Rest\Api\Models;

use \ArrayAccess;
use \RoyalMail\ClickAndDrop\Rest\Api\ObjectSerializer;

/**
 * GetShippingDetailsResult Class Doc Comment
 *
 * @category Class
 * @package  RoyalMail\ClickAndDrop\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GetShippingDetailsResult implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetShippingDetailsResult';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'shippingCost' => 'float',
        'trackingNumber' => 'string',
        'shippingTrackingStatus' => 'string',
        'serviceCode' => 'string',
        'deliveryService' => 'string',
        'receiveEmailNotification' => 'bool',
        'receiveSmsNotification' => 'bool',
        'guaranteedSaturdayDelivery' => 'bool',
        'requestSignatureUponDelivery' => 'bool',
        'isLocalCollect' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'shippingCost' => null,
        'trackingNumber' => null,
        'shippingTrackingStatus' => null,
        'serviceCode' => null,
        'deliveryService' => null,
        'receiveEmailNotification' => null,
        'receiveSmsNotification' => null,
        'guaranteedSaturdayDelivery' => null,
        'requestSignatureUponDelivery' => null,
        'isLocalCollect' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'shippingCost' => 'shippingCost',
        'trackingNumber' => 'trackingNumber',
        'shippingTrackingStatus' => 'shippingTrackingStatus',
        'serviceCode' => 'serviceCode',
        'deliveryService' => 'deliveryService',
        'receiveEmailNotification' => 'receiveEmailNotification',
        'receiveSmsNotification' => 'receiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'guaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'requestSignatureUponDelivery',
        'isLocalCollect' => 'isLocalCollect'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'shippingCost' => 'setShippingCost',
        'trackingNumber' => 'setTrackingNumber',
        'shippingTrackingStatus' => 'setShippingTrackingStatus',
        'serviceCode' => 'setServiceCode',
        'deliveryService' => 'setDeliveryService',
        'receiveEmailNotification' => 'setReceiveEmailNotification',
        'receiveSmsNotification' => 'setReceiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'setGuaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'setRequestSignatureUponDelivery',
        'isLocalCollect' => 'setIsLocalCollect'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'shippingCost' => 'getShippingCost',
        'trackingNumber' => 'getTrackingNumber',
        'shippingTrackingStatus' => 'getShippingTrackingStatus',
        'serviceCode' => 'getServiceCode',
        'deliveryService' => 'getDeliveryService',
        'receiveEmailNotification' => 'getReceiveEmailNotification',
        'receiveSmsNotification' => 'getReceiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'getGuaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'getRequestSignatureUponDelivery',
        'isLocalCollect' => 'getIsLocalCollect'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['shippingCost'] = isset($data['shippingCost']) ? $data['shippingCost'] : null;
        $this->container['trackingNumber'] = isset($data['trackingNumber']) ? $data['trackingNumber'] : null;
        $this->container['shippingTrackingStatus'] = isset($data['shippingTrackingStatus']) ? $data['shippingTrackingStatus'] : null;
        $this->container['serviceCode'] = isset($data['serviceCode']) ? $data['serviceCode'] : null;
        $this->container['deliveryService'] = isset($data['deliveryService']) ? $data['deliveryService'] : null;
        $this->container['receiveEmailNotification'] = isset($data['receiveEmailNotification']) ? $data['receiveEmailNotification'] : null;
        $this->container['receiveSmsNotification'] = isset($data['receiveSmsNotification']) ? $data['receiveSmsNotification'] : null;
        $this->container['guaranteedSaturdayDelivery'] = isset($data['guaranteedSaturdayDelivery']) ? $data['guaranteedSaturdayDelivery'] : null;
        $this->container['requestSignatureUponDelivery'] = isset($data['requestSignatureUponDelivery']) ? $data['requestSignatureUponDelivery'] : null;
        $this->container['isLocalCollect'] = isset($data['isLocalCollect']) ? $data['isLocalCollect'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['shippingCost'] === null) {
            $invalidProperties[] = "'shippingCost' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets shippingCost
     *
     * @return float
     */
    public function getShippingCost()
    {
        return $this->container['shippingCost'];
    }

    /**
     * Sets shippingCost
     *
     * @param float $shippingCost shippingCost
     *
     * @return $this
     */
    public function setShippingCost($shippingCost)
    {
        $this->container['shippingCost'] = $shippingCost;

        return $this;
    }

    /**
     * Gets trackingNumber
     *
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->container['trackingNumber'];
    }

    /**
     * Sets trackingNumber
     *
     * @param string $trackingNumber trackingNumber
     *
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->container['trackingNumber'] = $trackingNumber;

        return $this;
    }

    /**
     * Gets shippingTrackingStatus
     *
     * @return string
     */
    public function getShippingTrackingStatus()
    {
        return $this->container['shippingTrackingStatus'];
    }

    /**
     * Sets shippingTrackingStatus
     *
     * @param string $shippingTrackingStatus shippingTrackingStatus
     *
     * @return $this
     */
    public function setShippingTrackingStatus($shippingTrackingStatus)
    {
        $this->container['shippingTrackingStatus'] = $shippingTrackingStatus;

        return $this;
    }

    /**
     * Gets serviceCode
     *
     * @return string
     */
    public function getServiceCode()
    {
        return $this->container['serviceCode'];
    }

    /**
     * Sets serviceCode
     *
     * @param string $serviceCode serviceCode
     *
     * @return $this
     */
    public function setServiceCode($serviceCode)
    {
        $this->container['serviceCode'] = $serviceCode;

        return $this;
    }

    /**
     * Gets deliveryService
     *
     * @return string
     */
    public function getDeliveryService()
    {
        return $this->container['deliveryService'];
    }

    /**
     * Sets deliveryService
     *
     * @param string $deliveryService deliveryService
     *
     * @return $this
     */
    public function setDeliveryService($deliveryService)
    {
        $this->container['deliveryService'] = $deliveryService;

        return $this;
    }

    /**
     * Gets receiveEmailNotification
     *
     * @return bool
     */
    public function getReceiveEmailNotification()
    {
        return $this->container['receiveEmailNotification'];
    }

    /**
     * Sets receiveEmailNotification
     *
     * @param bool $receiveEmailNotification receiveEmailNotification
     *
     * @return $this
     */
    public function setReceiveEmailNotification($receiveEmailNotification)
    {
        $this->container['receiveEmailNotification'] = $receiveEmailNotification;

        return $this;
    }

    /**
     * Gets receiveSmsNotification
     *
     * @return bool
     */
    public function getReceiveSmsNotification()
    {
        return $this->container['receiveSmsNotification'];
    }

    /**
     * Sets receiveSmsNotification
     *
     * @param bool $receiveSmsNotification receiveSmsNotification
     *
     * @return $this
     */
    public function setReceiveSmsNotification($receiveSmsNotification)
    {
        $this->container['receiveSmsNotification'] = $receiveSmsNotification;

        return $this;
    }

    /**
     * Gets guaranteedSaturdayDelivery
     *
     * @return bool
     */
    public function getGuaranteedSaturdayDelivery()
    {
        return $this->container['guaranteedSaturdayDelivery'];
    }

    /**
     * Sets guaranteedSaturdayDelivery
     *
     * @param bool $guaranteedSaturdayDelivery guaranteedSaturdayDelivery
     *
     * @return $this
     */
    public function setGuaranteedSaturdayDelivery($guaranteedSaturdayDelivery)
    {
        $this->container['guaranteedSaturdayDelivery'] = $guaranteedSaturdayDelivery;

        return $this;
    }

    /**
     * Gets requestSignatureUponDelivery
     *
     * @return bool
     */
    public function getRequestSignatureUponDelivery()
    {
        return $this->container['requestSignatureUponDelivery'];
    }

    /**
     * Sets requestSignatureUponDelivery
     *
     * @param bool $requestSignatureUponDelivery requestSignatureUponDelivery
     *
     * @return $this
     */
    public function setRequestSignatureUponDelivery($requestSignatureUponDelivery)
    {
        $this->container['requestSignatureUponDelivery'] = $requestSignatureUponDelivery;

        return $this;
    }

    /**
     * Gets isLocalCollect
     *
     * @return bool
     */
    public function getIsLocalCollect()
    {
        return $this->container['isLocalCollect'];
    }

    /**
     * Sets isLocalCollect
     *
     * @param bool $isLocalCollect isLocalCollect
     *
     * @return $this
     */
    public function setIsLocalCollect($isLocalCollect)
    {
        $this->container['isLocalCollect'] = $isLocalCollect;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


