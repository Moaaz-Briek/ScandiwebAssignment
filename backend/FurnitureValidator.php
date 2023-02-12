<?php

class FurnitureValidator extends ProductModel implements ValidationInterface
{
    protected $inputs;

    function __construct(array $inputs)
    {
        parent::__construct();
        $this->inputs = $inputs;

        $this->sku = $inputs['sku'];
        $this->name = $inputs['name'];
        $this->price = $inputs['price'];
        $this->type = $inputs['type'];

    }

    public function validateAttributes(): bool
    {
        if (
            preg_match('/^[^!@#$%^&*<>?\s]+$/', $this->inputs['width'])
            && preg_match('/^[^!@#$%^&*<>?\s]+$/', $this->inputs['height'])
            && preg_match('/^[^!@#$%^&*<>?\s]+$/', $this->inputs['length'])
            && is_numeric($this->inputs['height'])
            && is_numeric($this->inputs['width'])
            && is_numeric($this->inputs['length'])
            && floatval($this->inputs['height'] >= 0)
            && floatval($this->inputs['width'] >= 0)
            && floatval($this->inputs['length'] >= 0)
        )
        {
            $this->attribute = $this->inputs['height'].'x'.$this->inputs['width'].'x'.$this->inputs['length'];
            return true;
        }
        return false;
    }

};