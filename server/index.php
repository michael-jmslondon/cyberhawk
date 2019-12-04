<?php

?>
<HEAD>

    <style>
        @import '/css/cyberhawk.css';
    </style>

</HEAD>

<Body>
<div>
<table id="cyber" class="cyberTable">
    <thead>
    <tr>
    <th>Entry</th><th onclick="sortTable(1)">Result</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i = 1; $i < 101; $i++){
        $row_info = "<tr><td>" . $i . "</td><td>";
        if($i % 3 === 0){
            $row_info .= "Coating Damaged";
        }
        if($i % 5 === 0 && $i %3 === 0){
            $row_info .= " and Lightning Strike";
        }elseif( $i % 5 === 0  ){
            $row_info .= "Lightning Strike";
        }
        $row_info .= "</td></tr>";
        echo $row_info;
    }

    ?>
    </tbody>
</table>
</div>
<script src="/js/sortable.js"></script>
</Body>

