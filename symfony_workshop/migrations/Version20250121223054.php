<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250121223054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, adress VARCHAR(255) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, zip_code INT DEFAULT NULL, role VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO "user" (name, firstname, password, email, adress, town, zip_code, role) VALUES (\'Dumain\', \'Mareva\', \'$2y$13$3Zz9Zz9Zz9Zz9Zz9Zz9ZzO9Zz9Zz9Zz9Zz9Zz9Zz9Zz9\', \'d2Jx8@example.com\', \'123 Main Street\', \'Anytown\', 12345, \'ROLE_USER\')');
        $this->addSql('INSERT INTO "user" (name, firstname, password, email, adress, town, zip_code, role) VALUES (\'Mallet\', \'Yoann\', \'$2y$13$3Zz9Zz9Zz9Zz9Zz9Zz9ZzO9Zz9Zz9Zz9Zz9Zz9Zz9Zz9\', \'0dYXp@example.com\', \'456 Main Street\', \'Anytown\', 12345, \'ROLE_USER\')');
        $this->addSql('INSERT INTO "user" (name, firstname, password, email, adress, town, zip_code, role) VALUES (\'Sansberro\', \'Thomas\', \'$2y$13$3Zz9Zz9Zz9Zz9Zz9Zz9ZzO9Zz9Zz9Zz9Zz9Zz9Zz9Zz9\', \'o4CQ2@example.com\', \'789 Main Street\', \'Anytown\', 12345, \'ROLE_USER\')');
        $this->addSql('INSERT INTO "user" (name, firstname, password, email, adress, town, zip_code, role) VALUES (\'Cambodge\', \'Senka\', \'$2y$13$3Zz9Zz9Zz9Zz9Zz9Zz9ZzO9Zz9Zz9Zz9Zz9Zz9Zz9Zz9\', \'b2b2b@example.com\', \'101 Main Street\', \'Anytown\', 12345, \'ROLE_USER\')'); 
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE "user"');
    }
}
