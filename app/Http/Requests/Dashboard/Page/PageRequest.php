<?php

namespace App\Http\Requests\Dashboard\Page;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Shared validation logic for the page store/update requests.
 * Rules are built dynamically from the selected content type so each
 * type only validates the files it actually uses.
 */
abstract class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $definition = $this->resolvedDefinition();

        return array_merge($this->baseRules(), $this->fileRules($definition));
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'section_id.required' => 'Veuillez sélectionner une section.',
            'section_id.exists' => 'La section sélectionnée est invalide.',
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne peut pas dépasser 500 caractères.',
            'subtitle.max' => 'Le sous-titre ne peut pas dépasser 255 caractères.',
            'category.max' => 'La catégorie ne peut pas dépasser 100 caractères.',
            'url.max' => 'L’URL ne peut pas dépasser 255 caractères.',
            'number.integer' => 'Le numéro doit être un nombre entier.',
            'year.integer' => 'L’année doit être un nombre entier.',
            'year.min' => 'L’année doit être au minimum 1900.',
            'year.max' => 'L’année doit être au maximum 2100.',
            'link.max' => 'Le lien ne peut pas dépasser 255 caractères.',
            'sort_order.integer' => 'L’ordre doit être un nombre entier.',
            'created_at.date' => 'La date doit être une date valide.',
            'media_mode.in' => 'Le type de média sélectionné est invalide.',
            'period.*.max' => 'La période ne peut pas dépasser 30 caractères.',
            'icon.image' => 'L’icône doit être une image.',
            'image.image' => 'L’image doit être une image.',
            'image_responsive.image' => 'L’image responsive doit être une image.',
            'events_image.image' => 'L’image d’événement doit être une image.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'section_id' => 'Section',
            'title' => 'Titre',
            'subtitle' => 'Sous-titre',
            'category' => 'Catégorie',
            'url' => 'URL',
            'number' => 'Numéro',
            'period' => 'Période',
            'year' => 'Année',
            'content' => 'Contenu',
            'content_sec' => 'Contenu secondaire',
            'link' => 'Lien',
            'icon' => 'Icône',
            'image' => 'Image',
            'image_responsive' => 'Image responsive',
            'events_image' => 'Image d’événement',
            'pdf' => 'PDF',
            'upload_video' => 'Vidéo',
            'created_at' => 'Date',
            'is_active' => 'Actif',
            'sort_order' => 'Ordre',
        ];
    }

    /**
     * Resolve the content type definition from the submitted type.
     *
     * @return array
     */
    protected function resolvedDefinition(): array
    {
        $types = config('pages.types', []);
        $type = $this->input('type');

        if (!$type || !isset($types[$type])) {
            $type = config('pages.default_type', 'generic');
        }

        return $types[$type];
    }

    /**
     * Scalar rules shared by every page type.
     *
     * @return array
     */
    protected function baseRules(): array
    {
        return [
            'section_id' => ['required', 'integer', 'exists:sections,id'],
            'type' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:500'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'url' => ['nullable', 'string', 'max:255'],
            'number' => ['nullable', 'integer'],
            'period' => ['nullable'],
            'period.*' => ['nullable', 'string', 'max:30'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'content' => ['nullable', 'string'],
            'content_sec' => ['nullable', 'string'],
            'link' => ['nullable', 'string', 'max:255'],
            'html_source' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'created_at' => ['nullable', 'date'],
            'media_mode' => ['nullable', 'in:video,image,link'],
            'remove_pdf' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Build the file rules for the resolved content type.
     *
     * @param array $definition
     * @return array
     */
    protected function fileRules(array $definition): array
    {
        $validationKey = $definition['validation'] ?? null;
        $imageRules = $validationKey ? config("pages.image_rules.{$validationKey}", []) : [];

        $rules = [];
        foreach ($imageRules as $field => $constraints) {
            $rules[$field] = array_merge(['nullable', 'image'], $constraints);
        }

        foreach (config('pages.file_rules', []) as $field => $constraints) {
            $rules[$field] = array_merge(['nullable'], $constraints);
        }

        return $rules;
    }
}
