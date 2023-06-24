
DROP DATABASE IF EXISTS flower_shop_db;
CREATE DATABASE flower_shop_db;
USE flower_shop_db;  -- MySQL command

-- create the tables

CREATE TABLE Categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE Products (
  productID		   INT(11)       NOT NULL AUTO_INCREMENT,
  categoryID	   INT(255)   NOT NULL,
  flowerType       VARCHAR(25)   NOT NULL UNIQUE,
  price      	   DECIMAL(10,2) NOT NULL,
  discount		   INT(10),
  flowerDescription    VARCHAR(255) NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE Orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database

INSERT INTO Categories VALUES
(1, 'Local'),
(2, 'Imported');


INSERT INTO Products VALUES
(1, 2, 'Rose', '4.00' , 50, 'Stems are usually prickly and their glossy, green leaves have toothed edges, Rose flowers vary in size and shape, and their flowers burst in color from pastel pink, peach, yellow, orange and classical red.'),
(2, 2, 'Lily', '10.00', 50, 'Plants with leafy stems, scaly bulbs, usually narrow leaves, and solitary or clustered flowers. The flowers consist of six petal-like segments, which may form the shape of a trumpet.'),
(3, 2,  'Tulip', '2.00', 50, 'Usually large, showy and brightly coloured, generally red, pink, yellow, or white. They often have a different coloured blotch at the base of the tepals.'),
(4, 1, 'Orchid', '8.00', 50, 'Colorful, fragrant and can vary in sizes from microscopic plants to long vines to gigantic plants .'),
(5, 2, 'Carnation', '3.00', 50, 'Small to medium flowers, averaging 3 to 6 centimeters in diameter, and have a round, layered, and slightly ruffled appearance.'),
(6, 1, 'Freesia', '15.00', 50, 'Have grassy foliage that arises from underground corms (bulblike structures). They bear wiry spikes of lemon-scented flowers in white, yellow, orange, and blue.'),
(7, 1, 'Pervian Lily', '5.00', 50, 'Summer blooms extending up from clustered foliage of lance-shaped leaves closely resemble lily flowers.'),
(8, 2, 'Chysanthemum', '8.00', 50, 'Have many-branched plant bearing large, single or double flowers on the end of each stem.'),
(9, 2,  'Gladiolus', '11.00', 50, 'Gladioli grow from round, symmetrical corms that are enveloped in several layers of brownish, fibrous tunics.'),
(10, 1, 'Anemone', '12.00', 50, 'The petals are small and round and most flower heads have about five or six petals.'),
(11, 1, 'Lavender', '10.00', 50, 'Purple flowers are sparsely arranged on spikes at the tips of long bare stalks and produce small nutlet fruits.'),
(12, 1, 'Daisy', '2.00', 50, 'A rosette of small, thin white petals surrounding a bright yellow centre. These are supported by a single stem which grows from a group of dark green rounded leaves.'),
(13, 2, 'Dahlia', '4.00', 50, 'Flowers may be white, yellow, red, or purple in colour. Wild species of dahlias have both disk and ray flowers in the flowering heads'),
(14, 2, 'Iris', '5.00', 50, 'They have long, flowering stems which may be simple or branched, solid or hollow, and flattened or have a circular cross-section.'),
(15, 2, 'Hyacinth', '4.00', 50, 'Hyacinths are renowned for their extremely fragrant, star-shaped flowers in shades of red, pink, white, yellow, or blue that are borne on dense spikes over a cluster of strap-shaped leaves.');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON flower_shop_db.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON Products
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';
