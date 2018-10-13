
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

CREATE UNIQUE INDEX uc_activation_selector 
  ON users (activation_selector)
  WHERE activation_selector IS NOT NULL
    
CREATE UNIQUE INDEX uc_remember_selector 
  ON users (remember_selector)
  WHERE remember_selector IS NOT NULL
    
CREATE UNIQUE INDEX uc_forgotten_password_selector 
  ON users (forgotten_password_selector)
  WHERE forgotten_password_selector IS NOT NULL
