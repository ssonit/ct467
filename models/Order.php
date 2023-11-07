<?php

    class Order {

        private $pdo;
        private $id;

        public function getId() {
            return $this->id;
        }
    
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function create($userId, $productId, $quantity) {
            $sql = "CALL CreateOrder(?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId, $productId, $quantity]);
        }
        public function getOrders($userId, $sort = 'desc') {
            $sql = "";
            if($sort === 'desc') {
                $sql = "SELECT o.id AS order_id, o.createdAt as order_createdAt, o.*, p.* FROM `order` o JOIN 
                `product` p ON o.productId = p.id WHERE o.userId = ? ORDER BY o.createdAt DESC";
            }
            else {
                $sql = "SELECT o.id AS order_id, o.createdAt as order_createdAt, o.*, p.* FROM `order` o JOIN 
                `product` p ON o.productId = p.id WHERE o.userId = ? ORDER BY o.createdAt ASC";
            }
           
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        }
        public function getOrderTotals($userId) {
            $sql = "SELECT CalculateTotalPrice(?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchColumn();
        }
        public function deleteOrder($id){
            $sql = "DELETE FROM `order` WHERE order.id =?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        }
    }
    



?>