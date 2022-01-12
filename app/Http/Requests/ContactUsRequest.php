<?php
namespace  App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ContactUsRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => ['string', 'email', 'required'],
            'name' => ['min:2', 'required', 'string'],
            'subject' => [
                'required',
                'string',
                Rule::in(['error', 'offerts', 'refund']),
            ],
            'message' => ['required', 'string', 'min:10'],
    ];
    }
}
