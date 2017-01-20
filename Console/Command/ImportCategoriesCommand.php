<?php

namespace PlentyConnector\Console\Command;

use Exception;
use PlentyConnector\Connector\Connector;
use PlentyConnector\Connector\Logger\ConsoleHandler;
use PlentyConnector\Connector\ServiceBus\QueryType;
use PlentyConnector\Connector\TransferObject\Category\Category;
use Shopware\Commands\ShopwareCommand;
use Shopware\Components\Logger;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to manually import manufacturer.
 */
class ImportCategoriesCommand extends ShopwareCommand
{
    /**
     * @var Connector
     */
    private $connector;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * ImportCategoriesCommand constructor.
     *
     * @param Connector $connector
     * @param Logger $logger
     *
     * @throws LogicException
     */
    public function __construct(Connector $connector, Logger $logger)
    {
        $this->connector = $connector;
        $this->logger = $logger;

        parent::__construct();
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName('plentyconnector:import:categories');
        $this->setDescription('Import categories');
        $this->addOption(
            'all',
            null,
            InputOption::VALUE_NONE,
            'If set, import every category'
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     *
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $all = (bool)$input->getOption('all');

        $this->logger->pushHandler(new ConsoleHandler($output));

        try {
            $queryType = $all ? QueryType::ALL : QueryType::CHANGED;

            $this->connector->handle($queryType, Category::TYPE);
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
        }
    }
}
