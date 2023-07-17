<?php
/**
 * PostageDetailsRequest
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
 * PostageDetailsRequest Class Doc Comment
 *
 * @category Class
 * @package  RoyalMail\ClickAndDrop\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PostageDetailsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PostageDetailsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'sendNotificationsTo' => 'string',
        'serviceCode' => 'string',
        'serviceRegisterCode' => 'string',
        'consequentialLoss' => 'int',
        'receiveEmailNotification' => 'bool',
        'receiveSmsNotification' => 'bool',
        'guaranteedSaturdayDelivery' => 'bool',
        'requestSignatureUponDelivery' => 'bool',
        'isLocalCollect' => 'bool',
        'isDeliveryDutyPaid' => 'bool',
        'safePlace' => 'string',
        'department' => 'string',
        'aIRNumber' => 'string',
        'requiresExportLicense' => 'bool',
        'commercialInvoiceNumber' => 'string',
        'commercialInvoiceDate' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'sendNotificationsTo' => null,
        'serviceCode' => null,
        'serviceRegisterCode' => null,
        'consequentialLoss' => 'int32',
        'receiveEmailNotification' => null,
        'receiveSmsNotification' => null,
        'guaranteedSaturdayDelivery' => null,
        'requestSignatureUponDelivery' => null,
        'isLocalCollect' => null,
        'isDeliveryDutyPaid' => null,
        'safePlace' => null,
        'department' => null,
        'aIRNumber' => null,
        'requiresExportLicense' => null,
        'commercialInvoiceNumber' => null,
        'commercialInvoiceDate' => 'date-time'
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
        'sendNotificationsTo' => 'sendNotificationsTo',
        'serviceCode' => 'serviceCode',
        'serviceRegisterCode' => 'serviceRegisterCode',
        'consequentialLoss' => 'consequentialLoss',
        'receiveEmailNotification' => 'receiveEmailNotification',
        'receiveSmsNotification' => 'receiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'guaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'requestSignatureUponDelivery',
        'isLocalCollect' => 'isLocalCollect',
        'isDeliveryDutyPaid' => 'isDeliveryDutyPaid',
        'safePlace' => 'safePlace',
        'department' => 'department',
        'aIRNumber' => 'AIRNumber',
        'requiresExportLicense' => 'requiresExportLicense',
        'commercialInvoiceNumber' => 'commercialInvoiceNumber',
        'commercialInvoiceDate' => 'commercialInvoiceDate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sendNotificationsTo' => 'setSendNotificationsTo',
        'serviceCode' => 'setServiceCode',
        'serviceRegisterCode' => 'setServiceRegisterCode',
        'consequentialLoss' => 'setConsequentialLoss',
        'receiveEmailNotification' => 'setReceiveEmailNotification',
        'receiveSmsNotification' => 'setReceiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'setGuaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'setRequestSignatureUponDelivery',
        'isLocalCollect' => 'setIsLocalCollect',
        'isDeliveryDutyPaid' => 'setIsDeliveryDutyPaid',
        'safePlace' => 'setSafePlace',
        'department' => 'setDepartment',
        'aIRNumber' => 'setAIRNumber',
        'requiresExportLicense' => 'setRequiresExportLicense',
        'commercialInvoiceNumber' => 'setCommercialInvoiceNumber',
        'commercialInvoiceDate' => 'setCommercialInvoiceDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sendNotificationsTo' => 'getSendNotificationsTo',
        'serviceCode' => 'getServiceCode',
        'serviceRegisterCode' => 'getServiceRegisterCode',
        'consequentialLoss' => 'getConsequentialLoss',
        'receiveEmailNotification' => 'getReceiveEmailNotification',
        'receiveSmsNotification' => 'getReceiveSmsNotification',
        'guaranteedSaturdayDelivery' => 'getGuaranteedSaturdayDelivery',
        'requestSignatureUponDelivery' => 'getRequestSignatureUponDelivery',
        'isLocalCollect' => 'getIsLocalCollect',
        'isDeliveryDutyPaid' => 'getIsDeliveryDutyPaid',
        'safePlace' => 'getSafePlace',
        'department' => 'getDepartment',
        'aIRNumber' => 'getAIRNumber',
        'requiresExportLicense' => 'getRequiresExportLicense',
        'commercialInvoiceNumber' => 'getCommercialInvoiceNumber',
        'commercialInvoiceDate' => 'getCommercialInvoiceDate'
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

    const SEND_NOTIFICATIONS_TO_SENDER = 'sender';
    const SEND_NOTIFICATIONS_TO_RECIPIENT = 'recipient';
    const SEND_NOTIFICATIONS_TO_BILLING = 'billing';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSendNotificationsToAllowableValues()
    {
        return [
            self::SEND_NOTIFICATIONS_TO_SENDER,
            self::SEND_NOTIFICATIONS_TO_RECIPIENT,
            self::SEND_NOTIFICATIONS_TO_BILLING,
        ];
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
        $this->container['sendNotificationsTo'] = isset($data['sendNotificationsTo']) ? $data['sendNotificationsTo'] : null;
        $this->container['serviceCode'] = isset($data['serviceCode']) ? $data['serviceCode'] : null;
        $this->container['serviceRegisterCode'] = isset($data['serviceRegisterCode']) ? $data['serviceRegisterCode'] : null;
        $this->container['consequentialLoss'] = isset($data['consequentialLoss']) ? $data['consequentialLoss'] : null;
        $this->container['receiveEmailNotification'] = isset($data['receiveEmailNotification']) ? $data['receiveEmailNotification'] : null;
        $this->container['receiveSmsNotification'] = isset($data['receiveSmsNotification']) ? $data['receiveSmsNotification'] : null;
        $this->container['guaranteedSaturdayDelivery'] = isset($data['guaranteedSaturdayDelivery']) ? $data['guaranteedSaturdayDelivery'] : null;
        $this->container['requestSignatureUponDelivery'] = isset($data['requestSignatureUponDelivery']) ? $data['requestSignatureUponDelivery'] : null;
        $this->container['isLocalCollect'] = isset($data['isLocalCollect']) ? $data['isLocalCollect'] : null;
        $this->container['isDeliveryDutyPaid'] = isset($data['isDeliveryDutyPaid']) ? $data['isDeliveryDutyPaid'] : null;
        $this->container['safePlace'] = isset($data['safePlace']) ? $data['safePlace'] : null;
        $this->container['department'] = isset($data['department']) ? $data['department'] : null;
        $this->container['aIRNumber'] = isset($data['aIRNumber']) ? $data['aIRNumber'] : null;
        $this->container['requiresExportLicense'] = isset($data['requiresExportLicense']) ? $data['requiresExportLicense'] : null;
        $this->container['commercialInvoiceNumber'] = isset($data['commercialInvoiceNumber']) ? $data['commercialInvoiceNumber'] : null;
        $this->container['commercialInvoiceDate'] = isset($data['commercialInvoiceDate']) ? $data['commercialInvoiceDate'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getSendNotificationsToAllowableValues();
        if (!is_null($this->container['sendNotificationsTo']) && !in_array($this->container['sendNotificationsTo'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'sendNotificationsTo', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['serviceCode']) && (mb_strlen($this->container['serviceCode']) > 10)) {
            $invalidProperties[] = "invalid value for 'serviceCode', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['serviceRegisterCode']) && (mb_strlen($this->container['serviceRegisterCode']) > 2)) {
            $invalidProperties[] = "invalid value for 'serviceRegisterCode', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['consequentialLoss']) && ($this->container['consequentialLoss'] > 10000)) {
            $invalidProperties[] = "invalid value for 'consequentialLoss', must be smaller than or equal to 10000.";
        }

        if (!is_null($this->container['consequentialLoss']) && ($this->container['consequentialLoss'] < 0)) {
            $invalidProperties[] = "invalid value for 'consequentialLoss', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['safePlace']) && (mb_strlen($this->container['safePlace']) > 90)) {
            $invalidProperties[] = "invalid value for 'safePlace', the character length must be smaller than or equal to 90.";
        }

        if (!is_null($this->container['department']) && (mb_strlen($this->container['department']) > 150)) {
            $invalidProperties[] = "invalid value for 'department', the character length must be smaller than or equal to 150.";
        }

        if (!is_null($this->container['aIRNumber']) && (mb_strlen($this->container['aIRNumber']) > 50)) {
            $invalidProperties[] = "invalid value for 'aIRNumber', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['commercialInvoiceNumber']) && (mb_strlen($this->container['commercialInvoiceNumber']) > 35)) {
            $invalidProperties[] = "invalid value for 'commercialInvoiceNumber', the character length must be smaller than or equal to 35.";
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
     * Gets sendNotificationsTo
     *
     * @return string
     */
    public function getSendNotificationsTo()
    {
        return $this->container['sendNotificationsTo'];
    }

    /**
     * Sets sendNotificationsTo
     *
     * @param string $sendNotificationsTo sendNotificationsTo
     *
     * @return $this
     */
    public function setSendNotificationsTo($sendNotificationsTo)
    {
        $allowedValues = $this->getSendNotificationsToAllowableValues();
        if (!is_null($sendNotificationsTo) && !in_array($sendNotificationsTo, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'sendNotificationsTo', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['sendNotificationsTo'] = $sendNotificationsTo;

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
        if (!is_null($serviceCode) && (mb_strlen($serviceCode) > 10)) {
            throw new \InvalidArgumentException('invalid length for $serviceCode when calling PostageDetailsRequest., must be smaller than or equal to 10.');
        }

        $this->container['serviceCode'] = $serviceCode;

        return $this;
    }

    /**
     * Gets serviceRegisterCode
     *
     * @return string
     */
    public function getServiceRegisterCode()
    {
        return $this->container['serviceRegisterCode'];
    }

    /**
     * Sets serviceRegisterCode
     *
     * @param string $serviceRegisterCode serviceRegisterCode
     *
     * @return $this
     */
    public function setServiceRegisterCode($serviceRegisterCode)
    {
        if (!is_null($serviceRegisterCode) && (mb_strlen($serviceRegisterCode) > 2)) {
            throw new \InvalidArgumentException('invalid length for $serviceRegisterCode when calling PostageDetailsRequest., must be smaller than or equal to 2.');
        }

        $this->container['serviceRegisterCode'] = $serviceRegisterCode;

        return $this;
    }

    /**
     * Gets consequentialLoss
     *
     * @return int
     */
    public function getConsequentialLoss()
    {
        return $this->container['consequentialLoss'];
    }

    /**
     * Sets consequentialLoss
     *
     * @param int $consequentialLoss consequentialLoss
     *
     * @return $this
     */
    public function setConsequentialLoss($consequentialLoss)
    {

        if (!is_null($consequentialLoss) && ($consequentialLoss > 10000)) {
            throw new \InvalidArgumentException('invalid value for $consequentialLoss when calling PostageDetailsRequest., must be smaller than or equal to 10000.');
        }
        if (!is_null($consequentialLoss) && ($consequentialLoss < 0)) {
            throw new \InvalidArgumentException('invalid value for $consequentialLoss when calling PostageDetailsRequest., must be bigger than or equal to 0.');
        }

        $this->container['consequentialLoss'] = $consequentialLoss;

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
     * Gets isDeliveryDutyPaid
     *
     * @return bool
     */
    public function getIsDeliveryDutyPaid()
    {
        return $this->container['isDeliveryDutyPaid'];
    }

    /**
     * Sets isDeliveryDutyPaid
     *
     * @param bool $isDeliveryDutyPaid isDeliveryDutyPaid
     *
     * @return $this
     */
    public function setIsDeliveryDutyPaid($isDeliveryDutyPaid)
    {
        $this->container['isDeliveryDutyPaid'] = $isDeliveryDutyPaid;

        return $this;
    }

    /**
     * Gets safePlace
     *
     * @return string
     */
    public function getSafePlace()
    {
        return $this->container['safePlace'];
    }

    /**
     * Sets safePlace
     *
     * @param string $safePlace safePlace
     *
     * @return $this
     */
    public function setSafePlace($safePlace)
    {
        if (!is_null($safePlace) && (mb_strlen($safePlace) > 90)) {
            throw new \InvalidArgumentException('invalid length for $safePlace when calling PostageDetailsRequest., must be smaller than or equal to 90.');
        }

        $this->container['safePlace'] = $safePlace;

        return $this;
    }

    /**
     * Gets department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->container['department'];
    }

    /**
     * Sets department
     *
     * @param string $department department
     *
     * @return $this
     */
    public function setDepartment($department)
    {
        if (!is_null($department) && (mb_strlen($department) > 150)) {
            throw new \InvalidArgumentException('invalid length for $department when calling PostageDetailsRequest., must be smaller than or equal to 150.');
        }

        $this->container['department'] = $department;

        return $this;
    }

    /**
     * Gets aIRNumber
     *
     * @return string
     */
    public function getAIRNumber()
    {
        return $this->container['aIRNumber'];
    }

    /**
     * Sets aIRNumber
     *
     * @param string $aIRNumber aIRNumber
     *
     * @return $this
     */
    public function setAIRNumber($aIRNumber)
    {
        if (!is_null($aIRNumber) && (mb_strlen($aIRNumber) > 50)) {
            throw new \InvalidArgumentException('invalid length for $aIRNumber when calling PostageDetailsRequest., must be smaller than or equal to 50.');
        }

        $this->container['aIRNumber'] = $aIRNumber;

        return $this;
    }

    /**
     * Gets requiresExportLicense
     *
     * @return bool
     */
    public function getRequiresExportLicense()
    {
        return $this->container['requiresExportLicense'];
    }

    /**
     * Sets requiresExportLicense
     *
     * @param bool $requiresExportLicense requiresExportLicense
     *
     * @return $this
     */
    public function setRequiresExportLicense($requiresExportLicense)
    {
        $this->container['requiresExportLicense'] = $requiresExportLicense;

        return $this;
    }

    /**
     * Gets commercialInvoiceNumber
     *
     * @return string
     */
    public function getCommercialInvoiceNumber()
    {
        return $this->container['commercialInvoiceNumber'];
    }

    /**
     * Sets commercialInvoiceNumber
     *
     * @param string $commercialInvoiceNumber commercialInvoiceNumber
     *
     * @return $this
     */
    public function setCommercialInvoiceNumber($commercialInvoiceNumber)
    {
        if (!is_null($commercialInvoiceNumber) && (mb_strlen($commercialInvoiceNumber) > 35)) {
            throw new \InvalidArgumentException('invalid length for $commercialInvoiceNumber when calling PostageDetailsRequest., must be smaller than or equal to 35.');
        }

        $this->container['commercialInvoiceNumber'] = $commercialInvoiceNumber;

        return $this;
    }

    /**
     * Gets commercialInvoiceDate
     *
     * @return \DateTime
     */
    public function getCommercialInvoiceDate()
    {
        return $this->container['commercialInvoiceDate'];
    }

    /**
     * Sets commercialInvoiceDate
     *
     * @param \DateTime $commercialInvoiceDate commercialInvoiceDate
     *
     * @return $this
     */
    public function setCommercialInvoiceDate($commercialInvoiceDate)
    {
        $this->container['commercialInvoiceDate'] = $commercialInvoiceDate;

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


