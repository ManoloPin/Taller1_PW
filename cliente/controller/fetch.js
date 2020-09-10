//Listeners------------------------------------------------------
document.getElementById("enviar").addEventListener("click", function(){exe("enviar");});

document.getElementById("modificar").addEventListener("click", function(){exe("modificar");});
document.getElementById("eliminar").addEventListener("click", function(){exe("eliminar");});

document.getElementById("cargar").addEventListener("click", function(){exe("cargar");});
//Fin Listeners--------------------------------------------------

//Esta constante corresponde a la abstracción de un formulario que va a enviar unos datos


function exe(){
   const data = new FormData();
   if(arguments[0]=="enviar"){
      alert("Enviando");
      data.append('enviar', document.getElementById('enviar').value);
   }
   else if(arguments[0]=="cargar"){
      alert("Cargando"); 
      data.append('cargar', document.getElementById('cargar').value);
   }
   else if(arguments[0] == "modificar"){
      alert("modificando");
      data.append('modificar', document.getElementById('modificar').value);
   }
   else if (arguments[0] == "eliminar"){
      alert("eliminando");
      data.append('eliminar', document.getElementById('eliminar'))
   }
   
   data.append('id', document.getElementById('id').value);
   data.append('name', document.getElementById('name').value);
   data.append('dir', document.getElementById('dir').value);
   data.append('idL', document.getElementById('idL').value);
   
   fetch(
      'http://localhost/ej1/servidor/controller/cIndex.php',

      {
         method: 'POST',
         body: data
      }
   )
   .then(function(response) {
      if(response.ok) {
         return response.text()
         //console.log(response.json())
      } else {
         throw "Error en la llamada Fetch";
      }

   })
   .then(function(respuestaDelServidor) {
   document.getElementById('resp').innerHTML=respuestaDelServidor
      console.log(respuestaDelServidor);
   })
   .catch(function(err) {
      console.log(err);
   });

}
