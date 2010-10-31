CREATE TABLE users (
    id int NOT NULL IDENTITY(1,1),
    group_id int NOT NULL,
    ip_address char(16) NOT NULL,
    username varchar(15) NOT NULL,
    password varchar(40) NOT NULL,
    salt varchar(40),
    email varchar(100) NOT NULL,
    activation_code varchar(40),
    forgotten_password_code varchar(40),
    remember_code varchar(40),
    created_on datetime NOT NULL,
    last_login datetime,
    active int,
  PRIMARY KEY(id),
  CONSTRAINT users_check_id CHECK(id >= 0),
  CONSTRAINT users_check_group_id CHECK(group_id >= 0),
  CONSTRAINT users_check_active CHECK(active >= 0)
);


CREATE TABLE meta (
    id int NOT NULL IDENTITY(1,1),
    [user_id] int,
    first_name varchar(50),
    last_name varchar(50),
    company varchar(100),
    phone varchar(20),
  PRIMARY KEY(id),
  CONSTRAINT meta_check_id CHECK(id >= 0),
  CONSTRAINT meta_check_user_id CHECK(user_id >= 0)
);


CREATE TABLE groups (
    id int NOT NULL IDENTITY(1,1),
    [name] varchar(20) NOT NULL,
    description varchar(100) NOT NULL,
  PRIMARY KEY(id),
  CONSTRAINT groups_check_id CHECK(id >= 0)
);


SET IDENTITY_INSERT groups ON;
INSERT INTO groups (id, name, description) VALUES (1,'admin','Administrator');
INSERT INTO groups (id, name, description) VALUES (2,'members','General User');
SET IDENTITY_INSERT groups OFF;

SET IDENTITY_INSERT meta ON;
INSERT INTO meta (id, user_id, first_name, last_name, company, phone) VALUES ('1','1','Admin','istrator','ADMIN','0');
SET IDENTITY_INSERT meta OFF;

SET IDENTITY_INSERT users ON;
INSERT INTO users (id, group_id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, created_on, last_login, active) 
	VALUES ('1','1','127.0.0.1','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL, GETDATE(), GETDATE(),'1'); 
SET IDENTITY_INSERT users OFF;