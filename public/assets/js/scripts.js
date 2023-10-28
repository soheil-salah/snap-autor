function ajaxSwalConfirmation(type, {route, data, swalConfirmation, swalBeforeSend, swalSuccess, reload = false, redirect = null}){

    Swal.fire(swalConfirmation).then((result) => {
            
        if (result.isConfirmed) {

            if(type == 'submit'){

                ajaxSwalSubmit({route, data, swalBeforeSend, swalSuccess, reload, redirect});

            }else if(type == 'click'){

                ajaxSwal({route, data, swalBeforeSend, swalSuccess, reload, redirect});
            }
        }
    });
}

function ajaxSwalSubmit({route, data, swalBeforeSend, swalSuccess, reload, redirect}){

    $.ajax({
        type : "POST",
        url : route,
        data : data,
        contentType : false,
        processData : false,
        cache : false,
        beforeSend : function(){
            
            Swal.fire(swalBeforeSend);
        },
        success : function(data){

            swalSuccess.html = data;
            
            Swal.fire(swalSuccess).then(() => {

                if(reload){
                    location.reload();
                }

                if(redirect != null){

                    location.href = redirect;
                }
            });
        },
        error : function(xhr, status, error){

            Swal.closeModal()

            var err = JSON.parse(xhr.responseText);

            toastr.options = {
                timeOut: 0,
                extendedTimeOut: 0,
                closeButton: true,
            };

            toastr.error('<b>'+err.message+'</b>');
        },
    });
}

function ajaxSwal({route, data, swalBeforeSend, swalSuccess, reload, redirect}){

    $.ajax({
        type : "POST",
        url : route,
        data : data,
        beforeSend : function(){
            
            Swal.fire(swalBeforeSend);
        },
        success : function(data){

            swalSuccess.html = data;
            
            Swal.fire(swalSuccess).then(() => {

                if(reload){
                    location.reload();
                }

                if(redirect != null){

                    location.href = redirect;
                }
            });
        },
        error : function(xhr, status, error){

            Swal.closeModal()

            var err = JSON.parse(xhr.responseText);

            toastr.options = {
                timeOut: 0,
                extendedTimeOut: 0,
                closeButton: true,
            };

            toastr.error('<b>'+err.message+'</b>');
        },
    });
}