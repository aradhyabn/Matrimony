-- Update Matrimonial Database from v1.1 to v1.2 --

INSERT INTO `third_party_settings` (`third_party_settings_id`, `type`, `value`) VALUES (NULL, 'msg91_type', 'test');


INSERT INTO `general_settings` (`general_settings_id`, `type`, `value`) VALUES (NULL, 'right_click_option', 'off');


ALTER TABLE `member` ADD `member_profile_id` VARCHAR(25) NOT NULL AFTER `privacy_status`;


CREATE TABLE `family_status` (
  `family_status_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `family_status` (`family_status_id`, `name`) VALUES
(1, 'High Class'),
(2, 'Middle Class'),
(3, 'Low Class');
ALTER TABLE `family_status`
  ADD PRIMARY KEY (`family_status_id`);
ALTER TABLE `family_status`
  MODIFY `family_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


CREATE TABLE `family_value` (
  `family_value_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `family_value` (`family_value_id`, `name`) VALUES
(1, 'Traditional'),
(2, 'Moderate'),
(3, 'Liberal');
ALTER TABLE `family_value`
  ADD PRIMARY KEY (`family_value_id`);
ALTER TABLE `family_value`
  MODIFY `family_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


CREATE TABLE `on_behalf` (
  `on_behalf_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `on_behalf` (`on_behalf_id`, `name`) VALUES
(1, 'Self'),
(2, 'Daughter/Son'),
(3, 'Sister'),
(4, 'Brother'),
(5, 'Friend');
ALTER TABLE `on_behalf`
  ADD PRIMARY KEY (`on_behalf_id`);
ALTER TABLE `on_behalf`
  MODIFY `on_behalf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `codename` varchar(30) DEFAULT NULL,
  `parent_status` varchar(30) DEFAULT NULL,
  `description` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `permission` (`permission_id`, `name`, `codename`, `parent_status`, `description`) VALUES
(1, NULL, 'members', 'parent', NULL),
(2, NULL, 'premium_plans', 'parent', NULL),
(3, NULL, 'stories', 'parent', NULL),
(4, NULL, 'earnings', 'parent', NULL),
(5, NULL, 'contact_messages', 'parent', NULL),
(6, NULL, 'general_settings', 'parent', NULL),
(7, NULL, 'frontend_settings', 'parent', NULL),
(8, NULL, 'configuration', 'parent', NULL),
(9, NULL, 'send_sms', 'parent', NULL),
(10, NULL, 'language', 'parent', NULL),
(11, NULL, 'manage_admin', 'parent', NULL),
(12, NULL, 'seo_settings', 'parent', NULL),
(13, NULL, 'online_knowledge_base', 'parent', NULL),
(14, NULL, 'activasion', 'parent', NULL),
(15, NULL, 'free_members', '1', NULL),
(16, NULL, 'premium_members', '1', NULL),
(17, NULL, 'add_members', '1', NULL),
(18, NULL, 'choose_theme_color', '7', NULL),
(19, NULL, 'frontend_appearances', '7', NULL),
(20, NULL, 'member_profile', '8', NULL),
(21, NULL, 'social_media_comments', '8', NULL),
(22, NULL, 'payments', '8', NULL),
(23, NULL, 'email_setup', '8', NULL),
(24, NULL, 'captcha_settings', '8', NULL),
(25, NULL, 'sms_settings', '8', NULL),
(26, NULL, 'faq', '8', NULL),
(27, NULL, 'header', '19', NULL),
(28, NULL, 'pages', '19', NULL),
(29, NULL, 'footer', '19', NULL),
(30, NULL, 'religion', '20', NULL),
(31, NULL, 'caste', '20', NULL),
(32, NULL, 'sub_caste', '20', NULL),
(33, NULL, 'language', '20', NULL),
(34, NULL, 'country', '20', NULL),
(35, NULL, 'state', '20', NULL),
(36, NULL, 'city', '20', NULL),
(37, NULL, 'twilio', '25', NULL),
(38, NULL, 'msg91', '25', NULL),
(39, NULL, 'staffs_panel', 'parent', NULL),
(40, NULL, 'all_staffs', '39', NULL),
(41, NULL, 'manage_roles', '39', NULL);
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);
ALTER TABLE `permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;


CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `permission` longtext,
  `description` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `role` (`role_id`, `name`, `permission`, `description`) VALUES
(1, 'Master', ' ', ' '),
(12, 'Accountant', '[\"1\",\"4\",\"5\",\"6\",\"8\",\"9\"]', 'Description for Accountant');
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;