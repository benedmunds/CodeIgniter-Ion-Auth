CREATE TABLE "users" (
    "id" SERIAL NOT NULL,
    "group_id" int NOT NULL,
    "ip_address" char(16) NOT NULL,
    "username" varchar(15) NOT NULL,
    "password" varchar(40) NOT NULL,
    "salt" varchar(40),
    "email" varchar(254) NOT NULL,
    "activation_code" varchar(40),
    "forgotten_password_code" varchar(40),
    "remember_code" varchar(40),
    "created_on" int NOT NULL,
    "last_login" int,
    "active" int4,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0),
  CONSTRAINT "check_group_id" CHECK(group_id >= 0),
  CONSTRAINT "check_active" CHECK(active >= 0)
);


CREATE TABLE "meta" (
    "id" SERIAL NOT NULL,
    "user_id" int,
    "first_name" varchar(50),
    "last_name" varchar(50),
    "company" varchar(100),
    "phone" varchar(20),
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0),
  CONSTRAINT "check_user_id" CHECK(user_id >= 0)
);


CREATE TABLE "groups" (
    "id" SERIAL NOT NULL,
    "name" varchar(20) NOT NULL,
    "description" varchar(100) NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);


INSERT INTO groups (id, name, description) VALUES
    (1,'admin','Administrator'),
    (2,'members','General User');
    
INSERT INTO meta (id, user_id, first_name, last_name, company, phone) VALUES
    ('1','1','Admin','istrator','ADMIN','0');
    
INSERT INTO users (id, group_id, ip_address, username, password, salt, email, activation_code, forgotten_password_code, created_on, last_login, active) VALUES
    ('1','1','127.0.0.1','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,'1268889823','1268889823','1'); 
