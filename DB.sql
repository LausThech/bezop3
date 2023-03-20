SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `content` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

INSERT INTO `content` (`id`, `name`, `text`) VALUES
(1, 'Бурая лисица', 'Чернобурая лисица[1], или серебристо-чёрная лисица[2] или чернобурка, — морфа обыкновенной лисицы (меланист), используемая в животноводстве для получения меха, из которого делают одежду, например шубу-чернобурку[3].
Чернобурки хорошо скрещиваются с лисицами рыжего окраса. Полученные гибриды называются сиводушками.');

ALTER TABLE `content`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;