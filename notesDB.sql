create database if not exists notesDB;
use notesDB;

CREATE TABLE `users` (
                         `id` int NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `gender` varchar(45) NOT NULL,
                         `birthdate` date NOT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `notes` (
                         `id` int NOT NULL AUTO_INCREMENT,
                         `title` varchar(255) NOT NULL,
                         `body` varchar(255) NOT NULL,
                         `user_id` int NOT NULL,
                         PRIMARY KEY (`id`),
                         KEY `fk_notes_1_idx` (`user_id`),
                         CONSTRAINT `fk_notes_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
