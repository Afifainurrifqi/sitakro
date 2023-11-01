<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedataindividuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [    
            'valUsiapertamamenikah' => 'required',
            'valSukubangsa' => 'required',
            'valWarganegara' => 'required',
            'valNomerwa' => 'required',
            'valEmail' => 'required',
            'valFacebook' => 'required',
            'valTwitter' => 'required',
            'valInstagram' => 'required',
        ];
    }
    public function messages(): array
    {
    return [
        

        'valUsiapertamamenikah.required' => ':attribute Kolom tidak boleh kosong',
        
        'valSukubangsa.required' => ':attribute Kolom tidak boleh kosong',
        
        'valWarganegara.required' => ':attribute Kolom tidak boleh kosong',
        
        'valNomerwa.required' => ':attribute Kolom tidak boleh kosong',
        
        'valEmail.required' => ':attribute Kolom tidak boleh kosong',
        
        'valFacebook.required' => ':attribute Kolom tidak boleh kosong',
        
        'valTwitter.required' => ':attribute Kolom tidak boleh kosong',
        
        'valInstagram.required' => ':attribute Kolom tidak boleh kosong',
        
        
    ];
    }
    public function attributes(): array
{
    return [
        'valUsiapertamamenikah' => 'Usiapertamamenikah',
        'valSukubangsa' => 'Sukubangsa',
        'valWarganegara' => 'Warganegara',
        'valNomerwa' => 'Nomerwa',
        'valEmail' => 'Email',
        'valFacebook' => 'Facebook',
        'valTwitter' => 'Twitter',
        'valInstagram' => 'Instagram',
    ];
}
}
