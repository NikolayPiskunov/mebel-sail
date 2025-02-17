<?php

namespace App\Http\Requests\Orders;

use App\Application\Order\Dtos\UpdateOrderDto;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateOrderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'int',
            ],
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
            ],
        ];
    }

    public function toDto(): UpdateOrderDto
    {
        $data = $this->validated();
        $data['deadline'] = new Carbon($data['deadline']);

        return UpdateOrderDto::fromArray($data);
    }
}
