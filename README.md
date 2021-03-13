# Teste para candidatos à vaga de Desenvolvedor Laravel - PLENO.

Olá caro desenvolvedor, nesse teste analisaremos seu conhecimento geral e inclusive velocidade de desenvolvimento. Abaixo explicaremos tudo o que será necessário.

## Instruções

Você deve desenvolver uma API, utilizando Laravel 8.


A escolha das bibliotecas, banco de dados, arquitetura, etc, fica a seu critério.

O código precisa rodar em macOS ou Ubuntu com container Docker.

Altere o arquivo README explicando o que é preciso para rodar sua aplicação.

O teste
--------

### Back-End/PHP

A primeira etapa será o desenvolvimento **backend/PHP**:

**Descrição:**

- Você deverá desenvolver uma 'mini api' para que seja possível realizar operações CRUD do objeto Carro.

> **Obs:**
> - Você pode usar mysql como banco de dados.
> - Cada carro deve ter ID, Marca, Modelo, Ano.
> - Padrões de Projetos, SOLID.

Sugerimos o retorno dessa 'mini api' nas seguinte urls:

 - `/carros` - [GET] deve retornar todos os carros cadastrados.
 - `/carros` - [POST] deve cadastrar um novo carro.
 - `/carros/{id}`[GET] deve retornar o carro com ID especificado.
 - `/carros/{id}`[PUT] deve atualizar os dados do carro com ID especificado.
 - `/carros/{id}`[DELETE] deve apagar o carro com ID especificado.
 

### Front-End

Para a segunda etapa do teste, você deverá desenvolver uma SPA com o Vue.js:

- Ver a lista de carros cadastrados
- Criar um novo carro
- Editar um carro existente
- Apagar um carro existente

> **Obs:**
> - A página deve ser responsiva.
> - Ao criar/editar um carro, o campo "marca" deverá ser um `SELECT`


## Entrega

Para iniciar o teste, faça um fork deste repositório, crie uma branch com o seu nome completo e depois envie-nos o pull request.
Se você apenas clonar o repositório não vai conseguir fazer push e depois vai ser mais complicado fazer o pull request.


## Nossa análise

- Organização do código, separação de módulos, legibilidade e comentários.
- Commit enviar um unico PR.


## Dúvidas?

Quaisquer dúvidas que você venha a ter, abra você mesmo uma nova issue, ou mande um emai.

### Boa sorte!
