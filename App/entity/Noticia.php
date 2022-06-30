<?php

namespace App\entity;

use \App\db\database;
use \PDO;

class Noticia
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $nome;


    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa ou não
     * @var timestamp
     */
    public $data_compra;

    /**
     * Data de publicação da vaga
     * @var int
     */
    public $nota_fiscal;

    /**
     * Descrição da vaga (pode conter html)
     * @var int
     */
    public $preco;

    /**
    * Descrição da vaga (pode conter html)
    * @var int
    */
   public $quantidade;

    /**
     * Função para cadastrar a vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        // Definir a data 
        $this->data = date('Y-m-d H:i:s');
        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // Inserir a vaga no bano e retornar o ID
        $objdatabase = new database('produtos');

        $this->id = $objdatabase->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data_compra' => $this->data_compra,
            'nota_fiscal' => $this->nota_fiscal,
            'preco' => $this->preco,
            'quantidade' => $this->quantidade,
            
            
        ]);

        return true;
    }


    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @where
     * @params string @order
     * @params string $limit
     * @return array
     */

    public static function getNoticia($where = null, $order = null, $limit = null)
    {
        $objdatabase = new database('produtos');

        return ($objdatabase)->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter as vagas do banco de dados
     * @params string @id
     * @return Noticia
     */
    public static function getNoticias($id)
    {
        $objdatabase = new database('produtos');

        return ($objdatabase)->select('id = ' . $id)->fetchObject(self::class);
    }
    /**
     * Função para excluir vagas no banco
     * @return boolean
     */
    public function excluir()
    {
        $objdatabase = new database('produtos');

        return ($objdatabase)->delete('id = ' . $this->id);
    }

    /**
     * Função para atualizar a vaga do banco de dados
     * @return boolean
     */
    public function atualizar() {
        //Definir a data
        // $this->data = date('Y-m-d H:i:s');

        $objDatabase = new Database('produtos');

        return ($objDatabase)->update('id = ' . $this->id, [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data_compra' => $this->data_compra,
            'nota_fiscal' => $this->nota_fiscal,
            'preco' => $this->preco,
            'quantidade' => $this->quantidade,
        ]);
    }
    
};
 
if(!session_id()){
	session_start();
}


 
 
	class Cart{
		
		protected $cart_items=array();
		
		public function __construct(){
			
			if(!isset($_SESSION["cart"])){
				$_SESSION["cart"]=[];
			}
			
			$this->cart_items=$_SESSION["cart"];
		}
		
		#Pega todos os ids dos itens
		public function get_ids(){
			$ids=[];
			foreach($this->cart_items as $item){
				$ids[]=$item["id"];
			}
			return $ids;
		}
		
		
		#add item ao cart
		public function add_to_cart($item=[]){
			if(isset($item["id"],$item["name"],$item["preco_produto"],$item["qty"],$item["total"])){
				
				#Check Product already exists
				$ids=$this->get_ids();
				if(in_array($item["id"],$ids)){
					
					#update qty and total
					$this->cart_items[$item["id"]]["qty"]+=$item["qty"];
					$this->cart_items[$item["id"]]["total"]=$this->cart_items[$item["id"]]["qty"]*$item["preco_produto"];
				}else{
					
					#add item ao cart
					$this->cart_items[$item["id"]]=$item;
				}
				
				$this->commit();
				return true;
			}else{
				return false;
			}
		}
		
		#update cart qty
		public function update_cart($item=[]){
			$this->cart_items[$item["id"]]["qty"]=$item["qty"];
			$this->cart_items[$item["id"]]["total"]=$this->cart_items[$item["id"]]["qty"]*$this->cart_items[$item["id"]]["preco_produto"];
			$this->commit();
			return true;
		}
		
		#remove item from cart
		public function remove($id){
			unset($this->cart_items[$id]);
			$this->commit();
		}
		
		#get cart total
		public function get_cart_total(){
			#update cart total
			$sum=0;
			foreach($this->cart_items as $item){
				$sum+=$item["total"];
			}
			return $sum;
		}
		
		#get cart item count
		public function get_cart_count(){
			return count($this->cart_items);
		}
		
		#update values to session
		public function commit(){
			$_SESSION["cart"]=$this->cart_items;
		}
		
		#destroy cart
		public function destroy(){
			$this->cart_contents = array('cart_total' => 0, 'cart_items_count' => 0); 
			unset($_SESSION["cart"]);
		}
		
		#get single item from cart
		public function get_item($id){
			return $this->cart_items[$id];
		}
		
		#get all items from cart
		public function get_all_items(){
			return $this->cart_items;
		}
	}


?>
