<!DOCTYPE html>

<html>

    <head>
        <title>Javascript: AJAJ</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap.min.css" />
    </head>

    <body>
        <div class="container" style="margin-top: 20px;">
            <h2>Formulario Cascade Select B92786</h2>
            <form>
                <div class="form-group">
                    <label for="listaProvincias" class="form-label mt-4">Provincia</label>
                    <select class="form-select" id="listaProvincias" onchange="mostrarCantones()">
                        <option value="0">Selecione una Provincia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="listaCantones" class="form-label mt-4">Canton</label>
                    <select class="form-select" id="listaCantones" onchange="mostrarDistritos()">
                        <option value="0">Selecione un Canton</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="listaCantones" class="form-label mt-4">Distrito</label>
                    <select class="form-select" id="listaDistritos">
                        <option value="0">Selecione un Distrito</option>
                    </select>
                </div>

                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="margin-top: 20px;" class="btn btn-danger">Terminar</a>

            </form>
        </div>
        
        <script>
            var provincias = <?php include 'Provincias.php'; ?>;
            var provinciasSelect = document.querySelector("#listaProvincias");
            provincias.forEach(provincia =>{
                let option = document.createElement("option");
                option.value = provincia['id'];
                let text = document.createTextNode(provincia['nombre']);
                option.appendChild(text);
                provinciasSelect.appendChild(option);
            });
            

            function mostrarCantones(){
                var provincia = document.getElementById("listaProvincias").value;
                var cantonesSelect = document.querySelector("#listaCantones");
                if(provincia != ""){
                    $.ajax({
                        url: "Cantones.php",
                        type: "POST",
                        data: "{\"id\":"+provincia+"}",
                        success: function(ajaxRes) {
                            var cantonesPHP = JSON.parse(ajaxRes);
                            cantonesPHP.forEach(canton => {
                                let option = document.createElement("option");
                                option.value = canton['id'];
                                let text = document.createTextNode(canton['nombre']);
                                option.appendChild(text);
                                cantonesSelect.appendChild(option);
                            });
                            
                        }
                    })
                }else{

                }
            }

            function mostrarDistritos(){
                var canton = document.getElementById("listaCantones").value;
                var distritoSelect = document.querySelector("#listaDistritos");
                if(canton != ""){
                    $.ajax({
                        url: "Distritos.php",
                        type: "POST",
                        data: "{\"id\":"+canton+"}",
                        success: function(ajaxRes) {
                            var distritosPHP = JSON.parse(ajaxRes);
                            var opciones = "";
                            distritosPHP.forEach(distrito => {
                                let option = document.createElement("option");
                                option.value = distrito['id'];
                                let text = document.createTextNode(distrito['nombre']);
                                option.appendChild(text);
                                distritoSelect.appendChild(option);
                            });
                            
                        }
                    })
                }
            }

            
        </script>
    </body>
</html>