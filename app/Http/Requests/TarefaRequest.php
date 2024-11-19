<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|unique:tarefas|max:255',
            'custo' => 'required|numeric|min:0.01',
            'data_limite' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'nome.unique' => 'Já existe uma tarefa com esse nome. Escolha outro nome.',
        ];
    }
}
