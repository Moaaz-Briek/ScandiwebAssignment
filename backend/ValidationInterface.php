<?php

interface ValidationInterface
{
    public function validateSKU();
    public function validateName();
    public function validateType();
    public function validatePrice();
    public function validateAttributes();
}