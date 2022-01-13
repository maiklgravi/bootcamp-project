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
            'email' => ['required','string', 'email',],
            'name' => ['required', 'string','min:2' ],
            'subject' => [
                'required',
                'string',
                Rule::in(['error', 'offerts', 'refund']),
            ],
            'message' => ['required', 'string', 'min:10'],
    ];
    }
}
