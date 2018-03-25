CREATE TABLE users (
    id int NOT NULL IDENTITY(1,1),
    ip_address varchar(45) NOT NULL,
    username varchar(100) NULL,
    password varchar(255) NOT NULL,
    email varchar(254) NOT NULL,
    activation_selector varchar(255),
    activation_code varchar(255),
    forgotten_password_selector varchar(255),
    forgotten_password_code varchar(255),
    forgotten_password_time int,
    remember_selector varchar(255),
    remember_code varchar(255),
    created_on int NOT NULL,
    last_login int,
    active int,
    first_name varchar(50),
    last_name varchar(50),
    company varchar(100),
    phone varchar(20),
  PRIMARY KEY(id),
  CONSTRAINT uc_email UNIQUE (email),
  CONSTRAINT uc_activation_selector UNIQUE (activation_selector),
  CONSTRAINT uc_forgotten_password_selector UNIQUE (forgotten_password_selector),
  CONSTRAINT uc_remember_selector UNIQUE (remember_selector),
  CONSTRAINT users_check_id CHECK(id >= 0),
  CONSTRAINT users_check_active CHECK(active >= 0)
);


CREATE TABLE groups (
    id int NOT NULL IDENTITY(1,1),
    [name] varchar(20) NOT NULL,
    description varchar(100) NOT NULL,
  PRIMARY KEY(id),
  CONSTRAINT groups_check_id CHECK(id >= 0)
);


CREATE TABLE users_groups (
    id int NOT NULL IDENTITY(1,1),
    user_id int NOT NULL,
	group_id int NOT NULL,
  PRIMARY KEY(id),
  CONSTRAINT uc_users_groups UNIQUE (user_id, group_id),
  CONSTRAINT users_groups_check_id CHECK(id >= 0),
  CONSTRAINT users_groups_check_group_id CHECK(group_id >= 0),
  CONSTRAINT users_groups_check_user_id CHECK(user_id >= 0)
);


SET IDENTITY_INSERT groups ON;
INSERT INTO groups (id, name, description) VALUES (1,'admin','Administrator');
INSERT INTO groups (id, name, description) VALUES (2,'members','General User');
SET IDENTITY_INSERT groups OFF;

SET IDENTITY_INSERT users ON;
INSERT INTO users (id, ip_address, username, password, email, activation_code, forgotten_password_code, created_on, last_login, active, first_name, last_name, company, phone)
	VALUES ('1','127.0.0.1','administrator','$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa','admin@admin.com','',NULL, DATEDIFF(s, '19700101', GETDATE()), DATEDIFF(s, '19700101', GETDATE()),'1','Admin','istrator','ADMIN','0');
SET IDENTITY_INSERT users OFF;

SET IDENTITY_INSERT users_groups ON;
INSERT INTO users_groups (id, user_id, group_id) VALUES (1,1,1);
INSERT INTO users_groups (id, user_id, group_id) VALUES (2,1,2);
SET IDENTITY_INSERT users_groups OFF;

CREATE TABLE login_attempts (
    id int NOT NULL IDENTITY(1,1),
    ip_address varchar(45),
    login varchar(100) NOT NULL,
	time int,
  PRIMARY KEY(id),
  CONSTRAINT login_attempts_check_id CHECK(id >= 0)
);
