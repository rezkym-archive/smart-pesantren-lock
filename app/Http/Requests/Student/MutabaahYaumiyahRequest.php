<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MutabaahYaumiyahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $havePermission = $this->user()->hasPermissionTo('mutabaah_student');
        return $havePermission && true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $today = now()->format('l');

        /* if()
        {
            $puasa_sunnah = 'shalat_rawatib' => [Rule::in(['rawatib_true'])];
        } */
        if (request()->isMethod('POST')) {
            $rules =
                [
                    // Shalat
                    'shalat_wajib'  => [
                        'array',
                        Rule::in(['Shubuh', 'Dzuhur', 'Ashar', 'Maghrib', 'Isya'])
                    ],
                    'shalat_rawatib'        => [Rule::in(['1'])],
                    'shalat_tahajjud'       => [Rule::in(['1'])],
                    'shalat_dhuha'          => [Rule::in(['1'])],

                    // Qur'an
                    'juz_total' => 'numeric',

                    // Puasa
                    'puasa_sunnah' => [Rule::in(['puasa_sunnah_true'])],

                    // Shadaqoh
                    'shadaqoh'  => [Rule::in(['shadaqoh_true'])],

                    // Cinta Dzikir
                    'cinta_dzikir'  => [
                        'array',
                        Rule::in(['dzikir_pagi', 'dzikir_sore'])
                    ],
                ];

                return $rules;
        } else
        {
            abort(503);
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Shalat
            'shalat_wajib.in'       => 'Kesalahan sistem (404-shalat-not-registered).',
            'shalat_rawatib.in'     => 'Kesalahan sistem (404-shalat-rawatib-not-registered).',
            'shalat_tahajjud.in'    => 'Kesalahan sistem (404-shalat-tahajjud-not-registered).',
            'shalat_dhuha.in'       => 'Kesalahan sistem (404-shalat-tahajjud-not-registered).',
            // Qur'an
            'juz_total.numeric'     => 'Juz harus berbentuk angka',
            // Puasa Sunnah
            'puasa_sunnah.in'       => 'Kesalahan sistem (404-puasa_sunnah-not-registered).',
            // Shadaqoh
            'shadaqoh.in'           => 'Kesalahan sistem (404-shadaqoh-not-registered).',
            // Dzikir
            'cinta_dzikir.in'       => 'Kesalahan sistem (404-dzikir-not-registered).',
        ];
    }
}
