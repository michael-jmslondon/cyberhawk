<?php

?>
<HEAD>
    <style>
        @import '/css/cyberhawk.css';
        @import 'https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css';
    </style>
</HEAD>

<Body>
<div>
    <form>
        Start point <input type="number" name="start_point" min="1" max="100" value="1">
        End point <input type="number" name="end_point" min="1" max="100" value="100">
        Result <select name="result_state" >
            <option value=""></option>
            <option value="Coating Damage">Coating Damage</option>
            <option value="Lightning Strike">Lightning Strike</option>
        </select>Submit <input type="button" id="loadData" value="Load">
    </form>
<table id="cyber" class="cyberTable">
    <thead>
    <tr>
    <th>Entry</th><th>Result</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="/js/cyberhawk.js"></script>
</Body>

