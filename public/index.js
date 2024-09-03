function deleteImage(image) {
    deleteImageFromStorage(image);
}

async function deleteImageFromStorage(image) {

    try {
        const datos = new FormData();
        datos.append('image_name', image);

        const response = await fetch('api/api.php?funcion=deleteImage', {
            method: 'POST',
            body: datos
        })

        const resp = await response.json();

        if (resp.execute == 'error') {
            alert('Delete image failed: ' + resp.message);
            return false;
        } else if (resp.execute == 'success') {
            window.location.reload();
        }
    } catch (error) {
        alert('Delete image failed: ' + error);
        return false;
    }
}