<?php

declare(strict_types=1);

namespace Jellyfish\Queue;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class QueueServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     *
     * @return void
     */
    public function register(Container $container): void
    {
        $this->registerMessageFactory($container)
            ->registerMessageMapper($container)
            ->registerDestinationFactory($container);
    }

    /**
     * @param \Pimple\Container $container
     *
     * @return \Jellyfish\Queue\QueueServiceProvider
     */
    protected function registerMessageFactory(Container $container): QueueServiceProvider
    {
        $container->offsetSet(QueueConstants::CONTAINER_KEY_MESSAGE_FACTORY, static function () {
            return new MessageFactory();
        });

        return $this;
    }

    /**
     * @param \Pimple\Container $container
     *
     * @return \Jellyfish\Queue\QueueServiceProvider
     */
    protected function registerMessageMapper(Container $container): QueueServiceProvider
    {
        $container->offsetSet(QueueConstants::CONTAINER_KEY_MESSAGE_MAPPER, static function (Container $container) {
            return new MessageMapper(
                $container->offsetGet('serializer')
            );
        });

        return $this;
    }

    protected function registerDestinationFactory(Container $container): QueueServiceProvider
    {
        $container->offsetSet(QueueConstants::CONTAINER_KEY_DESTINATION_FACTORY, static function () {
            return new DestinationFactory();
        });

        return $this;
    }
}
