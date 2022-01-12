<h3>Passo a passo para instalação:</h3>

O repositório possui dois arquivos nomeados env.exaple, um no diretório raiz e outro no diretório src. Copie e renomeie os dois arquivos para .env.

O arquivo .env da pasta raiz contem as informações necessárias para inicializar os containers docker.
O arquivo .env da pasta src contem as informações necessárias para que o projeto em Laravel funcione corretamente.

Por padrão as variáveis já vem preenchidas mas é recomendado que se altere os dados, mas para isso é necessário que algumas variaveis fiquem iguais nos dois arquivos:


<!-- inicio tabela -->
 .   | ./src
--- | --- 
MYSQL_DATABASE | DB_DATABASE 
MYSQL_USER | DB_DATABASE 
MYSQL_PASSWORD | DB_DATABASE 
<!-- fim tabela -->

<h3>Executando os containers:</h3>
Antes de executar os containers é necessário montar o container php com o comando:
docker-compose build

Depois execute o comando 
docker-compose up

e os containers serão executados.

<h3>Api:</h3>
Para que a Api seja executada corretamente é necessário gerar a chave da aplicação e executar as migrations:
<br><br>
<code>
docker exec php php artisan key:generate

docker exec php php artisan migrate
</code>

e o projeto estará funcionando corretamente.

<h3>Utilizando a API</h3>
A API possui no total 4 rotas:<br><br>

/register: <br>
Essa rota é do tipo POST e espera um JSON com as informações do usuário (nome, email, senha e confirmação da senha), em caso de sucesso retorna o objeto do usuário e um token de acesso que deve ser armazenado na Variável Authentication do Header das requisições para que o usuario logado seja reconhecido.<br>

/login: <br>
Essa rota é do tipo POST e espera um JSON com as informações do usuário (email e senha), em caso de sucesso retorna o objeto do usuário e um token de acesso que deve ser armazenado na Variável Authentication do Header das requisições para que o usuario logado seja reconhecido.<br>

/logout: <br>
Essa rota é do tipo POST e não espera nenhum dado no corpo da requisição, em caso de sucesso retorna uma mensagem afirmando que o logout foi concluido.<br>

/breeds: <br>
Essa rota é do tipo GET e espera uma query com o nome ou parte do nome de uma raça que espera ser encontrada. Retorna uma array com zero, um ou mais objetos, cada objeto contendo as informações de uma raça cujo nome é igual ou possui um trcho da palavra pesquida.<br>

Para facilitar o uso da API é disponibilizado na pasta raiz o arquivo request.json que contem uma coleção de rotas que podem sem iportadas para o software Insomnia (https://insomnia.rest), nele é possível testar as requisições. A coleção disponibilizada possui um ambiente com duas variáveis. Uma delas é a base_url que deve conter a url da aplicação. A outra é a variavel token onde deve ser armazenado o token recebido nas requisições de cadastro e login.
