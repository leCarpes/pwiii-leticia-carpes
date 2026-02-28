# pwiii-leticia-carpes

```
Aula de __Programação Web III__ com o Professor João Siles
```
<br>

### Aula 27-02

## Conteúdo 

- Introdução a documentação;
- Apresentação de Framework:
    - LARAVEL;

<br>
<br>

# Documentação
- Como criar uma aplicação LARAVEL.

<br>
<br>


## Verifique se a sua máquina local possuí instalados:
    - PHP;
    - Composer;
    - Instalador Laravel;
    - Node e NPM (para compilar ativos Front-End);

<br>

## Caso tenha instalados (PHP e Composer): 

Pode instalar o instalador Laravel via Composer.

No terminal do VsCode insira o comando, estando dentro da sua pasta/repositório onde deseja criar sua aplicação:

    composer global require laravel/installer

<br>

## Caso não tenha instalados (PHP e Composer):

Abra o Powershell (como Adm) e insira e execute o comando:

    Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))

Caso tudo ocorra bem, uma mensagem de SUCCES!, será exibida.

**OBS:** Após a instalação feche todos os terminais abertos, para poder reinicia-los.

**OBS:** Considere seu SO,  consultando a documentação:

https://laravel.com/docs/12.x

<br>
<br>

# Criação de uma aplicação LARAVEL
    
Abra o VsCode (como adm), na pasta/repositório onde deseja criar sua aplicação:

**OBS:** Acesse o terminal pelo comando CTRL + J.

O proximo passo é criar um novo aplicativo LARAVEL, atrávés do seguinte comando:

    laravel new exemplo

<br>

A seguir, irá iniciar o processo de instalação, siga os passos:

**Passo 1:**

    Which starter kit would you like to install? [None]:
    [none    ] None
    [react   ] React
    [svelte  ] Svelte
    [vue     ] Vue
    [livewire] Livewire

    - Selecione a opção react

<br>

**Passo 2:**

    Which authentication provider do you prefer? [Laravel's built-in authentication]:
    [laravel] Laravel's built-in authentication
    [workos ] WorkOS (Requires WorkOS account)
    [none   ] No authentication scaffolding

    - Dê enter (resposta padrão)

<br>

**Passo 3:**

    Which testing framework do you prefer? [Pest]:
    [0] Pest
    [1] PHPUnit

    - Selecione 1

<br>

**Passo 4:**

    Do you want to install Laravel Boost to improve AI assisted coding? (yes/no) [yes]:

    - Dê enter (resposta padrão)

<br>

**Passo 5:**

    Would you like to run npm install and npm run build? (yes/no) [yes]:

    - Enter (resposta padrão)

<br>

## Criação de nova página

Abra um novo terminal no VsCode.

Entre na pasta da sua aplicação:

    cd exemplo

<br>

Digite o seguinte comando:

    php artisan make:view exemplo

**OBS:** O novo arquivo será criado na pasta View do seu projeto.





