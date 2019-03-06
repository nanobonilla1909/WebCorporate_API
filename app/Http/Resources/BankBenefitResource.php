<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Bank;

class BankBenefitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // dd($this->bank->name);
        return [
            'bank_id' => $this->bank->id,
            'bank_name' => $this->bank->name,
            'bank_benefit_id' => $this->id, 
            'quotes' => $this->quotes,
            'interest' => $this->interest

        ];
    }
}
