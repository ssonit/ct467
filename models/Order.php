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
            $sql = "INSERT INTO `order` (userId, productId, quantity) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId, $productId, $quantity]);
        }
        public function getOrders($userId) {
            $sql = "SELECT o.id AS order_id, o.*, p.* FROM `order` o JOIN `product` p ON o.productId = p.id WHERE o.userId = ? ORDER BY o.createdAt DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        }
        public function deleteOrder($id){
            $sql = "DELETE FROM `order` WHERE order.id =?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll();
        }
    }



?>