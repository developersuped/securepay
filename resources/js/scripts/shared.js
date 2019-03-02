window.swal = require('sweetalert');
window.alerta = (data, time = true) => {
    console.log("alerta", data);
    if (data.codigo === 200) {
        if (data.mensaje !== undefined) {
            if (time) {
                setTimeout(() => {
                    swal.close();
                }, 1000);
            }
            return swal((data.titulo === undefined) ? "Exito!" : data.titulo, data.mensaje, "success");
        }
    } else if (data.codigo === 500) {
        return swal("Codigo de error #" + data.transaccionid,
            data.message + "\n" + data.line + "\n" + data.file,
            "error"
        );
    } else {
        return swal((data.titulo === undefined) ? '' : data.titulo, data.mensaje, "info");
    }
};


window.callHttp = (url, data, loader = true) => {
    if (loader) $("#loader").show();
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $("#token").attr("content")
            },
            success: (response) => {
                if (response.codigo === 200) {
                    alerta(response, true);
                    delete response.codigo;
                    resolve(response);
                } else {
                    reject();
                }
                if (response.message) alerta(response);
                $("#loader").hide()
            }, error: (error) => {
                console.log(error);
                alerta({
                    codigo: 500,
                    titulo: "Error de conexion",
                    mensaje: 'error al conectar con el servidor '
                });
                $("#loader").hide();
                reject();
            }
        });
    });
};

window.getPermisRoute = (router) => {
    let rutas = router.options.routes;
    let ruta = router.currentRoute.matched[0].path;
    let res = [];
    rutas.forEach(item => {
        if (item.path == ruta) {
            res = item.permisos;
            return;
        }
    });
    return res;
};
