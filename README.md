<br><br>

### Sistema CRUD para cadastro de produtos
================================

Sistema desenvolvido com PHP puro, sem uso de PDO, para testes práticos,
simulando uma página CRUD para cadastrar, editar, visualizar e apagar produtos 

### Instruções

Primeiro, deve-se importar o script SQL [banco.sql](src/Scripts/Database/banco.sql) para o seu sistema gerenciador de banco de dados para criar as tabelas com os devidos campos.

Em seguida, você deve alterar o arquivo de conexão php [Connection.php](src/Scripts/Database/Connection.php), alterando os seguintes campos 

```php
define('HOST', '127.0.0.1');
define('USUARIO', '{ USUARIO }');
define('SENHA', ' {  SENHA } ');
define('DB', '{ BANCO } ');
```

alterando os campos de USUARIO, SENHA ,E BANCO para seus respectivos dados de login, e o nome do banco de dados que você importou.


##### Uso

Após criar o banco de dados e definir as condições de conexções, inicie o servidor apache na pasta [src](src) do projeto, ou para usuários do linux

```sh
php -S localhost:8000 -t src/
```

para iniciar um servidor de desenvolvimento no php.

Dados de login: 

## Usuario: admin

## Senha: senha




