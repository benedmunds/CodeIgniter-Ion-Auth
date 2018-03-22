CREATE TABLE "users" (
    "id" SERIAL NOT NULL,
    "ip_address" varchar(45),
    "username" varchar(100) NULL,
    "password" varchar(255) NOT NULL,
    "email" varchar(254) NOT NULL,
    "activation_selector" varchar(255),
    "activation_code" varchar(255),
    "forgotten_password_selector" varchar(255),
    "forgotten_password_code" varchar(255),
    "forgotten_password_time" int,
    "remember_selector" varchar(255),
    "remember_code" varchar(255),
    "created_on" int NOT NULL,
    "last_login" int,
    "active" int4,
    "first_name" varchar(50),
    "last_name" varchar(50),
    "company" varchar(100),
    "phone" varchar(20),
  PRIMARY KEY("id"),
  CONSTRAINT "uc_email" UNIQUE ("email"),
  CONSTRAINT "uc_activation_selector" UNIQUE ("activation_selector"),
  CONSTRAINT "uc_forgotten_password_selector" UNIQUE ("forgotten_password_selector"),
  CONSTRAINT "uc_remember_selector" UNIQUE ("remember_selector"),
  CONSTRAINT "check_id" CHECK(id >= 0),
  CONSTRAINT "check_active" CHECK(active >= 0)
);


CREATE TABLE "groups" (
    "id" SERIAL NOT NULL,
    "name" varchar(20) NOT NULL,
    "description" varchar(100) NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);


CREATE TABLE "users_groups" (
    "id" SERIAL NOT NULL,
    "user_id" integer NOT NULL,
    "group_id" integer NOT NULL,
  PRIMARY KEY("id"),
  CONSTRAINT "uc_users_groups" UNIQUE (user_id, group_id),
  CONSTRAINT "users_groups_check_id" CHECK(id >= 0),
  CONSTRAINT "users_groups_check_user_id" CHECK(user_id >= 0),
  CONSTRAINT "users_groups_check_group_id" CHECK(group_id >= 0)
);


INSERT INTO groups (id, name, description) VALUES
    (1,'admin','Administrator'),
    (2,'members','General User');

INSERT INTO users (ip_address, username, password, email, activation_code, forgotten_password_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES
    ('127.0.0.1','administrator','$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa','admin@admin.com','',NULL,'1268889823','1268889823','1','Admin','istrator','ADMIN','0');

INSERT INTO users_groups (user_id, group_id) VALUES
    (1,1),
    (1,2);

CREATE TABLE "login_attempts" (
    "id" SERIAL NOT NULL,
    "ip_address" varchar(45),
    "login" varchar(100) NOT NULL,
    "time" int,
  PRIMARY KEY("id"),
  CONSTRAINT "check_id" CHECK(id >= 0)
);
