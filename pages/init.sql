-- create tables

CREATE TABLE plants (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  plant_name	TEXT NOT NULL,
  genus_species     TEXT NOT NULL UNIQUE,
  plant_id      TEXT NOT NULL UNIQUE,
  constructive	INTEGER NOT NULL,
  physical	INTEGER NOT NULL,
  imaginative	INTEGER NOT NULL,
  restorative	INTEGER NOT NULL,
  expressive	INTEGER NOT NULL,
  rules	INTEGER NOT NULL,
  bio	INTEGER NOT NULL,
  classification_id	INTEGER NOT NULL,
  lifespan_id	INTEGER NOT NULL,
  range_id	INTEGER NOT NULL,
  image_type TEXT NOT NULL,
  FOREIGN KEY (classification_id)
    REFERENCES classifications(id)
  FOREIGN KEY (lifespan_id)
    REFERENCES lifespans(id)
  FOREIGN KEY (range_id)
    REFERENCES ranges(id)
);

CREATE TABLE users (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  name TEXT NOT NULL,
  username	TEXT NOT NULL UNIQUE,
  password	TEXT NOT NULL
);

CREATE TABLE sessions (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  user_id	TEXT NOT NULL,
  session TEXT NOT NULL UNIQUE,
  last_login	TEXT NOT NULL,
    FOREIGN KEY (user_id)
    REFERENCES users(id)
);

CREATE TABLE classifications (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  classification	TEXT NOT NULL
);

CREATE TABLE lifespans (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  lifespan	TEXT NOT NULL
);

CREATE TABLE ranges (
  id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  hardiness	TEXT NOT NULL
);


-- initial seed data

INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (1, 'Pink Muhly Grass', 'Muhlenbergia capillaris', 'GA_13', 1, 1, 0, 0, 0, 0, 1, 2, 1, 7,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (2, 'Feather Reed Grass', 'Calamagrostis x acutiflora', 'GA_01', 1, 1, 1, 1, 0, 1, 1, 2, 1, 6,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (3, 'Smooth Shadbush', 'Amelanchier laevis', 'SH_32', 0, 1, 1, 0, 0, 0, 1, 1, 1, 5,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (4, 'Chestnut Oak', 'Quercus montana', 'TR_29', 1, 1, 0, 0, 0, 0, 1, 4, 1, 5,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (5, 'Sideoats Grama', 'Bouteloua curipendula', 'GA_20', 1, 1, 1, 1, 0, 0, 1, 2, 1, 6,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (6, 'Feverfew', 'Tanasetum parthenium', 'GR_14', 1, 1, 0, 1, 0, 0, 1, 6, 1, 7,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (7, 'Prairie Cord Grass', 'Spartina pectinata', 'GA_02', 1, 1, 0, 1, 0, 0, 1, 2, 0, 8,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (8, 'Christmas Fern', 'Polystichum acrostichoides', 'FE_01', 0, 0, 1, 0, 0, 0, 1, 7, 1, 3,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (9, 'Climbing Hydrangea', 'Hydrangea anomala', 'VI_15', 0, 1, 0, 1, 0, 0, 1, 3, 1, 0,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (10, 'New England Aster', 'Aster novae angliae', 'FL_03', 0, 0, 1, 0, 0, 0, 1, 5, 1, 6,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (11, 'Nannyberry', 'Viburnum lentago', 'SH_34', 0, 1, 0, 0, 0, 0, 1, 1, 1, 1,'jpg');
INSERT INTO plants (id, plant_name, genus_species, plant_id, constructive, physical, imaginative, restorative, expressive, rules, bio, classification_id, lifespan_id, range_id, image_type) VALUES (12, 'Hyssop', 'Hyssopus officinalis', 'FL_30', 0, 1, 1, 0, 0, 0, 1, 5, 0, 6,'jpg');

INSERT INTO users (id, name, username, password) VALUES (1, 'Administrator', 'admin', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.');

INSERT INTO classifications (id, classification) VALUES (0, '');
INSERT INTO classifications (id, classification) VALUES (1, 'Shrub');
INSERT INTO classifications (id, classification) VALUES (2, 'Grass');
INSERT INTO classifications (id, classification) VALUES (3, 'Vine');
INSERT INTO classifications (id, classification) VALUES (4, 'Tree');
INSERT INTO classifications (id, classification) VALUES (5, 'Flower');
INSERT INTO classifications (id, classification) VALUES (6, 'Groundcovers');
INSERT INTO classifications (id, classification) VALUES (7, 'Other');

INSERT INTO lifespans (id, lifespan) VALUES (0, '-');
INSERT INTO lifespans (id, lifespan) VALUES (1, 'Perennial');
INSERT INTO lifespans (id, lifespan) VALUES (2, 'Annual');

INSERT INTO ranges (id, hardiness) VALUES (0, '-');
INSERT INTO ranges (id, hardiness) VALUES (1, '2-8');
INSERT INTO ranges (id, hardiness) VALUES (2, '3-7');
INSERT INTO ranges (id, hardiness) VALUES (3, '3-8');
INSERT INTO ranges (id, hardiness) VALUES (4, '3-9');
INSERT INTO ranges (id, hardiness) VALUES (5, '4-8');
INSERT INTO ranges (id, hardiness) VALUES (6, '4-9');
INSERT INTO ranges (id, hardiness) VALUES (7, '5-8');
INSERT INTO ranges (id, hardiness) VALUES (8, '5-9');
