<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329233903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, ref_bien VARCHAR(255) NOT NULL, nbre_pieces INT NOT NULL, surface_total INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charges (id INT AUTO_INCREMENT NOT NULL, loyer_mensuel INT NOT NULL, garantie_loyer INT NOT NULL, provision_charge DOUBLE PRECISION NOT NULL, etat_des_lieux DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_energetique (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, valeur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espace_vie (id INT AUTO_INCREMENT NOT NULL, parking TINYINT(1) NOT NULL, sde TINYINT(1) NOT NULL, sdb TINYINT(1) NOT NULL, ascenseur TINYINT(1) NOT NULL, coloc TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, appartement_id_id INT DEFAULT NULL, lien_url VARCHAR(255) NOT NULL, INDEX IDX_16DB4F898236FDD6 (appartement_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE surface_piece (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, m2_par_piece INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F898236FDD6 FOREIGN KEY (appartement_id_id) REFERENCES appartement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F898236FDD6');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE charges');
        $this->addSql('DROP TABLE classe_energetique');
        $this->addSql('DROP TABLE espace_vie');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE surface_piece');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
