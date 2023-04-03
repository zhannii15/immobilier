<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230402015252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_vie ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE espace_vie ADD CONSTRAINT FK_9BC4575E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_9BC4575E1729BBA ON espace_vie (appartement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espace_vie DROP FOREIGN KEY FK_9BC4575E1729BBA');
        $this->addSql('DROP INDEX IDX_9BC4575E1729BBA ON espace_vie');
        $this->addSql('ALTER TABLE espace_vie DROP appartement_id');
    }
}
