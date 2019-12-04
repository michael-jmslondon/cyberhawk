<?php

namespace Cyber;


class InspectionStates
{
    public $output;

    function __construct()
    {
        $this->states = ['Coating Damage', 'Lightning Strikes'];
    }

    function get()
    {
        $this->output = $this->states;
    }

    function error()
    {
        $this->output['error'] = 'INVALID_HTTP_METHOD';
    }
}

$method = $_SERVER['REQUEST_METHOD'];
$instance = new InspectionStates();

switch ($method) {
    case 'GET':
        $instance->get();
        break;
    default:
        $instance->error();
        break;
}

header('Content-Type: application/json');
exit(json_encode($instance->output));