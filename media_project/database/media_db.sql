CREATE DATABASE ngo_media;
USE ngo_media;

-- Admin Table
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password)
VALUES ('admin', MD5('admin123'));

-- Press Releases
CREATE TABLE press_releases (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    release_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Media Coverage
CREATE TABLE media_coverage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    url VARCHAR(2083) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Image Gallery
CREATE TABLE image_gallery (
    id INT PRIMARY KEY AUTO_INCREMENT,
    image_path VARCHAR(2083) NOT NULL,
    description VARCHAR(255),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Videos
CREATE TABLE videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    video_url VARCHAR(2083) NOT NULL,
    description VARCHAR(255),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);