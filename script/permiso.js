

function imprimir_permiso(){


  var num_permiso=$('#num_permiso').html();


        window.open("tcpdf/Permiso_de_trabajo.php?num_permiso="+num_permiso,"","top=10,left=300,width=700,height=600");
  
}


function ver_permiso(numero_permiso, id_permiso){


          $.ajax({
            url:'json/json.php?accion=ver_permiso',
            data:{numero_permiso:numero_permiso,id_permiso:id_permiso},
            type:'post',
            dataType: "json", 
            success: function (data)
              {

                console.log('*'+data[0].tipo_permiso+'*');

                if(data[0].tipo_permiso=='PERMISO DIARIO DE TRABAJO'){
                  document.getElementById('fecha_termino_ejecucion').readOnly = true;
                }else{
                  document.getElementById('fecha_termino_ejecucion').readOnly = false;
                }
                  
                $("#num_permiso").html(data[0].num_permiso);
                $('#num_ot').val(data[0].num_ot);
                $('#titulo_permiso').html(data[0].tipo_permiso);
                $('#numero_trabajadores').val(data[0].numero_trabajadores); 
                $('#otra_especialidad').val(data[0].otra_especialidad); 
                $('#fecha_ini_ejecucion').val(data[0].fecha_ini_ejecucion); 
                $('#fecha_termino_ejecucion').val(data[0].fecha_termino_ejecucion); 
                $('#hora_ini_ejecucion').val(data[0].hora_ini_ejecucion);
                $('#hora_termino_ejecucion').val(data[0].hora_termino_ejecucion);
                $('#1A_otros').val(data[0].v1A_otros);
                $('#3A_otros').val(data[0].v3A_otros); 
                $('#4A_otros').val(data[0].v4A_otros); 
                $('#5C_tipo_filtro').val(data[0].v5C_tipo_filtro); 
                $('#5F_otros').val(data[0].v5F_otros);
                $('#5G_otros').val(data[0].v5G_otros); 
                $('#7tag_1').val(data[0].v7tag_1);
                $('#7tag_2').val(data[0].v7tag_2); 
                $('#7tag_3').val(data[0].v7tag_3); 
                $('#7tag_4').val(data[0].v7tag_4); 
                $('#7tag_5').val(data[0].v7tag_5); 
                $('#7candado_num1').val(data[0].v7candado_num1);
                $('#7candado_num2').val(data[0].v7candado_num2); 
                $('#7candado_num3').val(data[0].v7candado_num3); 
                $('#7candado_num4').val(data[0].v7candado_num4); 
                $('#7candado_num5').val(data[0].v7candado_num5); 
                $('#7responsable_bloqueo').val(data[0].v7responsable_bloqueo); 
                $('#8I_otros').val(data[0].v8I_otros);
                $('#10B_T').val(data[0].v10B_T);
                $('#10B_C').val(data[0].v10B_C); 
                $('#10B_O2').val(data[0].v10B_O2); 
                $('#10B_CO').val(data[0].v10B_CO); 
                $('#10B_LEL').val(data[0].v10B_LEL); 
                $('#11bloqueovalvula_num').val(data[0].v11bloqueovalvula_num); 
                $('#area_autorizada').val(data[0].area_autorizada);
                $('#trabajo_a_realizar').val(data[0].trabajo_a_realizar);
                $('#empresa_contratista').val(data[0].empresa_contratista); 
                $('#6A_otros').val(data[0].v6A_otros);

                if(data[0].ejecutor_mantencion=='false'){document.getElementById('ejecutor_mantencion').checked = false;}else{document.getElementById('ejecutor_mantencion').checked = true;}
                if(data[0].ejecutor_contratista=='false'){document.getElementById('ejecutor_contratista').checked = false;}else{document.getElementById('ejecutor_contratista').checked = true;}
                if(data[0].especialidad_mecanica=='false'){document.getElementById('especialidad_mecanica').checked = false;}else{document.getElementById('especialidad_mecanica').checked = true;}
                if(data[0].especialidad_soldadura=='false'){document.getElementById('especialidad_soldadura').checked = false;}else{document.getElementById('especialidad_soldadura').checked = true;}
                if(data[0].especialidad_electrica=='false'){document.getElementById('especialidad_electrica').checked = false;}else{document.getElementById('especialidad_electrica').checked = true;}
                if(data[0].especialidad_instrumentacion=='false'){document.getElementById('especialidad_instrumentacion').checked = false;}else{document.getElementById('especialidad_instrumentacion').checked = true;}
                if(data[0].especialidad_produccion=='false'){document.getElementById('especialidad_produccion').checked = false;}else{document.getElementById('especialidad_produccion').checked = true;}
                if(data[0].especialidad_servicio=='false'){document.getElementById('especialidad_servicio').checked = false;}else{document.getElementById('especialidad_servicio').checked = true;}



                if(data[0].v1A_check1=='false'){document.getElementById('1A_check1').checked = false;}else{document.getElementById('1A_check1').checked = true;}
                if(data[0].v1A_check1=='false'){document.getElementById('1A_check1').checked = false;}else{document.getElementById('1A_check1').checked = true;}
                if(data[0].v1A_check2=='false'){document.getElementById('1A_check2').checked = false;}else{document.getElementById('1A_check2').checked = true;}
                if(data[0].v1A_check3=='false'){document.getElementById('1A_check3').checked = false;}else{document.getElementById('1A_check3').checked = true;}
                if(data[0].v1A_check4=='false'){document.getElementById('1A_check4').checked = false;}else{document.getElementById('1A_check4').checked = true;}
                if(data[0].v1A_check5=='false'){document.getElementById('1A_check5').checked = false;}else{document.getElementById('1A_check5').checked = true;}
                if(data[0].v1A_check6=='false'){document.getElementById('1A_check6').checked = false;}else{document.getElementById('1A_check6').checked = true;}
                if(data[0].v1A_check7=='false'){document.getElementById('1A_check7').checked = false;}else{document.getElementById('1A_check7').checked = true;}
                if(data[0].v1A_check8=='false'){document.getElementById('1A_check8').checked = false;}else{document.getElementById('1A_check8').checked = true;}
                if(data[0].v1A_check9=='false'){document.getElementById('1A_check9').checked = false;}else{document.getElementById('1A_check9').checked = true;}
                if(data[0].v2A_check1=='false'){document.getElementById('2A_check1').checked = false;}else{document.getElementById('2A_check1').checked = true;}
                if(data[0].v2A_check2 =='false'){document.getElementById('2A_check2').checked = false;}else{document.getElementById('2A_check2').checked = true;}
                if(data[0].v2A_check3=='false'){document.getElementById('2A_check3').checked = false;}else{document.getElementById('2A_check3').checked = true;}
                if(data[0].v3A_check1=='false'){document.getElementById('3A_check1').checked = false;}else{document.getElementById('3A_check1').checked = true;}
                if(data[0].v3A_check2=='false'){document.getElementById('3A_check2').checked = false;}else{document.getElementById('3A_check2').checked = true;}
                if(data[0].v3A_check3 =='false'){document.getElementById('3A_check3').checked = false;}else{document.getElementById('3A_check3').checked = true;}
                if(data[0].v3A_check4 =='false'){document.getElementById('3A_check4').checked = false;}else{document.getElementById('3A_check4').checked = true;}
                if(data[0].v3A_check5 =='false'){document.getElementById('3A_check5').checked = false;}else{document.getElementById('3A_check5').checked = true;}
                if(data[0].v3A_check6 =='false'){document.getElementById('3A_check6').checked = false;}else{document.getElementById('3A_check6').checked = true;}
                if(data[0].v3A_check7=='false'){document.getElementById('3A_check7').checked = false;}else{document.getElementById('3A_check7').checked = true;}
                if(data[0].v4A_check1 =='false'){document.getElementById('4A_check1').checked = false;}else{document.getElementById('4A_check1').checked = true;}
                if(data[0].v4A_check2=='false'){document.getElementById('4A_check2').checked = false;}else{document.getElementById('4A_check2').checked = true;}
                if(data[0].v4A_check3=='false'){document.getElementById('4A_check3').checked = false;}else{document.getElementById('4A_check3').checked = true;}
                if(data[0].v4A_check4=='false'){document.getElementById('4A_check4').checked = false;}else{document.getElementById('4A_check4').checked = true;}
                if(data[0].v4A_check5 =='false'){document.getElementById('4A_check5').checked = false;}else{document.getElementById('4A_check5').checked = true;}
                if(data[0].v4A_check6=='false'){document.getElementById('4A_check6').checked = false;}else{document.getElementById('4A_check6').checked = true;}
                if(data[0].v4A_check7=='false'){document.getElementById('4A_check7').checked = false;}else{document.getElementById('4A_check7').checked = true;}
                if(data[0].v4A_check8=='false'){document.getElementById('4A_check8').checked = false;}else{document.getElementById('4A_check8').checked = true;}
                if(data[0].v4A_check9 =='false'){document.getElementById('4A_check9').checked = false;}else{document.getElementById('4A_check9').checked = true;}
                if(data[0].v5A_check1=='false'){document.getElementById('5A_check1').checked = false;}else{document.getElementById('5A_check1').checked = true;}
                if(data[0].v5A_check2=='false'){document.getElementById('5A_check2').checked = false;}else{document.getElementById('5A_check2').checked = true;}
                if(data[0].v5A_check3=='false'){document.getElementById('5A_check3').checked = false;}else{document.getElementById('5A_check3').checked = true;}
                if(data[0].v5A_check4=='false'){document.getElementById('5A_check4').checked = false;}else{document.getElementById('5A_check4').checked = true;}
                if(data[0].v5A_check5 =='false'){document.getElementById('5A_check5').checked = false;}else{document.getElementById('5A_check5').checked = true;}
                if(data[0].v5B_check1 =='false'){document.getElementById('5B_check1').checked = false;}else{document.getElementById('5B_check1').checked = true;}
                if(data[0].v5B_check2=='false'){document.getElementById('5B_check2').checked = false;}else{document.getElementById('5B_check2').checked = true;}
                if(data[0].v5B_check3 =='false'){document.getElementById('5B_check3').checked = false;}else{document.getElementById('5B_check3').checked = true;}
                if(data[0].v5C_check1 =='false'){document.getElementById('5C_check1').checked = false;}else{document.getElementById('5C_check1').checked = true;}
                if(data[0].v5C_check2 =='false'){document.getElementById('5C_check2').checked = false;}else{document.getElementById('5C_check2').checked = true;}
                if(data[0].v5C_check3=='false'){document.getElementById('5C_check3').checked = false;}else{document.getElementById('5C_check3').checked = true;}
                if(data[0].v5C_check5=='false'){document.getElementById('5C_check5').checked = false;}else{document.getElementById('5C_check5').checked = true;}
                if(data[0].v5D_check1 =='false'){document.getElementById('5D_check1').checked = false;}else{document.getElementById('5D_check1').checked = true;}
                if(data[0].v5D_check2=='false'){document.getElementById('5D_check2').checked = false;}else{document.getElementById('5D_check2').checked = true;}
                if(data[0].v5E_check1 =='false'){document.getElementById('5E_check1').checked = false;}else{document.getElementById('5E_check1').checked = true;}
                if(data[0].v5E_check2=='false'){document.getElementById('5E_check2').checked = false;}else{document.getElementById('5E_check2').checked = true;}
                if(data[0].v5E_check3=='false'){document.getElementById('5E_check3').checked = false;}else{document.getElementById('5E_check3').checked = true;}
                if(data[0].v5F_check1=='false'){document.getElementById('5F_check1').checked = false;}else{document.getElementById('5F_check1').checked = true;}
                if(data[0].v5F_check2=='false'){document.getElementById('5F_check2').checked = false;}else{document.getElementById('5F_check2').checked = true;}
                if(data[0].v5F_check3=='false'){document.getElementById('5F_check3').checked = false;}else{document.getElementById('5F_check3').checked = true;}
                if(data[0].v5F_check4=='false'){document.getElementById('5F_check4').checked = false;}else{document.getElementById('5F_check4').checked = true;}
                if(data[0].v5F_check5=='false'){document.getElementById('5F_check5').checked = false;}else{document.getElementById('5F_check5').checked = true;}
                if(data[0].v5G_check1=='false'){document.getElementById('5G_check1').checked = false;}else{document.getElementById('5G_check1').checked = true;}
                if(data[0].v5G_check2=='false'){document.getElementById('5G_check2').checked = false;}else{document.getElementById('5G_check2').checked = true;}
                if(data[0].v5G_check3 =='false'){document.getElementById('5G_check3').checked = false;}else{document.getElementById('5G_check3').checked = true;}
                if(data[0].v5H_check1=='false'){document.getElementById('5H_check1').checked = false;}else{document.getElementById('5H_check1').checked = true;}
                if(data[0].v5H_check2=='false'){document.getElementById('5H_check2').checked = false;}else{document.getElementById('5H_check2').checked = true;}
                if(data[0].v5H_check3=='false'){document.getElementById('5H_check3').checked = false;}else{document.getElementById('5H_check3').checked = true;}
                if(data[0].v6A_check1=='false'){document.getElementById('6A_check1').checked = false;}else{document.getElementById('6A_check1').checked = true;}
                if(data[0].v6A_check2=='false'){document.getElementById('6A_check2').checked = false;}else{document.getElementById('6A_check2').checked = true;}
                if(data[0].v6A_check3=='false'){document.getElementById('6A_check3').checked = false;}else{document.getElementById('6A_check3').checked = true;}
                if(data[0].v7candado_check1=='false'){document.getElementById('7candado_check1').checked = false;}else{document.getElementById('7candado_check1').checked = true;}
                if(data[0].v7candado_check2=='false'){document.getElementById('7candado_check2').checked = false;}else{document.getElementById('7candado_check2').checked = true;}
                if(data[0].v7candado_check3 =='false'){document.getElementById('7candado_check3').checked = false;}else{document.getElementById('7candado_check3').checked = true;}
                if(data[0].v7ccm_check=='false'){document.getElementById('7ccm_check').checked = false;}else{document.getElementById('7ccm_check').checked = true;}
                if(data[0].v7tablero_check=='false'){document.getElementById('7tablero_check').checked = false;}else{document.getElementById('7tablero_check').checked = true;}
                if(data[0].v7ww_check=='false'){document.getElementById('7ww_check').checked = false;}else{document.getElementById('7ww_check').checked = true;}
                if(data[0].v7otro_check =='false'){document.getElementById('7otro_check').checked = false;}else{document.getElementById('7otro_check').checked = true;}
                if(data[0].v8A_check1=='false'){document.getElementById('8A_check1').checked = false;}else{document.getElementById('8A_check1').checked = true;}
                if(data[0].v8A_check2=='false'){document.getElementById('8A_check2').checked = false;}else{document.getElementById('8A_check2').checked = true;}
                if(data[0].v8A_check3 =='false'){document.getElementById('8A_check3').checked = false;}else{document.getElementById('8A_check3').checked = true;}
                if(data[0].v8B_check1=='false'){document.getElementById('8B_check1').checked = false;}else{document.getElementById('8B_check1').checked = true;}
                if(data[0].v8B_check2=='false'){document.getElementById('8B_check2').checked = false;}else{document.getElementById('8B_check2').checked = true;}
                if(data[0].v8B_check3=='false'){document.getElementById('8B_check3').checked = false;}else{document.getElementById('8B_check3').checked = true;}
                if(data[0].v8C_check1=='false'){document.getElementById('8C_check1').checked = false;}else{document.getElementById('8C_check1').checked = true;}
                if(data[0].v8C_check2=='false'){document.getElementById('8C_check2').checked = false;}else{document.getElementById('8C_check2').checked = true;}
                if(data[0].v8C_check3 =='false'){document.getElementById('8C_check3').checked = false;}else{document.getElementById('8C_check3').checked = true;}
                if(data[0].v8D_check1=='false'){document.getElementById('8D_check1').checked = false;}else{document.getElementById('8D_check1').checked = true;}
                if(data[0].v8D_check2=='false'){document.getElementById('8D_check2').checked = false;}else{document.getElementById('8D_check2').checked = true;}
                if(data[0].v8D_check3=='false'){document.getElementById('8D_check3').checked = false;}else{document.getElementById('8D_check3').checked = true;}
                if(data[0].v8E_check1=='false'){document.getElementById('8E_check1').checked = false;}else{document.getElementById('8E_check1').checked = true;}
                if(data[0].v8E_check2=='false'){document.getElementById('8E_check2').checked = false;}else{document.getElementById('8E_check2').checked = true;}
                if(data[0].v8E_check3 =='false'){document.getElementById('8E_check3').checked = false;}else{document.getElementById('8E_check3').checked = true;}
                if(data[0].v8F_check1=='false'){document.getElementById('8F_check1').checked = false;}else{document.getElementById('8F_check1').checked = true;}
                if(data[0].v8F_check2=='false'){document.getElementById('8F_check2').checked = false;}else{document.getElementById('8F_check2').checked = true;}
                if(data[0].v8F_check3=='false'){document.getElementById('8F_check3').checked = false;}else{document.getElementById('8F_check3').checked = true;}
                if(data[0].v8G_check1=='false'){document.getElementById('8G_check1').checked = false;}else{document.getElementById('8G_check1').checked = true;}
                if(data[0].v8G_check2=='false'){document.getElementById('8G_check2').checked = false;}else{document.getElementById('8G_check2').checked = true;}
                if(data[0].v8G_check3 =='false'){document.getElementById('8G_check3').checked = false;}else{document.getElementById('8G_check3').checked = true;}
                if(data[0].v9A_check1 =='false'){document.getElementById('9A_check1').checked = false;}else{document.getElementById('9A_check1').checked = true;}
                if(data[0].v9A_check2 =='false'){document.getElementById('9A_check2').checked = false;}else{document.getElementById('9A_check2').checked = true;}
                if(data[0].v9A_check3=='false'){document.getElementById('9A_check3').checked = false;}else{document.getElementById('9A_check3').checked = true;}
                if(data[0].v9B_check1 =='false'){document.getElementById('9B_check1').checked = false;}else{document.getElementById('9B_check1').checked = true;}
                if(data[0].v9B_check2=='false'){document.getElementById('9B_check2').checked = false;}else{document.getElementById('9B_check2').checked = true;}
                if(data[0].v9B_check3=='false'){document.getElementById('9B_check3').checked = false;}else{document.getElementById('9B_check3').checked = true;}
                if(data[0].v9C_check1=='false'){document.getElementById('9C_check1').checked = false;}else{document.getElementById('9C_check1').checked = true;}
                if(data[0].v9C_check2=='false'){document.getElementById('9C_check2').checked = false;}else{document.getElementById('9C_check2').checked = true;}
                if(data[0].v9C_check3 =='false'){document.getElementById('9C_check3').checked = false;}else{document.getElementById('9C_check3').checked = true;}
                if(data[0].v9D_check1=='false'){document.getElementById('9D_check1').checked = false;}else{document.getElementById('9D_check1').checked = true;}
                if(data[0].v9D_check2=='false'){document.getElementById('9D_check2').checked = false;}else{document.getElementById('9D_check2').checked = true;}
                if(data[0].v9D_check3=='false'){document.getElementById('9D_check3').checked = false;}else{document.getElementById('9D_check3').checked = true;}
                if(data[0].v9E_check1=='false'){document.getElementById('9E_check1').checked = false;}else{document.getElementById('9E_check1').checked = true;}
                if(data[0].v9E_check2=='false'){document.getElementById('9E_check2').checked = false;}else{document.getElementById('9E_check2').checked = true;}
                if(data[0].v9E_check3=='false'){document.getElementById('9E_check3').checked = false;}else{document.getElementById('9E_check3').checked = true;}
                if(data[0].v9F_check1=='false'){document.getElementById('9F_check1').checked = false;}else{document.getElementById('9F_check1').checked = true;}
                if(data[0].v9F_check2=='false'){document.getElementById('9F_check2').checked = false;}else{document.getElementById('9F_check2').checked = true;}
                if(data[0].v9F_check3=='false'){document.getElementById('9F_check3').checked = false;}else{document.getElementById('9F_check3').checked = true;}
                if(data[0].v9G_check1 =='false'){document.getElementById('9G_check1').checked = false;}else{document.getElementById('9G_check1').checked = true;}
                if(data[0].v9G_check2=='false'){document.getElementById('9G_check2').checked = false;}else{document.getElementById('9G_check2').checked = true;}
                if(data[0].v9G_check3 =='false'){document.getElementById('9G_check3').checked = false;}else{document.getElementById('9G_check3').checked = true;}
                if(data[0].v9H_check1=='false'){document.getElementById('9H_check1').checked = false;}else{document.getElementById('9H_check1').checked = true;}
                if(data[0].v9H_check2=='false'){document.getElementById('9H_check2').checked = false;}else{document.getElementById('9H_check2').checked = true;}
                if(data[0].v9H_check3=='false'){document.getElementById('9H_check3').checked = false;}else{document.getElementById('9H_check3').checked = true;}
                if(data[0].v9I_check1=='false'){document.getElementById('9I_check1').checked = false;}else{document.getElementById('9I_check1').checked = true;}
                if(data[0].v9I_check2=='false'){document.getElementById('9I_check2').checked = false;}else{document.getElementById('9I_check2').checked = true;}
                if(data[0].v9I_check3 =='false'){document.getElementById('9I_check3').checked = false;}else{document.getElementById('9I_check3').checked = true;}
                if(data[0].v9J_check1=='false'){document.getElementById('9J_check1').checked = false;}else{document.getElementById('9J_check1').checked = true;}
                if(data[0].v9J_check2=='false'){document.getElementById('9J_check2').checked = false;}else{document.getElementById('9J_check2').checked = true;}
                if(data[0].v9J_check3=='false'){document.getElementById('9J_check3').checked = false;}else{document.getElementById('9J_check3').checked = true;}
                if(data[0].v10A_check1=='false'){document.getElementById('10A_check1').checked = false;}else{document.getElementById('10A_check1').checked = true;}
                if(data[0].v10A_check2 =='false'){document.getElementById('10A_check2').checked = false;}else{document.getElementById('10A_check2').checked = true;}
                if(data[0].v10A_check3=='false'){document.getElementById('10A_check3').checked = false;}else{document.getElementById('10A_check3').checked = true;}
                if(data[0].v10B_check1=='false'){document.getElementById('10B_check1').checked = false;}else{document.getElementById('10B_check1').checked = true;}
                if(data[0].v10B_check2=='false'){document.getElementById('10B_check2').checked = false;}else{document.getElementById('10B_check2').checked = true;}
                if(data[0].v10B_check3 =='false'){document.getElementById('10B_check3').checked = false;}else{document.getElementById('10B_check3').checked = true;}
                if(data[0].v10C_check1=='false'){document.getElementById('10C_check1').checked = false;}else{document.getElementById('10C_check1').checked = true;}
                if(data[0].v10C_check2=='false'){document.getElementById('10C_check2').checked = false;}else{document.getElementById('10C_check2').checked = true;}
                if(data[0].v10C_check3=='false'){document.getElementById('10C_check3').checked = false;}else{document.getElementById('10C_check3').checked = true;}
                if(data[0].v10D_check1=='false'){document.getElementById('10D_check1').checked = false;}else{document.getElementById('10D_check1').checked = true;}
                if(data[0].v10D_check2 =='false'){document.getElementById('10D_check2').checked = false;}else{document.getElementById('10D_check2').checked = true;}
                if(data[0].v10D_check3 =='false'){document.getElementById('10D_check3').checked = false;}else{document.getElementById('10D_check3').checked = true;}
                if(data[0].v10E_check1 =='false'){document.getElementById('10E_check1').checked = false;}else{document.getElementById('10E_check1').checked = true;}
                if(data[0].v10E_check2 =='false'){document.getElementById('10E_check2').checked = false;}else{document.getElementById('10E_check2').checked = true;}
                if(data[0].v10E_check3 =='false'){document.getElementById('10E_check3').checked = false;}else{document.getElementById('10E_check3').checked = true;}
                if(data[0].v10F_check1=='false'){document.getElementById('10F_check1').checked = false;}else{document.getElementById('10F_check1').checked = true;}
                if(data[0].v10F_check2=='false'){document.getElementById('10F_check2').checked = false;}else{document.getElementById('10F_check2').checked = true;}
                if(data[0].v10F_check3=='false'){document.getElementById('10F_check3').checked = false;}else{document.getElementById('10F_check3').checked = true;}
                if(data[0].v11medicionestrestermico_check=='false'){document.getElementById('11medicionestrestermico_check').checked = false;}else{document.getElementById('11medicionestrestermico_check').checked = true;}
                if(data[0].v11vapor_check=='false'){document.getElementById('11vapor_check').checked = false;}else{document.getElementById('11vapor_check').checked = true;}
                if(data[0].v11aguacaliente_check=='false'){document.getElementById('11aguacaliente_check').checked = false;}else{document.getElementById('11aguacaliente_check').checked = true;}
                if(data[0].v11condensados_check=='false'){document.getElementById('11condensados_check').checked = false;}else{document.getElementById('11condensados_check').checked = true;}
                if(data[0].v11aguafria_check=='false'){document.getElementById('11aguafria_check').checked = false;}else{document.getElementById('11aguafria_check').checked = true;}
                if(data[0].v11aire_check=='false'){document.getElementById('11aire_check').checked = false;}else{document.getElementById('11aire_check').checked = true;}
                if(data[0].v11sodacautica_check =='false'){document.getElementById('11sodacautica_check').checked = false;}else{document.getElementById('11sodacautica_check').checked = true;}
                if(data[0].v11amoniaco_check=='false'){document.getElementById('11amoniaco_check').checked = false;}else{document.getElementById('11amoniaco_check').checked = true;}
                if(data[0].v11acidosulfurico_check =='false'){document.getElementById('11acidosulfurico_check').checked = false;}else{document.getElementById('11acidosulfurico_check').checked = true;}
                if(data[0].v11actualizarquimicos_check=='false'){document.getElementById('11actualizarquimicos_check').checked = false;}else{document.getElementById('11actualizarquimicos_check').checked = true;}
                if(data[0].v11temperaturaalta_check=='false'){document.getElementById('11temperaturaalta_check').checked = false;}else{document.getElementById('11temperaturaalta_check').checked = true;}
                if(data[0].v11temperaturabaja_check =='false'){document.getElementById('11temperaturabaja_check').checked = false;}else{document.getElementById('11temperaturabaja_check').checked = true;}
                if(data[0].v11lineapresurizada_check=='false'){document.getElementById('11lineapresurizada_check').checked = false;}else{document.getElementById('11lineapresurizada_check').checked = true;}
                if(data[0].v11lineaabierta_check =='false'){document.getElementById('11lineaabierta_check').checked = false;}else{document.getElementById('11lineaabierta_check').checked = true;}
                if(data[0].v11lineaincomunicada_check=='false'){document.getElementById('11lineaincomunicada_check').checked = false;}else{document.getElementById('11lineaincomunicada_check').checked = true;}
                if(data[0].v11lineapurgada_check=='false'){document.getElementById('11lineapurgada_check').checked = false;}else{document.getElementById('11lineapurgada_check').checked = true;}
                if(data[0].v11bloqueovalvula_check=='false'){document.getElementById('11bloqueovalvula_check').checked = false;}else{document.getElementById('11bloqueovalvula_check').checked = true;}
                if(data[0].v6A_check4=='false'){document.getElementById('6A_check4').checked = false;}else{document.getElementById('6A_check4').checked = true;}

               $("#ventana_permiso").modal('show');
                $('.modal-dialog').css('width', '80%'); 

              }
           });



}



function guardar_actualizar(){

  var num_permiso = $("#num_permiso").html();
  var actividad='actualizar';

      if(num_permiso == 'S/N'){
        actividad='nuevo';

      }


        $.ajax({
            url:'json/json.php?accion=guardar_actualizar',
            data:{actividad:actividad, 
                  var_num_permiso:$('#num_permiso').html(), 
                  var_num_ot:$('#num_ot').val(), 
                  var_tipo_permiso:$('#titulo_permiso').html(), 
                  var_numero_trabajadores:$('#numero_trabajadores').val(), 
                  var_ejecutor_mantencion:document.getElementById('ejecutor_mantencion').checked, 
                  var_ejecutor_contratista:document.getElementById('ejecutor_contratista').checked, 
                  var_especialidad_mecanica:document.getElementById('especialidad_mecanica').checked, 
                  var_especialidad_soldadura:document.getElementById('especialidad_soldadura').checked, 
                  var_especialidad_electrica:document.getElementById('especialidad_electrica').checked, 
                  var_especialidad_instrumentacion:document.getElementById('especialidad_instrumentacion').checked, 
                  var_especialidad_produccion:document.getElementById('especialidad_produccion').checked, 
                  var_especialidad_servicio:document.getElementById('especialidad_servicio').checked, 
                  var_especialidad_otra:$('#otra_especialidad').val(), 
                  var_1A_check1:document.getElementById('1A_check1').checked, 
                  var_1A_check2:document.getElementById('1A_check2').checked, 
                  var_1A_check3:document.getElementById('1A_check3').checked, 
                  var_1A_check4:document.getElementById('1A_check4').checked, 
                  var_1A_check5:document.getElementById('1A_check5').checked, 
                  var_1A_check6:document.getElementById('1A_check6').checked, 
                  var_1A_check7:document.getElementById('1A_check7').checked, 
                  var_1A_check8:document.getElementById('1A_check8').checked, 
                  var_1A_check9:document.getElementById('1A_check9').checked, 
                  var_2A_check1:document.getElementById('2A_check1').checked, 
                  var_2A_check2:document.getElementById('2A_check2').checked, 
                  var_2A_check3:document.getElementById('2A_check3').checked, 
                  var_3A_check1:document.getElementById('3A_check1').checked, 
                  var_3A_check2:document.getElementById('3A_check2').checked, 
                  var_3A_check3:document.getElementById('3A_check3').checked, 
                  var_3A_check4:document.getElementById('3A_check4').checked, 
                  var_3A_check5:document.getElementById('3A_check5').checked, 
                  var_3A_check6:document.getElementById('3A_check6').checked, 
                  var_3A_check7:document.getElementById('3A_check7').checked, 
                  var_4A_check1:document.getElementById('4A_check1').checked, 
                  var_4A_check2:document.getElementById('4A_check2').checked, 
                  var_4A_check3:document.getElementById('4A_check3').checked, 
                  var_4A_check4:document.getElementById('4A_check4').checked, 
                  var_4A_check5:document.getElementById('4A_check5').checked, 
                  var_4A_check6:document.getElementById('4A_check6').checked, 
                  var_4A_check7:document.getElementById('4A_check7').checked, 
                  var_4A_check8:document.getElementById('4A_check8').checked, 
                  var_4A_check9:document.getElementById('4A_check9').checked, 
                  var_5A_check1:document.getElementById('5A_check1').checked, 
                  var_5A_check2:document.getElementById('5A_check2').checked, 
                  var_5A_check3:document.getElementById('5A_check3').checked, 
                  var_5A_check4:document.getElementById('5A_check4').checked, 
                  var_5A_check5:document.getElementById('5A_check5').checked, 
                  var_5B_check1:document.getElementById('5B_check1').checked, 
                  var_5B_check2:document.getElementById('5B_check2').checked, 
                  var_5B_check3:document.getElementById('5B_check3').checked, 
                  var_5C_check1:document.getElementById('5C_check1').checked, 
                  var_5C_check2:document.getElementById('5C_check2').checked, 
                  var_5C_check3:document.getElementById('5C_check3').checked, 
                  var_5C_check5:document.getElementById('5C_check5').checked, 
                  var_5D_check1:document.getElementById('5D_check1').checked, 
                  var_5D_check2:document.getElementById('5D_check2').checked, 
                  var_5E_check1:document.getElementById('5E_check1').checked, 
                  var_5E_check2:document.getElementById('5E_check2').checked, 
                  var_5E_check3:document.getElementById('5E_check3').checked, 
                  var_5F_check1:document.getElementById('5F_check1').checked, 
                  var_5F_check2:document.getElementById('5F_check2').checked, 
                  var_5F_check3:document.getElementById('5F_check3').checked, 
                  var_5F_check4:document.getElementById('5F_check4').checked, 
                  var_5F_check5:document.getElementById('5F_check5').checked, 
                  var_5G_check1:document.getElementById('5G_check1').checked, 
                  var_5G_check2:document.getElementById('5G_check2').checked, 
                  var_5G_check3:document.getElementById('5G_check3').checked,  
                  var_5H_check1:document.getElementById('5H_check1').checked, 
                  var_5H_check2:document.getElementById('5H_check2').checked, 
                  var_5H_check3:document.getElementById('5H_check3').checked, 
                  var_6A_check1:document.getElementById('6A_check1').checked, 
                  var_6A_check2:document.getElementById('6A_check2').checked, 
                  var_6A_check3:document.getElementById('6A_check3').checked, 
                  var_7candado_check1:document.getElementById('7candado_check1').checked, 
                  var_7candado_check2:document.getElementById('7candado_check2').checked, 
                  var_7candado_check3:document.getElementById('7candado_check3').checked, 
                  var_7ccm_check:document.getElementById('7ccm_check').checked, 
                  var_7tablero_check:document.getElementById('7tablero_check').checked, 
                  var_7ww_check:document.getElementById('7ww_check').checked, 
                  var_7otro_check:document.getElementById('7otro_check').checked, 
                  var_8A_check1:document.getElementById('8A_check1').checked, 
                  var_8A_check2:document.getElementById('8A_check2').checked, 
                  var_8A_check3:document.getElementById('8A_check3').checked, 
                  var_8B_check1:document.getElementById('8B_check1').checked, 
                  var_8B_check2:document.getElementById('8B_check2').checked, 
                  var_8B_check3:document.getElementById('8B_check3').checked, 
                  var_8C_check1:document.getElementById('8C_check1').checked, 
                  var_8C_check2:document.getElementById('8C_check2').checked, 
                  var_8C_check3:document.getElementById('8C_check3').checked, 
                  var_8D_check1:document.getElementById('8D_check1').checked, 
                  var_8D_check2:document.getElementById('8D_check2').checked, 
                  var_8D_check3:document.getElementById('8D_check3').checked, 
                  var_8E_check1:document.getElementById('8E_check1').checked, 
                  var_8E_check2:document.getElementById('8E_check2').checked, 
                  var_8E_check3:document.getElementById('8E_check3').checked, 
                  var_8F_check1:document.getElementById('8F_check1').checked, 
                  var_8F_check2:document.getElementById('8F_check2').checked, 
                  var_8F_check3:document.getElementById('8F_check3').checked, 
                  var_8G_check1:document.getElementById('8G_check1').checked, 
                  var_8G_check2:document.getElementById('8G_check2').checked, 
                  var_8G_check3:document.getElementById('8G_check3').checked,  
                  var_9A_check1:document.getElementById('9A_check1').checked, 
                  var_9A_check2:document.getElementById('9A_check2').checked, 
                  var_9A_check3:document.getElementById('9A_check3').checked, 
                  var_9B_check1:document.getElementById('9B_check1').checked, 
                  var_9B_check2:document.getElementById('9B_check2').checked, 
                  var_9B_check3:document.getElementById('9B_check3').checked, 
                  var_9C_check1:document.getElementById('9C_check1').checked, 
                  var_9C_check2:document.getElementById('9C_check2').checked, 
                  var_9C_check3:document.getElementById('9C_check3').checked, 
                  var_9D_check1:document.getElementById('9D_check1').checked, 
                  var_9D_check2:document.getElementById('9D_check2').checked, 
                  var_9D_check3:document.getElementById('9D_check3').checked, 
                  var_9E_check1:document.getElementById('9E_check1').checked, 
                  var_9E_check2:document.getElementById('9E_check2').checked, 
                  var_9E_check3:document.getElementById('9E_check3').checked, 
                  var_9F_check1:document.getElementById('9F_check1').checked, 
                  var_9F_check2:document.getElementById('9F_check2').checked, 
                  var_9F_check3:document.getElementById('9F_check3').checked, 
                  var_9G_check1:document.getElementById('9G_check1').checked, 
                  var_9G_check2:document.getElementById('9G_check2').checked, 
                  var_9G_check3:document.getElementById('9G_check3').checked, 
                  var_9H_check1:document.getElementById('9H_check1').checked, 
                  var_9H_check2:document.getElementById('9H_check2').checked, 
                  var_9H_check3:document.getElementById('9H_check3').checked, 
                  var_9I_check1:document.getElementById('9I_check1').checked, 
                  var_9I_check2:document.getElementById('9I_check2').checked, 
                  var_9I_check3:document.getElementById('9I_check3').checked, 
                  var_9J_check1:document.getElementById('9J_check1').checked, 
                  var_9J_check2:document.getElementById('9J_check2').checked, 
                  var_9J_check3:document.getElementById('9J_check3').checked, 
                  var_10A_check1:document.getElementById('10A_check1').checked, 
                  var_10A_check2:document.getElementById('10A_check2').checked, 
                  var_10A_check3:document.getElementById('10A_check3').checked, 
                  var_10B_check1:document.getElementById('10B_check1').checked, 
                  var_10B_check2:document.getElementById('10B_check2').checked, 
                  var_10B_check3:document.getElementById('10B_check3').checked, 
                  var_10C_check1:document.getElementById('10C_check1').checked, 
                  var_10C_check2:document.getElementById('10C_check2').checked, 
                  var_10C_check3:document.getElementById('10C_check3').checked, 
                  var_10D_check1:document.getElementById('10D_check1').checked, 
                  var_10D_check2:document.getElementById('10D_check2').checked, 
                  var_10D_check3:document.getElementById('10D_check3').checked, 
                  var_10E_check1:document.getElementById('10E_check1').checked, 
                  var_10E_check2:document.getElementById('10E_check2').checked, 
                  var_10E_check3:document.getElementById('10E_check3').checked, 
                  var_10F_check1:document.getElementById('10F_check1').checked, 
                  var_10F_check2:document.getElementById('10F_check2').checked, 
                  var_10F_check3:document.getElementById('10F_check3').checked, 
                  var_11medicionestrestermico_check:document.getElementById('11medicionestrestermico_check').checked, 
                  var_11vapor_check:document.getElementById('11vapor_check').checked, 
                  var_11aguacaliente_check:document.getElementById('11aguacaliente_check').checked, 
                  var_11condensados_check:document.getElementById('11condensados_check').checked, 
                  var_11aguafria_check:document.getElementById('11aguafria_check').checked, 
                  var_11aire_check:document.getElementById('11aire_check').checked, 
                  var_11sodacautica_check:document.getElementById('11sodacautica_check').checked, 
                  var_11amoniaco_check:document.getElementById('11amoniaco_check').checked, 
                  var_11acidosulfurico_check:document.getElementById('11acidosulfurico_check').checked, 
                  var_11actualizarquimicos_check:document.getElementById('11actualizarquimicos_check').checked, 
                  var_11temperaturaalta_check:document.getElementById('11temperaturaalta_check').checked, 
                  var_11temperaturabaja_check:document.getElementById('11temperaturabaja_check').checked, 
                  var_11lineapresurizada_check:document.getElementById('11lineapresurizada_check').checked, 
                  var_11lineaabierta_check:document.getElementById('11lineaabierta_check').checked, 
                  var_11lineaincomunicada_check:document.getElementById('11lineaincomunicada_check').checked, 
                  var_11lineapurgada_check:document.getElementById('11lineapurgada_check').checked, 
                  var_11bloqueovalvula_check:document.getElementById('11bloqueovalvula_check').checked, 
                  var_6A_check4:document.getElementById('6A_check4').checked, 
                  var_6A_otros:document.getElementById('6A_otros').checked, 
                  var_prevencion_si:document.getElementById('prevencion_si').checked, 
                  var_prevencion_no:document.getElementById('prevencion_no').checked, 
                  var_fecha_ini_ejecucion:$('#fecha_ini_ejecucion').val(), 
                    var_fecha_termino_ejecucion:$('#fecha_termino_ejecucion').val(), 
                    var_hora_ini_ejecucion:$('#hora_ini_ejecucion').val(), 
                    var_hora_termino_ejecucion:$('#hora_termino_ejecucion').val(), 
                    var_1A_otros:$('#1A_otros').val(), 
                    var_3A_otros:$('#3A_otros').val(), 
                    var_4A_otros:$('#4A_otros').val(), 
                    var_5C_tipo_filtro:$('#5C_tipo_filtro').val(), 
                    var_5F_otros:$('#5F_otros').val(), 
                    var_5G_otros:$('#5G_otros').val(), 
                    var_7tag_1:$('#7tag_1').val(), 
                    var_7tag_2:$('#7tag_2').val(), 
                    var_7tag_3:$('#7tag_3').val(), 
                    var_7tag_4:$('#7tag_4').val(), 
                    var_7tag_5:$('#7tag_5').val(), 
                    var_7candado_num1:$('#7candado_num1').val(), 
                    var_7candado_num2:$('#7candado_num2').val(), 
                    var_7candado_num3:$('#7candado_num3').val(), 
                    var_7candado_num4:$('#7candado_num4').val(), 
                    var_7candado_num5:$('#7candado_num5').val(), 
                    var_7responsable_bloqueo:$('#7responsable_bloqueo').val(), 
                    var_8I_otros:$('#8I_otros').val(), 
                    var_10B_T:$('#10B_T').val(), 
                    var_10B_C:$('#10B_C').val(), 
                    var_10B_O2:$('#10B_O2').val(), 
                    var_10B_CO:$('#10B_CO').val(), 
                    var_10B_LEL:$('#10B_LEL').val(), 
                    var_11bloqueovalvula_num:$('#11bloqueovalvula_num').val(), 
                    var_area_autorizada:$('#area_autorizada').val(), 
                    var_trabajo_a_realizar:$('#trabajo_a_realizar').val(), 
                    var_empresa_contratista:$('#empresa_contratista').val(), 
                    var_6A_otros:$('#6A_otros').val(), 


            },
            type:'post',
            dataType: "json", 
            success: function (data)
              {
                  
                $('#num_permiso').html(data[0].numero_permiso);

                lista_de_permisos();

              }
           });







  }



  function nuevo_permiso(tipo, accion){


    document.getElementById("formulario_permiso").reset();

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




function lista_de_permisos(){

var consulta='json/json.php?accion=lista_de_permisos';

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
                return '<center><button type="button" class="btn btn-info glyphicon glyphicon-search btn-md pull-left" title="Ver permiso" onclick="ver_permiso(\''+row.num_permiso+'\',\''+row.id_permiso+'\')" ></button></center>';
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

	
