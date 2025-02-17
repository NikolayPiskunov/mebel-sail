<?php

namespace App\Http\Requests\Orders;

use App\Application\Order\Dtos\CreateOrderDto;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'min:3',
                'max:63000',
            ],
            'price' => [
                'required',
                'integer',
                'min:1',
            ],
            'deadline' => [
                'required',
                'date',
                'after:today',
            ],
        ];
    }

    public function toDto(): CreateOrderDto
    {
        $data = $this->validated();
        $data['deadline'] = new Carbon($data['deadline']);

        return CreateOrderDto::fromArray($data);
    }
}
