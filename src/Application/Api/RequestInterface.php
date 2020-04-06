<?php
declare(strict_types=1);

namespace App\Application\Api;

interface RequestInterface
{
    public const METHOD_POST = 'POST';
    public const METHOD_GET = 'GET';

    public function getMethod(): string;

    public function getUri(): string;

    public function getOptions(): array;
}
