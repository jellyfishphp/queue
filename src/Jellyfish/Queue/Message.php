<?php

namespace Jellyfish\Queue;

class Message implements MessageInterface
{
    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    public function __construct()
    {
        $this->headers = [];
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getHeader(string $key): ?string
    {
        if (!\array_key_exists($key, $this->headers)) {
            return null;
        }

        return $this->headers[$key];
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return \Jellyfish\Queue\MessageInterface
     */
    public function setHeader(string $key, string $value): MessageInterface
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return \Jellyfish\Queue\MessageInterface
     */
    public function setBody(string $body): MessageInterface
    {
        $this->body = $body;

        return $this;
    }
}
