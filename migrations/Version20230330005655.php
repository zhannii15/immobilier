<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230330005655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charges ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE charges ADD CONSTRAINT FK_3AEF501AE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3AEF501AE1729BBA ON charges (appartement_id)');
        $this->addSql('ALTER TABLE surface_piece ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE surface_piece ADD CONSTRAINT FK_7DD628C8E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_7DD628C8E1729BBA ON surface_piece (appartement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE charges DROP FOREIGN KEY FK_3AEF501AE1729BBA');
        $this->addSql('DROP INDEX UNIQ_3AEF501AE1729BBA ON charges');
        $this->addSql('ALTER TABLE charges DROP appartement_id');
        $this->addSql('ALTER TABLE surface_piece DROP FOREIGN KEY FK_7DD628C8E1729BBA');
        $this->addSql('DROP INDEX IDX_7DD628C8E1729BBA ON surface_piece');
        $this->addSql('ALTER TABLE surface_piece DROP appartement_id');
    }
}
