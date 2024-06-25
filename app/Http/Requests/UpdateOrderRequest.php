<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $order = Order::all()
            ->where('id','=',$this->route()->originalParameters()['order'])->first;
        $user = Auth::user();
        return $user->isUser() && $user->id === $order->get()->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $location = 'required|string|min:8';
        return [
            'item' => 'required|string|min:3',
            'pickup' => $location,
            'location' => $location,
            'contact' => 'required|string|min:6',
        ];
    }
}
