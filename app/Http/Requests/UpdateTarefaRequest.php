<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTarefaRequest extends FormRequest
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
    public function rules(): array {
        $id = $this->route('tarefa'); // Obtém o ID da tarefa da rota (ajuste conforme a sua configuração de rota)

        return [
            'nome' => 'required|unique:tarefas,nome,' . $id . '|max:255',
            'custo' => 'required|numeric|min:0.01',
            'data_limite' => 'required|date',
        ];
    }

    /**
     * Mensagens personalizadas para as validações.
     */
    public function messages() {
        return [
            'nome.unique' => 'Já existe uma tarefa com esse nome. Escolha outro nome.',
        ];
    }
}
