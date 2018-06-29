var busy = false;
var limit = 7;
var offset = 0;

function displayRecords(lim, off) {
    $.ajax({
        type: "GET",
        async: false,
        url: "includes/feedContent.html",
        data: "feed=1&limit=" + lim + "&offset=" + off,
        cache: false,
        beforeSend: function() {
            $("#loader_message").html("").hide();
        },
        success: function(html) {
            $("#feedContent").append(html);
            if (html == "") {
                $("#loader_message").html('<button class="btn btn-block btn-flat" type="button">No more records.</button>').show()
            } else {
                $("#loader_message").html('<button class="btn btn-block btn-flat" type="button">Loading please wait <i class="fa fa-spinner fa-spin"></i></button>').show();
            }
            window.busy = false;


        }
    });
}

$(document).ready(function() {
    // start to load the first set of data
    if (busy == false) {
        busy = true;
        // start to load the first set of data
        displayRecords(limit, offset);
    }


    $(window).scroll(function() {
        // make sure u give the container id of the data to be loaded in.
        if ($(window).scrollTop() + $(window).height() > $("#feedContent").height() && !busy) {
            busy = true;
            offset = limit + offset;

            // this is optional just to delay the loading of data
            setTimeout(function() { displayRecords(limit, offset); }, 1000);

            // you can remove the above code and can use directly this function
            // displayRecords(limit, offset);

        }
    });

});

/* function getresult(url) {
        $.ajax({
            url: url,
            type: "GET",
            data:  {
                'rowcount':$('.rowcount').val()
            },
            beforeSend: function(){
                $('#loader-icon').show();
                console.log("beforeSend()");
            },
            complete: function(){
                $('#loader-icon').hide();
            },
            success: function(data){
                if(data == 'No new posts!') {
                    $("#scroll-end").show();
                } else {
                    $("#feedContent").append(data);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    $(window).scroll(function(){
        console.log("scroll")
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 100){
            console.log('Almost end');
            if($(".pagenum:last").val() <= $(".total-page").val()) {
                var pagenum = parseInt($(".pagenum:last").val()) + 1;
                getresult('includes/feedContent.html?feed=1&page='+pagenum);
                console.log($('.rowcount').val());
            }
        }
    });
*/
