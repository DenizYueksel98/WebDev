<?php
namespace Framework;

class AbstractModel
{
    /**
     * Magic getter
     */
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Magic setter
     */
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    /**
     * Set model data from an array
     */
    public function fromArray($data)
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }
}