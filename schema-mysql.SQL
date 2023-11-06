-- First Drop all tables that are already there. --
DROP TABLE IF EXISTS add_products;
DROP TABLE IF EXISTS Physipal_vendor;
DROP TABLE IF EXISTS Physipal_medibuddy;
DROP TABLE IF EXISTS Physipal_individual_records;
DROP TABLE IF EXISTS Physipal_records_collections;
DROP TABLE IF EXISTS Physipal_medications_taken;
DROP TABLE IF EXISTS Physipal_medications;
DROP TABLE IF EXISTS Physipal_users;
DROP TABLE IF EXISTS Physipal_allusers;

-- Now create tables --
CREATE TABLE IF NOT EXISTS Physipal_allusers(
	aid int primary key auto_increment,	
	email varchar(30) unique not null,
	phone varchar(30) unique not null,
	password varchar(255) not null,
	ucat varchar(20) not null
);
	

CREATE TABLE IF NOT EXISTS Physipal_users(
	uid int primary key auto_increment,
	aid integer not null 
		references Physipal_allusers(aid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	username varchar(30),
	name varchar(25),
	email varchar(30) unique not null,
	phone varchar(30) unique,
	joinedAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP(),
	country varchar(20),
	city varchar(20)
);

CREATE TABLE IF NOT EXISTS Physipal_medications(
	medicationid int primary key auto_increment,
	uid integer not null 
		references Phsyipal_users(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	medicationTitle varchar(150) not null,
	medicationTime varchar(8) not null,
	medicationFrequency integer not null,	-- Once, Daily and weekly respectively
	medicationDesc text,
	createdAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS Physipal_medications_taken(
	id int primary key auto_increment,
	medicationid int not null 
		references Physipal_medications(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	uid integer not null 
		references Physipal_users(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	taken_at timestamp default CURRENT_TIMESTAMP(),
	on_time boolean default 0,
	createdAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS Physipal_records_collections(
	collectionid int primary key auto_increment,
	uid integer not null 
		references Physipal_users(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	collectionName varchar(150),
	collectionDesc text,
	createdAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP()
);

-- One to Many: record_collection to individual_records --
CREATE TABLE IF NOT EXISTS Physipal_individual_records(
	recordid int primary key auto_increment,
	collectionid integer null 
		references Physipal_records_collections(collectionid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	uid integer not null 
		references Physipal_users(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	recordurl text,
	recordName varchar(150),
	recordDesc text ,
	createdAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS Physipal_appointments(
	appointmentid int primary key auto_increment,
	uid integer not null 
		references Physipal_users(uid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	appointmentTitle varchar(200) not null,
	appointmentDesc text,
	appointmentTime varchar(5),
	appointmentDate Date,
	createdAt timestamp default CURRENT_TIMESTAMP(),
	updatedAt timestamp default CURRENT_TIMESTAMP(),
	completed boolean default 0,
	completed_at timestamp
);

CREATE TABLE IF NOT EXISTS Physipal_vendor(
	vid int primary key auto_increment,
	aid integer not null 
		references Physipal_allusers(aid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	vendorname varchar(30),
	pharmacyname varchar(25),
	email varchar(30) unique not null,
	phone varchar(30) unique,
	location varchar (30)
);

CREATE TABLE IF NOT EXISTS Physipal_medibuddy(
	mid int primary key auto_increment,
	aid integer not null 
		references Physipal_allusers(aid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	medibuddyname varchar(30),
	username varchar(25),
	email varchar(30) unique not null,
	phone varchar(30) unique,
	address varchar (30)
);

CREATE TABLE IF NOT EXISTS Physipal_add_products(
	pid int primary key auto_increment,
	vid integer not null 
		references Physipal_vendors(vid) 
		ON DELETE CASCADE 
		ON UPDATE SET NULL,
	pname varchar(30),
	description varchar(125),
	category varchar(30) unique not null,
	price varchar(30),
	quantity integer
);

