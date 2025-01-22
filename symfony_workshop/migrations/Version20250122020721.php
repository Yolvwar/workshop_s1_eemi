<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122020721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add roles column to user table and set default roles for existing users';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD roles JSON NOT NULL DEFAULT \'["ROLE_USER"]\'');
        $this->addSql('UPDATE "user" SET roles = \'["ROLE_USER"]\' WHERE roles IS NULL');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN roles DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" DROP role');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(180)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL');
        $this->addSql('ALTER TABLE "user" ADD role VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" DROP roles');
        $this->addSql('ALTER TABLE "user" ALTER email TYPE VARCHAR(100)');
    }
}
