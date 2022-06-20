# API Dental Up

## Atenção!
Este projeto foi desenvolvido para fins de avaliação para a disciplina de Desenvolvimento Web Servidor
ministrada pelo professor Diego Roberto Antunes na Universidade Tecnológica Federal do Paraná - Campi Ponta Grossa

## Pré Requisitos
- Instalar e configurar o ambiente com Xampp
- Instalar Composer de forma global
- Iniciar o Xampp junto iniciando o Apache e o MySQL;

## Instalação
- Fazer o download do projeto no repositório
- Executar o composer install na pasta do projeto
- Criar um banco de dados
- Duplicar o arquivo .env.example e criar o .env
- Altera informações da configuração do banco e porta no arquivo .env localizado na raiz do diretório.

## Sobre o sistema
A API do sistema Dental Up proporciona a criação, atualização, exclusão e listagem dos dados dos clientes, dentistas, usuários (recepção) e das consultas. Para a utilização da API em seu ambiente de desenvolvimento, é necessário que você tenha configurado o banco de dados, de preferência o MySQL e, além disso, tenha um ambiente apache. 
Para testes e afins, recomendamos que seja executado o comando ``php artisan migrate:fresh --seed`` para que as tabelas do banco sejam criadas e populados com dados mock.

O primeiro passo é duplicar o arquivo .env.example (o novo se chamará apenas .env) e configurá-lo com os dados do seu banco (nome, usuário e senha). Logo após, com o banco e o servidor apache iniciados, execute os seguintes comandos
- php artisan key:generate
- php artisan migrate:fresh --seed
- php artisan serve

Com a aplicação sendo executada corretamente em sua máquina, utilize um cliente HTTP para realizar os testes. Recomendamos o Postman.


## Rotas

### POST /auth/login - criar token de autenticação
Para criar o token de autenticação, acesse o Postman e com o método POST, acesse a rota localhost:{porta}/api/auth/login. Na aba Headers, preencha o key value com ['Accept' = > 'application/json'] para receber todos os retornos estruturados com JSON.
Logo após, na aba Body, selecione a opção raw JSON e cole as credenciais abaixo no textarea.
``{
    "email" : "mariaeduarda@gmail.com",
    "password" : "M4tr1x123"
}``
O retorno será o token de autenticação. Para acessar as demais rotas protegidas basta acessar a aba Headers e preencher o key value com ['Autorization' => 'Bearer {token}'] ou acessar a aba Authorization, selecionar o type Bearer Token e colar o token no campo ao lado direito.

Caso o token de autenticação não seja indicado nas rotas protegidas, a mensagem recebida será:
``{
    "message": "Unauthenticated."
}``

### Clientes
#### GET /api/client - listagem de todos os clientes

#### POST /api/client - criar um novo cliente
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### GET /api/client/{client} - exibir apenas um cliente

#### PUT /api/client/{client} - atualizar dados de um cliente

#### DELETE /api/client/{client} - deletar um cliente

### Dentistas
#### GET /api/dentist - listagem de todos os dentistas

#### POST /api/dentist - criar um novo dentista
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### GET /api/dentist/{dentist} - exibir apenas um dentista

#### PUT /api/dentist/{dentist} - atualizar dados de um dentista

#### DELETE /api/dentist/{dentist} - deletar um dentista

### Consultas
#### GET /api/appointment - listagem de todas as consultas

#### POST /api/appointment - criar uma nova consultas
``{
    "appointment_date" : "2022-03-15 19:00:00",
    "appointment_reason" : "Extração dentária",
    "client_id" : 1,
    "dentist_id" : 1
}``

#### GET /api/appointment/{appointment} - exibir apenas uma consulta

#### PUT /api/appointment/{appointment} - atualizar dados de uma consulta

#### DELETE /api/appointment/{appointment} - deletar uma consulta

## Partes desenvolvidas por cada integrante

#### Maria Eduarda Freitas (RA: 2317559)
Responsável pelo desenvolvimento da documentação.

#### Bruna Nunes (RA: 2328585) 
Responsável pelo desenvolvimento da API.

#### Leodocir Neto (RA: 2257122)
Responsável pelos testes das requisições com o cliente HTTP Postman.

## Tecnologias utilizadas no proejto
- Laravel
- Laravel Sanctum (autênticação)
- Postman (cliente HTTP para testes)