use nwind;

SELECT CustomerID AS Clave, CompanyName AS Nombre, 
Country AS País, City AS Ciudad 
FROM Customers 
WHERE (Country = 'Mexico' OR Country = 'Brazil') AND Fax IS NULL 
ORDER BY Country, City;

SELECT OrderID AS orderId, OrderDate, ShipCountry 
AS shipcountry, ShipCity AS shipcity
FROM Orders
WHERE YEAR(OrderDate) = 1996
AND ((ShipCountry = 'France' AND ShipCity = 'Reims')
OR (ShipCountry = 'USA' AND ShipCity != 'Seattle'));


SELECT Products.ProductID AS 'Clave del producto',
Products.ProductName AS 'Nombre del producto',
Suppliers.CompanyName AS 'Nombre del proveedor',
Categories.CategoryName AS 'Nombre de la categoría'
FROM Products
JOIN Suppliers ON Products.SupplierID = Suppliers.SupplierID
JOIN Categories ON Products.CategoryID = Categories.CategoryID
WHERE Products.CategoryID IN (1, 3, 5);


SELECT Orders.OrderID AS 'Clave de la orden',
Employees.LastName AS 'Apellido del empleado',
Employees.FirstName AS 'Nombre del empleado',
Orders.OrderDate AS 'Fecha de la orden'
FROM Orders
JOIN Employees 
ON Orders.EmployeeID = Employees.EmployeeID
WHERE YEAR(Orders.OrderDate) = 1997
AND MONTH(Orders.OrderDate) = 3
AND DAY(Orders.OrderDate) <= 15;


SELECT Products.ProductID AS 'Clave del producto',
Products.ProductName AS 'Nombre del producto',
Products.UnitPrice AS 'Precio del producto',
Suppliers.CompanyName AS 'Nombre del proveedor',
Suppliers.Country AS 'País del proveedor'
FROM Products
JOIN Suppliers 
ON Products.SupplierID = Suppliers.SupplierID
WHERE (Suppliers.Country = 'Spain' 
OR Suppliers.Country = 'Italy')
AND Products.UnitPrice > 20;

create view paises as
SELECT o.OrderID AS 'Clave de la orden', o.OrderDate 
AS 'Fecha de la orden', e.FirstName AS 'Nombre
del empleado', e.LastName AS 'Apellido del empleado', c.CompanyName 
AS 'Nombre del cliente'
FROM Orders o
JOIN Employees e ON o.EmployeeID = e.EmployeeID
JOIN Customers c ON o.CustomerID = c.CustomerID
WHERE c.Country IN ('Mexico', 'Canada', 'USA');

CREATE VIEW italia AS
SELECT p.ProductID AS 'Clave del producto', 
       p.ProductName AS 'Nombre del producto',
       p.UnitPrice AS 'Precio del producto', 
       s.CompanyName AS 'Nombre del proveedor', 
       s.Country AS 'País del proveedor' 
FROM Products p
JOIN Suppliers s ON p.SupplierID = s.SupplierID
WHERE (s.Country = 'Spain' OR s.Country = 'Italy')
AND p.UnitPrice > 20;

