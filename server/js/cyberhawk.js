const el = e => document.querySelector(e);
const startEntry = el('input[name="start_point"]');
const endEntry = el('input[name="end_point"]');
const resultType = el('select[name="result_state"]');


$(function() {
    $("#cyber").DataTable();

    var dataUrl = "api/inspections.php"


    $("#loadData").click(function() {

        if(Number(startEntry.value) > Number(endEntry.value)){
            alert('Start value must be less than end value ' + startEntry.value + ' > ' + endEntry.value);
        }else {
            loadData(startEntry.value, endEntry.value, resultType.value);
        }
    });

    function loadData(startp,endp,result_state) {
        $.ajax({
            type: 'GET',
            url: dataUrl,
            data: {start_point: startp, end_point: endp, result_state: result_state },
            contentType: "text/plain",
            dataType: 'json',
            success: function (data) {
                myJsonData = data;
                populateDataTable(myJsonData);
            },
            error: function (e) {
                console.log("There was an error with your request...");
                console.log("error: " + JSON.stringify(e));
            }
        });
    }

    function populateRow(item, index){
        $('#cyber').dataTable().fnAddData( [
            i,
            item.Result
        ]);
    }

    // populate the data table with JSON data
    function populateDataTable(data) {
        console.log("populating data table...");
        // clear the table before populating it with more data

        $("#cyber").DataTable().clear();
        if(0 == data.length) {
            $("#cyber").DataTable().draw();
        }
        for(let i of Object.keys(data)){
            var result = data[i];

            $('#cyber').dataTable().fnAddData( [
                i,
                result.Result
            ]);
        }
    }
})();
