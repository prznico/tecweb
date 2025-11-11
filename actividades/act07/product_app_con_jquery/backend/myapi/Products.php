<?php
namespace MyAPI;
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase{
    protected $response;

    public function __construct($db = 'marketzone', $host = 'localhost', $user = 'root', $password = 'N1n1c0l3.') {
        // Inicializar el atributo response como array
        $this->response = array();
        // Usar el constructor de la superclase con parámetros opcionales
        parent::__construct($db, $host, $user, $password);
    }

    public function add($producto){
        $this->response = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        
        $sql = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0";
        $result = $this->conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$producto->nombre}', '{$producto->marca}', '{$producto->modelo}', {$producto->precio}, '{$producto->detalles}', {$producto->unidades}, '{$producto->imagen}', 0)";
            if($this->conexion->query($sql)){
                $this->response['status'] = "success";
                $this->response['message'] = "Producto agregado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
        }

        $result->free();
        // NO cerrar la conexión aquí para permitir otras operaciones
    }   

    public function delete($producto){
        $this->response = array(
            'status'  => 'error',
            'message' => 'La consulta falló'
        );
        
        if( isset($producto['id']) ) {
            $id = $producto['id'];
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if ( $this->conexion->query($sql) ) {
                $this->response['status'] = "success";
                $this->response['message'] = "Producto eliminado";
            } else {
                $this->response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
        } 
    }
    
    public function edit($producto){
        $this->response = array(
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        );
        
        $sql = "UPDATE productos SET nombre = '{$producto->nombre}', marca = '{$producto->marca}', modelo = '{$producto->modelo}', precio = '{$producto->precio}', detalles = '{$producto->detalles}', unidades = '{$producto->unidades}', imagen = '{$producto->imagen}' WHERE id = {$producto->id}";

        if ($this->conexion->query($sql) === TRUE) {
            $this->response['status'] = "success";
            $this->response['message'] = "Producto editado correctamente";
        } else {
            $this->response['message'] = "ERROR: No se ejecutó la consulta. " . $this->conexion->error;
        }
    }

    public function listProduct(){
        $this->response = array();
        
        if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->response[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            $this->response = array(
                'status' => 'error',
                'message' => 'Query Error: '.mysqli_error($this->conexion)
            );
        }
    }

    public function search($producto){
        $this->response = array();
        
        if( isset($producto['search']) ) {
            $search = $producto['search'];
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if ( $result = $this->conexion->query($sql) ) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $this->response[$num][$key] = utf8_encode($value);
                        }
                    }
                }
                $result->free();
            } else {
                $this->response = array(
                    'status' => 'error',
                    'message' => 'Query Error: '.mysqli_error($this->conexion)
                );
            }
        }
    }

    public function single($producto){
        $this->response = array();
        
        $id = $producto['id'];
        $sql = "SELECT * FROM productos WHERE id = $id";
        $result = $this->conexion->query($sql);
        
        if ($result){
            $json = array();
            while($row = mysqli_fetch_array($result)) {
                $json[] = array(
                    'id' => $id,
                    'nombre' => $row['nombre'],
                    'precio' => $row['precio'],
                    'unidades' => $row['unidades'],
                    'modelo' => $row['modelo'],
                    'marca' => $row['marca'],
                    'detalles' => $row['detalles'],
                    'imagen' => $row['imagen']
                );
            }
            
            if(!empty($json)) {
                $this->response = $json[0];
            }
            $result->free();
        } else {
            $this->response = array(
                'status' => 'error',
                'message' => 'Query failed'
            );
        }
    }

    public function singleByName($name){
        $this->response = array();
        
        $sql = "SELECT * FROM productos WHERE nombre = '{$name}' AND eliminado = 0";
        if ( $result = $this->conexion->query($sql) ) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows) && count($rows) > 0) {
                foreach($rows[0] as $key => $value) {
                    $this->response[$key] = utf8_encode($value);
                }
            } else {
                $this->response = array(
                    'status' => 'error',
                    'message' => 'Producto no encontrado'
                );
            }
            $result->free();
        } else {
            $this->response = array(
                'status' => 'error',
                'message' => 'Query Error: '.mysqli_error($this->conexion)
            );
        }
    }

    public function getData(){
        // Convierte el array response a JSON
        return json_encode($this->response);
    }
}
?>