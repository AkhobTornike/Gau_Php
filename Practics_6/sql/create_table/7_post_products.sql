CREATE TABLE IF NOT EXISTS post_products (
    post_id INT UNSIGNED, 
    product_id INT UNSIGNED,
    PRIMARY KEY (post_id, product_id),
    FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
)