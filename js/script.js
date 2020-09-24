 function objetoAjax(){
  var xmlhttp=false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function habilitrDeshabltrCampo(estatus, campo, idArea){  

 swal({
        title: "",
        text: "¿Esta seguro de habilitar/deshabilitar campo?",
        type: "info",
        className: "btnSwal",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Activar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {


                 //cont = document.getElementById('content-fechas');
  ajax=objetoAjax();
  ajax.open("POST", "admon/accionAreaUpdate.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
        
        var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se actualizo verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Actualizado Exitosamente.", "success");
                 loadDataurEnviados();
                }
              } 

    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&estatus='+estatus+'&campo='+campo+'&idArea='+idArea);
          
        }
      });



}


function desactivaEnviadoAll(){  


 swal({
        title: "",
        text: "¿Esta seguro de quitar el enviado de todas las unidades? Todas las unidades se habilitarian.",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Activar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {


                 //cont = document.getElementById('content-fechas');
  ajax=objetoAjax();
  ajax.open("POST", "admon/enviadoUpdate.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
        
        var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Enviados Actualizadas Exitosamente.", "success");
                 loadDataurEnviados();
                }
              } 

    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send(null);
          
        }
      });



}

function loadDataurEnviados(){  

  idUr = document.getElementById('selIdur').value;

  cont = document.getElementById('tableUrsPoadm');
  ajax=objetoAjax();
  ajax.open("POST", "admon/tableUrEnviados.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
      cont.innerHTML = ajax.responseText; 
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&idUr='+idUr);
}

function activaMesAll(){  

  selecMonthActive = document.getElementById('selecMonthActive').value;

   //cont = document.getElementById('content-fechas');
  ajax=objetoAjax();
  ajax.open("POST", "admon/activeMonthUpdate.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
        
        var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Mes Activado Exitosamente.", "success");
                 loadDataurEnviados();
                }
              } 

    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&selecMonthActive='+selecMonthActive);
}


function desactivaMesAll(){  

  selecMonthdesActive = document.getElementById('selecMonthdesActive').value;

  ajax=objetoAjax();
  ajax.open("POST", "admon/unactiveMOnthUpdate.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
        
        var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Mes Desactivado Exitosamente.", "success");
                 loadDataurEnviados();
                }
              } 

    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&selecMonthdesActive='+selecMonthdesActive);
}


function saveFechas(){  

  date1 = document.getElementById('date1').value;
   date2 = document.getElementById('date2').value; 
   date3 = document.getElementById('date3').value;

   cont = document.getElementById('content-fechas');
  ajax=objetoAjax();
  ajax.open("POST", "admon/fechasUpdate.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
        
        var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Fechas Actualizadas Exitosamente.", "success");
                 loadPageFechas();
                }
              } 

    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&date1='+date1+'&date2='+date2+'&date3='+date3);
}


function loadPageFechas(){  
 cont = document.getElementById('content-fechas');
  ajax=objetoAjax();
  ajax.open("POST", "admon/fechas.php");
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
      cont.innerHTML = ajax.responseText;   
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send(null);
}

function loadPage(folder, page){  
 cont = document.getElementById('content-main');
  ajax=objetoAjax();
  ajax.open("POST", folder+"/"+page);
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {      
      cont.innerHTML = ajax.responseText;   
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send(null);
}


 
 $(function() {
    	
    	$(".toggle").on("click", function(){


    			if ($(".item").hasClass("active")){
    				$(".item").removeClass("active");
    			}else{
    				$(".item").addClass("active");
    			}

    	})

  });

 let modal = document.getElementById('modalCap');



function openModal(mes, anio, idNuevaAct){
 	
 cont = document.getElementById('contModCap');

  ajax=objetoAjax();
  ajax.open("POST", "activity/grouped.php");

  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {
     	
     	cont.innerHTML = ajax.responseText;
   		modal.style.display = 'block';     
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&mes='+mes+'&anio='+anio+'&idNuevaAct='+idNuevaAct);

}

function closeModal(){
 	modal.style.display = 'none';
}


function saveDataGrouped(mes, anio, idNuevaAct, a, prog, segu){
  
 justGrup = document.getElementById('justexa').value;
 propGrup = document.getElementById('proptexa').value; 
 obstexa = document.getElementById('obstexa').value;
 cont = document.getElementById('contModCap');
 ajax=objetoAjax();
 ajax.open("POST", "activity/savegrouped.php");
 
 if(prog == segu){

  if(justGrup != "" || propGrup != ""){ swal("", "No puede contener Propuesta o Justificación", "warning"); }else{
    ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && ajax.status == 200) {

     var json = ajax.responseText;
              var obj = eval("(" + json + ")");
              if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                if (obj.first == "SI") {                    
                 swal("", "Registrado Exitosamente.", "success");
                 closeModal();
                }
              } 
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send('&a='+a+'&mes='+mes+'&anio='+anio+'&idNuevaAct='+idNuevaAct+'&obstexa='+obstexa+'&justGrup='+justGrup+'&propGrup='+propGrup);
  }

  

 }else{

    if(prog < segu){

         if(propGrup != ""){ swal("", "No puede contener propuesta.", "warning"); }else{

           if(justGrup == ""){ swal("", "Debe de contener justificación.", "warning"); }else{
         
                ajax=objetoAjax();
                 ajax.open("POST", "activity/savegrouped.php");

                ajax.onreadystatechange = function(){
                  if (ajax.readyState == 4 && ajax.status == 200) {
                        
                     var json = ajax.responseText;
                            var obj = eval("(" + json + ")");
                            if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                               if (obj.first == "SI") {                    
                                  swal("", "Registrado Exitosamente.", "success");
                                  closeModal();

                               }
                            }
                  }
                }
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                ajax.send('&a='+a+'&mes='+mes+'&anio='+anio+'&idNuevaAct='+idNuevaAct+'&obstexa='+obstexa+'&justGrup='+justGrup+'&propGrup='+propGrup);
              
         }  

    }

 }else{

   if(prog > segu){

       if(propGrup == "" || justGrup == ""){ swal("", "Debe contener propuesta y Justificación", "warning"); }else{
           
             ajax=objetoAjax();
                 ajax.open("POST", "activity/savegrouped.php");

                ajax.onreadystatechange = function(){
                  if (ajax.readyState == 4 && ajax.status == 200) {
                        
                     var json = ajax.responseText;
                            var obj = eval("(" + json + ")");
                            if (obj.first == "NO") { swal("", "No se registro verifique los datos.", "warning"); }else{
                               if (obj.first == "SI") {                    
                                  swal("", "Registrado Exitosamente.", "success");
                                  closeModal();

                               }
                            }
                  }
                }
                ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                ajax.send('&a='+a+'&mes='+mes+'&anio='+anio+'&idNuevaAct='+idNuevaAct+'&obstexa='+obstexa+'&justGrup='+justGrup+'&propGrup='+propGrup);
         

    }

   }

  } 

}

}


