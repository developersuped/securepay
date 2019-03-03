

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

