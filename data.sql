CREATE DEFINER=`root`@`localhost` FUNCTION `CalculateTotalPrice`(user_id INT) RETURNS decimal(10,2)
    DETERMINISTIC
BEGIN
	DECLARE total DECIMAL(10,2);
    
	SELECT 
    SUM(p.price * o.quantity)
INTO total FROM
    ct467.order o
        JOIN
    product p ON o.productId = p.id
WHERE
    o.userId = user_id;

    RETURN total;
END;




CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateOrder`(IN user_id INT, IN product_id INT, IN quantity INT)
BEGIN
	INSERT INTO ct467.order (userId, productId, quantity) VALUES (user_id, product_id, quantity);
END



