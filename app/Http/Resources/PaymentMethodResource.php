<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BankBenefitResource;

class PaymentMethodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'payment_method_id' => $this->id, 
            'name' => $this->name,
            'is_active' => 0,
            'bank_benefits' => BankBenefitResource::collection($this->bank_benefits)
        ];
    }
}
