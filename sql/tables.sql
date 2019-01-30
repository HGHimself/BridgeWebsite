CREATE TABLE Posts (
	id int NOT NULL AUTO_INCREMENT,
	title varchar(255) NOT NULL,
	subtitle varchar(511),
	author varchar(255) NOT NULL,
	image varchar(511),
	date varchar(10) NOT NULL,
	body text NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Images (
	id int NOT NULL AUTO_INCREMENT,
	type varchar(5) NOT NULL,
	date varchar(10) NOT NULL,
	size int NOT NULL,
	width int NOT NULL,
	height int NOT NULL,
	PRIMARY KEY (id)
);




	
