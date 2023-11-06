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
        public function getOrders($userId) {
            $sql = "SELECT o.id AS order_id, o.createdAt as order_createdAt, o.*, p.* FROM `order` o JOIN `product` p ON o.productId = p.id WHERE o.userId = ? ORDER BY o.createdAt DESC";
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
    }
    



?>