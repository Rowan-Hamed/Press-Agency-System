CREATE DATABASE PRESS_AGENCY;
USE PRESS_AGENCY;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userType VARCHAR(255) NOT NULL,
    fname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    lname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phoneNum CHAR(11) NOT NULL,
    password VARCHAR(255) NOT NULL, 
    urlToPhoto VARCHAR(255) DEFAULT NULL
);

CREATE TABLE post (
    postId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) CHARACTER SET utf8mb4, -- 'utf8mb4' to allows us to write in Arabic  
    body VARCHAR(2048) CHARACTER SET utf8mb4,
    creationTime DATE DEFAULT CURRENT_DATE,
    postType VARCHAR(255),
    numViews INT DEFAULT 0,
    status INT DEFAULT 0,
    urlToPhoto VARCHAR(255) DEFAULT NULL,
    likesNum INT DEFAULT 0,
    dislikesNum INT DEFAULT 0,
    ownerId INT,
    FOREIGN KEY (ownerId) REFERENCES  users(id)  ON DELETE CASCADE
);

CREATE TABLE comments (
    commentId INT PRIMARY KEY AUTO_INCREMENT,
    postId INT NOT NULL,
    userId INT NOT NULL,
    comment VARCHAR(1024) NOT NULL,
    parentCommentId INT,
    FOREIGN KEY (postId) REFERENCES post(postId) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (parentCommentId) REFERENCES comments(commentId) ON DELETE CASCADE
);

CREATE TABLE savedPost (
    postId INT,
    userId INT,
    FOREIGN KEY (postId) REFERENCES  post(postId) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES  users(id) ON DELETE CASCADE,
    PRIMARY KEY (userId, postId)
);
CREATE TABLE likes(
    postId INT,
    userId INT,
    status INT DEFAULT 0,
    FOREIGN KEY (postId) REFERENCES  post(postId) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES  users(id) ON DELETE CASCADE,
    PRIMARY KEY (userId, postId)
    -- STATUS ( -1 -> dislike || 0 -> no react || 1 -> like)
);
