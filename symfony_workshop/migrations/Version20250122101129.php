<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122101129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE rules ADD description VARCHAR(255) DEFAULT \'Default description\'');

        $this->addSql('UPDATE rules SET description = \'Default description\' WHERE description IS NULL');
        $this->addSql('ALTER TABLE rules ALTER COLUMN description SET NOT NULL');
        $this->addSql('ALTER TABLE rules ALTER COLUMN description DROP DEFAULT');

        $this->addSql('INSERT INTO card (name, description) VALUES (\'Card 1\', \'Description 1\')');
        $this->addSql('INSERT INTO card (name, description) VALUES (\'Card 2\', \'Description 2\')');


        $this->addSql('DELETE FROM rules');

        $this->addSQl('INSERT INTO rules (name, description) VALUES (\'Rule 1\', \'Description 1\')');
        $this->addSQl('INSERT INTO rules (name, description) VALUES (\'Rule 2\', \'Description 2\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE card');
        $this->addSql('ALTER TABLE rules DROP COLUMN description');
    }
}
