<?php

require_once __DIR__ . '/../services/IPService.php';

class IPController
{
    protected $ipService;

    public function __construct()
    {
        $this->ipService = new IPService();
    }

    public function getIP()
    {
        return $this->ipService->fetchIP();
    }
}
