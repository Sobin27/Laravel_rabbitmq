# Guia de instalação

Para fins de estudo, desenvolvi esse projeto com o intuito de aprender mais sobre sistemas de mensagerias utilizando da ferramente RabbitMq.

## Instalação
Para instalar o projeto, siga os passos abaixo:
```bash
git clone https://github.com/Sobin27/Laravel_rabbitmq.git
```
Após fazer um clone do projeto, acesse a pasta do projet. Você vai se deparar com duas pastas distintas, primeiro acesse a pasta laravel_rabbit e rode o comando:
```bash
composer install
```
Feito a instalação do composer, crie um arquivo .env na raiz do projeto e copie o conteúdo do arquivo .env.example para o arquivo .env.
Detalhe, não esqueça de configurar o .env com as conexões necessarias do RabbitMq, como o exemplo abaixo:
```
QUEUE_CONNECTION=rabbitmq

RABBITMQ_HOST=127.0.0.1
RABBITMQ_PORT=5672
RABBITMQ_USER=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_VHOST=/
```
Feito isso, você ja completou a instalação do Producer das mensagens! Saia da pasta e acesse a segunda pasta, denominada app, em seguida rode o comando abaixo para a instalção dos pacotes
```bash
composer install
```
Feito a instalação do composer, crie um arquivo .env na raiz do projeto e copie o conteúdo do arquivo .env.example para o arquivo .env.
Detalhe, não esqueça de configurar o .env com as conexões necessarias do RabbitMq, como o exemplo abaixo:
```
QUEUE_CONNECTION=rabbitmq

RABBITMQ_HOST=127.0.0.1
RABBITMQ_PORT=5672
RABBITMQ_USER=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_VHOST=/
```
Ótimo! Concluiu a instalação do consumer das mensagens! Agora siga para o passo os próximos passos.

## Configuração do Ambiente para uso
Acesse a pasta laravel_rabbit e rode docker-compose, com ele você ira subir o RabbitMq e a aplicação PHP para utilização:
```bash
docker-compose up -d
```
Após subir todos os containers, você deve sair da pasta e entrar na pasta app para iniciar o serviço do php utilizando o artisan:
```bash
php artisan queue:work
```
Após ter feito os passos você está pronto para utilizar os recursos do RabbitMq!

## Utilização
Para utilizar os recursos é muito simples, basta você acessar o container docker com a aplicação PHP e executar o comando abaixo para produzir a mensagem e mandar essa mensagem para a fila:
Acesse o container:
```bash
docker exec -it [container_id] bash 
```
Rode o comando:
```bash
php artisan integration
```
Assim você terá produzido a mensagem e mandada ela para a fila.
Na pasta app, após ter iniciado as filas, você pode verificar nos logs da aplicação e ver se foi integrado os 10 usuários, exemplo de log:
```
[2025-01-21 17:14:21] local.INFO: Vai ser integrado 10 usuários no sistema  
[2025-01-21 17:14:21] local.INFO: Iniciando a integração dos usuários  
[2025-01-21 17:14:21] local.INFO: Integração finalizada  
```
E também verifique sua Base de dados para verificar se os usuários foi criado em ambas.
Obs: Certifique de que você está usando 2 bases de dados diferente.
