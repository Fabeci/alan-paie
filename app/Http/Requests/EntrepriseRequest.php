<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nom_commercial' => 'required',
            'secteur_activite' => 'required',
            'activite' => 'required',
            'forme_juridique' => 'required',
            'numero_identification' => 'required',
            'date_creation' => 'required|date',
            'pays' => 'required',
            'ville' => 'required',
            'complement' => 'required',
            'bp' => 'required',
            'email' => 'required|unique:entreprises|email',
            'telephone' => 'required',
            // 'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2018',
            // 'initiales' => 'image|mimes:jpeg,png,jpg,gif|max:2018',
            // 'signature' => 'image|mimes:jpeg,png,jpg,gif|max:2018'
        ];
    }

    public function messages(){
        return[
            'nom_commercial.required' => 'Ce champ est requis',
            'secteur_activite.required' => 'Ce champ est requis',
            'activite.required' => 'Ce champ est requis',
            'forme_juridique.required' => 'Ce champ est requis',
            'numero_identification.required' => 'Ce champ est requis',
            'date_creation.required' => 'Ce champ est requis',
            'date_creation.date' => "La date de création n'est pas valide",
            'pays.required' => 'Ce champ est requis',
            'ville.required' => 'Ce champ est requis',
            'complement.required' => 'Ce champ est requis',
            'bp.required' => 'Ce champ est requis',
            'email.required' => 'Ce champ est requis',
            'email.unique' => "L'adresse email doit être unique",
            'email.email' => "L'adresse email n'est pas valide",
            'telephone.required' => 'Ce champ est requis',
            // 'logo.image' => "Veuillez choisir une image",
            // 'logo.mimes' => "L'image doit être de format jpeg, png, jpg ou gif",
            // 'logo.max' => "L'image ne doit pas peser plus de 2018 ko ",
            // 'initiales.image' => "Veuillez choisir une image",
            // 'initiales.mimes' => "L'image doit être de format jpeg, png, jpg ou gif",
            // 'initiales.max' => "L'image ne doit pas peser plus de 2018 ko ",
            // 'signature.image' => "Veuillez choisir une image",
            // 'signature.mimes' => "L'image doit être de format jpeg, png, jpg ou gif",
            // 'signature.max' => "L'image ne doit pas peser plus de 2018 ko ",
        ];
    }
}
