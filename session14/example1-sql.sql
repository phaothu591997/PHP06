SELECT * FROM products
INNER JOIN categories
WHERE products.dateAdded like '2014-07-%' 
AND products.listPrice > '300'

-- câu 3
SELECT * FROM products 
INNER JOIN categories
ON products.categoryID= categories.categoryID
WHERE products.productName LIKE '%o%'
AND categories.categoryName ='Basses'
-- câu 4
SELECT * FROM products
INNER JOIN orderitems 
ON products.productID = orderitems.productID
INNER JOIN orders 
ON orderitems.orderID = orders.orderID
INNER JOIN customers 
ON orders.customerID = customers.customerID
WHERE customers.emailAddress LIKE '%gmail.com'

