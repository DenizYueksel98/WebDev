<?php
namespace Framework;

class AbstractModel
{
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

     
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    /**
     * Set model data from an array
     */
    public function fromArray($rowAsArray)
    {
        foreach($rowAsArray as $key => $value) {
            $this->$key = $value;
        }
    }
}