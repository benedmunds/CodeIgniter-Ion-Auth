
#
# activation feature upgrade
#
ALTER TABLE `users`
  ADD     COLUMN `activation_selector`  varchar(255) AFTER `email`,
  MODIFY  COLUMN `activation_code`      varchar(255);

#
# Remember_me feature upgrade
#
ALTER TABLE `users`
  ADD     COLUMN `remember_selector`  varchar(255) AFTER `forgotten_password_time`,
  MODIFY  COLUMN `remember_code`      varchar(255);

#
# Forgotten password feature upgrade
#
ALTER TABLE `users`
  ADD     COLUMN `forgotten_password_selector` varchar(255) AFTER `activation_code`,
  MODIFY  COLUMN `forgotten_password_code`     varchar(255);

#
# Add optimization
#
ALTER TABLE `users`
  ADD CONSTRAINT uc_email
    UNIQUE (email);

ALTER TABLE `users`
  ADD CONSTRAINT uc_activation_selector
    UNIQUE (activation_selector);

ALTER TABLE `users`
  ADD CONSTRAINT uc_remember_selector
    UNIQUE (remember_selector);

ALTER TABLE `users`
  ADD CONSTRAINT uc_forgotten_password_selector
    UNIQUE (forgotten_password_selector);

