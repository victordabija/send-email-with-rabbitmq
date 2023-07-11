Send emails asynchronously with rabbitMQ, This is a Symfony 5.4 API app. Send emails with symfony mailer.
# Quick start

- Docker 
```shell
docker compose up --build -d
```

- Messenger consumer
```shell
bin/console messenger:consume
```

- Send a POST requests to [localhost:1001/email/send](localhost:1001/email/send) with following body
```json
{
  "recipient": "recipient@mail.com",
  "body": "this message is sent via RabbitMQ"
}
```

- Open [localhost:8025](localhost:8025)