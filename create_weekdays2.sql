USE maps;

DROP TABLE IF EXISTS sunday_reverse;
CREATE TABLE sunday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS monday_reverse;
CREATE TABLE monday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS tuesday_reverse;
CREATE TABLE tuesday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS wednesday_reverse;
CREATE TABLE wednesday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS thursday_reverse;
CREATE TABLE thursday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS friday_reverse;
CREATE TABLE friday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);

DROP TABLE IF EXISTS saturday_reverse;
CREATE TABLE saturday_reverse (
	timeID DATETIME NOT NULL UNIQUE,
	traffic FLOAT,
	PRIMARY KEY (timeID)
);
