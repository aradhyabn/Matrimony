-- Update Matrimonial Database from v1.2 to v1.3 --

INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'home_def_currency', '1');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'currency', '1');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'currency_format', 'us');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'symbol_format', 's_amount');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'no_of_decimals', '2');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'pum_merchant_key', '');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'pum_merchant_salt', '');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'pum_set', 'ok');
INSERT INTO `business_settings` (`business_settings_id`, `type`, `value`) VALUES (NULL, 'pum_account_type', 'sandbox');


CREATE TABLE `currency_settings` (
  `currency_settings_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `exchange_rate` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `exchange_rate_def` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `currency_settings` (`currency_settings_id`, `name`, `symbol`, `exchange_rate`, `status`, `code`, `exchange_rate_def`) VALUES
(1, 'U.S. Dollar', '$', '1', 'ok', 'USD', '1'),
(2, 'Australian Dollar', '$', '1.2762', 'ok', 'AUD', '1.2762'),
(5, 'Brazilian Real', 'R$', '3.238', 'ok', 'BRL', '3.238'),
(6, 'Canadian Dollar', '$', '1.272', 'ok', 'CAD', '1.272'),
(7, 'Czech Koruna', 'Kč', '20.647', 'ok', 'CZK', '20.647'),
(8, 'Danish Krone', 'kr', '6.0532', 'ok', 'DKK', '6.0532'),
(9, 'Euro', '€', '0.84861', 'ok', 'EUR', '0.84861'),
(10, 'Hong Kong Dollar', '$', '7.8264', 'ok', 'HKD', '7.8264'),
(11, 'Hungarian Forint', 'Ft', '255.24', 'ok', 'HUF', '255.24'),
(12, 'Israeli New Sheqel', '₪', '3.4812', 'ok', 'ILS', '3.4812'),
(13, 'Japanese Yen', '¥', '107.12', 'ok', 'JPY', '107.12'),
(14, 'Malaysian Ringgit', 'RM', '3.908', 'ok', 'MYR', '3.908'),
(15, 'Mexican Peso', '$', '18.722', 'ok', 'MXN', '18.722'),
(16, 'Norwegian Krone', 'kr', '7.8278', 'ok', 'NOK', '7.8278'),
(17, 'New Zealand Dollar', '$', '1.3753', 'ok', 'NZD', '1.3753'),
(18, 'Philippine Peso', '₱', '52.261', 'ok', 'PHP', '52.261'),
(19, 'Polish Zloty', 'zł', '3.3875', 'ok', 'PLN', '3.3875'),
(20, 'Pound Sterling', '£', '0.71864', 'ok', 'GBP', '0.71864'),
(21, 'Russian Ruble', 'руб', '55.929', 'ok', 'RUB', '55.929'),
(22, 'Singapore Dollar', '$', '1.3198', 'ok', 'SGD', '1.3198'),
(23, 'Swedish Krona', 'kr', '8.1945', 'ok', 'SEK', '8.1945'),
(24, 'Swiss Franc', 'CHF', '0.93805', 'ok', 'CHF', '0.93805'),
(26, 'Thai Baht', '฿', '31.39', 'ok', 'THB', '31.39'),
(27, 'Your Currency', '?', '1', 'no', '??', '');
ALTER TABLE `currency_settings`
  ADD PRIMARY KEY (`currency_settings_id`);
ALTER TABLE `currency_settings`
  MODIFY `currency_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;