# kafka-connect-sample

kafka-connect-sample is an symfony application used for the creation and management of source and sink __kafka Connect__
connectors.

## Requirements

The following are required to run the application:

* Docker

To run the application, you must first start up the Kafka ecosystem using Docker Compose.

```%> docker-compose up```

Once docker-compose is ready, the following services will be available:

| Service | Host URL | Docker URL | Username | Password |
| --- | --- | --- | --- | --- |
| Kafka | PLAINTEXT://localhost:9092| PLAINTEXT://kafka0:9092 |
| Schema Registry | [http://localhost:8081](http://localhost:8081/ ) | http://schema-registry:8081/ |
| Kafka Connect | [http://localhost:8083](http://localhost:8083) | http://kafka-connect:8083 |
| Mysql | `jdbc:mysql://localhost:3306/kcs` | `jdbc:mysql://db:3306/kcs` | `dev` | `dev` |

## Contributing

You can contribute to this project by:
* Reporting bugs
* Suggesting new features
* Refactoring code
* Writing or editing documentation

### Submitting a Pull Request

* Fork the repository.
* Create a topic branch.
* Implement your feature or bug fix.
* Add, commit, and push your changes.
* Submit a pull request.

__PLease make appropriately sized changes__