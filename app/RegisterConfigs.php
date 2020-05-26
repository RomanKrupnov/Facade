<?php


use Framework\Command\CommandInterface;
use Framework\Command\RegisterConfigsCommand;
class RegisterConfigs implements CommandInterface
{
    /**
     * @var RegisterConfigsCommand
     */
    private $command;

    /**
     * RegisterConfigs constructor.
     * @param RegisterConfigsCommand $command
     */
    public function __construct(RegisterConfigsCommand $command)
    {
        $this->command = $command;
    }

    public function execute(): void
    {
        $this->command->registerConfigs();
    }


}