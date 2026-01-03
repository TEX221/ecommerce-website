CREATE DATABASE commerciale;

CREATE TABLE client (
  idClient INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(60) NOT NULL,
  prenom VARCHAR(60) NOT NULL,
  email VARCHAR(256) NOT NULL UNIQUE,
  tel VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE categorie (
  idCategorie INT AUTO_INCREMENT PRIMARY KEY,
  nomCategorie VARCHAR(60)
);

CREATE TABLE produit (
  idProduit INT AUTO_INCREMENT PRIMARY KEY,
  nomProduit VARCHAR(60) NOT NULL,
  prixUnitaire DECIMAL(10, 2) NOT NULL,
  idCategorie INT,
  FOREIGN KEY(idCategorie) REFERENCES categorie(idCategorie)
);

CREATE TABLE commande (
  idCommande INT AUTO_INCREMENT PRIMARY KEY,
  idClient INT,
  dateCommande DATETIME DEFAULT NOW(),
  FOREIGN KEY(idClient) REFERENCES client(idClient)
);

CREATE TABLE detailCommande (
  idDetail INT AUTO_INCREMENT PRIMARY KEY,
  idCommande INT,
  idProduit INT,
  quantite INT,
  FOREIGN KEY(idCommande) REFERENCES commande(idCommande),
  FOREIGN KEY(idProduit) REFERENCES produit(idProduit)
);
