CREATE DATABASE Commmerciale;

CREATE TABLE Users (
  idUser INT AUTO_INCREMENT PRIMARY KEY,
  firstName VARCHAR(60) NOT NULL,
  lastName VARCHAR(60) NOT NULL,
  email VARCHAR(256) NOT NULL UNIQUE,
  tel VARCHAR(30) NOT NULL UNIQUE,
  password VARCHAR(256) NOT NULL,
  role ENUM('admin', 'client', 'vendeur') NOT NULL
);

CREATE TABLE CategoriesProduits (
  idCategorie INT AUTO_INCREMENT PRIMARY KEY,
  nomCategorie VARCHAR(60)
);

CREATE TABLE Produits (
  idProduit INT AUTO_INCREMENT PRIMARY KEY,
  nomProduit VARCHAR(60) NOT NULL,
  prixUnitaire DECIMAL(10, 2) NOT NULL,
  idCategorie INT,
  FOREIGN KEY(idCategorie) REFERENCES CategoriesProduits(idCategorie)
);

CREATE TABLE Commandes (
  idCommande INT AUTO_INCREMENT PRIMARY KEY,
  idUser INT,
  dateCommande DATETIME NOT NULL DEFAULT NOW(),
  FOREIGN KEY(idUser) REFERENCES Users(idUser)
);

CREATE TABLE DetailCommandes (
  idDetail INT AUTO_INCREMENT PRIMARY KEY,
  idCommande INT,
  idProduit INT,
  quantite INT,
  FOREIGN KEY(idCommande) REFERENCES Commandes(idCommande),
  FOREIGN KEY(idProduit) REFERENCES Produits(idProduit)
);
