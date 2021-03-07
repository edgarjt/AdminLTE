document.getElementById("avatar").onchange = function(e) {
    console.log('edgar');
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();

    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);

    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
        $('#avatar-actual').addClass('d-none');
        let preview = document.getElementById('preview'),
            image = document.createElement('img');

        image.src = reader.result;
        image.className = 'avatar';

        preview.innerHTML = '';
        preview.append(image);
    };
}
