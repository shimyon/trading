$("document").ready(function () {
    setTimeout(function () {
        $("div.alert").remove();
    }, 5000); // 5 secs
    
    var title = document.title;

    $(document).ajaxStart(function () {
        document.title = 'Wait...';
        $('#waitLoading').modal('show');
    });

    $(document).ajaxStop(function () {
        document.title = title;
        $('#waitLoading').modal('hide');
    });

    $(document).ajaxError(function () {
        document.title = title;
        $('#waitLoading').modal('hide');
    });
});
