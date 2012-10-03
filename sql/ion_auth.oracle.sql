CREATE SEQUENCE users_seq
  START WITH 1
  INCREMENT BY 1
/

CREATE TABLE users 
(
  id NUMBER (8) NOT NULL , 
  ip_address VARCHAR2 (39) NOT NULL , 
  username VARCHAR2 (100) NOT NULL , 
  password VARCHAR2 (80) NOT NULL , 
  salt VARCHAR2 (40) , 
  email VARCHAR2 (100) NOT NULL , 
  activatcode VARCHAR2 (40) , 
  forgotten_password_code VARCHAR2 (40) , 
  forgotten_password_time NUMBER (11) , 
  remember_code VARCHAR2 (40) , 
  created_on NUMBER (11) NOT NULL , 
  last_login NUMBER (11) , 
  active NUMBER (1) , 
  first_name VARCHAR2 (50) , 
  last_name VARCHAR2 (50) , 
  company VARCHAR2 (100) , 
  phone VARCHAR2 (20) , 
  PRIMARY KEY (id) , 
  CONSTRAINT users_check_id CHECK (id >= 0) , 
  CONSTRAINT users_check_active CHECK (active >= 0) 
);

CREATE TRIGGER users_trig
BEFORE INSERT
ON users
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
SELECT users_seq.nextval INTO :NEW.ID FROM dual;
END;
/

CREATE SEQUENCE groups_seq
  START WITH 1
  INCREMENT BY 1
/

CREATE TABLE groups 
(
  id NUMBER (8) NOT NULL , 
  name VARCHAR2 (20) NOT NULL , 
  description VARCHAR2 (100) NOT NULL , 
  PRIMARY KEY (id) , 
  CONSTRAINT groups_check_id CHECK (id >= 0) 
);

CREATE TRIGGER groups_trig
BEFORE INSERT
ON groups
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
SELECT groups_seq.nextval INTO :NEW.ID FROM dual;
END;
/

INSERT ALL
  INTO groups ( id , name , description ) VALUES ( 1 , 'admin' , 'Administrator' )
  INTO groups ( id , name , description ) VALUES ( 2 , 'user' , 'General User' )
SELECT * FROM dual;

INSERT INTO users ( id , ip_address , username , password , salt , email , activatcode , forgotten_password_code , created_on , last_login , active , first_name , last_name , company , phone )
  VALUES ( '1' , '127.0.0.1' , 'administrator' , '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4' , '9462e8eee0' , 'admin@admin.com' , '' , NULL , ROUND(( (SYSDATE) - to_date('19700101', 'YYYYMMDD') ) *24*60*60) , ROUND(( (SYSDATE) - to_date('19700101', 'YYYYMMDD') ) *24*60*60) , '1' , 'Admin' , 'istrator' , 'ADMIN' , '0' ); 

CREATE SEQUENCE users_groups_seq
  START WITH 1
  INCREMENT BY 1
/

CREATE TABLE users_groups 
(
  id NUMBER (8) NOT NULL , 
  user_id NUMBER (8) NOT NULL , 
  group_id NUMBER (8) NOT NULL , 
  PRIMARY KEY (id) , 
  CONSTRAINT ug_check_id CHECK (id >= 0) , 
  CONSTRAINT ug_check_group_id CHECK (group_id >= 0) , 
  CONSTRAINT ug_check_user_id CHECK (user_id >= 0) 
);

CREATE TRIGGER users_groups_trig
BEFORE INSERT
ON users_groups
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
SELECT users_groups_seq.nextval INTO :NEW.ID FROM dual;
END;
/

INSERT ALL
  INTO users_groups ( id , user_id , group_id ) VALUES ( 1 , 1 , 1 )
  INTO users_groups ( id , user_id , group_id ) VALUES ( 2 , 1 , 2 )
SELECT * FROM dual;

CREATE SEQUENCE login_attempts_seq
  START WITH 1
  INCREMENT BY 1
/

CREATE TABLE login_attempts 
(
  id NUMBER (8) NOT NULL , 
  ip_address VARCHAR2 (16) NOT NULL , 
  login VARCHAR2 (100) NOT NULL , 
  time NUMBER(11) , 
  PRIMARY KEY (id) , 
  CONSTRAINT login_attempts_check_id CHECK (id >= 0) 
);

CREATE TRIGGER login_attempts_trig
BEFORE INSERT
ON login_attempts
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
SELECT login_attempts_seq.nextval INTO :NEW.ID FROM dual;
END;
/
