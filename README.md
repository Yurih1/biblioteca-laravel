# biblioteca-laravel

## Introdução

Um CRUD que utilizar laravel + mysql para gestão de uma biblioteca.

## instalação
Primeiro de tudo, clone o repositório em uma pasta de sua preferência:

```bash
git clone https://github.com/Yurih1/biblioteca-laravel.git
```

Será necessário o docker instalado em sua maquina para rodar esta aplicação:


[instalação do docker](https://docs.docker.com/engine/install/) para mais informações.


Após instalação do docker, acessar a raiz do projeto e criar a `.env` (configure as inforamções conforme necessidade. duvidas? entre em contato):

```bash
cp .env.example .env
```

Agora já podemos iniciar os containers:

```bash
docker compose up
```

Após finalização, rodar o comando :

```bash
docker ps
```

Você verá a lista dos seus containers que estão em execução.


Acesse o terminal do container que a imagem se chama `.sail-8.2/app`:

```bash
docker exec -it < CONTAINER ID > bash 
```

Ao abrir o bash do container, seguir com o proximo comando:

```bash
php artisan migrate
```
Acesse `localhost` no seu navegador e o projeto será iniciado.

Qualquer dúvida/sugestão, fico a disposição :)
