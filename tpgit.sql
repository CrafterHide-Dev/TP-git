CREATE TABLE `utilisateurs` (
  `id` integer PRIMARY KEY,
  `username` varchar(24),
  `password` text
);

CREATE TABLE `destinations` (
  `id` integer PRIMARY KEY,
  `country` varchar(100),
  `city` varchar(100),
  `zip_code` varchar(10),
  `street_name` varchar(255),
  `street_number` integer,
  `title` varchar(80),
  `description` text
);

CREATE TABLE `avis` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `dest_id` integer,
  `comment` text,
  `score` decimal(2,1)
);

ALTER TABLE `avis` ADD FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`id`);

ALTER TABLE `avis` ADD FOREIGN KEY (`dest_id`) REFERENCES `destinations` (`id`);
