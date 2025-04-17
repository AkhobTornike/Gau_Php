INSERT INTO blog_categories (name, slug)
SELECT 'Technology', 'technology'
WHERE NOT EXISTS (SELECT 1 FROM blog_categories WHERE name = 'Technology');

INSERT INTO blog_categories (name, slug)
SELECT 'Travel', 'travel'
WHERE NOT EXISTS (SELECT 1 FROM blog_categories WHERE name = 'Travel');

INSERT INTO blog_categories (name, slug)
SELECT 'Food', 'food'
WHERE NOT EXISTS (SELECT 1 FROM blog_categories WHERE name = 'Food');

INSERT INTO blog_categories (name, slug)
SELECT 'Lifestyle', 'lifestyle'
WHERE NOT EXISTS (SELECT 1 FROM blog_categories WHERE name = 'Lifestyle');
INSERT INTO blog_categories (name, slug)
SELECT 'Photography', 'photography'
WHERE NOT EXISTS (SELECT 1 FROM blog_categories WHERE name = 'Photography');

