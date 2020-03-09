<?php

namespace App\Services;

use App\Models\Card;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CardService
{

    public function makeValidator($inputs)
    {
        return Validator::make(
            $inputs,
            $this->validationRules($inputs),
            [],
            $this->namesToErros()
        );
    }

    public function validationRules($input)
    {
        $nameSlug = [
            'required',
            'max:80',
            Rule::unique('cards', 'name')->ignore($input['id']),
        ];
        $ruleSlug = [
            'required',
            Rule::unique('cards', 'slug')->ignore($input['id']),
        ];

        return [
            'name' => $nameSlug,
            'slug' => $ruleSlug,
            'image' => 'required',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'limit' => 'nullable|numeric',
            'annual_fee' => 'nullable|numeric',
        ];
    }

    public function namesToErros()
    {
        return [ 
            "brand_id" => "brand", 
            "category_id" => "category" 
        ];
    }

}