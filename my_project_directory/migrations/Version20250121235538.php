<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121235538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, qrcode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, type_client VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, INDEX IDX_6EEAA67DDC2902E0 (client_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detailcommande (id INT AUTO_INCREMENT NOT NULL, commande_id_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_7D6DC7D5462C4194 (commande_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detailcommande_produit (detailcommande_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_AF82ECDD5ABB6EFA (detailcommande_id), INDEX IDX_AF82ECDDF347EFB (produit_id), PRIMARY KEY(detailcommande_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DDC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE detailcommande ADD CONSTRAINT FK_7D6DC7D5462C4194 FOREIGN KEY (commande_id_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE detailcommande_produit ADD CONSTRAINT FK_AF82ECDD5ABB6EFA FOREIGN KEY (detailcommande_id) REFERENCES detailcommande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE detailcommande_produit ADD CONSTRAINT FK_AF82ECDDF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DDC2902E0');
        $this->addSql('ALTER TABLE detailcommande DROP FOREIGN KEY FK_7D6DC7D5462C4194');
        $this->addSql('ALTER TABLE detailcommande_produit DROP FOREIGN KEY FK_AF82ECDD5ABB6EFA');
        $this->addSql('ALTER TABLE detailcommande_produit DROP FOREIGN KEY FK_AF82ECDDF347EFB');
        $this->addSql('DROP TABLE carte');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE detailcommande');
        $this->addSql('DROP TABLE detailcommande_produit');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
