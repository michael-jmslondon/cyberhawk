<?php

namespace Cyber;


class Inspections
{
    public $output;

    function __construct()
    {

    }

    function get()
    {

        $output = [];

        for ($i =1; $i < 101; $i++) {
            $output[$i]['Flags'] = [];
            if(0 === $i % 3){
                $output[$i]['Flags'][] = "Coating Damage";
            }
            if(0 === $i % 5) {
                $output[$i]['Flags'][] = "Lightning Strike";
            }
            $output[$i]['Result'] = implode(" and ",$output[$i]['Flags']);
        }


        if(isset($_GET['start_point']) && is_numeric($_GET['start_point'])){
            $output = array_filter($output, function ($x) { return $x >= $_GET['start_point']; },ARRAY_FILTER_USE_KEY);
        }

        if(isset($_GET['end_point']) && is_numeric($_GET['end_point'])){
            $output = array_filter($output, function ($x) { return $x <= $_GET['end_point']; },ARRAY_FILTER_USE_KEY);
        }

        if(isset($_GET['result_state']) && !empty($_GET['result_state'])){
            $output = array_filter($output, function ($x) { return in_array($_GET['result_state'],$x['Flags']);});
        }

        if(isset($_GET['start_point']) && isset($_GET['end_point']) &&  $_GET['end_point'] < $_GET['start_point']){
            $this->output['error'] = 'Invalid start and end dates';
        } else {
            $this->output = $output;
        }


    }

    function error()
    {
        $this->output['error'] = 'INVALID_HTTP_METHOD';
    }
}

$method = $_SERVER['REQUEST_METHOD'];
$instance = new Inspections();

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