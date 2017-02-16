# Mail-API - API para envio de Emails
Essa API tem o objetivo de sanar facilmente um problema de envio de email através de aplicações Mobiles, fazendo apenas uma requisição de envio de dados para uma URL com o script em PHP. 

<!-- links -->

* [Como Funciona?](#como-funciona)
* [Requisitos](#requisitos)
* [Instalação](#instala&ccedil;&atilde;o)
* [Ionic v1](#ionic-v1)
* [Ionic v2](#ionic-v2)
* [Créditos](#cr&eacute;ditos)

<!-- links -->

##Como Funciona?

O trecho abaixo representa um objeto que deverá ser passado para a Url do script no seu servidor via POST

```php
echo json_encode(array(
    "nome"=>$data->nome,
    "email"=>$data->email,
    "assunto"=>$data->assunto,
    "mensagem"=>$data->mensagem,
    "destinatario"=>$data->destinatario,
    "envio"=>$data->envio
    ));
```

Basicamente temos uma estrutura simples de um objeto que deverá conter informações básicas para o envio do email.
Por exemplo:

```json
{
 "nome": "weslley", 
 "email": "weslleycsil@gmail.com",
 "assunto": "Envio de Msg pelo App",
 "mensagem": "teste de msg",
 "destinatario": "destinatario@dominio.com",
 "envio": true
}
```

Em ordem:
Nome da Pessoa que está enviando o email,
Assunto do email que deverá ser enviado,
Mensagem que deverá ser enviada,
Email do destinatario que devera receber o email e
O ultimo campo é basicamente apenas para passar para a função de envio que ela pode enviar o email.

Após o script ter recebido um json com essa estrutura, ele utiliza a função mail() do PHP para envio das informações.

##Requisitos

Ter um servidor onde possa ser hospedado esse script em PHP, e uma aplicação onde possa ser feita uma requisição HTTP para o endereço do script.

##Instala&ccedil;&atilde;o

Enviar via FTP ou de outra maneira para o servidor o script em PHP

##Ionic v1

Exemplo de utilização em uma aplicação feita em Ionic v.1

```javascript
var myApp = angular.module('myApp', []);

myApp.controller('MainCtrl', function ($scope,$http) {
    $scope.salveSubmit = function(){
        /*alert(
                $scope.user.nome + '\n' +
                $scope.user.email + '\n' +
                $scope.user.mensagem + '\n'

        );*/

        $http({
          url: 'mail.php',
          method: 'POST',
          data: {
            'nome': $scope.user.nome,
            'email': $scope.user.email,
            'mensagem': $scope.user.email,
            'assunto': "Envio de Msg pelo App",
            'destinatario': "destinatario@dominio.com",
            'envio': true
            
          },
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
            
          }
          
        }).
        success(function (data) {
            $scope.success = true;
            //exemplo de retorno: alert(data['email']);
            $scope.user = {};
        }).
        error(function (data) {
            $scope.error = true;
            
        }); 
        
    }
    

});
```

##Ionic v2

Exemplo de utilização em uma aplicação feita em Ionic v.2

```javascript
```
##Cr&eacute;ditos

Essa API foi feita com o intuito de ajudar alguns amigos com dificuldade de enviar emails através de uma aplicação mobile. Com esse intuito, ela foi desenvolvida de uma forma simples e também baseada em conceitos de um post no site: [GuiFerreiraCode.com](http://guiferreiracode.com/2015/01/formulario-de-contato-com-angular-js.html).

Autor: [Weslley Silva](http://tecnicoweslley.com.br)
