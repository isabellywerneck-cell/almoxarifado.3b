# Planejamento: Sistema de Almoxarifado

## 1. Requisitos Funcionais
* [RF01] Cadastro de Itens: 0 sistema deve permitir registrar o nome e a marca de um produto novo.
* [RF02] Controle de Entrada e Saida: O usuario deve conseguir registrar quantas unidades de um produto estão
entrando ou saindo do almoxarifado.
* [RF03] Consulta de Estoque: 0 sistema deve exibir uma lista clara com todos os produtos e a quantidade que
temos disponivel de cada um no momento.
* [RF04] Historico: 0 usuário deve conseguir ver o histórico do que aconteceu com cada produto (ex: "hoje
entraram 10 peças").

## 2. Requisitos Nao Funcionais
* [RNF01] Responsividade: O sistema deve funcionar bem tanto em telas de computador quanto em celulares. Os
botões de "Entrada" e "Saída" devem ser fáceis de clicar mesmo em telas pequenas (telas sensíveis ao toque).
* [RNF02] Simplicidade: A interface deve ser direta, evitando menus complicados para que o funcionário do
almoxarifado consiga registrar uma movimentacao em poucos segundos.
* [RNF03] Seguranca: Garantir que apenas usuarios autorizados possam alterar o estoque e cadastrar produtos.

## 3. Regras de Negócio
* [RN01] Consistencia: O saldo do produto na tabela de "Produtos" deve ser sempre o resultado da soma de todas
as entradas menos a soma de todas as saidas registradas na tabela de "Movimentacoes".
* [RN02] Não permitir saldo negativo: 0 sistema não deve permitir que uma "Saida" seja registrada se não houver
estoque suficiente, para evitar erros no almoxarifado.