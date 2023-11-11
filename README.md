<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Configuração inicial

#### Requisitos
- PHP instalado
- Composer instalado
- Node e Npm instalado
  
### Get Starting
- Com o projeto clonado em sua máquina, run `composer install`
- Após instalar todas as depedências, run `npm install`
- Com tudo instalado vá na raiz do seu projeto crie um arquivo .env, agora localize o arquivo default .env.example, copie o conteúdo e cole dentro do novo arquivo .env
- Após ter o seu arquivo .env configure agora no mesmo apenas o banco de dados de sua preferência e suas credencias
- O .env já vai existir configuração para envio de notificação por emai, e notificação push, usando FCM(Firebase Cloud Messaging)
- Agora run `php artisan migrate` para migrar o eu banco de dados, e as migrations existentes no projeto
  
### Run Project
Com o `php artisan migrate` rodado, agora vamos agora iniciar o projeo
- Run `npm run dev`, atualizar o laravel-mix 
- Run `php artisan serve`, iniciar o seridor laravel
- Acesse o link http://localhost:8000
  
Com o servidor já rodando, por padrão ao chegar na rota de login, por padrão e teste, deixei implementado a criação de um User default.
##### Credencias de acesso no login
- Email: admin@admin.com
- Senha: admin123


