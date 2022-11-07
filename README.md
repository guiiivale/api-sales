## Instanciar aplicação:

- Configurar .env com os dados do banco de dados, nome da aplicação e dados do e-mail, muito necessário para enviar a rotina diaria de emails.
- composer install
- php artisan migrate --seed
- php artisan key:generate

## Documentação da api:

- https://documenter.getpostman.com/view/18539430/2s8YYMn1QK

## Emails info:

- Emails são enviados para o email de cada vendedor contendo o total de vendas realizadas pelo mesmo hoje.
- São enviados diariamente a meia noite.
- Screenshot:

![image](https://user-images.githubusercontent.com/83623617/200374471-9f0ef773-73ca-4219-bd22-f6d66e655430.png)
