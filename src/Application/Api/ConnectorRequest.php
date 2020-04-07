<?php
declare(strict_types=1);

namespace App\Application\Api;

use GuzzleHttp\RequestOptions;

class ConnectorRequest implements RequestInterface
{
    const KAFKA_CONNECT_URL = 'http://connect:8083/connectors';

    private string $name;

    private array $parameters;

    public function __construct(array $parameters)
    {
        $this->name = 'attribute';
        $this->parameters = $parameters;
    }

    public function getMethod(): string
    {
        return RequestInterface::METHOD_POST;
    }

    public function getUri(): string
    {
        return self::KAFKA_CONNECT_URL;
    }

    public function getOptions(): array
    {
        $options[RequestOptions::HEADERS] = [
            'Content-Type' => $this->getContentType(),
        ];
        $options[RequestOptions::BODY] = $this->getBody();
        return $options;
    }

        private function getContentType(): string
    {
        return 'application/json';
    }

//    private function getBody(): string
//    {
//        return json_encode([
//            $this->parameters
//        ]);
//    }

    private function getBody(): string
    {
        return json_encode([
            'name' => $this->name,
            'config' => $this->getConfigParameters()
        ]);
    }

    /**
     * @return mixed[]
     */
    private function getConfigParameters(): array
    {
        return [
            "connector.class"=> "io.confluent.connect.jdbc.JdbcSourceConnector",
            "key.converter"=> "org.apache.kafka.connect.json.JsonConverter",
            "key.converter.schemas.enable"=> "false",
            "value.converter"=> "org.apache.kafka.connect.json.JsonConverter",
            "value.converter.schemas.enable"=> "false",
            "batch.max.rows"=> "500",
            "connection.url"=> "jdbc:mysql://db:3306/kcs",
            "connection.user"=> "dev",
            "connection.password"=> "dev",
            "table.whitelist"=> "attribute",
            "mode"=> "incrementing",
            "incrementing.column.name"=> "id",
            "topic.prefix"=> "connect-",
            "poll.interval.ms"=> "3600",
        ];
    }
}
