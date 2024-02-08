function startPageLoading(){
    $("#pageLoading").removeClass("hidden");
    $("#body").addClass("pointer-events-none opacity-40");
}

function stopPageLoading(){
    $("#pageLoading").addClass("hidden");
    $("#body").removeClass("pointer-events-none opacity-40");
}