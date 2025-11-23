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

            if(!empty($rows)) {
                // SIEMPRE devolver un array de productos
                $this->response = array();
                foreach($rows as $num => $row) {
                    $this->response[] = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'marca' => $row['marca'],
                        'modelo' => $row['modelo'],
                        'precio' => $row['precio'],
                        'detalles' => $row['detalles'],
                        'unidades' => $row['unidades'],
                        'imagen' => $row['imagen']
                    );
                }
            } else {
                // Cuando no hay resultados, devolver array vacío
                $this->response = array();
            }
            $result->free();
        } else {
            $this->response = array(
                'status' => 'error',
                'message' => 'Error al obtener productos'
            );
        }
    }

    public function search($producto){
        $this->response = array();
        
        if( isset($producto['search']) && !empty($producto['search']) ) {
            $search = $this->conexion->real_escape_string($producto['search']);
            
            $sql = "SELECT * FROM productos WHERE 
                    (id = '$search' OR 
                    nombre LIKE '%$search%' OR 
                    marca LIKE '%$search%' OR 
                    detalles LIKE '%$search%') 
                    AND eliminado = 0";
            
            if ( $result = $this->conexion->query($sql) ) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!empty($rows)) {
                    // SIEMPRE devolver un array de productos
                    $this->response = array();
                    foreach($rows as $num => $row) {
                        $this->response[] = array(
                            'id' => $row['id'],
                            'nombre' => $row['nombre'],
                            'marca' => $row['marca'],
                            'modelo' => $row['modelo'],
                            'precio' => $row['precio'],
                            'detalles' => $row['detalles'],
                            'unidades' => $row['unidades'],
                            'imagen' => $row['imagen']
                        );
                    }
                } else {
                    // Cuando no hay resultados, devolver array vacío
                    $this->response = array();
                }
                $result->free();
            } else {
                $this->response = array(
                    'status' => 'error',
                    'message' => 'Error en la búsqueda'
                );
            }
        } else {
            $this->response = array(
                'status' => 'error', 
                'message' => 'Término de búsqueda no proporcionado'
            );
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
    
    if (empty($name)) {
        $this->response = array();
        return;
    }
    
    $sql = "SELECT * FROM productos WHERE nombre = '{$name}' AND eliminado = 0";
    $result = $this->conexion->query($sql);
    
    if ($result && $result->num_rows > 0) {
        // Si encuentra productos, devolver array con los productos encontrados
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $this->response = array();
        foreach($rows as $row) {
            $this->response[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'precio' => $row['precio'],
                'detalles' => $row['detalles'],
                'unidades' => $row['unidades'],
                'imagen' => $row['imagen']
            );
        }
        } else {
            // Si no encuentra productos, devolver array vacío
            $this->response = array();
        }
        
        if ($result) $result->free();
    }

    public function getData(){
        // Convierte el array response a JSON
        return json_encode($this->response);
    }
}
?>