-- Update Matrimonial Database from v1.3 to v1.4 --

INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'slider_position', 'right');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'slider_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'advance_search_position', 'left');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_members_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_parallax_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_stories_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_plans_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_contact_status', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'present_address', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'education_and_career', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'physical_attributes', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'language', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'hobbies_and_interests', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'personal_attitude_and_behavior', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'residency_information', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'spiritual_and_social_background', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'life_style', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'astronomic_information', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'permanent_address', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'family_information', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'additional_personal_details', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'partner_expectation', 'yes');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_search_style', '1');
INSERT INTO `frontend_settings` (`frontend_settings_id`, `type`, `value`) VALUES (NULL, 'home_searching_heading', 'Search Your Soul Mates');


ALTER TABLE `member` ADD `is_closed` VARCHAR(20) NOT NULL AFTER `mobile`;
ALTER TABLE `member` ADD `pic_privacy` LONGTEXT NOT NULL AFTER `privacy_status`;


UPDATE `member` SET `is_closed` = 'no';
UPDATE `member` SET `pic_privacy` = '[{"profile_pic_show":"all","gallery_show":"premium"}]';


ALTER TABLE `site_language` CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `site_language_list` CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;