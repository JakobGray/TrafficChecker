'''
Creates maps database and adds a times table.
Gives permissions to mgs_user.
'''

DROP DATABASE IF EXISTS maps;
CREATE DATABASE maps;
USE maps;

DROP TABLE IF EXISTS times;
CREATE TABLE times (
	timeID DATETIME NOT NULL UNIQUE,
	traffic int,
	PRIMARY KEY (timeID)
);

-- Starting values for testing --
/* 
INSERT INTO times VALUES
('2017-06-03 12:00:00', 25),
('2017-06-03 13:00:00', 26),
('2017-06-03 14:00:00', 27),
('2017-06-03 15:00:00', 30),
('2017-06-03 16:00:00', 34),
('2017-06-03 17:00:00', 40),
('2017-06-03 18:00:00', 35),
('2017-06-03 19:00:00', 30),
('2017-06-03 20:00:00', 26),
('2017-06-03 21:00:00', 25),
('2017-06-03 22:00:00', 24),
('2017-06-03 23:00:00', 24); */

GRANT SELECT, INSERT, DELETE, UPDATE
ON maps.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';