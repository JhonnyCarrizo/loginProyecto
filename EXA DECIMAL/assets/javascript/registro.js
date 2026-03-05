const erTools = /^[a-zA-ZáéíóúñüÁÉÍÓÚÑ0-9.]+( [a-zA-ZáéíóúÁÉÍÓÚñÑ0-9.]+)*$/
const erSerie = /^(#)*[a-zA-Z0-9]+$/

function enviar(){

    let tools = document.getElementById("tools").value;
    let serie = document.getElementById('serie').value;
    let marca = document.getElementById('marca').value;
    let erMarca = marca.trim();
    let erEstado = document.getElementById('estado').value;
    let estado = erEstado.trim();
    let condicion = document.querySelector('input[name="condiciones[]"]:checked');

    if(tools === ""){
        alert('Ingrese el nombre de la herramienta que quiera guardar.')
        return false;
    }

    if(erTools.test(tools) == false){
        alert('Nombre no válido, por favor, ingrese el nombre de la herramienta.')
        return false;
    }

    if(serie === ""){
        alert('Ingrese el serial de la herramienta que quiera guardar.');
        return false;
    }

    if(erSerie.test(serie) == false){
        alert('Serial no válido \n Ejemplo: "120"  "SI2933" "#01459".');
        return false;
    }

    if(marca === ""){
        alert('Ingrese la marca de la herramienta que quiera guardar \n En caso de que no conozca la marca coloque "Descononida".')
        return false;
    }

    if(erMarca !== marca){
        alert('Evite colocar espacios al principio ni al final.');
        return false;
    }

    if(erEstado === ""){
        alert('Escriba una descripción del estado en el que se encuentra la herramienta que quiera guardar.');
        return false;
    }

    if(erEstado !== estado){
        alert('Evite colocar espacios al principio ni al final.');
        return false;
    }

    if(!condicion){
        alert('Seleccione una condición operativa \n \n Óptimo (100%): Herramienta nueva o con mantenimiento recién realizado. \n \n Operativo (75%): Equipo con desgaste normal, listo para el trabajo diario. \n \n Requiere Revisión (50%): Herramienta que necesita mantenimiento preventivo pronto. \n \n Crítico / En Reparación (25%): Equipo limitado que requiere intervención inmediata antes de volver al campo.');
        return false;

    }

    return true;
}