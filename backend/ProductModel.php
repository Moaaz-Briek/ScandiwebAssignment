<?php

class ProductModel extends MySQlQueryBuilder
{
    private $tableName = 'products';
    protected $inputs;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $attribute;

    function __construct()
    {
        parent::__construct($this->tableName);
    }

    public function saveProduct()
    {
        return $this->insert(array($this->sku, $this->name, $this->price, $this->type, $this->attribute));
    }

    public function getAllProducts(): array
    {
        return $this->select(['*'])->get();
    }

    public function deleteProduct($ids): void
    {
        foreach ($ids as $value){
            foreach ($value as $k => $val){
                $this->delete('id', strval($val));
            }
        }
    }

    public function find(string $sku): array
    {
        return $this->select(['*'])->where('sku', '=', $sku)->get();
    }

    public function validateSKU(): bool
    {
        return !(preg_match('/^[\w\s]+$/', $this->inputs['sku']) && !($this->find($this->inputs['sku'])));
    }

    public function validateName(): bool
    {
        return !(preg_match('/^[\w\s]+$/', $this->inputs['name']));
    }

    public function validatePrice(): bool
    {
        return !(preg_match('/^[^\D\s]+$/', $this->inputs['price'])
            && (filter_var($this->inputs['price'], FILTER_VALIDATE_FLOAT))
            && (strlen($this->inputs['price']) > 0) && floatval($this->inputs['price'] >= 0));
    }

    public function validateType(): bool
    {
        return !(preg_match('/^[a-z]{1,10}$/', $this->inputs['type']));
    }
};