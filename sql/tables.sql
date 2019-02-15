CREATE TABLE Posts (
	id int NOT NULL AUTO_INCREMENT,
	title varchar(256) NOT NULL,
	subtitle varchar(512),
	author varchar(256) NOT NULL,
	image varchar(512),
	date varchar(10) NOT NULL,
	body text NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Images (
	id int NOT NULL AUTO_INCREMENT,
	path varchar(128) NOT NULL,
	type varchar(8) NOT NULL,
	date varchar(10) NOT NULL,
	size int NOT NULL,
	width int NOT NULL,
	height int NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Users (
	id int NOT NULL AUTO_INCREMENT,
	username varchar(64) NOT NULL UNIQUE,
	password varchar(64) NOT NULL,
	name varchar(128) NOT NULL,
	email varchar(256) NOT NULL UNIQUE,
	role varchar(32) NOT NULL,
	status int NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Comments (
	id int NOT NULL AUTO_INCREMENT,
	post_id int NOT NULL,
	author varchar(256) NOT NULL,
	date varchar(10) NOT NULL,
	body text NOT NULL,
	PRIMARY KEY (id)
);
