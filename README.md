<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Como executar o projeto depois de baixado

    Supondondo que voce ja tenha o xampp,composer,npm e o laravel instalado faça:
    -Clone o repositorio;
    -Digite o commando no terminal do seu desktop "composer install" . Ele vai instalar todos os pacotes php necessários;
    -Duplicar o arquivo ".env.example" e renomear para ".env" e fazer as configurações de acesso a banco;
    -Digite o commando no terminal do seu desktop "php artisan key:generate". Esse vai gerar uma chave dentro do .env para sua aplicação;
    -Digite o commando no termnial do seu desktop "npm install". Vai instalar o pacote do node necesario para executar a aplicaçao;
    -Instalar o drive do postgres no seu php.ini
    -Configurar todo o banco para conseguir os dados das models;
   
## Depois dessas configurações executar os comando "npm run dev" para buildar e "php artisan serve" para iniciar o projeto.
