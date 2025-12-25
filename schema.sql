DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS cars;

CREATE TABLE cars (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  make VARCHAR(50),
  model VARCHAR(50),
  year SMALLINT,
  description TEXT,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150),
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO cars (title, make, model, year, description, image)
VALUES
('Midnight Skyline', 'Nissan', 'Skyline GT-R', 1998, 'Aiden’s personal build with upgraded turbo, coilovers, and custom ECU tune.', 'skyline-midnight.jpg');
