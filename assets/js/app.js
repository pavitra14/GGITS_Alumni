function deleteEvent(e_id){
    alert(e_id);
    if(confirm("Are you sure you want to delete this event?")) {
        $.ajax({
            url: "includes/feedContent.html?deleteEvent=1",
            data:'e_id='+e_id,
            type: "POST",
            success: function(data){
                alert("Event deleted.");
                location.reload();
            }
        });
    }
}