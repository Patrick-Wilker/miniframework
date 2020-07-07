<h1 align="center"><strong>Mini Framework</strong></h1>

<h2> <img src="https://user-images.githubusercontent.com/38691922/77790815-3d7e5d00-7044-11ea-8ffe-e8d448946d4a.png" height="30" width="30">Projeto</h2>

Trata-se de um miniframework simples em PHP seguindo o padrão de arquitetura MVC.

<h2><img src="https://user-images.githubusercontent.com/38691922/77791007-98b04f80-7044-11ea-9602-4c78098960a0.png" height="40" width="40">Tecnologia</h2>

* PHP
* Composer (Gerenciador de pacotes)


<h2> <img src="https://user-images.githubusercontent.com/38691922/77794952-838aef00-704b-11ea-84ff-cb3c7a61a815.png" height="30" width="30">  Configuração</h2>

Para rodar o sistema será necessário rodar o seguinte comando dentro da pasta public no terminal: ``` php -S localhost:8080 ```
<br>

Esse miniframework ainda faz uso de uma base de dados. Segue a seguir o comando para criar o banco de dados e as tabelas. <br>

```
  create database mvc;

  create table tb_produtos (
    id int not null primary key auto_increment,
    descricao varchar(200) not null,
    preco float(8,2) not null
  );

  insert into tb_produtos(descricao, preco)values('Sofá', 1250.75);
  insert into tb_produtos(descricao, preco)values('Cadeira', 378.99);
  insert into tb_produtos(descricao, preco)values('Cama', 870.75);
  insert into tb_produtos(descricao, preco)values('Notebook', 1752.49);
  insert into tb_produtos(descricao, preco)values('Smartphone', 999.99);

  create table tb_info (
    id int not null primary key auto_increment,
    titulo varchar(200) not null,
    descricao text not null
  );

  insert into tb_info(titulo, descricao)values('Missão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
  insert into tb_info(titulo, descricao)values('Visão', 'Morbi faucibus elit nec nibh elementum, a ultrices ante condimentum.');
  insert into tb_info(titulo, descricao)values('Valores', 'Pellentesque faucibus egestas justo sed malesuada. Etiam convallis tortor diam, scelerisque sodales nibh consequat quis. Nullam sodales nunc neque, eu placerat ex ultrices a. Nulla sed sapien eu orci egestas imperdiet fringilla ut massa.');

```

Por esta fazendo uso do banco de dados MySQL é necessário dar um 'start' no Apache e no MySQL no painel de controle do XAMPP.<br>

Se for utilizado esse projeto fique a vontade para criar seus controllers, views, models, seu banco de dados.

<h3>O processo de instalação do Composer no Miniframework</h3>

O gerenciador de pacotes Composer já está instalado e configurado nesse projeto, contudo, a título de curiosidade, segue o processo de instalação e configuração do mesmo.<br>

Primeiro temos que já ter as camadas do MVC configuradas dentro da estrutura do projeto. Ou seja, teremos a seguinte estrutura:
```
App
  L Controller
  L Model
  L View
Public
  L.htaccess (não é necessário)
  L index.php

```

Por meio do Autoload do Composer seremos capazes de facilmente fazer o carregamento de todos os scripts da aplicação e utilizá-los a partir da especificação passada ao
Autoload PSR-4. Ele vai recuperar todas as classes dos scripts e vai permitir o acesso a essas classes através da especificação de <strong>namespace</strong>, basicamente
falando, não será necessário fazer <strong>require</strong> a todo hora para utilizar os recursos/as classes contidas dentro do nosso projeto. Basta utilizar o 
<strong>namespace</strong> dentro da lógica da nossa aplicação.<br>

O primeiro passo é trazer o Composer para o projeto. Devemos acessar a parte de download do Composer em seu [site](https://getcomposer.org/download/). Serão executados os 
<strong>Command-line installation</strong>. <br>

Dentro da raiz do projeto executar o seguinte comando no terminal : ``` php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');";  ```
 <br> 
 
Depois desse comando será criado o script <strong>composer-setup.php</strong> na raiz do projeto. Para saber ser houve algum problema com a instalação devemos executar
 o seguinte comando: ``` php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"; ```
 <br> 
 
Se estiver tudo ok irá retornar <strong>Installer verified</strong> . Se houver algum problema, <strong>Installer corrupt</strong>, será necessário installar 
novamente, ``` php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');";  ```

Depois de verificado a integridade do script execute o seguinte comando: ``` php composer-setup.php  ```
<br>

Em seguinda já podemos remover aquele primeiro arquivo criado (composer-setup.php), bastando excluir ele manualmente da pasta ou pelo seguinte código : ``` php -r "unlink('composer-setup.php');"; ```
<br>

Antes de instalarmos de fato o <strong>composer.phar</strong> vamos criar um arquivo na raiz do projeto com o nome <strong>composer.json</strong>. Dentro do <strong>composer.json</strong>
devemos definir algumas informações para esse processo de instalação. 

```
    {
      "name": "your-vendor-name/package-name",
      "require":{
        "php": ">= 7.0"
      },
      "authors":[
        {
          "name": "Seu Nome",
          "email": "seu email"
        }
      ],
      "autoload":{
        "psr-4": {
          "App\\": "App/",
          "MF\\": "vendor/MF/"
        }
      }
    }

```
Antes de prosseguir vale ressaltar que o <strong>namespace MF\\\ </strong> do autoload do composer.json, que ficará dentro da pasta MF, que por sua vez está dentro de vendor 
que será criado automaticamente após a instalação do <strong>composer.phar</strong>, é o local na qual vai ficar as abstrações das Views, dos Controllers e dos Models. 
Fique a vontade caso não queira construir esse <strong>namespace</strong> no autoload. 
(Lembrando que é o autoload que deixará as classes do diretório da pasta MF a disposição em todas as demais, sem a necessidade de fazer <strong>require</strong>)<br>

Por fim, depois de criar o arquivo <strong>composer.json</strong> podemos de fato instalar o composer.phar. Para isso basta executar o seguinte comando:
``` php composer.phar install  ```
<br>

Depois de instalar teremos o arquivo <strong>composer.lock</strong> criado e a pasta <strong>vendor</strong> criada. Agora é criar a pasta <strong>MF</strong> dentro da pasta 
<strong>vendor</strong> onde ficará as nossas abstrações (Para quem optou tê-las). <br>

Para que de fato o autoload esteja funcionando é preciso chamá-lo no <strong>index.php</strong> dentro da pasta <strong>public</strong>.<br>

Segue o comando: ``` require_once "../vendor/autoload.php";  ```
<br>

Pronto, agora é só utilizar esse miniframework.
