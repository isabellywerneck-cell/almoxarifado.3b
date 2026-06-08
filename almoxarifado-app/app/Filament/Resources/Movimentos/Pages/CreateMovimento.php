<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Produto;
use App\Models\Movimento;
use Filament\Notifications\Notification;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;
/**
 * oq esta a beforeCreate faz?
 * .....
 * 
 * @param $data recebe os dados do produto
 * @param $produto recebe uma lista com os dados dos produtos pelo id
 */

 
    // Hook - Verificar se há estoque suficiente para saída
protected function beforeCreate(): void
{
    //recebe a lista de produtos
    $data = $this->data;

    // selecionando o produto/qtd e tipo pelo id recebido na lista
    $produto = Produto :: find($data['produto_id']);
    $quantidade = $data['quantidade'];
    $tipo = $data['tipo'];

    // Verificar se é uma saída e se o estoque é suficiente
    if ($tipo === 's' && $quantidade > $produto->estoque) {
        // Notificar o usuário sobre o estoque insuficiente
        Notification :: make()
            ->danger()
            ->title('Estoque Insuficiente!')
            ->body("O estoque de '{$produto->nome}' e de apenas {$produto->estoque}, mas voce tentou retirar {$quantidade}.")
            ->send();

        $this->halt(); // Impede a criação do moviment o
    }
}

    //Hook - Remover ou aumentar o estoque
    protected function afterCreate(): void
    {
        $movimento = $this->getRecord(); // Registro do movimento criado
        $produto = $movimento->produto; // Produto relacionado ao movimento

        if ($movimento->tipo === 'e') {
            // Entrada: Aumentar o estoque
            $produto->increment('estoque', $movimento->quantidade);
        } else
            // Saída: Diminuir o estoque
            $produto->decrement('estoque', $movimento->quantidade);
        }

}