<?php

declare(strict_types=1);

namespace Jellyfish\Queue;

interface MessageInterface
{
    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param array $headers
     *
     * @return \Jellyfish\Queue\MessageInterface
     */
    public function setHeaders(array $headers): MessageInterface;

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getHeader(string $key): ?string;

    /**
     * @param string $key
     * @param string $value
     *
     * @return \Jellyfish\Queue\MessageInterface
     */
    public function setHeader(string $key, string $value): MessageInterface;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @param string $body
     *
     * @return \Jellyfish\Queue\MessageInterface
     */
    public function setBody(string $body): MessageInterface;
}
