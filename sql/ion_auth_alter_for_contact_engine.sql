/*
 Only for the Contact Engine driver: apply this alter file after loading the ion_auth.sql file
*/

ALTER TABLE  `users` CHANGE  `id`  `id` MEDIUMINT( 8 ) UNSIGNED NOT NULL;
ALTER TABLE  `users` CHANGE  `id`  `id` MEDIUMINT( 8 ) UNSIGNED NULL;
ALTER TABLE  `users` CHANGE  `id`  `id` INT( 20 ) UNSIGNED NOT NULL DEFAULT  '0';
ALTER TABLE  `users` ADD  `preferred_language` VARCHAR( 50 ) NULL DEFAULT  'english' AFTER  `phone`;
TRUNCATE TABLE `users`;
TRUNCATE TABLE `users_groups`;

/*
//If you want to add a prefix to tables, you can rename them

RENAME TABLE `users` TO `tj_users`;
RENAME TABLE `users_groups` TO `tj_users_groups`;
RENAME TABLE `groups` TO `tj_groups`;
RENAME TABLE `login_attempts` TO `tj_login_attempts`;

//Apply UTF-8
ALTER TABLE `tj_users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `tj_users_groups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `tj_groups` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `tj_login_attempts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
*/
