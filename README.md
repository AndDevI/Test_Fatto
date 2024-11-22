# Gerenciador de Tarefas

Este projeto é um **Gerenciador de Tarefas** desenvolvido com **Laravel** e estilizado com **TailwindCSS**. Ele permite criar, editar, excluir e listar tarefas em uma interface simples e intuitiva. Além disso, oferece funcionalidades como reordenamento de tarefas via drag-and-drop e destaque para novas tarefas criadas.

## Funcionalidades

- **Listar Tarefas**: Exibe as tarefas em uma tabela com informações detalhadas.
- **Adicionar Tarefa**: Permite criar novas tarefas e destacá-las temporariamente na lista.
- **Editar Tarefa**: Possibilita a edição de informações de tarefas existentes.
- **Excluir Tarefa**: Exclui tarefas de forma prática.
- **Reordenamento de Tarefas**: As tarefas podem ser reordenadas arrastando e soltando na lista.
- **Destaque de Novas Tarefas**: A nova tarefa criada recebe um destaque visual temporário.

## Pré-requisitos

Antes de iniciar, você precisa ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

Além disso, é necessário configurar um banco de dados MySQL.

## Instalação

1. Instale as dependências do Laravel:
   ```bash
   composer install
   ```
2. Instale as dependências do front-end:
   ```bash
   npm install
   ```
3. Configure o arquivo .env:
  ```bash
   cp .env.example .env
   ```
4. Gere a chave da aplicação:
  ```bash
   php artisan key:generate
   ```
5. Execute as migrações do banco de dados:
  ```bash
   php artisan migrate
   ```

## Como usar

1. Compile os assets do front-end:
  ```bash
   npm run dev
   ```
2. Inicie o servidor de desenvolvimento:
  ```bash
   php artisan serve
   ```
3. Acesse o projeto no navegador:
  ```bash
   http://127.0.0.1:8000
   ```
4. Navegue pelas funcionalidades:
- Para adicionar uma nova tarefa, clique no botão "+" no canto inferior direito.
- Para editar ou excluir, utilize os botões correspondentes na tabela de tarefas.

## Recursos Avançados

# Reordenamento de Tarefas
As tarefas podem ser reordenadas arrastando e soltando diretamente na lista. Após soltar, a nova ordem é automaticamente salva no banco de dados.

# Destaque de Novas Tarefas
Quando uma nova tarefa é criada, ela recebe uma animação temporária para ser facilmente identificada na lista.

# Rolagem Automática para Novas Tarefas
Após a criação de uma nova tarefa, a tabela rola automaticamente para que a nova tarefa esteja visível.

## Estrutura de Diretórios
- **app/Http/Controllers:** Controladores responsáveis pelas requisições HTTP.
- **resources/views:** Arquivos Blade para renderização das páginas.
- **public/css:** Arquivos de estilos gerados pelo TailwindCSS.
- **routes/web.php:** Define as rotas da aplicação.
- **database/migrations:** Arquivos de migração para criação das tabelas.

## Tecnologias Utilizadas
**Laravel:** Framework PHP para back-end.
**TailwindCSS:** Framework de CSS utilitário para estilização.
**SortableJS:** Biblioteca para reordenamento de elementos via drag-and-drop.
**JavaScript:** Para interações e efeitos visuais.


Coded by <a href="[#](https://github.com/AndDevI)">Andrew Raphael</a>.