window.alerta=(mensaje, icono)=>{
    swal({
        title: "AgroWeb",
        text: mensaje,
        icon: icono,
        button: "Ok",
        timer: 2000,
    });
};

window.callHttp = (url, data) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                if (response.codigo === 200) {
                    if(response.mensaje!=null){
                        alerta(response.mensaje, 'success')
                    }
                    delete response.codigo;
                    resolve(response);
                } else {
                    reject();
                }
            }, error: (error) => {
                console.log(error);
                reject();
            }
        });
    });
};

