# aprendendo-splitphp

Documentação utilizada:

https://vuejs.org/guide/introduction.html

https://www.splitphp.org/

https://www.php.net/manual/pt_BR/index.php


Instruções referente ao Split PHP

Configurar o arquivo .env do Split PHP com as informações do banco de dados

Pelo terminal estando na pasta splitphp do projeto digite nessa ordem:

    Instalando as dependências: composer install
    
    Gerar o arquivo .env : php console setup

    Iniciar a API no servidor de desenvolvimento: php console server:start 

    Parar a API no servidor de desenvolvimento: php console server:stop


Instruções referente ao Vue.js + Boot Strap

Configurar o arquivo .env com os host usados na aplicação.
Nessa aplicação são usados dois host um para o site em Vue.js e outro para a API feita no Split PHP 

Pelo terminal estando na pasta crud-VueJs digite os comando:

    -> Instalar as dependências: npm install  

    -> Instalar o bootstrap: npm i bootstrap@5.3.8

    -> Iniciar o site no servidor de desenvolvimento: npm run dev


Funcionalidades da aplicação:

    -> Formulário de Cadastro de pessoas: /registerPerson
    -> Formulário de listagem dos cadastros podendo usar os filtros de busca: /listPeople
    -> Formulário de Atualização de cadastro: /editPerson
    -> Exclusão dos cadastros;
    -> Sistema de permissão de hosts que podem acessar a API.



