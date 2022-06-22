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
- Executar ``php artisan key:generate``
- Excutar ``php artisan migrate:fresh --seed``
- Executar ``php artisan serve``

## Sobre o sistema
A API do sistema Dental Up proporciona a criação, atualização, exclusão e listagem dos dados dos clientes, dentistas, usuários (recepção) e das consultas. Para a utilização da API em seu ambiente de desenvolvimento, é necessário que você tenha configurado o banco de dados, de preferência o MySQL e, além disso, tenha um ambiente apache. 
Para testes e afins, recomendamos que utilizem um cliente HTTP, de preferência o Postman.


## Rotas

### POST /auth/login - criar token de autenticação
Para criar o token de autenticação, acesse o Postman e com o método POST, acesse a rota localhost:{porta}/api/auth/login. Na aba Headers, preencha o key value com ['Accept' = > 'application/json'] para receber todos os retornos estruturados com JSON.
Logo após, na aba Body, selecione a opção raw JSON e cole as credenciais abaixo no textarea.
``{
    "email" : "mariaeduarda@gmail.com",
    "password" : "M4tr1x123"
}``
O retorno será o token de autenticação. Para acessar as demais rotas protegidas basta acessar a aba Headers e preencher o key value com ['Autorization' => 'Bearer {token}'] ou acessar a aba Authorization, selecionar o type Bearer Token e colar o token no campo ao lado direito.

### Observação
Caso o token de autenticação não seja indicado nas rotas protegidas, a mensagem recebida será:
``{
    "message": "Unauthenticated."
}``

### Clientes
#### GET /api/client - listagem de todos os clientes
Acesse a rota localhost:{porta}/api/client com o método GET e faça a autenticação com o token retornado no login ou registro. O retorno será um array com os objetos existentes nessa classe.

#### POST /api/client - criar um novo cliente
Acesse a rota localhost:{porta}/api/client com o método POST, com a autenticação feita, cole o JSON abaixo no body da requisição. O retorno será o objeto criado.
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### GET /api/client/{client} - exibir apenas um cliente
Acesse a rota localhost:{porta}/api/client/{client} com o método GET, com a autenticação feita. O retorno será o objeto que possui o id indicado na url ({client}).

#### PUT /api/client/{client} - atualizar dados de um cliente
Acesse a rota localhost:{porta}/api/client/{client} com o método PUT, com a autenticação feita, cole o JSON abaixo no body da requisição e indique as alterações que deseja fazer. O retorno será o objeto que possui o id indicado na url ({client}) após a alteração.
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### DELETE /api/client/{client} - deletar um cliente
Acesse a rota localhost:{porta}/api/client/{client} com o método DELERE, com a autenticação feita. O retorno será um array dos objetos que ainda existem nessa classe após a exclusão do objeto que possuo o id indicado na url ({client}).

### Dentistas
#### GET /api/dentist - listagem de todos os dentistas
Acesse a rota localhost:{porta}/api/dentist com o método GET e faça a autenticação com o token retornado no login ou registro. O retorno será um array com os objetos existentes nessa classe.

#### POST /api/dentist - criar um novo dentista
Acesse a rota localhost:{porta}/api/dentist com o método POST, com a autenticação feita, cole o JSON abaixo no body da requisição. O retorno será o objeto criado.
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### GET /api/dentist/{dentist} - exibir apenas um dentista
Acesse a rota localhost:{porta}/api/dentist/{dentista} com o método GET, com a autenticação feita. O retorno será o objeto que possui o id indicado na url ({dentista}).

#### PUT /api/dentist/{dentist} - atualizar dados de um dentista
Acesse a rota localhost:{porta}/api/dentist/{dentist} com o método PUT, com a autenticação feita, cole o JSON abaixo no body da requisição e indique as alterações que deseja fazer. O retorno será o objeto que possui o id indicado na url ({dentist}) após a alteração.
``{
    "name" : "Juliana Dias",
    "email" : "julianadias@gmail.com",
    "cpf" : "397.988.878-01",
    "phone" : "(42) 99737-2323"
}``

#### DELETE /api/dentist/{dentist} - deletar um dentista
Acesse a rota localhost:{porta}/api/dentist/{dentist} com o método DELERE, com a autenticação feita. O retorno será um array dos objetos que ainda existem nessa classe após a exclusão do objeto que possuo o id indicado na url ({dentist}).

### Consultas
#### GET /api/appointment - listagem de todas as consultas
Acesse a rota localhost:{porta}/api/appointment com o método GET e faça a autenticação com o token retornado no login ou registro. O retorno será um array com os objetos existentes nessa classe.

#### POST /api/appointment - criar uma nova consultas
Acesse a rota localhost:{porta}/api/appointment com o método POST, com a autenticação feita, cole o JSON abaixo no body da requisição. O retorno será o objeto criado.
``{
    "appointment_date" : "2022-03-15 19:00:00",
    "appointment_reason" : "Extração dentária",
    "client_id" : 1,
    "dentist_id" : 1
}``

#### GET /api/appointment/{appointment} - exibir apenas uma consulta
Acesse a rota localhost:{porta}/api/appointment/{appointment} com o método GET, com a autenticação feita. O retorno será o objeto que possui o id indicado na url ({appointment}).

#### PUT /api/appointment/{appointment} - atualizar dados de uma consulta
Acesse a rota localhost:{porta}/api/appointment/{appointment} com o método PUT, com a autenticação feita, cole o JSON abaixo no body da requisição e indique as alterações que deseja fazer. O retorno será o objeto que possui o id indicado na url ({appointment}) após a alteração.
``{
    "appointment_date" : "2022-03-15 19:00:00",
    "appointment_reason" : "Extração dentária",
    "client_id" : 1,
    "dentist_id" : 1
}``

#### DELETE /api/appointment/{appointment} - deletar uma consulta
Acesse a rota localhost:{porta}/api/appointment/{appointment} com o método DELERE, com a autenticação feita. O retorno será um array dos objetos que ainda existem nessa classe após a exclusão do objeto que possuo o id indicado na url ({appointment}).

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