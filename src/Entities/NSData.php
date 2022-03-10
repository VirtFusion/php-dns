<?php

namespace RemotelyLiving\PHPDNS\Entities;

use function serialize;
use function unserialize;

final class NSData extends DataAbstract implements \Stringable
{
    public function __construct(private Hostname $target)
    {
    }

    public function __toString(): string
    {
        return (string)$this->target;
    }

    public function getTarget(): Hostname
    {
        return $this->target;
    }

    public function toArray(): array
    {
        return [
            'target' => (string)$this->target,
        ];
    }

    public function serialize(): string
    {
        return serialize($this->toArray());
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized): void
    {
        $unserialized = unserialize($serialized);
        $this->target = new Hostname($unserialized['target']);
    }
}
