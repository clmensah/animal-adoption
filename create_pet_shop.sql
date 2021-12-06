USE pet_shop;  -- Select the database.

drop table users;
create table users (
	userID		int not null auto_increment,
	firstName	varchar(255) not null,
	lastName	varchar(255) not null,
	email		varchar(255) not null,
	password	varchar(255) not null,
	primary key (userID)
);

drop table animals;
create table animals (
	animalID    int not null auto_increment,
	name		varchar(255) not null,
	picture		varchar(255),
	species		varchar(255) not null,
	breed		varchar(255) not null,
	gender		varchar(255) not null,
	age		    varchar(255) not null,
	size		varchar(255) not null,
	personality	varchar(255) not null,
	description	varchar(500),
	primary key (animalID)
);

drop table favorite_animals;
create table favorite_animals (
	userID		int not null,
	animalID	int not null,
	primary key (userID, animalID)
);
GO
