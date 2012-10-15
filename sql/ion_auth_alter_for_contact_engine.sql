/*
* Only for the Contact Engine driver: apply this alter file after loading the ion_auth.sql file
*/

ALTER TABLE  `users` CHANGE  `id`  `id` MEDIUMINT( 8 ) UNSIGNED NOT NULL;
ALTER TABLE  `users` CHANGE  `id`  `id` MEDIUMINT( 8 ) UNSIGNED NULL;
ALTER TABLE  `users` CHANGE  `id`  `id` INT( 20 ) UNSIGNED NOT NULL DEFAULT  '0';
ALTER TABLE  `users` ADD UNIQUE (`id`);
