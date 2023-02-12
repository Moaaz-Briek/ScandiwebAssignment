<?php

class BookValidator extends ProductModel implements ValidationInterface
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
        if(preg_match('/^[^!@#$%^&*<>?\s]+$/', $this->inputs['weight'])
            && is_numeric($this->inputs['weight']) && floatval($this->inputs['weight'] >= 0))
        {
            $this->attribute = $this->inputs['weight'].' KG';
            return true;
        }
        return false;
    }
};