-- Stored Procedures for blog_categories

DELIMITER //

CREATE PROCEDURE GetAllBlogCategories()
BEGIN
    SELECT category_id, name, slug FROM blog_categories;
END //

CREATE PROCEDURE GetBlogCategoryById(IN catId INT UNSIGNED)
BEGIN
    SELECT category_id, name, slug FROM blog_categories WHERE category_id = catId;
END //

CREATE PROCEDURE AddBlogCategory(IN catName VARCHAR(100), IN catSlug VARCHAR(255))
BEGIN
    INSERT INTO blog_categories (name, slug) VALUES (catName, catSlug);
END //

CREATE PROCEDURE UpdateBlogCategory(IN catId INT UNSIGNED, IN catName VARCHAR(100), IN catSlug VARCHAR(255))
BEGIN
    UPDATE blog_categories SET name = catName, slug = catSlug WHERE category_id = catId;
END //

CREATE PROCEDURE DeleteBlogCategory(IN catId INT UNSIGNED)
BEGIN
    DELETE FROM blog_categories WHERE category_id = catId;
END //

-- Stored Procedures for products

CREATE PROCEDURE GetAllProducts()
BEGIN
    SELECT product_id, name, slug, description, price, image FROM products;
END //

CREATE PROCEDURE GetProductById(IN prodId INT UNSIGNED)
BEGIN
    SELECT product_id, name, slug, description, price, image FROM products WHERE product_id = prodId;
END //

CREATE PROCEDURE AddProduct(IN prodName VARCHAR(255), IN prodSlug VARCHAR(255), IN prodDesc TEXT, IN prodPrice DECIMAL(10,2), IN prodImage VARCHAR(255))
BEGIN
    INSERT INTO products (name, slug, description, price, image) VALUES (prodName, prodSlug, prodDesc, prodPrice, prodImage);
END //

CREATE PROCEDURE UpdateProduct(IN prodId INT UNSIGNED, IN prodName VARCHAR(255), IN prodSlug VARCHAR(255), IN prodDesc TEXT, IN prodPrice DECIMAL(10,2), IN prodImage VARCHAR(255))
BEGIN
    UPDATE products SET name = prodName, slug = prodSlug, description = prodDesc, price = prodPrice, image = prodImage WHERE product_id = prodId;
END //

CREATE PROCEDURE DeleteProduct(IN prodId INT UNSIGNED)
BEGIN
    DELETE FROM products WHERE product_id = prodId;
END //

-- Stored Procedures for tags

CREATE PROCEDURE GetAllTags()
BEGIN
    SELECT tag_id, name, slug FROM tags;
END //

CREATE PROCEDURE GetTagById(IN tId INT UNSIGNED)
BEGIN
    SELECT tag_id, name, slug FROM tags WHERE tag_id = tId;
END //

CREATE PROCEDURE AddTag(IN tName VARCHAR(50), IN tSlug VARCHAR(50))
BEGIN
    INSERT INTO tags (name, slug) VALUES (tName, tSlug);
END //

CREATE PROCEDURE UpdateTag(IN tId INT UNSIGNED, IN tName VARCHAR(50), IN tSlug VARCHAR(50))
BEGIN
    UPDATE tags SET name = tName, slug = tSlug WHERE tag_id = tId;
END //

CREATE PROCEDURE DeleteTag(IN tId INT UNSIGNED)
BEGIN
    DELETE FROM tags WHERE tag_id = tId;
END //

-- Stored Procedures for users (basic - you might want more complex ones for security)

CREATE PROCEDURE GetAllUsers()
BEGIN
    SELECT user_id, username, email, first_name, last_name, role FROM users;
END //

CREATE PROCEDURE GetUserById(IN uId INT UNSIGNED)
BEGIN
    SELECT user_id, username, email, first_name, last_name, role FROM users WHERE user_id = uId;
END //

CREATE PROCEDURE AddUser(IN uUsername VARCHAR(50), IN uEmail VARCHAR(100), IN uPassword VARCHAR(255), IN uFirstName VARCHAR(50), IN uLastName VARCHAR(50), IN uRole ENUM('admin', 'author', 'customer'))
BEGIN
    INSERT INTO users (username, email, password, first_name, last_name, role) VALUES (uUsername, uEmail, uPassword, uFirstName, uLastName, uRole);
END //

CREATE PROCEDURE UpdateUser(IN uId INT UNSIGNED, IN uUsername VARCHAR(50), IN uEmail VARCHAR(100), IN uPassword VARCHAR(255), IN uFirstName VARCHAR(50), IN uLastName VARCHAR(50), IN uRole ENUM('admin', 'author', 'customer'))
BEGIN
    UPDATE users SET username = uUsername, email = uEmail, password = uPassword, first_name = uFirstName, last_name = uLastName, role = uRole WHERE user_id = uId;
END //

CREATE PROCEDURE DeleteUser(IN uId INT UNSIGNED)
BEGIN
    DELETE FROM users WHERE user_id = uId;
END //

DELIMITER ;