<?php

class DvdValidator extends ProductModel implements ValidationInterface
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

    public function ValidateAttributes(): bool
    {
        if(preg_match('/^[^!@#$%^&*<>?\s]+$/', $this->inputs['size'])
            && is_numeric($this->inputs['size']) && floatval($this->inputs['size'] >= 0))
        {
            $this->attribute = $this->inputs['size'].' MB';
            return true;
        }
        return false;
    }

};