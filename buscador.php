<?php
class Buscador
{
	private $busqueda=array();
	
	public function buscar()
	{
        require_once('conexion.php');
        $conexion = new Conexion();
        $con = $conexion->conectar();
        if(!$con ){
            echo "error...";
        }
        else{
           $query = "SELECT nomb_carr FROM carrera WHERE nomb_carr like '%".$_GET['texto_a_buscar']."%';";
        
		$res = pg_query($con,$query);
		while ($reg= pg_fetch_array($res))
		{
			$this->busqueda[] = $reg[0];
		}
			return $this->busqueda;
        }
		//print_r($_GET);exit;
		
	}
}
?>