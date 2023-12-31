<?php
/**
 * ProductItemRequest
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
 * ProductItemRequest Class Doc Comment
 *
 * @category Class
 * @package  RoyalMail\ClickAndDrop\Rest\Api
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductItemRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ProductItemRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
        'sKU' => 'string',
        'quantity' => 'int',
        'unitValue' => 'float',
        'unitWeightInGrams' => 'float',
        'customsDescription' => 'string',
        'extendedCustomsDescription' => 'string',
        'customsCode' => 'string',
        'originCountryCode' => 'string',
        'customsDeclarationCategory' => 'string',
        'requiresExportLicence' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
        'sKU' => null,
        'quantity' => 'int32',
        'unitValue' => null,
        'unitWeightInGrams' => null,
        'customsDescription' => null,
        'extendedCustomsDescription' => null,
        'customsCode' => null,
        'originCountryCode' => null,
        'customsDeclarationCategory' => null,
        'requiresExportLicence' => null
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
        'name' => 'name',
        'sKU' => 'SKU',
        'quantity' => 'quantity',
        'unitValue' => 'unitValue',
        'unitWeightInGrams' => 'unitWeightInGrams',
        'customsDescription' => 'customsDescription',
        'extendedCustomsDescription' => 'extendedCustomsDescription',
        'customsCode' => 'customsCode',
        'originCountryCode' => 'originCountryCode',
        'customsDeclarationCategory' => 'customsDeclarationCategory',
        'requiresExportLicence' => 'requiresExportLicence'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'sKU' => 'setSKU',
        'quantity' => 'setQuantity',
        'unitValue' => 'setUnitValue',
        'unitWeightInGrams' => 'setUnitWeightInGrams',
        'customsDescription' => 'setCustomsDescription',
        'extendedCustomsDescription' => 'setExtendedCustomsDescription',
        'customsCode' => 'setCustomsCode',
        'originCountryCode' => 'setOriginCountryCode',
        'customsDeclarationCategory' => 'setCustomsDeclarationCategory',
        'requiresExportLicence' => 'setRequiresExportLicence'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'sKU' => 'getSKU',
        'quantity' => 'getQuantity',
        'unitValue' => 'getUnitValue',
        'unitWeightInGrams' => 'getUnitWeightInGrams',
        'customsDescription' => 'getCustomsDescription',
        'extendedCustomsDescription' => 'getExtendedCustomsDescription',
        'customsCode' => 'getCustomsCode',
        'originCountryCode' => 'getOriginCountryCode',
        'customsDeclarationCategory' => 'getCustomsDeclarationCategory',
        'requiresExportLicence' => 'getRequiresExportLicence'
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

    const CUSTOMS_DECLARATION_CATEGORY_NONE = 'none';
    const CUSTOMS_DECLARATION_CATEGORY_GIFT = 'gift';
    const CUSTOMS_DECLARATION_CATEGORY_COMMERCIAL_SAMPLE = 'commercialSample';
    const CUSTOMS_DECLARATION_CATEGORY_DOCUMENTS = 'documents';
    const CUSTOMS_DECLARATION_CATEGORY_OTHER = 'other';
    const CUSTOMS_DECLARATION_CATEGORY_RETURNED_GOODS = 'returnedGoods';
    const CUSTOMS_DECLARATION_CATEGORY_SALE_OF_GOODS = 'saleOfGoods';
    const CUSTOMS_DECLARATION_CATEGORY_MIXED_CONTENT = 'mixedContent';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCustomsDeclarationCategoryAllowableValues()
    {
        return [
            self::CUSTOMS_DECLARATION_CATEGORY_NONE,
            self::CUSTOMS_DECLARATION_CATEGORY_GIFT,
            self::CUSTOMS_DECLARATION_CATEGORY_COMMERCIAL_SAMPLE,
            self::CUSTOMS_DECLARATION_CATEGORY_DOCUMENTS,
            self::CUSTOMS_DECLARATION_CATEGORY_OTHER,
            self::CUSTOMS_DECLARATION_CATEGORY_RETURNED_GOODS,
            self::CUSTOMS_DECLARATION_CATEGORY_SALE_OF_GOODS,
            self::CUSTOMS_DECLARATION_CATEGORY_MIXED_CONTENT,
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['sKU'] = isset($data['sKU']) ? $data['sKU'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['unitValue'] = isset($data['unitValue']) ? $data['unitValue'] : null;
        $this->container['unitWeightInGrams'] = isset($data['unitWeightInGrams']) ? $data['unitWeightInGrams'] : null;
        $this->container['customsDescription'] = isset($data['customsDescription']) ? $data['customsDescription'] : null;
        $this->container['extendedCustomsDescription'] = isset($data['extendedCustomsDescription']) ? $data['extendedCustomsDescription'] : null;
        $this->container['customsCode'] = isset($data['customsCode']) ? $data['customsCode'] : null;
        $this->container['originCountryCode'] = isset($data['originCountryCode']) ? $data['originCountryCode'] : null;
        $this->container['customsDeclarationCategory'] = isset($data['customsDeclarationCategory']) ? $data['customsDeclarationCategory'] : null;
        $this->container['requiresExportLicence'] = isset($data['requiresExportLicence']) ? $data['requiresExportLicence'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['name']) && (mb_strlen($this->container['name']) > 800)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 800.";
        }

        if (!is_null($this->container['sKU']) && (mb_strlen($this->container['sKU']) > 100)) {
            $invalidProperties[] = "invalid value for 'sKU', the character length must be smaller than or equal to 100.";
        }

        if ($this->container['quantity'] === null) {
            $invalidProperties[] = "'quantity' can't be null";
        }
        if (($this->container['quantity'] > 999999)) {
            $invalidProperties[] = "invalid value for 'quantity', must be smaller than or equal to 999999.";
        }

        if (($this->container['quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'quantity', must be bigger than or equal to 1.";
        }

        if ($this->container['unitValue'] === null) {
            $invalidProperties[] = "'unitValue' can't be null";
        }
        if (($this->container['unitValue'] > 999999)) {
            $invalidProperties[] = "invalid value for 'unitValue', must be smaller than or equal to 999999.";
        }

        if (($this->container['unitValue'] < 0)) {
            $invalidProperties[] = "invalid value for 'unitValue', must be bigger than or equal to 0.";
        }

        if ($this->container['unitWeightInGrams'] === null) {
            $invalidProperties[] = "'unitWeightInGrams' can't be null";
        }
        if (($this->container['unitWeightInGrams'] > 999999)) {
            $invalidProperties[] = "invalid value for 'unitWeightInGrams', must be smaller than or equal to 999999.";
        }

        if (($this->container['unitWeightInGrams'] < 0)) {
            $invalidProperties[] = "invalid value for 'unitWeightInGrams', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['customsDescription']) && (mb_strlen($this->container['customsDescription']) > 50)) {
            $invalidProperties[] = "invalid value for 'customsDescription', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['extendedCustomsDescription']) && (mb_strlen($this->container['extendedCustomsDescription']) > 300)) {
            $invalidProperties[] = "invalid value for 'extendedCustomsDescription', the character length must be smaller than or equal to 300.";
        }

        if (!is_null($this->container['customsCode']) && (mb_strlen($this->container['customsCode']) > 10)) {
            $invalidProperties[] = "invalid value for 'customsCode', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['originCountryCode']) && (mb_strlen($this->container['originCountryCode']) > 3)) {
            $invalidProperties[] = "invalid value for 'originCountryCode', the character length must be smaller than or equal to 3.";
        }

        $allowedValues = $this->getCustomsDeclarationCategoryAllowableValues();
        if (!is_null($this->container['customsDeclarationCategory']) && !in_array($this->container['customsDeclarationCategory'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'customsDeclarationCategory', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (!is_null($name) && (mb_strlen($name) > 800)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ProductItemRequest., must be smaller than or equal to 800.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets sKU
     *
     * @return string
     */
    public function getSKU()
    {
        return $this->container['sKU'];
    }

    /**
     * Sets sKU
     *
     * @param string $sKU sKU
     *
     * @return $this
     */
    public function setSKU($sKU)
    {
        if (!is_null($sKU) && (mb_strlen($sKU) > 100)) {
            throw new \InvalidArgumentException('invalid length for $sKU when calling ProductItemRequest., must be smaller than or equal to 100.');
        }

        $this->container['sKU'] = $sKU;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int $quantity quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {

        if (($quantity > 999999)) {
            throw new \InvalidArgumentException('invalid value for $quantity when calling ProductItemRequest., must be smaller than or equal to 999999.');
        }
        if (($quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $quantity when calling ProductItemRequest., must be bigger than or equal to 1.');
        }

        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets unitValue
     *
     * @return float
     */
    public function getUnitValue()
    {
        return $this->container['unitValue'];
    }

    /**
     * Sets unitValue
     *
     * @param float $unitValue unitValue
     *
     * @return $this
     */
    public function setUnitValue($unitValue)
    {

        if (($unitValue > 999999)) {
            throw new \InvalidArgumentException('invalid value for $unitValue when calling ProductItemRequest., must be smaller than or equal to 999999.');
        }
        if (($unitValue < 0)) {
            throw new \InvalidArgumentException('invalid value for $unitValue when calling ProductItemRequest., must be bigger than or equal to 0.');
        }

        $this->container['unitValue'] = $unitValue;

        return $this;
    }

    /**
     * Gets unitWeightInGrams
     *
     * @return float
     */
    public function getUnitWeightInGrams()
    {
        return $this->container['unitWeightInGrams'];
    }

    /**
     * Sets unitWeightInGrams
     *
     * @param float $unitWeightInGrams unitWeightInGrams
     *
     * @return $this
     */
    public function setUnitWeightInGrams($unitWeightInGrams)
    {

        if (($unitWeightInGrams > 999999)) {
            throw new \InvalidArgumentException('invalid value for $unitWeightInGrams when calling ProductItemRequest., must be smaller than or equal to 999999.');
        }
        if (($unitWeightInGrams < 0)) {
            throw new \InvalidArgumentException('invalid value for $unitWeightInGrams when calling ProductItemRequest., must be bigger than or equal to 0.');
        }

        $this->container['unitWeightInGrams'] = $unitWeightInGrams;

        return $this;
    }

    /**
     * Gets customsDescription
     *
     * @return string
     */
    public function getCustomsDescription()
    {
        return $this->container['customsDescription'];
    }

    /**
     * Sets customsDescription
     *
     * @param string $customsDescription customsDescription
     *
     * @return $this
     */
    public function setCustomsDescription($customsDescription)
    {
        if (!is_null($customsDescription) && (mb_strlen($customsDescription) > 50)) {
            throw new \InvalidArgumentException('invalid length for $customsDescription when calling ProductItemRequest., must be smaller than or equal to 50.');
        }

        $this->container['customsDescription'] = $customsDescription;

        return $this;
    }

    /**
     * Gets extendedCustomsDescription
     *
     * @return string
     */
    public function getExtendedCustomsDescription()
    {
        return $this->container['extendedCustomsDescription'];
    }

    /**
     * Sets extendedCustomsDescription
     *
     * @param string $extendedCustomsDescription extendedCustomsDescription
     *
     * @return $this
     */
    public function setExtendedCustomsDescription($extendedCustomsDescription)
    {
        if (!is_null($extendedCustomsDescription) && (mb_strlen($extendedCustomsDescription) > 300)) {
            throw new \InvalidArgumentException('invalid length for $extendedCustomsDescription when calling ProductItemRequest., must be smaller than or equal to 300.');
        }

        $this->container['extendedCustomsDescription'] = $extendedCustomsDescription;

        return $this;
    }

    /**
     * Gets customsCode
     *
     * @return string
     */
    public function getCustomsCode()
    {
        return $this->container['customsCode'];
    }

    /**
     * Sets customsCode
     *
     * @param string $customsCode customsCode
     *
     * @return $this
     */
    public function setCustomsCode($customsCode)
    {
        if (!is_null($customsCode) && (mb_strlen($customsCode) > 10)) {
            throw new \InvalidArgumentException('invalid length for $customsCode when calling ProductItemRequest., must be smaller than or equal to 10.');
        }

        $this->container['customsCode'] = $customsCode;

        return $this;
    }

    /**
     * Gets originCountryCode
     *
     * @return string
     */
    public function getOriginCountryCode()
    {
        return $this->container['originCountryCode'];
    }

    /**
     * Sets originCountryCode
     *
     * @param string $originCountryCode originCountryCode
     *
     * @return $this
     */
    public function setOriginCountryCode($originCountryCode)
    {
        if (!is_null($originCountryCode) && (mb_strlen($originCountryCode) > 3)) {
            throw new \InvalidArgumentException('invalid length for $originCountryCode when calling ProductItemRequest., must be smaller than or equal to 3.');
        }

        $this->container['originCountryCode'] = $originCountryCode;

        return $this;
    }

    /**
     * Gets customsDeclarationCategory
     *
     * @return string
     */
    public function getCustomsDeclarationCategory()
    {
        return $this->container['customsDeclarationCategory'];
    }

    /**
     * Sets customsDeclarationCategory
     *
     * @param string $customsDeclarationCategory customsDeclarationCategory
     *
     * @return $this
     */
    public function setCustomsDeclarationCategory($customsDeclarationCategory)
    {
        $allowedValues = $this->getCustomsDeclarationCategoryAllowableValues();
        if (!is_null($customsDeclarationCategory) && !in_array($customsDeclarationCategory, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'customsDeclarationCategory', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['customsDeclarationCategory'] = $customsDeclarationCategory;

        return $this;
    }

    /**
     * Gets requiresExportLicence
     *
     * @return bool
     */
    public function getRequiresExportLicence()
    {
        return $this->container['requiresExportLicence'];
    }

    /**
     * Sets requiresExportLicence
     *
     * @param bool $requiresExportLicence requiresExportLicence
     *
     * @return $this
     */
    public function setRequiresExportLicence($requiresExportLicence)
    {
        $this->container['requiresExportLicence'] = $requiresExportLicence;

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


