<?php
/**
 * Commodity
 *
 * PHP version 5
 *
 * @category Class
 * @package  PurplShip
 * @author   PurplShip Codegen team
 * @link     https://github.com/purplship/purplship-clients
 */

/**
 * PurplShip Multi-carrier API
 *
 * PurplShip is a Multi-carrier Shipping API that simplifies the integration of logistic carrier services
 *
 * OpenAPI spec version: v1
 * Contact: hello@purplship.com
 * Generated by: https://github.com/purplship/purplship-clients.git
 * PurplShip Codegen version: 2.4.14
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/purplship/purplship-clients
 * Do not edit the class manually.
 */

namespace PurplShip\Model;

use \ArrayAccess;
use \PurplShip\ObjectSerializer;

/**
 * Commodity Class Doc Comment
 *
 * @category Class
 * @package  PurplShip
 * @author   PurplShip Codegen team
 * @link     https://github.com/purplship/purplship-clients
 */
class Commodity implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Commodity';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'weight' => 'float',
        'width' => 'float',
        'height' => 'float',
        'length' => 'float',
        'description' => 'string',
        'quantity' => 'int',
        'sku' => 'string',
        'value_amount' => 'float',
        'value_currency' => 'string',
        'origin_country' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'weight' => null,
        'width' => null,
        'height' => null,
        'length' => null,
        'description' => null,
        'quantity' => null,
        'sku' => null,
        'value_amount' => null,
        'value_currency' => null,
        'origin_country' => null
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
        'id' => 'id',
        'weight' => 'weight',
        'width' => 'width',
        'height' => 'height',
        'length' => 'length',
        'description' => 'description',
        'quantity' => 'quantity',
        'sku' => 'sku',
        'value_amount' => 'valueAmount',
        'value_currency' => 'valueCurrency',
        'origin_country' => 'originCountry'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'weight' => 'setWeight',
        'width' => 'setWidth',
        'height' => 'setHeight',
        'length' => 'setLength',
        'description' => 'setDescription',
        'quantity' => 'setQuantity',
        'sku' => 'setSku',
        'value_amount' => 'setValueAmount',
        'value_currency' => 'setValueCurrency',
        'origin_country' => 'setOriginCountry'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'weight' => 'getWeight',
        'width' => 'getWidth',
        'height' => 'getHeight',
        'length' => 'getLength',
        'description' => 'getDescription',
        'quantity' => 'getQuantity',
        'sku' => 'getSku',
        'value_amount' => 'getValueAmount',
        'value_currency' => 'getValueCurrency',
        'origin_country' => 'getOriginCountry'
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['weight'] = isset($data['weight']) ? $data['weight'] : null;
        $this->container['width'] = isset($data['width']) ? $data['width'] : null;
        $this->container['height'] = isset($data['height']) ? $data['height'] : null;
        $this->container['length'] = isset($data['length']) ? $data['length'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['sku'] = isset($data['sku']) ? $data['sku'] : null;
        $this->container['value_amount'] = isset($data['value_amount']) ? $data['value_amount'] : null;
        $this->container['value_currency'] = isset($data['value_currency']) ? $data['value_currency'] : null;
        $this->container['origin_country'] = isset($data['origin_country']) ? $data['origin_country'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['description']) && (mb_strlen($this->container['description']) < 1)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['sku']) && (mb_strlen($this->container['sku']) < 1)) {
            $invalidProperties[] = "invalid value for 'sku', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['value_currency']) && (mb_strlen($this->container['value_currency']) < 1)) {
            $invalidProperties[] = "invalid value for 'value_currency', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['origin_country']) && (mb_strlen($this->container['origin_country']) < 1)) {
            $invalidProperties[] = "invalid value for 'origin_country', the character length must be bigger than or equal to 1.";
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id A unique commodity's identifier
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param float $weight The commodity's weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->container['weight'] = $weight;

        return $this;
    }

    /**
     * Gets width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param float $width The commodity's width
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param float $height The commodity's height
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets length
     *
     * @return float
     */
    public function getLength()
    {
        return $this->container['length'];
    }

    /**
     * Sets length
     *
     * @param float $length The commodity's lenght
     *
     * @return $this
     */
    public function setLength($length)
    {
        $this->container['length'] = $length;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description A description of the commodity
     *
     * @return $this
     */
    public function setDescription($description)
    {

        if (!is_null($description) && (mb_strlen($description) < 1)) {
            throw new \InvalidArgumentException('invalid length for $description when calling Commodity., must be bigger than or equal to 1.');
        }

        $this->container['description'] = $description;

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
     * @param int $quantity The commodity's quantity (number or item)
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->container['sku'];
    }

    /**
     * Sets sku
     *
     * @param string $sku The commodity's sku number
     *
     * @return $this
     */
    public function setSku($sku)
    {

        if (!is_null($sku) && (mb_strlen($sku) < 1)) {
            throw new \InvalidArgumentException('invalid length for $sku when calling Commodity., must be bigger than or equal to 1.');
        }

        $this->container['sku'] = $sku;

        return $this;
    }

    /**
     * Gets value_amount
     *
     * @return float
     */
    public function getValueAmount()
    {
        return $this->container['value_amount'];
    }

    /**
     * Sets value_amount
     *
     * @param float $value_amount The monetary value of the commodity
     *
     * @return $this
     */
    public function setValueAmount($value_amount)
    {
        $this->container['value_amount'] = $value_amount;

        return $this;
    }

    /**
     * Gets value_currency
     *
     * @return string
     */
    public function getValueCurrency()
    {
        return $this->container['value_currency'];
    }

    /**
     * Sets value_currency
     *
     * @param string $value_currency The currency of the commodity value amount
     *
     * @return $this
     */
    public function setValueCurrency($value_currency)
    {

        if (!is_null($value_currency) && (mb_strlen($value_currency) < 1)) {
            throw new \InvalidArgumentException('invalid length for $value_currency when calling Commodity., must be bigger than or equal to 1.');
        }

        $this->container['value_currency'] = $value_currency;

        return $this;
    }

    /**
     * Gets origin_country
     *
     * @return string
     */
    public function getOriginCountry()
    {
        return $this->container['origin_country'];
    }

    /**
     * Sets origin_country
     *
     * @param string $origin_country The origin or manufacture country
     *
     * @return $this
     */
    public function setOriginCountry($origin_country)
    {

        if (!is_null($origin_country) && (mb_strlen($origin_country) < 1)) {
            throw new \InvalidArgumentException('invalid length for $origin_country when calling Commodity., must be bigger than or equal to 1.');
        }

        $this->container['origin_country'] = $origin_country;

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

