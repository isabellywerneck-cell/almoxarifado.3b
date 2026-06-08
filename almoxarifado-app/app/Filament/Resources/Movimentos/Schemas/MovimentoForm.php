<?php

namespace App\Filament\Resources\Movimentos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovimentoForm
{
    public static function configure(Schema $schema): Schema
    {
    return $schema
        ->components ([
            // TROQUE O TextInput POR Select AQUI:
         Select :: make('produto_id
         ')
            ->label('Produto')
            ->relationship(name: 'produto', titleAttribute: 'nome') // <--- O Filament busca o nome aqui
            ->searchable() // Permite pesquisar pelo nome
            ->preload()
            ->required(),
            
            //xtInput :: make('produto_id')
            // ->required()
            //>numeric(),
        TextInput::make('quantidade')
            ->required()
            ->numeric(),
         Select::make('tipo')
            ->options(['e' =>'E', 's' => 's'])
            ->required(),
        ]);
    }
}