<?php

/**
 * Text field
 */
class PodioTextItemField extends PodioItemField
{
    /**
     * Override __set to use field specific method for setting values property
     */
    public function __set($name, $value)
    {
        if ($name == 'values' && $value !== null) {
            return $this->set_value($value);
        }
        return parent::__set($name, $value);
    }

    /**
     * Override __get to provide values as a string
     */
    public function __get($name)
    {
        $attribute = parent::__get($name);
        if ($name == 'values' && $attribute) {
            return $attribute[0]['value'];
        }
        return $attribute;
    }

    public function set_value($values)
    {
        parent::__set('values', $values ? array(array('value' => $values)) : array());
    }

    public function humanized_value()
    {
        return strip_tags($this->values);
    }

    public function api_friendly_values()
    {
        return $this->values ? $this->values : null;
    }
}
