<?php
	class Pedido_model extends CI_Model {
    
    function control()
    {
        
        $this->db->select('*');
        $this->db->from('pedido_c');
         $this->db->where('tipo',0);
        $query = $this->db->get();
        
        
        //titulos//
        $tabla= "
        <table>
        <thead>
        <tr>
        <th align=\"center\">Folio</th>
        <th align=\"center\">Sucursal</th>
        <th align=\"left\">Nombre de la Sucursal</th>
        <th align=\"center\">Fecha</th>
        
        </tr>
        </thead>";
        
        foreach($query->result() as $row)
        {
            $l1 = anchor('pedido/detalle/'.$row->id, '<img src="'.base_url().'img/icons/list-style/icon_list_style_arrow.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para agregar productos a la factura!', 'class' => 'encabezado'));
            $l2 = anchor('pedido/delete_c/'.$row->id, '<img src="'.base_url().'img/icons/icon_error.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para borrar factura!', 'class' => 'encabezado'));
            $l3 = anchor('pedido/cierre_c/'.$row->id, '<img src="'.base_url().'img/icons/emoticon/emoticon_bomb.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para cerrar factura!', 'class' => 'encabezado'));
            
            $tabla.="
            <tr>
        <td align=\"center\">$row->id</td>
        <td align=\"center\">$row->suc</td>
        <td align=\"left\">$row->sucx</td>
        <td align=\"center\">$row->fecha</td>
        <td align=\"center\">$l1</td>
        <td align=\"center\">$l2</td>
        <td align=\"center\">$l3</td>
        </tr>
        ";
        }
        $tabla.="
         
         </table>";   
        return $tabla;
        
    }
/////////////////////////////////////////////////////////////////    
/////////////////////////////////////////////////////////////////
    function detalle_d($id_cc)
    {
        
        $this->db->select('a.*, b.susa');
        $this->db->from('pedido_d a');
        $this->db->join('catalogo.cat_nvo_metro_sec b','a.clave=b.clave_metro');
        $this->db->where('id_cc',$id_cc);
        $this->db->where('tipo',0);
        $this->db->order_by('id desc');
        $query = $this->db->get();
        
        
        
        $tabla= "
        <table>
        <thead>
        <tr>
        <th align=\"center\">Clave</th>
        
        <th align=\"left\">Sustancia Activa</th>
        <th align=\"right\">Cantidad Pedida</th>
        </tr>
        </thead>";
        
        foreach($query->result() as $row)
        {
         $l1 = anchor('pedido/delete_d/'.$row->id.'/'.$id_cc, '<img src="'.base_url().'img/icons/icon_error.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para borrar productos!', 'class' => 'encabezado'));
            
            $tabla.="
            <tr>
        <td align=\"center\">$row->clave</td>
        
        <td align=\"left\">$row->susa</td>
        <td align=\"right\">$row->canp</td>
        <td align=\"right\">$l1</td>
        </tr>
            ";
        }
         $tabla.= "
         </table>
         ";
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
    function control_historico()
    {
       
       $this->db->select('a.*');
       $this->db->from('pedido_c a');
        $this->db->where('tipo', 1);
       $this->db->order_by('fecha desc');
       $query = $this->db->get();
        
        $tabla= "
        <table id=\"hor-minimalist-b\">
        <thead>
        <tr>
        <th>Pedido</th>
        <th>Suc</th>
        <th align=\"left\" colspan=\"2\">Sucursal</th>
        <th align=\"left\">Fecha</th>
        </tr>
        </thead>
        <tbody>
        ";
        
        foreach($query->result() as $row)
        {
            $l1 = anchor('pedido/detalle_historico/'.$row->id, '<img src="'.base_url().'img/icons/list-style/icon_list_style_arrow.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para agregar productos a la factura!', 'class' => 'encabezado'));
            $l2 = anchor('pedido/imprime_d/'.$row->id, '<img src="'.base_url().'img/reportes2.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para imprimir pedido!', 'class' => 'encabezado'));
            $l3 = anchor('pedido/imprime_e/'.$row->id, '<img src="'.base_url().'img/icon_nav_products.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para imprimir solo existencia!', 'class' => 'encabezado'));
            $tabla.="
            <tr>
            <td align=\"center\">".$row->id."</td>
            <td align=\"center\">".$row->suc."</td>
            <td align=\"left\">".$row->sucx."</td>
            <td align=\"left\">".$row->fecha."</td>
            <td align=\"left\">$l1</td>
            <td align=\"left\">$l2</td>
            <td align=\"left\">$l3</td>
            
            </tr>
            ";
        }
        
        $tabla.="
        </tbody>
        </table>";
        
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
    function control_historico_s()
    {
       
       $this->db->select('a.*');
       $this->db->from('pedido_c a');
        $this->db->where('tipo', 3);
       $this->db->order_by('fecha desc');
       $query = $this->db->get();
        
        $tabla= "
        <table id=\"hor-minimalist-b\">
        <thead>
        <tr>
        <th>Pedido</th>
        <th>Suc</th>
        <th align=\"left\" colspan=\"2\">Sucursal</th>
        <th align=\"left\">Fecha</th>
        </tr>
        </thead>
        <tbody>
        ";
        
        foreach($query->result() as $row)
        {
            $l1 = anchor('pedido/detalle_historico/'.$row->id, '<img src="'.base_url().'img/icons/list-style/icon_list_style_arrow.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para agregar productos a la factura!', 'class' => 'encabezado'));
            $l2 = anchor('pedido/imprime_d_s/'.$row->id, '<img src="'.base_url().'img/reportes2.png" border="0" width="20px" /></a>', array('title' => 'Haz Click aqui para imprimir pedido!', 'class' => 'encabezado'));
            $tabla.="
            <tr>
            <td align=\"center\">".$row->id."</td>
            <td align=\"center\">".$row->suc."</td>
            <td align=\"left\">".$row->sucx."</td>
            <td align=\"left\">".$row->fecha."</td>
            <td align=\"left\">$l1</td>
            <td align=\"left\">$l2</td>
            
            </tr>
            ";
        }
        
        $tabla.="
        </tbody>
        </table>";
        
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////

   function detalle_d_historico($id_cc,$tit)
    {
       
       $this->db->select('a.*,b.susa, ');
       $this->db->from('metro.pedido_d a');
       $this->db->join('catalogo.cat_nvo_metro_sec b','a.clave=b.clave_metro');
       $this->db->where('id_cc',$id_cc);
       $this->db->where('tipo',1);
       $query = $this->db->get();
       
        
        $tabla= "
        <table>
        <thead>
        <tr>
        <th colspan=\"4\">$tit</th>
        </tr>
        
        <tr>
        <th>Clave</th>
        <th>Sustancia Activa</th>
        <th>Cantidad</th>
        </tr>
        
        
        </thead>
        <tbody>
        ";
        
        foreach($query->result() as $row)
        {
            
            $tabla.="
            <tr>
            <td align=\"center\">".$row->clave."</td>
            <td align=\"left\">".$row->susa."</td>
            <td align=\"center\">".$row->canp."</td>
            </tr>
            ";
        }
        
        $tabla.="
        </tbody>
        </table>";
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function imprime_detalle_s($id)
    {
        $tocan=0;
        $num=0;
        $sql = "SELECT c.mueble, a.*,b.susa from pedido_d a
        left join catalogo.cat_nuevo_metro b on a.clave=b.clave_metro
        left join catalogo.almacen_mue c on a.clave=c.sec
        where a.id_cc= ? and a.tipo=1  group by a.clave order by clave";


        $query = $this->db->query($sql,array($id));
        
        $tabla= "
        <table>
        <thead>
        
        <tr>
        <th colspan=\"4\">__________________________________________________________________________________________</th>
        </tr>
        
        <tr>
        <th width=\"60\"><strong>Mueble</strong></th>
        <th width=\"70\"><strong>Clave</strong></th>
        <th width=\"320\"><strong>Sustancia Activa</strong></th>
        <th width=\"80\" align=\"right\"><strong>Cantidad</strong></th>
        </tr>
        
        <tr>
        <th colspan=\"4\">______________________________________________________________________________</th>
        </tr>
        
        </thead>
        <tbody>
        ";
  
        
        foreach($query->result() as $row)
        {
            
            $tabla.="
        
            <tr>
            <td width=\"60\" align=\"left\">".$row->mueble."</td>
            <td width=\"70\" align=\"left\">".$row->clave."</td>
            <td width=\"320\" align=\"left\">".$row->susa."</td>
            <td width=\"80\" align=\"right\">".$row->canp."</td>
            </tr>
            <tr>
        <th colspan=\"4\">______________________________________________________________________________</th>
        </tr>    
            ";
            
            
        $tocan=$tocan+$row->canp;
        $num=$num+1;
        }
        
        $tabla.="
        
        <tr>
        <th colspan=\"4\">______________________________________________________________________________</th>
        </tr>
        
        <tr>
        <td width=\"450\" align=\"left\">Total de productos.: $num</td>
        <td width=\"80\" align=\"right\">".$tocan."</td>
        </tr>
        
        </tbody>
        </table>";
        
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function imprime_detalle($id)
    {
        $tocan=0;
        $num=0;
        $sql = "SELECT a.*,b.susa from pedido_d a
        left join catalogo.cat_nuevo_metro b on a.clave=b.clave_metro
        where a.id_cc= ? and a.tipo=1  GROUP BY CLAVE order by clave";
        $query = $this->db->query($sql,array($id));
        
        $tabla= "
        <table>
        <thead>
        
        <tr>
        <th colspan=\"4\">__________________________________________________________________________________________</th>
        </tr>
        
        <tr>
        <th width=\"70\"><strong>Clave</strong></th>
        <th width=\"380\"><strong>Sustancia Activa</strong></th>
        <th width=\"80\" align=\"right\"><strong>Cantidad</strong></th>
        </tr>
        
        <tr>
        <th colspan=\"4\">__________________________________________________________________________________________</th>
        </tr>
        
        </thead>
        <tbody>
        ";
  
        
        foreach($query->result() as $row)
        {

            $tabla.="
            <tr>
            <td width=\"70\" align=\"left\">".$row->clave."</td>
            <td width=\"380\" align=\"left\">".$row->susa."</td>
            <td width=\"80\" align=\"right\">".$row->canp."</td>
            </tr>
            <tr>
        <th colspan=\"4\">__________________________________________________________________________________________</th>
        </tr>
            ";
        $tocan=$tocan+$row->canp;
        $num=$num+1;
        }
        
        $tabla.="
        <tr>
        <th colspan=\"4\">__________________________________________________________________________________________</th>
        </tr>
        
        <tr>
        <td width=\"450\" align=\"left\">Total de productos.: $num</td>
        <td width=\"80\" align=\"right\">".$tocan."</td>
        </tr>
        
        </tbody>
        </table>";
        
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
function imprime_detalle_e($id)
    {
        $tocan=0;
        $num=0;
        $sql = "SELECT a.*,b.susa,c.lote from pedido_d a
        left join catalogo.cat_nuevo_metro b on a.clave=b.clave_metro
        left join inventario_d_clave c on a.clave=c.clave
        where a.id_cc= ? and a.tipo=1 and c.cantidad>0  order by clave";
        $query = $this->db->query($sql,array($id));
        
        $tabla= "
        <table>
        <thead>
        
        <tr>
        <th colspan=\"5\">__________________________________________________________________________________________</th>
        </tr>
        
        <tr>
        <th width=\"80\"><strong>Clave</strong></th>
        <th width=\"300\"><strong>Sustancia Activa</strong></th>
        <th width=\"80\" align=\"right\"><strong>Cantidad</strong></th>
        <th width=\"80\" align=\"right\"><strong>Lote</strong></th>
        
        </tr>
        
        <tr>
        <th colspan=\"5\">__________________________________________________________________________________________</th>
        </tr>
        
        </thead>
        <tbody>
        ";
  
        
        foreach($query->result() as $row)
        {
        
            $tabla.="
            <tr>
            <td width=\"80\" align=\"left\">".$row->clave."</td>
            <td width=\"300\" align=\"left\">".$row->susa."</td>
            <td width=\"80\" align=\"right\">".$row->canp."</td>
            <td width=\"80\" align=\"right\">".$row->lote."</td>
            
            </tr>
            ";
        $tocan=$tocan+$row->canp;
        $num=$num+1;
        }
        
        $tabla.="
        <tr>
        <th colspan=\"5\">__________________________________________________________________________________________</th>
        </tr>
        
        <tr>
        <td width=\"380\" align=\"left\">Total de productos.: $num</td>
        <td width=\"80\" align=\"right\">".$tocan."</td>
        
        </tr>
        
        </tbody>
        </table>";
        
        return $tabla;
        
    }
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////


function trae_datos_c($id_cc){
    $sql = "SELECT *  FROM pedido_c  where id= ? ";
    $query = $this->db->query($sql,array($id_cc));
     return $query;
    }
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function trae_datos($id_cc,$clave){
    $sql = "SELECT *  FROM pedido_d  where id_cc= ? and  clave= ? ";
    $query = $this->db->query($sql,array($id_cc,$clave));
     return $query;
    }
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
function busca_canp($clave,$can)
	{
		$sql = "SELECT *from pedido_d  
        where clave= ? and canp >= ? ";
        $query = $this->db->query($sql,array($clave,$can));
        return $query->num_rows(); 
	}

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////insert y delete
function create_member_c($suc)
	{
       $sql = "SELECT * FROM catalogo.sucursal where suc = ? ";
        $query = $this->db->query($sql,array($suc));
        $row= $query->row();
        $sucx=$row->nombre;    
    //////////////////////////////////////////////inserta los datos en la base de datos
        $new_member_insert_data = array(
			'suc' => $suc,
			'sucx' =>  str_replace(' ', '',strtoupper(trim($sucx))),
			'tipo' => 0,			
			'fecha'=> '0000-00-00:00:00'
		);
		
		$insert = $this->db->insert('pedido_c', $new_member_insert_data);
}
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////

function create_member_d($id_cc,$clave,$can)
	{
        
      $sql = "SELECT * FROM catalogo.cat_nvo_metro_sec where clave_metro= ? ";
        $query = $this->db->query($sql,array($clave));
        if($query->num_rows() > 0){
        $row= $query->row();
        $vta=0; 
        $lin=0;
        
        $sql1 = "SELECT * FROM pedido_d where id_cc= ? and clave= ? and tipo<>4 ";
       $query1 = $this->db->query($sql1,array($id_cc,$clave));
       
       if($query1->num_rows()== 0){
        
    //////////////////////////////////////////////inserta los datos en la base de datos
    	
        $new_member_insert_data = array(
			'id_cc' => $id_cc,
			'clave' => $clave,
			'fecha'=> date('Y-m-d H:s:i'),
            'vta' => $vta,
            'lin' => $lin,
            'canp'=> $can
            						
		);
		
		$insert = $this->db->insert('pedido_d', $new_member_insert_data);
		
	}
    }
}
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
function delete_member_c($id)
{
$data = array(
			'tipo' => 4,
			'fecha'=> date('Y-m-d H:s:i')
		);
		$this->db->where('id', $id);
        $this->db->update('pedido_c', $data); 
}    
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
function delete_member_d($id)
{
$data = array(
			'tipo' => 4,
			'fecha'=> date('Y-m-d H:s:i')
		);
		$this->db->where('id', $id);
        $this->db->update('pedido_d', $data); 
} 
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
function cierre_member_c($id)
{
$data = array(
			'tipo' => 1,
			'fecha'=> date('Y-m-d H:s:i')
		);
		$this->db->where('id', $id);
        $this->db->where('tipo', 0);
        $this->db->update('pedido_c', $data); 


$data1 = array(
			'tipo' => 1,
			'fecha'=> date('Y-m-d H:s:i')
		);
		$this->db->where('id_cc', $id);
        $this->db->where('tipo', 0);
        $this->db->update('pedido_d', $data1); 
}
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////    
//////////////////////////////////////////////////////////////////////////////////
}