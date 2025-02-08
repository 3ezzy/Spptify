-- Create the database
CREATE DATABASE music_platform;
-- Create ENUM type for roles
CREATE TABLE user_role (
    value VARCHAR(50) PRIMARY KEY
);

INSERT INTO user_role (value) VALUES ('user'), ('artist'), ('admin');

-- Create ENUM type for playlist visibility
CREATE TABLE playlist_visibility (
    value VARCHAR(50) PRIMARY KEY
);

INSERT INTO playlist_visibility (value) VALUES ('public'), ('private');

-- Users Table
CREATE TABLE Users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role user_role NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Artists Table
CREATE TABLE Artists (
    artist_id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL REFERENCES Users(user_id),
    bio TEXT,
    profile_picture_url VARCHAR(255)
);

-- Administrators Table
CREATE TABLE Administrators (
    admin_id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL REFERENCES Users(user_id)
);

-- Songs Table
CREATE TABLE Songs (
    song_id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist_id INT NOT NULL REFERENCES Artists(artist_id),
    file_url VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    is_public BOOLEAN DEFAULT TRUE,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Playlists Table
CREATE TABLE Playlists (
    playlist_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES Users(user_id),
    title VARCHAR(100) NOT NULL,
    description TEXT,
    visibility playlist_visibility NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Playlist_Songs Table
CREATE TABLE Playlist_Songs (
    playlist_song_id SERIAL PRIMARY KEY,
    playlist_id INT NOT NULL REFERENCES Playlists(playlist_id),
    song_id INT NOT NULL REFERENCES Songs(song_id),
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Liked_Songs Table
CREATE TABLE Liked_Songs (
    liked_song_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES Users(user_id),
    song_id INT NOT NULL REFERENCES Songs(song_id),
    liked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Followed_Playlists Table
CREATE TABLE Followed_Playlists (
    followed_playlist_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES Users(user_id),
    playlist_id INT NOT NULL REFERENCES Playlists(playlist_id),
    followed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);