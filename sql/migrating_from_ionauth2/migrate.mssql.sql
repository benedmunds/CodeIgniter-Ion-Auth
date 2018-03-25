
/*
 * Activation feature upgrade
 */
ALTER TABLE users
  ADD activation_selector varchar(255);
ALTER TABLE users
  ALTER COLUMN activation_code varchar(255);

/*
 * Remember_me feature upgrade
 */
ALTER TABLE users
  ADD remember_selector varchar(255);
ALTER TABLE users
  ALTER COLUMN remember_code varchar(255);

/*
 * Forgotten password feature upgrade
 */
ALTER TABLE users
  ADD forgotten_password_selector  varchar(255);
ALTER TABLE users
  ALTER  COLUMN forgotten_password_code varchar(255);

/*
 * Add optimization
 */
ALTER TABLE users
  ADD CONSTRAINT uc_email
    UNIQUE (email);

ALTER TABLE users
  ADD CONSTRAINT uc_activation_selector
    UNIQUE (activation_selector);

ALTER TABLE users
  ADD CONSTRAINT uc_remember_selector
    UNIQUE (remember_selector);

ALTER TABLE users
  ADD CONSTRAINT uc_forgotten_password_selector
    UNIQUE (forgotten_password_selector);
