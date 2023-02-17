<?php

class ProductValidatorController
{
    public string $error = '';
    private array $ProductIdentifier =
        [
            'dvd' => 'DvdValidator',
            'furniture' => 'FurnitureValidator',
            'book' => 'BookValidator',
        ];

    function __construct(array $inputs)
    {
        $type = $inputs['type'];
        $keys = array_keys($this->ProductIdentifier);
        if(in_array($type, $keys)) {
            $ProductValidator = $this->ProductIdentifier[$type];
            $this->Validate(new $ProductValidator($inputs));
        } else {
            $this->error .= 'Invalid type, Please select a valid type.<br>';
            return response(array('status' => 'failed', 'error' => $this->error));
        }
    }

    public function Validate(ValidationInterface $validate)
    {
        //Get ProductModel Validation Function Type
        if($validate->validateSKU())
            $this->error .= 'Invalid SKU or already exists <br>';
        if($validate->validateName())
            $this->error .= 'Invalid name <br>';
        if($validate->validatePrice())
            $this->error .= 'Invalid price <br>';
        if(!$validate->validateAttributes())
            $this->error .= 'Invalid attributes <br>';
        if($this->error == null)
        {
            $validate->saveProduct();
            return response(array('status' => 'success'));
        }
        return response(array('status' => 'failed', 'error' => $this->error));

    }
};