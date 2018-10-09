<?php 
Class Cart{
    
    Public $articulos=array();
    Public $id="";
    Public $cantidad="";
    // Constructor de la clase Carro
    function __construct($id,$cantidad){
        $this->id=$id;
        $this->cantidad=$cantidad;
    }
    // función que se encarga de gestionar la inserción de articulos
    function meter_articulos($id,$cantidad){
        if(array_key_exists($id,$this->articulos)){
            $this->articulos[$id]+=$cantidad;
        }
        else
        {
            $this->articulos[$id]=$cantidad;
        }
    }
    // función que se encarga de gestionar la extracción de articulos
    function sacar_articulos($id,$cantidad){
        if(array_key_exists($id,$this->articulos))
        {
            $this->articulos[$id]-=$cantidad;
            if($this->articulos[$id]<=0)
            {
                unset($this->articulos[$id]);
            }
        }
    }
}

// Clase cliente
Class Cliente extends Cart {
    Public $nombre="";
    Public $pedido=array();
    // Constructor que crea el carrito para la clase cliente
    function __construct()
    {
        $this->pedido=new Cart(10,1);
        $this->pedido->meter_articulos($this->pedido->id,$this->pedido->cantidad);
    }
    // Función que da nombre al cliente
    function presentar($nombre)
    {
        $this->nombre=$nombre;
    }
}
$cliente=new Cliente();
$cliente->presentar("Alejandro");
$kilo=new Cart(1,6);
$cliente->pedido->meter_articulos($kilo->id,$kilo->cantidad);
$cliente->pedido->meter_articulos($kilo->id, 6);
echo json_encode($cliente);
?>
