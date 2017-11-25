<?php

namespace PlentyConnector\Connector\ServiceBus\ValidatorMiddleware;

use League\Tactician\Middleware;
use PlentyConnector\Connector\ServiceBus\Command\TransferObjectCommand;
use PlentyConnector\Connector\TransferObject\TransferObjectInterface;
use PlentyConnector\Connector\ValidatorService\ValidatorServiceInterface;

/**
 * Class ValidatorMiddleware.
 */
class ValidatorMiddleware implements Middleware
{
    /**
     * @var ValidatorServiceInterface
     */
    private $validator;

    /**
     * ValidatorMiddleware constructor.
     *
     * @param ValidatorServiceInterface $validator
     */
    public function __construct(ValidatorServiceInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        if (!($command instanceof TransferObjectCommand)) {
            return $next($command);
        }

        $payload = $command->getPayload();

        if (!($payload instanceof TransferObjectInterface)) {
            return $next($command);
        }

        $this->validator->validate($payload);

        return $next($command);
    }
}
