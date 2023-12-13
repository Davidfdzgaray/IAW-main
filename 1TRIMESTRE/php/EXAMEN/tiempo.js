$(document).ready(function () {
    $('#buscar').click(function () {
        let latitud = $('#latitud').val();
        let longitud = $('#longitud').val();
        let apiKey = 'fe04a7bdb0472b89535f83f32424a809';
        let tiempo ='';
        
        $.ajax({
            url: `http://api.openweathermap.org/data/2.5/air_pollution?lat=${latitud}&lon=${longitud}&appid=${apiKey}`,
            success: function (data) {
                if (data.list[0].main.aqi == 1) {
                    tiempo = 'Bueno';
                }
                else if (data.list[0].main.aqi == 2) {
                    tiempo = 'Aceptable'; 
                }
                else if (data.list[0].main.aqi == 3) {
                    tiempo = 'Moderado';
                }
                else if (data.list[0].main.aqi == 4) {
                    tiempo = 'Malo';
                }
                else {
                    tiempo = 'Muy Malo';
                }

                $('#resultado').html(`
                <p>Index de Calidad de Aire: ${data.list[0].main.aqi}</p>
                <p>Calidad de Aire: ${tiempo}</p>
                <p>Monóxido de Carbono: ${data.list[0].components.co} μg/m3</p>
                `);
            },
            error: function () {
                $('#resultado').html('<p>No se pudo obtener la información de la calidad del aire.</p>');
            },
        });
    });
});