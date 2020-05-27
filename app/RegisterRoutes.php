<?php

use Framework\Command\CommandInterface;
use Framework\Command\RegisterRoutesCommand;
class registerRoutes implements CommandInterface
{
    /**
     * @var RegisterRoutesCommand
     */
 private $command;

    /**
     * registerRoutes constructor.
     * @param RegisterRoutesCommand $command
     */
 public function __construct(RegisterRoutesCommand $command)
 {
     $this->command = $command;
 }


    public function execute(): void
    {
        $this->command->registerRoutes();
    }
}