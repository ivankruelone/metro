<?php
	class Catalogo_model extends CI_Model {

    function productos()
    {
        $sql = "SELECT * FROM catalogo.almacen where sec>0 and sec<=7999  group by sec order by sec";
        $query = $this->db->query($sql);
        
        
        
        
        $tabla= "
        <table id=\"hor-minimalist-b\">
        <thead>
        <tr>
        
        </tr>
        <tr>
        <th>Sec</th>
        <th>Sustancia Activa</th>
        <th>Prv</th>
        <th>Proveedor</th>
        </tr>
        </thead>
        <tbody>
        ";
        
        foreach($query->result() as $row)
        {
            //$l1 = anchor('catalogo/cambiar_accesorio/'.$row->id, '<img src="'.base_url().'img/edit.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para modificar productos!', 'class' => 'encabezado'));
            $tabla.="
            <tr>
            <td align=\"center\">".$row->sec."</td>
            <td align=\"left\">".$row->susa1."</td>
            <td align=\"center\">".$row->prv."</td>
            <td align=\"left\">".$row->prvx."</td>
            </tr>
            ";
        }
        
        $tabla.="
        </tbody>
        </table>";
        
        return $tabla;
        
    }
/////////////////////////////////////////////////////////////////    
/////////////////////////////////////////////////////////////////
function trae_datos($clave){
    $sql = "SELECT *  FROM catalogo.catalogo_bodega  where clabo= ? ";
    $query = $this->db->query($sql,array($clave));
     return $query;
    }
/////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////// 
   function busca_sucursal()
	{
		$sql = "SELECT suc,nombre FROM  catalogo.sucursal 
        where 
         
        suc=102 or suc=103 or suc=105 or suc=107 or suc=108 or suc=109 or  
        suc=113 or suc=114 or suc=115 or suc=124 or suc=202 or suc=203 or 
        suc=141 or suc=176 or suc=177 or suc=178 or suc=179 or suc=180 or 
        suc=181 or suc=187 or suc=993 or
        suc=1279 or suc=1339 or suc=1370 or
        suc=9900 order by nombre";
        $query = $this->db->query($sql);
        
        $suc = array();
        $suc[0] = "Selecciona una Sucursal";
        
        foreach($query->result() as $row){
            $suc[$row->suc] = $row->nombre." - ".$row->suc;
        }
        
        
        return $suc;
	} 
  /////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////// 
   function busca_sucursal_dev()
	{
		$sql = "SELECT suc,nombre FROM  catalogo.sucursal where suc=176 or suc=99990 or suc=100 or suc=177 or suc=178 or suc=179 or suc=180 or suc=181 or suc=187 or suc=103 or suc=108 or suc=107 or suc=141 or suc=105 or suc=102 or suc=109 or suc=9900 order by suc";
        
        $query = $this->db->query($sql);
        
        $suc = array();
        $suc[0] = "Selecciona una Sucursal";
        
        foreach($query->result() as $row){
            $suc[$row->suc] = $row->nombre." - ".$row->suc;
        }
        
        
        return $suc;
	}   
/////////////////////////////////////////////////////////////
 function busca_suc_unica($suc)
    {
      $sql = "SELECT  nombre FROM  catalogo.sucursal where suc = ?";
    $query = $this->db->query($sql,array($suc));
    $row= $query->row();
    $sucx=$row->nombre;
     return $sucx; 
    }

/////////////////////////////////////////////////////////////    
}