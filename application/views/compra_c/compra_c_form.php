  <blockquote>
    
    <p><strong><?php echo $titulo;?></strong></p>
  </blockquote>
<div align="center">
  <?php
	$atributos = array('id' => 'compra_c_form');
    echo form_open('compra_c/insert_c', $atributos);
    $data_orden = array(
              'name'        => 'folio',
              'id'          => 'folio',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'autofocus'   => 'autofocus'
            );
            $data_factura = array(
              'name'        => 'factura',
              'id'          => 'factura',
              'value'       => '',
              'maxlength'   => '20',
              'size'        => '20'
            );
              $data_cia = array(
              'name'        => 'cia',
              'id'          => 'cia',
              'value'       => '',
              'maxlength'   => '2',
              'size'        => '2'
            );
             $data_prvx = array(
              'name'        => 'prvx',
              'id'          => 'prvx',
              'value'       => '',
              'maxlength'   => '30',
              'size'        => '30'
            );
            $data_compra = array(
              'name'        => 'compra',
              'id'          => 'compra',
              'value'       => '',
              'maxlength'   => '15',
              'size'        => '15'
            );
             $data_orden = array(
              'name'        => 'orden',
              'id'          => 'orden',
              'value'       => '',
              'maxlength'   => '9',
              'size'        => '9'
            );
  ?>
  
  <table>
<tr>
	<td>Compra: </td>
	<td><?php echo form_input($data_compra, "", 'required');?><span id="mensaje"></span></td>
</tr>
<tr>
	<td>Orden de Compra: </td>
	<td><?php echo form_input($data_orden, "", 'required');?><span id="mensaje"></span></td>
</tr>
<tr>
	<td>Proveedor: </td>
	<td><?php echo form_input($data_prvx, "", 'required');?><span id="mensaje"></span></td>
</tr>
<tr>
	<td>Factura: </td>
	<td><?php echo form_input($data_factura, "", 'required');?><span id="mensaje"></span></td>
</tr>


<tr>
	<td>Tipo:</td>
    <td align="left"> 
    <select name="cia" id="cia">
    <option value="0" >Seleccionar Compa&ntilde;ia</option>
    <option value="1" >FARMACIAS EL FENIX</option>
    <option value="13" >FARMACIA DE GENERICOS</option>
    </select>
    </td>
</tr>

	<td colspan="2"><?php echo form_submit('envio', 'TRAER ORDEN');?></td>
</tr>
</table>
<input type="hidden" value="0" name="valida" id="valida" />
  <?php
	echo form_close();
  ?>
<table align="center">
<tr>
	<td><?php echo $tabla;?></td>
</tr>
</table>

</div>    
  <script language="javascript" type="text/javascript">
    $(window).load(function () {
        $("#folio").focus();
    });
    
    $(document).ready(function(){
    
    $('#folio').blur(function(){
            var folio = $('#folio').attr("value"); 
     });
 
 $('#factura').blur(
        function()
        {
            $('#factura').val($('#factura').attr("value").toUpperCase());
        }
    );   


    $('#compra_c_form').submit(function() {
        
        var factura = $('#factura').attr("value");
        var cia = $('#cia').attr("value");
         
    	  if(folio >3 && cia > 0){
    	    echo ;
    	    if(confirm("Seguro que los datos son correctos?")){
    	    return true;
    	    }else{
    	    return false;
    	    }
    	    
    	  }else{

    	    alert('Verifica la informacion por favor');
    	    $('#clave').focus();
    	    return false    

    	        }
    	  });
          
          
        
     
});
  </script>