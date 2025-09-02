

function imprimir_permiso(){


  var num_permiso=$('#num_permiso').html();

   if(num_permiso=='S/N'){
      // alert('Error al imprimir; su permiso no tiene número asignado (S/N).');
       toastr.warning('Error al imprimir; su permiso no tiene número asignado (S/N)','ERROR');

   }else{
       window.open("tcpdf/permiso.php?num_permiso="+num_permiso,"","top=10,left=300,width=700,height=600");
   }
  
}




function resetea_formulario(){

    document.getElementById("formulario_uno").reset();
    document.getElementById("formulario_dos").reset();
    document.getElementById("formulario_tres").reset();
    document.getElementById("formulario_cuatro").reset();
    document.getElementById("formulario_cinco").reset();
    document.getElementById("formulario_seis").reset();
    document.getElementById("formulario_siete").reset();
    document.getElementById("formulario_ocho").reset();
    document.getElementById("formulario_nueve").reset();
    document.getElementById("formulario_diez").reset();

   document.getElementById("formulario_ultimos_datos").reset();
   document.getElementById("formulario_permiso").reset();

   document.getElementById("formulario_uno").style.display = "none";
   document.getElementById("formulario_dos").style.display = "none";
   document.getElementById("formulario_tres").style.display = "none";
   document.getElementById("formulario_cuatro").style.display = "none";
   document.getElementById("formulario_cinco").style.display = "none";
   document.getElementById("formulario_seis").style.display = "none";
   document.getElementById("formulario_siete").style.display = "none";
   document.getElementById("formulario_ocho").style.display = "none";
   document.getElementById("formulario_nueve").style.display = "none";
   document.getElementById("formulario_diez").style.display = "none";

}

function form_check_diez(){
        document.getElementById("formulario_diez").reset();
  if(document.getElementById('X_check_lavado_alta_presion').checked == true){
    document.getElementById("formulario_diez").style.display = "block";
   
  }else{
      document.getElementById("formulario_diez").style.display = "none";
  }
  
}
function form_check_nueve(){
        document.getElementById("formulario_nueve").reset();
  if(document.getElementById('IX_check_trabajos_caliente').checked == true){
    document.getElementById("formulario_nueve").style.display = "block";
   
  }else{
      document.getElementById("formulario_nueve").style.display = "none";
  }
  
}

function form_check_ocho(){
        document.getElementById("formulario_ocho").reset();
  if(document.getElementById('VIII_check_atmosfera_peligrosa').checked == true){
    document.getElementById("formulario_ocho").style.display = "block";
   
  }else{
      document.getElementById("formulario_ocho").style.display = "none";
  }
  
}
function form_check_siete(){
        document.getElementById("formulario_siete").reset();
  if(document.getElementById('VII_check_equipos_electronicos').checked == true){
   document.getElementById("formulario_siete").style.display = "block";
   
  }else{
      document.getElementById("formulario_siete").style.display = "none";
  }
  
}
function form_check_seis(){
        document.getElementById("formulario_seis").reset();
  if(document.getElementById('VI_check_excavacion').checked == true){
    document.getElementById("formulario_seis").style.display = "block";
   
  }else{
      document.getElementById("formulario_seis").style.display = "none";
  }
  
}
function form_check_cinco(){
        document.getElementById("formulario_cinco").reset();
  if(document.getElementById('V_check_cespacio_confinado').checked == true){
    document.getElementById("formulario_cinco").style.display = "block";
   
  }else{
      document.getElementById("formulario_cinco").style.display = "none";
  }
  
}
function form_check_cuatro(){
        document.getElementById("formulario_cuatro").reset();
  if(document.getElementById('IV_check_operacion_levante').checked == true){
    document.getElementById("formulario_cuatro").style.display = "block";
   
  }else{
      document.getElementById("formulario_cuatro").style.display = "none";
  }
  
}

function form_check_tres(){
        document.getElementById("formulario_tres").reset();
  if(document.getElementById('III_check_sumunistro_aire').checked == true){
    document.getElementById("formulario_tres").style.display = "block";
   
  }else{
      document.getElementById("formulario_tres").style.display = "none";
  }
  
}

function form_check_dos(){
        document.getElementById("formulario_dos").reset();
  if(document.getElementById('II_check_trabajo_altura').checked == true){
    document.getElementById("formulario_dos").style.display = "block";
   
  }else{
      document.getElementById("formulario_dos").style.display = "none";
  }
  
}

function form_check_uno(){
        document.getElementById("formulario_uno").reset();
  if(document.getElementById('I_check_aislamiento_bloqueo').checked == true){
    document.getElementById("formulario_uno").style.display = "block";
   
  }else{
      document.getElementById("formulario_uno").style.display = "none";
  }
  
}


function ver_permiso_nuevo(numero_permiso, id_permiso){

        var label = document.getElementById('num_permiso');
        label.style.color = 'black';


          $.ajax({
            url:'json/json.php?accion=ver_permiso_nuevo',
            data:{numero_permiso:numero_permiso,id_permiso:id_permiso},
            type:'post',
            dataType: "json", 
            success: function (data)
              {


                if(data[0].tipo_permiso=='PERMISO DIARIO DE TRABAJO'){
                  document.getElementById('fecha_termino_ejecucion').readOnly = true;
                }else{
                  document.getElementById('fecha_termino_ejecucion').readOnly = false;
                }
                  
                $("#num_permiso").html(data[0].num_permiso);
                $('#titulo_permiso').html(data[0].tipo_permiso);
                $('#area_solicitante').html('<option value="'+data[0].codigo_area_solicitante+'">'+data[0].area_solicitante+'</option>');
                $('#num_ot').val(data[0].num_ot);
                $('#numero_trabajadores').val(data[0].numero_trabajadores);
                $('#fecha_ini_ejecucion').val(data[0].fecha_ini_ejecucion);
                $('#fecha_termino_ejecucion').val(data[0].fecha_termino_ejecucion);
                $('#hora_ini_ejecucion').val(data[0].hora_ini_ejecucion);
                $('#hora_termino_ejecucion').val(data[0].hora_termino_ejecucion);
                $('#empresa_contratista').val(data[0].empresa_contratista);
                $('#responsable_ejecucion').val(data[0].responsable_ejecucion);
                $('#area_responsable').html('<option value="'+data[0].codigo_area_responsable+'">'+data[0].area_responsable+'</option>');
                $('#responsable_area').html('<option value="'+data[0].responsable_area+'">'+data[0].responsable_area+'</option>');
                $('#area_autorizada').val(data[0].area_autorizada);
                $('#trabajo_a_realizar').val(data[0].trabajo_a_realizar);
                $('#detalle_tabajo_critico').val(data[0].detalle_tabajo_critico);
                $('#XIII_otros').val(data[0].XIII_otros);
                $('#XII_otros').val(data[0].XII_otros);
                $('#nick_modifica').val(data[0].nick_modifica);
                $('#fecha_modifica').val(data[0].fecha_modifica);
                $('#I_tag_uno').val(data[0].I_tag_uno);
                $('#I_tag_dos').val(data[0].I_tag_dos);
                $('#I_tag_tres').val(data[0].I_tag_tres);
                $('#I_tag_cuatro').val(data[0].I_tag_cuatro);
                $('#I_tag_cinco').val(data[0].I_tag_cinco);
                $('#I_candado_uno').val(data[0].I_candado_uno);
                $('#I_candado_dos').val(data[0].I_candado_dos);
                $('#I_candado_tres').val(data[0].I_candado_tres);
                $('#I_candado_cuatro').val(data[0].I_candado_cuatro);
                $('#I_candado_cinco').val(data[0].I_candado_cinco);


               if(data[0].I_check_aislamiento_bloqueo=='false'){
                          document.getElementById('I_check_aislamiento_bloqueo').checked = false;
                          document.getElementById("formulario_uno").style.display = "none";
                }else{
                    document.getElementById('I_check_aislamiento_bloqueo').checked = true;
                    document.getElementById("formulario_uno").style.display = "block";
                }
                if(data[0].II_check_trabajo_altura=='false'){
                  document.getElementById('II_check_trabajo_altura').checked = false;
                  document.getElementById("formulario_dos").style.display = "none";
                }else{
                  document.getElementById('II_check_trabajo_altura').checked = true;
                  document.getElementById("formulario_dos").style.display = "block";
                }
                if(data[0].III_check_sumunistro_aire=='false'){
                  document.getElementById('III_check_sumunistro_aire').checked = false;
                  document.getElementById("formulario_tres").style.display = "none";
                }else{
                  document.getElementById('III_check_sumunistro_aire').checked = true;
                  document.getElementById("formulario_tres").style.display = "block";
                }
                if(data[0].IV_check_operacion_levante=='false'){
                  document.getElementById('IV_check_operacion_levante').checked = false;
                  document.getElementById("formulario_cuatro").style.display = "none";
                }else{
                  document.getElementById('IV_check_operacion_levante').checked = true;
                  document.getElementById("formulario_cuatro").style.display = "block";
                }
                if(data[0].V_check_cespacio_confinado=='false'){
                  document.getElementById('V_check_cespacio_confinado').checked = false;
                  document.getElementById("formulario_cinco").style.display = "none";
                }else{
                  document.getElementById('V_check_cespacio_confinado').checked = true;
                  document.getElementById("formulario_cinco").style.display = "block";
                }
                if(data[0].VI_check_excavacion=='false'){
                  document.getElementById('VI_check_excavacion').checked = false;
                  document.getElementById("formulario_seis").style.display = "none";
                }else{
                  document.getElementById('VI_check_excavacion').checked = true;
                  document.getElementById("formulario_seis").style.display = "block";
                }
                if(data[0].VII_check_equipos_electronicos=='false'){
                  document.getElementById('VII_check_equipos_electronicos').checked = false;
                  document.getElementById("formulario_siete").style.display = "none";
                }else{
                  document.getElementById('VII_check_equipos_electronicos').checked = true;
                  document.getElementById("formulario_siete").style.display = "block";
                }
                if(data[0].VIII_check_atmosfera_peligrosa=='false'){
                  document.getElementById('VIII_check_atmosfera_peligrosa').checked = false;
                  document.getElementById("formulario_ocho").style.display = "none";
                }else{
                  document.getElementById('VIII_check_atmosfera_peligrosa').checked = true;
                  document.getElementById("formulario_ocho").style.display = "block";
                }
                if(data[0].IX_check_trabajos_caliente=='false'){
                  document.getElementById('IX_check_trabajos_caliente').checked = false;
                  document.getElementById("formulario_nueve").style.display = "none";
                }else{
                  document.getElementById('IX_check_trabajos_caliente').checked = true;
                  document.getElementById("formulario_nueve").style.display = "block";
                }
                if(data[0].X_check_lavado_alta_presion=='false'){
                  document.getElementById('X_check_lavado_alta_presion').checked = false;
                  document.getElementById("formulario_diez").style.display = "none";
                }else{
                  document.getElementById('X_check_lavado_alta_presion').checked = true;
                  document.getElementById("formulario_diez").style.display = "block";
                }
                if(data[0].I_check_candado_si=='false'){document.getElementById('I_check_candado_si').checked = false;}else{document.getElementById('I_check_candado_si').checked = true;}
                if(data[0].I_check_candado_no=='false'){document.getElementById('I_check_candado_no').checked = false;}else{document.getElementById('I_check_candado_no').checked = true;}
                if(data[0].I_check_ccm=='false'){document.getElementById('I_check_ccm').checked = false;}else{document.getElementById('I_check_ccm').checked = true;}
                if(data[0].I_check_tablero_electrico=='false'){document.getElementById('I_check_tablero_electrico').checked = false;}else{document.getElementById('I_check_tablero_electrico').checked = true;}
                if(data[0].I_check_ww=='false'){document.getElementById('I_check_ww').checked = false;}else{document.getElementById('I_check_ww').checked = true;}
                if(data[0].I_check_otro_subprincipio=='false'){document.getElementById('I_check_otro_subprincipio').checked = false;}else{document.getElementById('I_check_otro_subprincipio').checked = true;}
                if(data[0].IIa_check_si=='false'){document.getElementById('IIa_check_si').checked = false;}else{document.getElementById('IIa_check_si').checked = true;}
                if(data[0].IIa_check_no=='false'){document.getElementById('IIa_check_no').checked = false;}else{document.getElementById('IIa_check_no').checked = true;}
                if(data[0].IIb_check_si=='false'){document.getElementById('IIb_check_si').checked = false;}else{document.getElementById('IIb_check_si').checked = true;}
                if(data[0].IIb_check_no=='false'){document.getElementById('IIb_check_no').checked = false;}else{document.getElementById('IIb_check_no').checked = true;}
                if(data[0].IIc_check_si=='false'){document.getElementById('IIc_check_si').checked = false;}else{document.getElementById('IIc_check_si').checked = true;}
                if(data[0].IIc_check_no=='false'){document.getElementById('IIc_check_no').checked = false;}else{document.getElementById('IIc_check_no').checked = true;}
                if(data[0].IId_check_si=='false'){document.getElementById('IId_check_si').checked = false;}else{document.getElementById('IId_check_si').checked = true;}
                if(data[0].IId_check_no=='false'){document.getElementById('IId_check_no').checked = false;}else{document.getElementById('IId_check_no').checked = true;}
                if(data[0].IIe_check_si=='false'){document.getElementById('IIe_check_si').checked = false;}else{document.getElementById('IIe_check_si').checked = true;}
                if(data[0].IIe_check_no=='false'){document.getElementById('IIe_check_no').checked = false;}else{document.getElementById('IIe_check_no').checked = true;}
                if(data[0].IIf_check_si=='false'){document.getElementById('IIf_check_si').checked = false;}else{document.getElementById('IIf_check_si').checked = true;}
                if(data[0].IIf_check_no=='false'){document.getElementById('IIf_check_no').checked = false;}else{document.getElementById('IIf_check_no').checked = true;}
                if(data[0].IIg_check_si=='false'){document.getElementById('IIg_check_si').checked = false;}else{document.getElementById('IIg_check_si').checked = true;}
                if(data[0].IIg_check_no=='false'){document.getElementById('IIg_check_no').checked = false;}else{document.getElementById('IIg_check_no').checked = true;}
                if(data[0].IIh_check_si=='false'){document.getElementById('IIh_check_si').checked = false;}else{document.getElementById('IIh_check_si').checked = true;}
                if(data[0].IIh_check_no=='false'){document.getElementById('IIh_check_no').checked = false;}else{document.getElementById('IIh_check_no').checked = true;}
                if(data[0].IIi_check_si=='false'){document.getElementById('IIi_check_si').checked = false;}else{document.getElementById('IIi_check_si').checked = true;}
                if(data[0].IIi_check_no=='false'){document.getElementById('IIi_check_no').checked = false;}else{document.getElementById('IIi_check_no').checked = true;}
                if(data[0].IIj_check_si=='false'){document.getElementById('IIj_check_si').checked = false;}else{document.getElementById('IIj_check_si').checked = true;}
                if(data[0].IIj_check_no=='false'){document.getElementById('IIj_check_no').checked = false;}else{document.getElementById('IIj_check_no').checked = true;}
                if(data[0].IIIa_check_si=='false'){document.getElementById('IIIa_check_si').checked = false;}else{document.getElementById('IIIa_check_si').checked = true;}
                if(data[0].IIIa_check_no=='false'){document.getElementById('IIIa_check_no').checked = false;}else{document.getElementById('IIIa_check_no').checked = true;}
                if(data[0].IIIb_check_si=='false'){document.getElementById('IIIb_check_si').checked = false;}else{document.getElementById('IIIb_check_si').checked = true;}
                if(data[0].IIIb_check_no=='false'){document.getElementById('IIIb_check_no').checked = false;}else{document.getElementById('IIIb_check_no').checked = true;}
                if(data[0].IIIc_check_si=='false'){document.getElementById('IIIc_check_si').checked = false;}else{document.getElementById('IIIc_check_si').checked = true;}
                if(data[0].IIIc_check_no=='false'){document.getElementById('IIIc_check_no').checked = false;}else{document.getElementById('IIIc_check_no').checked = true;}
                if(data[0].IIId_check_si=='false'){document.getElementById('IIId_check_si').checked = false;}else{document.getElementById('IIId_check_si').checked = true;}
                if(data[0].IIId_check_no=='false'){document.getElementById('IIId_check_no').checked = false;}else{document.getElementById('IIId_check_no').checked = true;}
                if(data[0].IIIe_check_si=='false'){document.getElementById('IIIe_check_si').checked = false;}else{document.getElementById('IIIe_check_si').checked = true;}
                if(data[0].IIIe_check_no=='false'){document.getElementById('IIIe_check_no').checked = false;}else{document.getElementById('IIIe_check_no').checked = true;}
                if(data[0].IIIf_check_si=='false'){document.getElementById('IIIf_check_si').checked = false;}else{document.getElementById('IIIf_check_si').checked = true;}
                if(data[0].IIIf_check_no=='false'){document.getElementById('IIIf_check_no').checked = false;}else{document.getElementById('IIIf_check_no').checked = true;}
                if(data[0].IIIg_check_si=='false'){document.getElementById('IIIg_check_si').checked = false;}else{document.getElementById('IIIg_check_si').checked = true;}
                if(data[0].IIIg_check_no=='false'){document.getElementById('IIIg_check_no').checked = false;}else{document.getElementById('IIIg_check_no').checked = true;}
                if(data[0].IIIh_check_si=='false'){document.getElementById('IIIh_check_si').checked = false;}else{document.getElementById('IIIh_check_si').checked = true;}
                if(data[0].IIIh_check_no=='false'){document.getElementById('IIIh_check_no').checked = false;}else{document.getElementById('IIIh_check_no').checked = true;}
                if(data[0].IIIi_check_si=='false'){document.getElementById('IIIi_check_si').checked = false;}else{document.getElementById('IIIi_check_si').checked = true;}
                if(data[0].IIIi_check_no=='false'){document.getElementById('IIIi_check_no').checked = false;}else{document.getElementById('IIIi_check_no').checked = true;}
                if(data[0].IVa_check_si=='false'){document.getElementById('IVa_check_si').checked = false;}else{document.getElementById('IVa_check_si').checked = true;}
                if(data[0].IVa_check_no=='false'){document.getElementById('IVa_check_no').checked = false;}else{document.getElementById('IVa_check_no').checked = true;}
                if(data[0].IVb_check_si=='false'){document.getElementById('IVb_check_si').checked = false;}else{document.getElementById('IVb_check_si').checked = true;}
                if(data[0].IVb_check_no=='false'){document.getElementById('IVb_check_no').checked = false;}else{document.getElementById('IVb_check_no').checked = true;}
                if(data[0].IVc_check_si=='false'){document.getElementById('IVc_check_si').checked = false;}else{document.getElementById('IVc_check_si').checked = true;}
                if(data[0].IVc_check_no=='false'){document.getElementById('IVc_check_no').checked = false;}else{document.getElementById('IVc_check_no').checked = true;}
                if(data[0].IVd_check_si=='false'){document.getElementById('IVd_check_si').checked = false;}else{document.getElementById('IVd_check_si').checked = true;}
                if(data[0].IVd_check_no=='false'){document.getElementById('IVd_check_no').checked = false;}else{document.getElementById('IVd_check_no').checked = true;}
                if(data[0].IVe_check_si=='false'){document.getElementById('IVe_check_si').checked = false;}else{document.getElementById('IVe_check_si').checked = true;}
                if(data[0].IVe_check_no=='false'){document.getElementById('IVe_check_no').checked = false;}else{document.getElementById('IVe_check_no').checked = true;}
                if(data[0].IVf_check_si=='false'){document.getElementById('IVf_check_si').checked = false;}else{document.getElementById('IVf_check_si').checked = true;}
                if(data[0].IVf_check_no=='false'){document.getElementById('IVf_check_no').checked = false;}else{document.getElementById('IVf_check_no').checked = true;}
                if(data[0].IVg_check_si=='false'){document.getElementById('IVg_check_si').checked = false;}else{document.getElementById('IVg_check_si').checked = true;}
                if(data[0].IVg_check_no=='false'){document.getElementById('IVg_check_no').checked = false;}else{document.getElementById('IVg_check_no').checked = true;}
                if(data[0].IVh_check_si=='false'){document.getElementById('IVh_check_si').checked = false;}else{document.getElementById('IVh_check_si').checked = true;}
                if(data[0].IVh_check_no=='false'){document.getElementById('IVh_check_no').checked = false;}else{document.getElementById('IVh_check_no').checked = true;}
                if(data[0].IVi_check_si=='false'){document.getElementById('IVi_check_si').checked = false;}else{document.getElementById('IVi_check_si').checked = true;}
                if(data[0].IVi_check_no=='false'){document.getElementById('IVi_check_no').checked = false;}else{document.getElementById('IVi_check_no').checked = true;}
                if(data[0].Va_check_si=='false'){document.getElementById('Va_check_si').checked = false;}else{document.getElementById('Va_check_si').checked = true;}
                if(data[0].Va_check_no=='false'){document.getElementById('Va_check_no').checked = false;}else{document.getElementById('Va_check_no').checked = true;}
                if(data[0].Vb_check_si=='false'){document.getElementById('Vb_check_si').checked = false;}else{document.getElementById('Vb_check_si').checked = true;}
                if(data[0].Vb_check_no=='false'){document.getElementById('Vb_check_no').checked = false;}else{document.getElementById('Vb_check_no').checked = true;}
                if(data[0].Vc_check_si=='false'){document.getElementById('Vc_check_si').checked = false;}else{document.getElementById('Vc_check_si').checked = true;}
                if(data[0].Vc_check_no=='false'){document.getElementById('Vc_check_no').checked = false;}else{document.getElementById('Vc_check_no').checked = true;}
                if(data[0].Vd_check_si=='false'){document.getElementById('Vd_check_si').checked = false;}else{document.getElementById('Vd_check_si').checked = true;}
                if(data[0].Vd_check_no=='false'){document.getElementById('Vd_check_no').checked = false;}else{document.getElementById('Vd_check_no').checked = true;}
                if(data[0].Ve_check_si=='false'){document.getElementById('Ve_check_si').checked = false;}else{document.getElementById('Ve_check_si').checked = true;}
                if(data[0].Ve_check_no=='false'){document.getElementById('Ve_check_no').checked = false;}else{document.getElementById('Ve_check_no').checked = true;}
                if(data[0].Vf_check_si=='false'){document.getElementById('Vf_check_si').checked = false;}else{document.getElementById('Vf_check_si').checked = true;}
                if(data[0].Vf_check_no=='false'){document.getElementById('Vf_check_no').checked = false;}else{document.getElementById('Vf_check_no').checked = true;}
                if(data[0].Vg_check_si=='false'){document.getElementById('Vg_check_si').checked = false;}else{document.getElementById('Vg_check_si').checked = true;}
                if(data[0].Vg_check_no=='false'){document.getElementById('Vg_check_no').checked = false;}else{document.getElementById('Vg_check_no').checked = true;}
                if(data[0].Vh_check_si=='false'){document.getElementById('Vh_check_si').checked = false;}else{document.getElementById('Vh_check_si').checked = true;}
                if(data[0].Vh_check_no=='false'){document.getElementById('Vh_check_no').checked = false;}else{document.getElementById('Vh_check_no').checked = true;}
                if(data[0].Vi_check_si=='false'){document.getElementById('Vi_check_si').checked = false;}else{document.getElementById('Vi_check_si').checked = true;}
                if(data[0].Vi_check_no=='false'){document.getElementById('Vi_check_no').checked = false;}else{document.getElementById('Vi_check_no').checked = true;}
                if(data[0].VIa_check_si=='false'){document.getElementById('VIa_check_si').checked = false;}else{document.getElementById('VIa_check_si').checked = true;}
                if(data[0].VIa_check_no=='false'){document.getElementById('VIa_check_no').checked = false;}else{document.getElementById('VIa_check_no').checked = true;}
                if(data[0].VIb_check_si=='false'){document.getElementById('VIb_check_si').checked = false;}else{document.getElementById('VIb_check_si').checked = true;}
                if(data[0].VIb_check_no=='false'){document.getElementById('VIb_check_no').checked = false;}else{document.getElementById('VIb_check_no').checked = true;}
                if(data[0].VIc_check_si=='false'){document.getElementById('VIc_check_si').checked = false;}else{document.getElementById('VIc_check_si').checked = true;}
                if(data[0].VIc_check_no=='false'){document.getElementById('VIc_check_no').checked = false;}else{document.getElementById('VIc_check_no').checked = true;}
                if(data[0].VId_check_si=='false'){document.getElementById('VId_check_si').checked = false;}else{document.getElementById('VId_check_si').checked = true;}
                if(data[0].VId_check_no=='false'){document.getElementById('VId_check_no').checked = false;}else{document.getElementById('VId_check_no').checked = true;}
                if(data[0].VIe_check_si=='false'){document.getElementById('VIe_check_si').checked = false;}else{document.getElementById('VIe_check_si').checked = true;}
                if(data[0].VIe_check_no=='false'){document.getElementById('VIe_check_no').checked = false;}else{document.getElementById('VIe_check_no').checked = true;}
                if(data[0].VIf_check_si=='false'){document.getElementById('VIf_check_si').checked = false;}else{document.getElementById('VIf_check_si').checked = true;}
                if(data[0].VIf_check_no=='false'){document.getElementById('VIf_check_no').checked = false;}else{document.getElementById('VIf_check_no').checked = true;}
                if(data[0].VIg_check_si=='false'){document.getElementById('VIg_check_si').checked = false;}else{document.getElementById('VIg_check_si').checked = true;}
                if(data[0].VIg_check_no=='false'){document.getElementById('VIg_check_no').checked = false;}else{document.getElementById('VIg_check_no').checked = true;}
                if(data[0].VIh_check_si=='false'){document.getElementById('VIh_check_si').checked = false;}else{document.getElementById('VIh_check_si').checked = true;}
                if(data[0].VIh_check_no=='false'){document.getElementById('VIh_check_no').checked = false;}else{document.getElementById('VIh_check_no').checked = true;}
                if(data[0].VIi_check_si=='false'){document.getElementById('VIi_check_si').checked = false;}else{document.getElementById('VIi_check_si').checked = true;}
                if(data[0].VIi_check_no=='false'){document.getElementById('VIi_check_no').checked = false;}else{document.getElementById('VIi_check_no').checked = true;}
                if(data[0].VIj_check_si=='false'){document.getElementById('VIj_check_si').checked = false;}else{document.getElementById('VIj_check_si').checked = true;}
                if(data[0].VIj_check_no=='false'){document.getElementById('VIj_check_no').checked = false;}else{document.getElementById('VIj_check_no').checked = true;}
                if(data[0].VIIa_check_si=='false'){document.getElementById('VIIa_check_si').checked = false;}else{document.getElementById('VIIa_check_si').checked = true;}
                if(data[0].VIIa_check_no=='false'){document.getElementById('VIIa_check_no').checked = false;}else{document.getElementById('VIIa_check_no').checked = true;}
                if(data[0].VIIb_check_si=='false'){document.getElementById('VIIb_check_si').checked = false;}else{document.getElementById('VIIb_check_si').checked = true;}
                if(data[0].VIIb_check_no=='false'){document.getElementById('VIIb_check_no').checked = false;}else{document.getElementById('VIIb_check_no').checked = true;}
                if(data[0].VIIc_check_si=='false'){document.getElementById('VIIc_check_si').checked = false;}else{document.getElementById('VIIc_check_si').checked = true;}
                if(data[0].VIIc_check_no=='false'){document.getElementById('VIIc_check_no').checked = false;}else{document.getElementById('VIIc_check_no').checked = true;}
                if(data[0].VIId_check_si=='false'){document.getElementById('VIId_check_si').checked = false;}else{document.getElementById('VIId_check_si').checked = true;}
                if(data[0].VIId_check_no=='false'){document.getElementById('VIId_check_no').checked = false;}else{document.getElementById('VIId_check_no').checked = true;}
                if(data[0].VIIe_check_si=='false'){document.getElementById('VIIe_check_si').checked = false;}else{document.getElementById('VIIe_check_si').checked = true;}
                if(data[0].VIIe_check_no=='false'){document.getElementById('VIIe_check_no').checked = false;}else{document.getElementById('VIIe_check_no').checked = true;}
                if(data[0].VIIf_check_si=='false'){document.getElementById('VIIf_check_si').checked = false;}else{document.getElementById('VIIf_check_si').checked = true;}
                if(data[0].VIIf_check_no=='false'){document.getElementById('VIIf_check_no').checked = false;}else{document.getElementById('VIIf_check_no').checked = true;}
                if(data[0].VIIg_check_si=='false'){document.getElementById('VIIg_check_si').checked = false;}else{document.getElementById('VIIg_check_si').checked = true;}
                if(data[0].VIIg_check_no=='false'){document.getElementById('VIIg_check_no').checked = false;}else{document.getElementById('VIIg_check_no').checked = true;}
                if(data[0].VIIh_check_si=='false'){document.getElementById('VIIh_check_si').checked = false;}else{document.getElementById('VIIh_check_si').checked = true;}
                if(data[0].VIIh_check_no=='false'){document.getElementById('VIIh_check_no').checked = false;}else{document.getElementById('VIIh_check_no').checked = true;}
                if(data[0].VIIi_check_si=='false'){document.getElementById('VIIi_check_si').checked = false;}else{document.getElementById('VIIi_check_si').checked = true;}
                if(data[0].VIIi_check_no=='false'){document.getElementById('VIIi_check_no').checked = false;}else{document.getElementById('VIIi_check_no').checked = true;}
                if(data[0].VIIIa_check_si=='false'){document.getElementById('VIIIa_check_si').checked = false;}else{document.getElementById('VIIIa_check_si').checked = true;}
                if(data[0].VIIIa_check_no=='false'){document.getElementById('VIIIa_check_no').checked = false;}else{document.getElementById('VIIIa_check_no').checked = true;}
                if(data[0].VIIIb_check_si=='false'){document.getElementById('VIIIb_check_si').checked = false;}else{document.getElementById('VIIIb_check_si').checked = true;}
                if(data[0].VIIIb_check_no=='false'){document.getElementById('VIIIb_check_no').checked = false;}else{document.getElementById('VIIIb_check_no').checked = true;}
                if(data[0].VIIIc_check_si=='false'){document.getElementById('VIIIc_check_si').checked = false;}else{document.getElementById('VIIIc_check_si').checked = true;}
                if(data[0].VIIIc_check_no=='false'){document.getElementById('VIIIc_check_no').checked = false;}else{document.getElementById('VIIIc_check_no').checked = true;}
                if(data[0].VIIId_check_si=='false'){document.getElementById('VIIId_check_si').checked = false;}else{document.getElementById('VIIId_check_si').checked = true;}
                if(data[0].VIIId_check_no=='false'){document.getElementById('VIIId_check_no').checked = false;}else{document.getElementById('VIIId_check_no').checked = true;}
                if(data[0].VIIIe_check_si=='false'){document.getElementById('VIIIe_check_si').checked = false;}else{document.getElementById('VIIIe_check_si').checked = true;}
                if(data[0].VIIIe_check_no=='false'){document.getElementById('VIIIe_check_no').checked = false;}else{document.getElementById('VIIIe_check_no').checked = true;}
                if(data[0].VIIIf_check_si=='false'){document.getElementById('VIIIf_check_si').checked = false;}else{document.getElementById('VIIIf_check_si').checked = true;}
                if(data[0].VIIIf_check_no=='false'){document.getElementById('VIIIf_check_no').checked = false;}else{document.getElementById('VIIIf_check_no').checked = true;}
                if(data[0].VIIIg_check_si=='false'){document.getElementById('VIIIg_check_si').checked = false;}else{document.getElementById('VIIIg_check_si').checked = true;}
                if(data[0].VIIIg_check_no=='false'){document.getElementById('VIIIg_check_no').checked = false;}else{document.getElementById('VIIIg_check_no').checked = true;}
                if(data[0].VIIIh_check_si=='false'){document.getElementById('VIIIh_check_si').checked = false;}else{document.getElementById('VIIIh_check_si').checked = true;}
                if(data[0].VIIIh_check_no=='false'){document.getElementById('VIIIh_check_no').checked = false;}else{document.getElementById('VIIIh_check_no').checked = true;}
                if(data[0].IXa_check_si=='false'){document.getElementById('IXa_check_si').checked = false;}else{document.getElementById('IXa_check_si').checked = true;}
                if(data[0].IXa_check_no=='false'){document.getElementById('IXa_check_no').checked = false;}else{document.getElementById('IXa_check_no').checked = true;}
                if(data[0].IXb_check_si=='false'){document.getElementById('IXb_check_si').checked = false;}else{document.getElementById('IXb_check_si').checked = true;}
                if(data[0].IXb_check_no=='false'){document.getElementById('IXb_check_no').checked = false;}else{document.getElementById('IXb_check_no').checked = true;}
                if(data[0].IXc_check_si=='false'){document.getElementById('IXc_check_si').checked = false;}else{document.getElementById('IXc_check_si').checked = true;}
                if(data[0].IXc_check_no=='false'){document.getElementById('IXc_check_no').checked = false;}else{document.getElementById('IXc_check_no').checked = true;}
                if(data[0].IXd_check_si=='false'){document.getElementById('IXd_check_si').checked = false;}else{document.getElementById('IXd_check_si').checked = true;}
                if(data[0].IXd_check_no=='false'){document.getElementById('IXd_check_no').checked = false;}else{document.getElementById('IXd_check_no').checked = true;}
                if(data[0].IXe_check_si=='false'){document.getElementById('IXe_check_si').checked = false;}else{document.getElementById('IXe_check_si').checked = true;}
                if(data[0].IXe_check_no=='false'){document.getElementById('IXe_check_no').checked = false;}else{document.getElementById('IXe_check_no').checked = true;}
                if(data[0].IXf_check_si=='false'){document.getElementById('IXf_check_si').checked = false;}else{document.getElementById('IXf_check_si').checked = true;}
                if(data[0].IXf_check_no=='false'){document.getElementById('IXf_check_no').checked = false;}else{document.getElementById('IXf_check_no').checked = true;}
                if(data[0].IXg_check_si=='false'){document.getElementById('IXg_check_si').checked = false;}else{document.getElementById('IXg_check_si').checked = true;}
                if(data[0].IXg_check_no=='false'){document.getElementById('IXg_check_no').checked = false;}else{document.getElementById('IXg_check_no').checked = true;}
                if(data[0].IXh_check_si=='false'){document.getElementById('IXh_check_si').checked = false;}else{document.getElementById('IXh_check_si').checked = true;}
                if(data[0].IXh_check_no=='false'){document.getElementById('IXh_check_no').checked = false;}else{document.getElementById('IXh_check_no').checked = true;}
                if(data[0].Xa_check_si=='false'){document.getElementById('Xa_check_si').checked = false;}else{document.getElementById('Xa_check_si').checked = true;}
                if(data[0].Xa_check_no=='false'){document.getElementById('Xa_check_no').checked = false;}else{document.getElementById('Xa_check_no').checked = true;}
                if(data[0].Xb_check_si=='false'){document.getElementById('Xb_check_si').checked = false;}else{document.getElementById('Xb_check_si').checked = true;}
                if(data[0].Xb_check_no=='false'){document.getElementById('Xb_check_no').checked = false;}else{document.getElementById('Xb_check_no').checked = true;}
                if(data[0].Xc_check_si=='false'){document.getElementById('Xc_check_si').checked = false;}else{document.getElementById('Xc_check_si').checked = true;}
                if(data[0].Xc_check_no=='false'){document.getElementById('Xc_check_no').checked = false;}else{document.getElementById('Xc_check_no').checked = true;}
                if(data[0].Xd_check_si=='false'){document.getElementById('Xd_check_si').checked = false;}else{document.getElementById('Xd_check_si').checked = true;}
                if(data[0].Xd_check_no=='false'){document.getElementById('Xd_check_no').checked = false;}else{document.getElementById('Xd_check_no').checked = true;}
                if(data[0].Xe_check_si=='false'){document.getElementById('Xe_check_si').checked = false;}else{document.getElementById('Xe_check_si').checked = true;}
                if(data[0].Xe_check_no=='false'){document.getElementById('Xe_check_no').checked = false;}else{document.getElementById('Xe_check_no').checked = true;}
                if(data[0].Xf_check_si=='false'){document.getElementById('Xf_check_si').checked = false;}else{document.getElementById('Xf_check_si').checked = true;}
                if(data[0].Xf_check_no=='false'){document.getElementById('Xf_check_no').checked = false;}else{document.getElementById('Xf_check_no').checked = true;}
                if(data[0].Xg_check_si=='false'){document.getElementById('Xg_check_si').checked = false;}else{document.getElementById('Xg_check_si').checked = true;}
                if(data[0].Xg_check_no=='false'){document.getElementById('Xg_check_no').checked = false;}else{document.getElementById('Xg_check_no').checked = true;}
                if(data[0].Xh_check_si=='false'){document.getElementById('Xh_check_si').checked = false;}else{document.getElementById('Xh_check_si').checked = true;}
                if(data[0].Xh_check_no=='false'){document.getElementById('Xh_check_no').checked = false;}else{document.getElementById('Xh_check_no').checked = true;}
                if(data[0].Xi_check_si=='false'){document.getElementById('Xi_check_si').checked = false;}else{document.getElementById('Xi_check_si').checked = true;}
                if(data[0].Xi_check_no=='false'){document.getElementById('Xi_check_no').checked = false;}else{document.getElementById('Xi_check_no').checked = true;}
                if(data[0].XII_check_herr_electr=='false'){document.getElementById('XII_check_herr_electr').checked = false;}else{document.getElementById('XII_check_herr_electr').checked = true;}
                if(data[0].XII_check_herr_manual=='false'){document.getElementById('XII_check_herr_manual').checked = false;}else{document.getElementById('XII_check_herr_manual').checked = true;}
                if(data[0].XII_check_camion_grua=='false'){document.getElementById('XII_check_camion_grua').checked = false;}else{document.getElementById('XII_check_camion_grua').checked = true;}
                if(data[0].XII_check_andamio=='false'){document.getElementById('XII_check_andamio').checked = false;}else{document.getElementById('XII_check_andamio').checked = true;}
                if(data[0].XII_check_soldadura_arco=='false'){document.getElementById('XII_check_soldadura_arco').checked = false;}else{document.getElementById('XII_check_soldadura_arco').checked = true;}
                if(data[0].XII_check_compresor=='false'){document.getElementById('XII_check_compresor').checked = false;}else{document.getElementById('XII_check_compresor').checked = true;}
                if(data[0].XII_check_soldadura_oxi=='false'){document.getElementById('XII_check_soldadura_oxi').checked = false;}else{document.getElementById('XII_check_soldadura_oxi').checked = true;}
                if(data[0].XIII_check_ruido=='false'){document.getElementById('XIII_check_ruido').checked = false;}else{document.getElementById('XIII_check_ruido').checked = true;}
                if(data[0].XIII_check_caida=='false'){document.getElementById('XIII_check_caida').checked = false;}else{document.getElementById('XIII_check_caida').checked = true;}
                if(data[0].XIII_check_riego_electrico=='false'){document.getElementById('XIII_check_riego_electrico').checked = false;}else{document.getElementById('XIII_check_riego_electrico').checked = true;}
                if(data[0].XIII_check_contacto_quimico=='false'){document.getElementById('XIII_check_contacto_quimico').checked = false;}else{document.getElementById('XIII_check_contacto_quimico').checked = true;}
                if(data[0].XIII_check_exposicion_gas=='false'){document.getElementById('XIII_check_exposicion_gas').checked = false;}else{document.getElementById('XIII_check_exposicion_gas').checked = true;}
                if(data[0].XIII_check_estres=='false'){document.getElementById('XIII_check_estres').checked = false;}else{document.getElementById('XIII_check_estres').checked = true;}
                if(data[0].XIII_check_proyeccion=='false'){document.getElementById('XIII_check_proyeccion').checked = false;}else{document.getElementById('XIII_check_proyeccion').checked = true;}
                if(data[0].XIII_check_exposicion_polvo=='false'){document.getElementById('XIII_check_exposicion_polvo').checked = false;}else{document.getElementById('XIII_check_exposicion_polvo').checked = true;}
                if(data[0].XIII_check_contacto_sup_caliente=='false'){document.getElementById('XIII_check_contacto_sup_caliente').checked = false;}else{document.getElementById('XIII_check_contacto_sup_caliente').checked = true;}
                if(data[0].XIV_check_conos=='false'){document.getElementById('XIV_check_conos').checked = false;}else{document.getElementById('XIV_check_conos').checked = true;}
                if(data[0].XIV_check_cinta=='false'){document.getElementById('XIV_check_cinta').checked = false;}else{document.getElementById('XIV_check_cinta').checked = true;}
                if(data[0].XIV_check_barreras=='false'){document.getElementById('XIV_check_barreras').checked = false;}else{document.getElementById('XIV_check_barreras').checked = true;}
                if(data[0].XIV_check_senalizacion=='false'){document.getElementById('XIV_check_senalizacion').checked = false;}else{document.getElementById('XIV_check_senalizacion').checked = true;}



               $("#ventana_permiso").modal('show');
                $('.modal-dialog').css('width', '80%'); 


                carga_lista_areas();

              }
           });



}



function guardar_actualizar(){

  var num_permiso = $("#num_permiso").html();
  var actividad='actualizar';

      if(num_permiso == 'S/N'){
        actividad='nuevo';
      }

        var select = document.getElementById('area_solicitante');
        var area_solicitante = select.options[select.selectedIndex].text;
        var select = document.getElementById('area_responsable');
        var area_responsable = select.options[select.selectedIndex].text;

      var detalle_tabajo_critico=$("#detalle_tabajo_critico").val();
       detalle_tabajo_critico=detalle_tabajo_critico.replace(/\n/gi, " ");

       if(area_solicitante=='Seleccione un area'){ alert('Debe ingrese Area solicitante'); document.getElementById("area_solicitante").focus();
       }else if($('#trabajo_a_realizar').val()==''){ alert('Debe ingresar el Trabajo a realizar'); document.getElementById("trabajo_a_realizar").focus();
       }else if($('#area_autorizada').val()==''){ alert('Ingrese Ubicación del trabajo a realizar'); document.getElementById("area_autorizada").focus();
       }else if(area_responsable=='Seleccione un area'){ alert('ingrese Area Responsable'); document.getElementById("area_responsable").focus();
       }else if($('#responsable_area').val()=='0'){ alert('responsable del area'); document.getElementById("responsable_area").focus();
       }else if($('#fecha_ini_ejecucion').val()==''){ alert('Debe seleccionar una fecha de inicio'); document.getElementById("fecha_ini_ejecucion").focus();
       }else if($('#titulo_permiso').html()=='PERMISO SEMANAL DE TRABAJO' && $('#fecha_termino_ejecucion').val()==''){
          alert('Debe ingresar fecha de termino para un PERMISO SEMANAL');
          document.getElementById("fecha_termino_ejecucion").focus();
       }else{

         if(document.getElementById('I_check_aislamiento_bloqueo').checked==true || document.getElementById('II_check_trabajo_altura').checked==true || document.getElementById('III_check_sumunistro_aire').checked==true 
            || document.getElementById('IV_check_operacion_levante').checked==true || document.getElementById('V_check_cespacio_confinado').checked==true || document.getElementById('VI_check_excavacion').checked==true 
            || document.getElementById('VII_check_equipos_electronicos').checked==true || document.getElementById('VIII_check_atmosfera_peligrosa').checked==true || document.getElementById('IX_check_trabajos_caliente').checked==true
            || document.getElementById('X_check_lavado_alta_presion').checked==true){

            
            
            if(document.getElementById('I_check_aislamiento_bloqueo').checked==true){
                if($('#I_tag_uno').val()!=''){
                    }else if($('#I_tag_dos').val()!=''){
                    }else if($('#I_tag_tres').val()!=''){
                    }else if($('#I_tag_cuatro').val()!=''){
                    }else if($('#I_tag_cinco').val()!=''){
                    }else if(document.getElementById('I_check_candado_si').checked==true){
                    }else if(document.getElementById('I_check_candado_no').checked==true){
                    }else if(document.getElementById('I_check_ccm').checked==true){
                    }else if(document.getElementById('I_check_tablero_electrico').checked==true){
                    }else if(document.getElementById('I_check_ww').checked==true){
                    }else if(document.getElementById('I_check_otro_subprincipio').checked==true){
                    }else if($('#I_candado_uno').val()!=''){
                    }else if($('#I_candado_dos').val()!=''){
                    }else if($('#I_candado_tres').val()!=''){
                    }else if($('#I_candado_cuatro').val()!=''){
                    }else if($('#I_candado_cinco').val()!=''){
                    }else{
                      toastr.warning('Debe agregar datos en el item: I. AISLAMIENTO Y BLOQUEO.','ERROR');
                      document.getElementById("I_tag_uno").focus();
                      return;
                    }
              }

            if(document.getElementById('II_check_trabajo_altura').checked==true){
                  if(document.getElementById('IIa_check_si').checked==true){
                  }else if(document.getElementById('IIa_check_no').checked==true){
                  }else if(document.getElementById('IIb_check_si').checked==true){                    
                  }else if(document.getElementById('IIb_check_no').checked==true){  
                  }else if(document.getElementById('IIc_check_si').checked==true){                 
                  }else if(document.getElementById('IIc_check_no').checked==true){
                  }else if(document.getElementById('IId_check_si').checked==true){
                  }else if(document.getElementById('IId_check_no').checked==true){
                  }else if(document.getElementById('IIe_check_si').checked==true){
                  }else if(document.getElementById('IIe_check_no').checked==true){
                  }else if(document.getElementById('IIf_check_si').checked==true){
                  }else if(document.getElementById('IIf_check_no').checked==true){
                  }else if(document.getElementById('IIg_check_si').checked==true){
                  }else if(document.getElementById('IIg_check_no').checked==true){
                  }else if(document.getElementById('IIh_check_si').checked==true){
                  }else if(document.getElementById('IIh_check_no').checked==true){
                  }else if(document.getElementById('IIj_check_si').checked==true){
                  }else if(document.getElementById('IIj_check_no').checked==true){
                  }else if(document.getElementById('IIi_check_si').checked==true){
                  }else if(document.getElementById('IIi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: II. TRABAJOS EN ALTURA.','ERROR');
                    document.getElementById("IIa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('III_check_sumunistro_aire').checked==true){
                  if(document.getElementById('IIIa_check_si').checked==true){
                  }else if(document.getElementById('IIIa_check_no').checked==true){
                  }else if(document.getElementById('IIIb_check_si').checked==true){                    
                  }else if(document.getElementById('IIIb_check_no').checked==true){  
                  }else if(document.getElementById('IIIc_check_si').checked==true){                 
                  }else if(document.getElementById('IIIc_check_no').checked==true){
                  }else if(document.getElementById('IIId_check_si').checked==true){
                  }else if(document.getElementById('IIId_check_no').checked==true){
                  }else if(document.getElementById('IIIe_check_si').checked==true){
                  }else if(document.getElementById('IIIe_check_no').checked==true){
                  }else if(document.getElementById('IIIf_check_si').checked==true){
                  }else if(document.getElementById('IIIf_check_no').checked==true){
                  }else if(document.getElementById('IIIg_check_si').checked==true){
                  }else if(document.getElementById('IIIg_check_no').checked==true){
                  }else if(document.getElementById('IIIh_check_si').checked==true){
                  }else if(document.getElementById('IIIh_check_no').checked==true){
                  }else if(document.getElementById('IIIi_check_si').checked==true){
                  }else if(document.getElementById('IIIi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: III. SUMINISTRO DE AIRE.','ERROR');
                    document.getElementById("III_check_sumunistro_aire").focus();
                    return;
                  }
            }

            if(document.getElementById('IV_check_operacion_levante').checked==true){
                  if(document.getElementById('IVa_check_si').checked==true){
                  }else if(document.getElementById('IVa_check_no').checked==true){
                  }else if(document.getElementById('IVb_check_si').checked==true){                    
                  }else if(document.getElementById('IVb_check_no').checked==true){  
                  }else if(document.getElementById('IVc_check_si').checked==true){                 
                  }else if(document.getElementById('IVc_check_no').checked==true){
                  }else if(document.getElementById('IVd_check_si').checked==true){
                  }else if(document.getElementById('IVd_check_no').checked==true){
                  }else if(document.getElementById('IVe_check_si').checked==true){
                  }else if(document.getElementById('IVe_check_no').checked==true){
                  }else if(document.getElementById('IVf_check_si').checked==true){
                  }else if(document.getElementById('IVf_check_no').checked==true){
                  }else if(document.getElementById('IVg_check_si').checked==true){
                  }else if(document.getElementById('IVg_check_no').checked==true){
                  }else if(document.getElementById('IVh_check_si').checked==true){
                  }else if(document.getElementById('IVh_check_no').checked==true){
                  }else if(document.getElementById('IVi_check_si').checked==true){
                  }else if(document.getElementById('IVi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: IV. OPERACIÓN DE LEVANTE.','ERROR');
                    document.getElementById("IVa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('V_check_cespacio_confinado').checked==true){
                  if(document.getElementById('Va_check_si').checked==true){
                  }else if(document.getElementById('Va_check_no').checked==true){
                  }else if(document.getElementById('Vb_check_si').checked==true){                    
                  }else if(document.getElementById('Vb_check_no').checked==true){  
                  }else if(document.getElementById('Vc_check_si').checked==true){                 
                  }else if(document.getElementById('Vc_check_no').checked==true){
                  }else if(document.getElementById('Vd_check_si').checked==true){
                  }else if(document.getElementById('Vd_check_no').checked==true){
                  }else if(document.getElementById('Ve_check_si').checked==true){
                  }else if(document.getElementById('Ve_check_no').checked==true){
                  }else if(document.getElementById('Vf_check_si').checked==true){
                  }else if(document.getElementById('Vf_check_no').checked==true){
                  }else if(document.getElementById('Vg_check_si').checked==true){
                  }else if(document.getElementById('Vg_check_no').checked==true){
                  }else if(document.getElementById('Vh_check_si').checked==true){
                  }else if(document.getElementById('Vh_check_no').checked==true){
                  }else if(document.getElementById('Vi_check_si').checked==true){
                  }else if(document.getElementById('Vi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: V. ESPACIO CONFINADO.','ERROR');
                    document.getElementById("Va_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('VI_check_excavacion').checked==true){
                  if(document.getElementById('VIa_check_si').checked==true){
                  }else if(document.getElementById('VIa_check_no').checked==true){
                  }else if(document.getElementById('VIb_check_si').checked==true){                    
                  }else if(document.getElementById('VIb_check_no').checked==true){  
                  }else if(document.getElementById('VIc_check_si').checked==true){                 
                  }else if(document.getElementById('VIc_check_no').checked==true){
                  }else if(document.getElementById('VId_check_si').checked==true){
                  }else if(document.getElementById('VId_check_no').checked==true){
                  }else if(document.getElementById('VIe_check_si').checked==true){
                  }else if(document.getElementById('VIe_check_no').checked==true){
                  }else if(document.getElementById('VIf_check_si').checked==true){
                  }else if(document.getElementById('VIf_check_no').checked==true){
                  }else if(document.getElementById('VIg_check_si').checked==true){
                  }else if(document.getElementById('VIg_check_no').checked==true){
                  }else if(document.getElementById('VIh_check_si').checked==true){
                  }else if(document.getElementById('VIh_check_no').checked==true){
                  }else if(document.getElementById('VIi_check_si').checked==true){
                  }else if(document.getElementById('VIi_check_no').checked==true){
                  }else if(document.getElementById('VIj_check_si').checked==true){
                  }else if(document.getElementById('VIj_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: VI. EXCAVACIÓN.','ERROR');
                    document.getElementById("VIa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('VII_check_equipos_electronicos').checked==true){
                  if(document.getElementById('VIIa_check_si').checked==true){
                  }else if(document.getElementById('VIIa_check_no').checked==true){
                  }else if(document.getElementById('VIIb_check_si').checked==true){                    
                  }else if(document.getElementById('VIIb_check_no').checked==true){  
                  }else if(document.getElementById('VIIc_check_si').checked==true){                 
                  }else if(document.getElementById('VIIc_check_no').checked==true){
                  }else if(document.getElementById('VIId_check_si').checked==true){
                  }else if(document.getElementById('VIId_check_no').checked==true){
                  }else if(document.getElementById('VIIe_check_si').checked==true){
                  }else if(document.getElementById('VIIe_check_no').checked==true){
                  }else if(document.getElementById('VIIf_check_si').checked==true){
                  }else if(document.getElementById('VIIf_check_no').checked==true){
                  }else if(document.getElementById('VIIg_check_si').checked==true){
                  }else if(document.getElementById('VIIg_check_no').checked==true){
                  }else if(document.getElementById('VIIh_check_si').checked==true){
                  }else if(document.getElementById('VIIh_check_no').checked==true){
                  }else if(document.getElementById('VIIi_check_si').checked==true){
                  }else if(document.getElementById('VIIi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: VII. EQUIPOS ELECTRICOS.','ERROR');
                    document.getElementById("VIIa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('VIII_check_atmosfera_peligrosa').checked==true){
                  if(document.getElementById('VIIIa_check_si').checked==true){
                  }else if(document.getElementById('VIIIa_check_no').checked==true){
                  }else if(document.getElementById('VIIIb_check_si').checked==true){                    
                  }else if(document.getElementById('VIIIb_check_no').checked==true){  
                  }else if(document.getElementById('VIIIc_check_si').checked==true){                 
                  }else if(document.getElementById('VIIIc_check_no').checked==true){
                  }else if(document.getElementById('VIIId_check_si').checked==true){
                  }else if(document.getElementById('VIIId_check_no').checked==true){
                  }else if(document.getElementById('VIIIe_check_si').checked==true){
                  }else if(document.getElementById('VIIIe_check_no').checked==true){
                  }else if(document.getElementById('VIIIf_check_si').checked==true){
                  }else if(document.getElementById('VIIIf_check_no').checked==true){
                  }else if(document.getElementById('VIIIg_check_si').checked==true){
                  }else if(document.getElementById('VIIIg_check_no').checked==true){
                  }else if(document.getElementById('VIIIh_check_si').checked==true){
                  }else if(document.getElementById('VIIIh_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: VIII. ATMOSFERA PELIGROSA.','ERROR');
                    document.getElementById("VIIIa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('IX_check_trabajos_caliente').checked==true){
                  if(document.getElementById('IXa_check_si').checked==true){
                  }else if(document.getElementById('IXa_check_no').checked==true){
                  }else if(document.getElementById('IXb_check_si').checked==true){                    
                  }else if(document.getElementById('IXb_check_no').checked==true){  
                  }else if(document.getElementById('IXc_check_si').checked==true){                 
                  }else if(document.getElementById('IXc_check_no').checked==true){
                  }else if(document.getElementById('IXd_check_si').checked==true){
                  }else if(document.getElementById('IXd_check_no').checked==true){
                  }else if(document.getElementById('IXe_check_si').checked==true){
                  }else if(document.getElementById('IXe_check_no').checked==true){
                  }else if(document.getElementById('IXf_check_si').checked==true){
                  }else if(document.getElementById('IXf_check_no').checked==true){
                  }else if(document.getElementById('IXg_check_si').checked==true){
                  }else if(document.getElementById('IXg_check_no').checked==true){
                  }else if(document.getElementById('IXh_check_si').checked==true){
                  }else if(document.getElementById('IXh_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: IX. TRABAJOS EN CALIENTE.','ERROR');
                    document.getElementById("IXa_check_si").focus();
                    return;
                  }
            }

            if(document.getElementById('X_check_lavado_alta_presion').checked==true){
                  if(document.getElementById('Xa_check_si').checked==true){
                  }else if(document.getElementById('Xa_check_no').checked==true){
                  }else if(document.getElementById('Xb_check_si').checked==true){                    
                  }else if(document.getElementById('Xb_check_no').checked==true){  
                  }else if(document.getElementById('Xc_check_si').checked==true){                 
                  }else if(document.getElementById('Xc_check_no').checked==true){
                  }else if(document.getElementById('Xd_check_si').checked==true){
                  }else if(document.getElementById('Xd_check_no').checked==true){
                  }else if(document.getElementById('Xe_check_si').checked==true){
                  }else if(document.getElementById('Xe_check_no').checked==true){
                  }else if(document.getElementById('Xf_check_si').checked==true){
                  }else if(document.getElementById('Xf_check_no').checked==true){
                  }else if(document.getElementById('Xg_check_si').checked==true){
                  }else if(document.getElementById('Xg_check_no').checked==true){
                  }else if(document.getElementById('Xh_check_si').checked==true){
                  }else if(document.getElementById('Xh_check_no').checked==true){
                  }else if(document.getElementById('Xi_check_si').checked==true){
                  }else if(document.getElementById('Xi_check_no').checked==true){
                  }else{
                    toastr.warning('Debe completar el formulario en: X. LAVADO ALTA PRESIÓN.','ERROR');
                    document.getElementById("Xa_check_si").focus();
                    return;
                  }
            }




            $.ajax({
            url:'json/json.php?accion=guardar_actualizar_nuevo_permiso',
            data:{actividad:actividad, 
                  num_permiso:$('#num_permiso').html(), 
                  area_solicitante:area_solicitante, 
                  num_ot:$('#num_ot').val(), 
                  tipo_permiso:$('#titulo_permiso').html(), 
                  numero_trabajadores:$('#numero_trabajadores').val(), 
                  fecha_ini_ejecucion:$('#fecha_ini_ejecucion').val(), 
                  fecha_termino_ejecucion:$('#fecha_termino_ejecucion').val(), 
                  hora_ini_ejecucion:$('#hora_ini_ejecucion').val(), 
                  hora_termino_ejecucion:$('#hora_termino_ejecucion').val(), 
                  empresa_contratista:$('#empresa_contratista').val(), 
                  responsable_ejecucion:$('#responsable_ejecucion').val(), 
                  area_responsable:area_responsable, 
                  responsable_area:$('#responsable_area').val(), 
                  I_tag_uno:$('#I_tag_uno').val(), 
                  I_tag_dos:$('#I_tag_dos').val(), 
                  I_tag_tres:$('#I_tag_tres').val(), 
                  I_tag_cuatro:$('#I_tag_cuatro').val(), 
                  I_tag_cinco:$('#I_tag_cinco').val(), 
                  I_candado_uno:$('#I_candado_uno').val(), 
                  I_candado_dos:$('#I_candado_dos').val(), 
                  I_candado_tres:$('#I_candado_tres').val(), 
                  I_candado_cuatro:$('#I_candado_cuatro').val(), 
                  I_candado_cinco:$('#I_candado_cinco').val(), 
                  XII_otros:$('#XII_otros').val(), 
                  XIII_otros:$('#XIII_otros').val(), 
                  area_autorizada:$('#area_autorizada').val(), 
                  trabajo_a_realizar:$('#trabajo_a_realizar').val(), 
                  detalle_tabajo_critico:detalle_tabajo_critico, 
                  codigo_area_solicitante:$('#area_solicitante').val(), 
                  codigo_area_responsable:$('#area_responsable').val(), 
                  I_check_aislamiento_bloqueo:document.getElementById('I_check_aislamiento_bloqueo').checked, 
                  II_check_trabajo_altura:document.getElementById('II_check_trabajo_altura').checked,
                  III_check_sumunistro_aire:document.getElementById('III_check_sumunistro_aire').checked,
                  IV_check_operacion_levante:document.getElementById('IV_check_operacion_levante').checked,
                  V_check_cespacio_confinado:document.getElementById('V_check_cespacio_confinado').checked,
                  VI_check_excavacion:document.getElementById('VI_check_excavacion').checked,
                  VII_check_equipos_electronicos:document.getElementById('VII_check_equipos_electronicos').checked,
                  VIII_check_atmosfera_peligrosa:document.getElementById('VIII_check_atmosfera_peligrosa').checked,
                  IX_check_trabajos_caliente:document.getElementById('IX_check_trabajos_caliente').checked,
                  X_check_lavado_alta_presion:document.getElementById('X_check_lavado_alta_presion').checked,
                  I_check_candado_si:document.getElementById('I_check_candado_si').checked,
                  I_check_candado_no:document.getElementById('I_check_candado_no').checked,
                  I_check_ccm:document.getElementById('I_check_ccm').checked,
                  I_check_tablero_electrico:document.getElementById('I_check_tablero_electrico').checked,
                  I_check_ww:document.getElementById('I_check_ww').checked,
                  I_check_otro_subprincipio:document.getElementById('I_check_otro_subprincipio').checked,
                  IIa_check_si:document.getElementById('IIa_check_si').checked,
                  IIa_check_no:document.getElementById('IIa_check_no').checked,
                  IIb_check_si:document.getElementById('IIb_check_si').checked,
                  IIb_check_no:document.getElementById('IIb_check_no').checked,
                  IIc_check_si:document.getElementById('IIc_check_si').checked,
                  IIc_check_no:document.getElementById('IIc_check_no').checked,
                  IId_check_si:document.getElementById('IId_check_si').checked,
                  IId_check_no:document.getElementById('IId_check_no').checked,
                  IIe_check_si:document.getElementById('IIe_check_si').checked,
                  IIe_check_no:document.getElementById('IIe_check_no').checked,
                  IIf_check_si:document.getElementById('IIf_check_si').checked,
                  IIf_check_no:document.getElementById('IIf_check_no').checked,
                  IIg_check_si:document.getElementById('IIg_check_si').checked,
                  IIg_check_no:document.getElementById('IIg_check_no').checked,
                  IIh_check_si:document.getElementById('IIh_check_si').checked,
                  IIh_check_no:document.getElementById('IIh_check_no').checked,
                  IIi_check_si:document.getElementById('IIi_check_si').checked,
                  IIi_check_no:document.getElementById('IIi_check_no').checked,
                  IIj_check_si:document.getElementById('IIj_check_si').checked,
                  IIj_check_no:document.getElementById('IIj_check_no').checked,
                  IIIa_check_si:document.getElementById('IIIa_check_si').checked,
                  IIIa_check_no:document.getElementById('IIIa_check_no').checked,
                  IIIb_check_si:document.getElementById('IIIb_check_si').checked,
                  IIIb_check_no:document.getElementById('IIIb_check_no').checked,
                  IIIc_check_si:document.getElementById('IIIc_check_si').checked,
                  IIIc_check_no:document.getElementById('IIIc_check_no').checked,
                  IIId_check_si:document.getElementById('IIId_check_si').checked,
                  IIId_check_no:document.getElementById('IIId_check_no').checked,
                  IIIe_check_si:document.getElementById('IIIe_check_si').checked,
                  IIIe_check_no:document.getElementById('IIIe_check_no').checked,
                  IIIf_check_si:document.getElementById('IIIf_check_si').checked,
                  IIIf_check_no:document.getElementById('IIIf_check_no').checked,
                  IIIg_check_si:document.getElementById('IIIg_check_si').checked,
                  IIIg_check_no:document.getElementById('IIIg_check_no').checked,
                  IIIh_check_si:document.getElementById('IIIh_check_si').checked,
                  IIIh_check_no:document.getElementById('IIIh_check_no').checked,
                  IIIi_check_si:document.getElementById('IIIi_check_si').checked,
                  IIIi_check_no:document.getElementById('IIIi_check_no').checked,
                  IVa_check_si:document.getElementById('IVa_check_si').checked,
                  IVa_check_no:document.getElementById('IVa_check_no').checked,
                  IVb_check_si:document.getElementById('IVb_check_si').checked,
                  IVb_check_no:document.getElementById('IVb_check_no').checked,
                  IVc_check_si:document.getElementById('IVc_check_si').checked,
                  IVc_check_no:document.getElementById('IVc_check_no').checked,
                  IVd_check_si:document.getElementById('IVd_check_si').checked,
                  IVd_check_no:document.getElementById('IVd_check_no').checked,
                  IVe_check_si:document.getElementById('IVe_check_si').checked,
                  IVe_check_no:document.getElementById('IVe_check_no').checked,
                  IVf_check_si:document.getElementById('IVf_check_si').checked,
                  IVf_check_no:document.getElementById('IVf_check_no').checked,
                  IVg_check_si:document.getElementById('IVg_check_si').checked,
                  IVg_check_no:document.getElementById('IVg_check_no').checked,
                  IVh_check_si:document.getElementById('IVh_check_si').checked,
                  IVh_check_no:document.getElementById('IVh_check_no').checked,
                  IVi_check_si:document.getElementById('IVi_check_si').checked,
                  IVi_check_no:document.getElementById('IVi_check_no').checked,
                  Va_check_si:document.getElementById('Va_check_si').checked,
                  Va_check_no:document.getElementById('Va_check_no').checked,
                  Vb_check_si:document.getElementById('Vb_check_si').checked,
                  Vb_check_no:document.getElementById('Vb_check_no').checked,
                  Vc_check_si:document.getElementById('Vc_check_si').checked,
                  Vc_check_no:document.getElementById('Vc_check_no').checked,
                  Vd_check_si:document.getElementById('Vd_check_si').checked,
                  Vd_check_no:document.getElementById('Vd_check_no').checked,
                  Ve_check_si:document.getElementById('Ve_check_si').checked,
                  Ve_check_no:document.getElementById('Ve_check_no').checked,
                  Vf_check_si:document.getElementById('Vf_check_si').checked,
                  Vf_check_no:document.getElementById('Vf_check_no').checked,
                  Vg_check_si:document.getElementById('Vg_check_si').checked,
                  Vg_check_no:document.getElementById('Vg_check_no').checked,
                  Vh_check_si:document.getElementById('Vh_check_si').checked,
                  Vh_check_no:document.getElementById('Vh_check_no').checked,
                  Vi_check_si:document.getElementById('Vi_check_si').checked,
                  Vi_check_no:document.getElementById('Vi_check_no').checked,
                  VIa_check_si:document.getElementById('VIa_check_si').checked,
                  VIa_check_no:document.getElementById('VIa_check_no').checked,
                  VIb_check_si:document.getElementById('VIb_check_si').checked,
                  VIb_check_no:document.getElementById('VIb_check_no').checked,
                  VIc_check_si:document.getElementById('VIc_check_si').checked,
                  VIc_check_no:document.getElementById('VIc_check_no').checked,
                  VId_check_si:document.getElementById('VId_check_si').checked,
                  VId_check_no:document.getElementById('VId_check_no').checked,
                  VIe_check_si:document.getElementById('VIe_check_si').checked,
                  VIe_check_no:document.getElementById('VIe_check_no').checked,
                  VIf_check_si:document.getElementById('VIf_check_si').checked,
                  VIf_check_no:document.getElementById('VIf_check_no').checked,
                  VIg_check_si:document.getElementById('VIg_check_si').checked,
                  VIg_check_no:document.getElementById('VIg_check_no').checked,
                  VIh_check_si:document.getElementById('VIh_check_si').checked,
                  VIh_check_no:document.getElementById('VIh_check_no').checked,
                  VIi_check_si:document.getElementById('VIi_check_si').checked,
                  VIi_check_no:document.getElementById('VIi_check_no').checked,
                  VIj_check_si:document.getElementById('VIj_check_si').checked,
                  VIj_check_no:document.getElementById('VIj_check_no').checked,
                  VIIa_check_si:document.getElementById('VIIa_check_si').checked,
                  VIIa_check_no:document.getElementById('VIIa_check_no').checked,
                  VIIb_check_si:document.getElementById('VIIb_check_si').checked,
                  VIIb_check_no:document.getElementById('VIIb_check_no').checked,
                  VIIc_check_si:document.getElementById('VIIc_check_si').checked,
                  VIIc_check_no:document.getElementById('VIIc_check_no').checked,
                  VIId_check_si:document.getElementById('VIId_check_si').checked,
                  VIId_check_no:document.getElementById('VIId_check_no').checked,
                  VIIe_check_si:document.getElementById('VIIe_check_si').checked,
                  VIIe_check_no:document.getElementById('VIIe_check_no').checked,
                  VIIf_check_si:document.getElementById('VIIf_check_si').checked,
                  VIIf_check_no:document.getElementById('VIIf_check_no').checked,
                  VIIg_check_si:document.getElementById('VIIg_check_si').checked,
                  VIIg_check_no:document.getElementById('VIIg_check_no').checked,
                  VIIh_check_si:document.getElementById('VIIh_check_si').checked,
                  VIIh_check_no:document.getElementById('VIIh_check_no').checked,
                  VIIi_check_si:document.getElementById('VIIi_check_si').checked,
                  VIIi_check_no:document.getElementById('VIIi_check_no').checked,
                  VIIIa_check_si:document.getElementById('VIIIa_check_si').checked,
                  VIIIa_check_no:document.getElementById('VIIIa_check_no').checked,
                  VIIIb_check_si:document.getElementById('VIIIb_check_si').checked,
                  VIIIb_check_no:document.getElementById('VIIIb_check_no').checked,
                  VIIIc_check_si:document.getElementById('VIIIc_check_si').checked,
                  VIIIc_check_no:document.getElementById('VIIIc_check_no').checked,
                  VIIId_check_si:document.getElementById('VIIId_check_si').checked,
                  VIIId_check_no:document.getElementById('VIIId_check_no').checked,
                  VIIIe_check_si:document.getElementById('VIIIe_check_si').checked,
                  VIIIe_check_no:document.getElementById('VIIIe_check_no').checked,
                  VIIIf_check_si:document.getElementById('VIIIf_check_si').checked,
                  VIIIf_check_no:document.getElementById('VIIIf_check_no').checked,
                  VIIIg_check_si:document.getElementById('VIIIg_check_si').checked,
                  VIIIg_check_no:document.getElementById('VIIIg_check_no').checked,
                  VIIIh_check_si:document.getElementById('VIIIh_check_si').checked,
                  VIIIh_check_no:document.getElementById('VIIIh_check_no').checked,
                  IXa_check_si:document.getElementById('IXa_check_si').checked,
                  IXa_check_no:document.getElementById('IXa_check_no').checked,
                  IXb_check_si:document.getElementById('IXb_check_si').checked,
                  IXb_check_no:document.getElementById('IXb_check_no').checked,
                  IXc_check_si:document.getElementById('IXc_check_si').checked,
                  IXc_check_no:document.getElementById('IXc_check_no').checked,
                  IXd_check_si:document.getElementById('IXd_check_si').checked,
                  IXd_check_no:document.getElementById('IXd_check_no').checked,
                  IXe_check_si:document.getElementById('IXe_check_si').checked,
                  IXe_check_no:document.getElementById('IXe_check_no').checked,
                  IXf_check_si:document.getElementById('IXf_check_si').checked,
                  IXf_check_no:document.getElementById('IXf_check_no').checked,
                  IXg_check_si:document.getElementById('IXg_check_si').checked,
                  IXg_check_no:document.getElementById('IXg_check_no').checked,
                  IXh_check_si:document.getElementById('IXh_check_si').checked,
                  IXh_check_no:document.getElementById('IXh_check_no').checked,
                  Xa_check_si:document.getElementById('Xa_check_si').checked,
                  Xa_check_no:document.getElementById('Xa_check_no').checked,
                  Xb_check_si:document.getElementById('Xb_check_si').checked,
                  Xb_check_no:document.getElementById('Xb_check_no').checked,
                  Xc_check_si:document.getElementById('Xc_check_si').checked,
                  Xc_check_no:document.getElementById('Xc_check_no').checked,
                  Xd_check_si:document.getElementById('Xd_check_si').checked,
                  Xd_check_no:document.getElementById('Xd_check_no').checked,
                  Xe_check_si:document.getElementById('Xe_check_si').checked,
                  Xe_check_no:document.getElementById('Xe_check_no').checked,
                  Xf_check_si:document.getElementById('Xf_check_si').checked,
                  Xf_check_no:document.getElementById('Xf_check_no').checked,
                  Xg_check_si:document.getElementById('Xg_check_si').checked,
                  Xg_check_no:document.getElementById('Xg_check_no').checked,
                  Xh_check_si:document.getElementById('Xh_check_si').checked,
                  Xh_check_no:document.getElementById('Xh_check_no').checked,
                  Xi_check_si:document.getElementById('Xi_check_si').checked,
                  Xi_check_no:document.getElementById('Xi_check_no').checked,
                  XII_check_herr_electr:document.getElementById('XII_check_herr_electr').checked,
                  XII_check_herr_manual:document.getElementById('XII_check_herr_manual').checked,
                  XII_check_camion_grua:document.getElementById('XII_check_camion_grua').checked,
                  XII_check_andamio:document.getElementById('XII_check_andamio').checked,
                  XII_check_soldadura_arco:document.getElementById('XII_check_soldadura_arco').checked,
                  XII_check_compresor:document.getElementById('XII_check_compresor').checked,
                  XII_check_soldadura_oxi:document.getElementById('XII_check_soldadura_oxi').checked,
                  XIII_check_ruido:document.getElementById('XIII_check_ruido').checked,
                  XIII_check_caida:document.getElementById('XIII_check_caida').checked,
                  XIII_check_riego_electrico:document.getElementById('XIII_check_riego_electrico').checked,
                  XIII_check_contacto_quimico:document.getElementById('XIII_check_contacto_quimico').checked,
                  XIII_check_exposicion_gas:document.getElementById('XIII_check_exposicion_gas').checked,
                  XIII_check_estres:document.getElementById('XIII_check_estres').checked,
                  XIII_check_proyeccion:document.getElementById('XIII_check_proyeccion').checked,
                  XIII_check_exposicion_polvo:document.getElementById('XIII_check_exposicion_polvo').checked,
                  XIII_check_contacto_sup_caliente:document.getElementById('XIII_check_contacto_sup_caliente').checked,
                  XIV_check_conos:document.getElementById('XIV_check_conos').checked,
                  XIV_check_cinta:document.getElementById('XIV_check_cinta').checked,
                  XIV_check_barreras:document.getElementById('XIV_check_barreras').checked,
                  XIV_check_senalizacion:document.getElementById('XIV_check_senalizacion').checked,
                },
                type:'post',
                dataType: "json", 
                success: function (data)
                  {

                     var label = document.getElementById('num_permiso');
                    label.style.color = 'black';
                    var label = document.getElementById('select_trabajo_critico');
                    label.style.color = 'black';
                      
                    $('#num_permiso').html(data[0].numero_permiso);


                    toastr.success('GUARDADO CORRECTAMENTE !!','AVISO');

                    lista_de_permisos();

                  }
               });



        }else{
         // alert('ERROR: Debe seleccionar al menos 1 TIPO DE TRABAJO CRÍTICO');
          toastr.warning('Debe seleccionar al menos 1 TIPO DE TRABAJO CRÍTICO.','ERROR');
          var label = document.getElementById('select_trabajo_critico');
          label.style.color = 'red';
          document.getElementById("I_check_aislamiento_bloqueo").focus();

        }


      }




  }







  function nuevo_permiso(tipo, accion){

    var label = document.getElementById('num_permiso');
        label.style.color = 'red';


   resetea_formulario();

    $("#area_solicitante").html('<option value="0">Seleccione un area</option>');
    $("#area_responsable").html('<option value="0">Seleccione un area</option>');

    carga_lista_areas();

    if(tipo=='diario'){
      $("#titulo_permiso").html('PERMISO DIARIO DE TRABAJO');
      $("#num_permiso").html('S/N');

      document.getElementById('fecha_termino_ejecucion').readOnly = true;

    }else{

      $("#titulo_permiso").html('PERMISO SEMANAL DE TRABAJO');
      $("#num_permiso").html('S/N');

      document.getElementById('fecha_termino_ejecucion').readOnly = false;

    }

        $("#ventana_permiso").modal('show');
        $('.modal-dialog').css('width', '80%'); 




  }


  function carga_lista_usuarios(){

      var codigo_area= $("#area_responsable").val();

        $("#responsable_area").html('<option value="0">Seleccione...</option>');
            $.ajax({
                url:'json/json.php?accion=buscar_usuario',
                data: {codigo_area:codigo_area},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

             for (var i = 0; i < json_jax.data.length; i++) {
                      $('#responsable_area').append('<option value="' +json_jax.data[i].user_nick+ '">'+json_jax.data[i].user_nick+'</option>');
                      
                  }
                  
                }
         });



  }


function carga_lista_areas(){
    
  
        $.ajax({
                url:'json/json.php?accion=buscar_areas',
                data: {},
                type:'post',
                 dataType: "json", 
                success: function (json_jax)
                {

             for (var i = 0; i < json_jax.data.length; i++) {
                      $('#area_solicitante').append('<option value="' +json_jax.data[i].area_codigo+ '">'+json_jax.data[i].area_nombre+'</option>');
                      $('#area_responsable').append('<option value="' +json_jax.data[i].area_codigo+ '">'+json_jax.data[i].area_nombre+'</option>');
                      
                  }
                  
                }
         });

}


function lista_de_permisos(){

var consulta='json/json.php?accion=lista_de_permisos_nuevos';

$("#tabla_lista_de_permisos").dataTable().fnDestroy();
$('#tabla_lista_de_permisos').DataTable({
         responsive: true,
         dom: 'Bfrtip',
         scrollX:true,
         buttons: [ 
        ],
             aLengthMenu: [
                          [10,25, 50, 100, 200, -1],
                          [10,25, 50, 100, 200, "Todos"]
                      ],
        iDisplayLength: 10,     
    
            "ajax":''+consulta+'',
            "columns": [
            { "data": "num_permiso" },
            { "data": "tipo_permiso" },
            { "data": "fecha_ini_ejecucion" },
            { "data": "fecha_termino_ejecucion" },
            { "data": "empresa_contratista" },
            { "data": "area_autorizada" },
            { "data": "trabajo_a_realizar" },
            { "data": "nick_creador" },
            { "data": "estado" },
            {data: 'id', "render": function (data, type, row, meta) {
                return '<center><button type="button" class="btn btn-info glyphicon glyphicon-search btn-md pull-left" title="Ver permiso" onclick="ver_permiso_nuevo(\''+row.num_permiso+'\',\''+row.id_permiso+'\')" ></button></center>';
            }} 
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                "zeroRecords": "No se ha encontrado resultados",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sin resultados",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar",
                 "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                        },
            },
            
           "order": [], // sin orden de columna

            "columnDefs": [
            {
                //"targets": [ 2],
                //"visible": false,
                //"searchable": false
            }
        ],
           });



}

lista_de_permisos();

	
