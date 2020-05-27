<?php


namespace Framework\Command;


class RegisterRoutesCommand
{
    /**
     * @return void
     */
    public function registerRoutes(): void
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }

}