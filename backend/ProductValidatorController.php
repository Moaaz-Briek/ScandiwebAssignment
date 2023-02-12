<?php

class ProductValidatorController
{
    private array $ProductIdentifier =
        [
            'dvd' => 'DvdValidator',
            'furniture' => 'FurnitureValidator',
            'book' => 'BookValidator',
        ];

    function __construct(array $inputs)
    {
        $ProductValidator = $this->ProductIdentifier[$inputs['type']];
        $this->Validate(new $ProductValidator($inputs));
    }

    public function Validate(ValidationInterface $validate)
    {
        $error = '';
        //Get ProductModel Validation Function Type
        if($validate->validateSKU())
            $error .= 'Invalid SKU or already exists <br>';
        if($validate->validateName())
            $error .= 'Invalid name <br>';
        if($validate->validatePrice())
            $error .= 'Invalid price <br>';
        if($validate->validateType())
            $error .= 'Invalid type <br>';
        if(!$validate->validateAttributes())
            $error .= 'Invalid attributes <br>';
        if($error == null)
        {
            $validate->saveProduct();
            return response(array('status' => 'success'));
        }
        return response(array('status' => 'failed', 'error' => $error));

    }
};