CREATE TABLE IF NOT EXISTS post_tags (
    post_id INT UNSIGNED, 
    tag_id INT UNSIGNED,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE
)