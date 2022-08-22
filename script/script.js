setInterval(function updateContent(){ // this function is called once in 1 sec to refresh our data.

    // Creating a jQuery call in order to receive values and update the content on mainpage
    $.ajax({
        type: "POST",
        url: "../updateContent.php",
        dataType: 'text',
        success: function(res){
            const data = JSON.parse(res);  // Our data is received as a JSON object, so we need to parse it.
            $("#temperature").html(data.temperature);
            $("#humidity").html(data.humidity);
            $("#date").html(data.timeStamp);
        }
    })
}, 1000);
