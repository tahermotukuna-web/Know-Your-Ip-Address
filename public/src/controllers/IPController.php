<?php

namespace App\Controllers;

use App\Services\IPService;

class IPController
{
    protected $ipService;

    public function __construct()
    {
        $this->ipService = new IPService();
    }

    public function getIP()
    {
        $ipAddress = $this->ipService->fetchIP();
        include '../public/index.php'; // Assuming this is where the view is rendered
    }
}