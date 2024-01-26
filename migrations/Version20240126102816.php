<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240126102816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE biblioteque (id INT AUTO_INCREMENT NOT NULL, livre_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, liste_envie TINYINT(1) NOT NULL, statut_lecture VARCHAR(255) NOT NULL, INDEX IDX_669942FDEC470631 (livre_id_id), INDEX IDX_669942FD9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, livre_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, note INT NOT NULL, INDEX IDX_67F068BCEC470631 (livre_id_id), INDEX IDX_67F068BC9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edition (id INT AUTO_INCREMENT NOT NULL, editeur_id_id INT DEFAULT NULL, livre_id_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_A891181F2ECABC92 (editeur_id_id), INDEX IDX_A891181FEC470631 (livre_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, resume VARCHAR(510) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_auteur (id INT AUTO_INCREMENT NOT NULL, livre_id_id INT DEFAULT NULL, auteur_id_id INT DEFAULT NULL, INDEX IDX_A11876B5EC470631 (livre_id_id), INDEX IDX_A11876B575F8742E (auteur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_genre (id INT AUTO_INCREMENT NOT NULL, livre_id_id INT DEFAULT NULL, genre_id_id INT DEFAULT NULL, INDEX IDX_1053AB9EEC470631 (livre_id_id), INDEX IDX_1053AB9EC2428192 (genre_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE biblioteque ADD CONSTRAINT FK_669942FDEC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE biblioteque ADD CONSTRAINT FK_669942FD9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCEC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE edition ADD CONSTRAINT FK_A891181F2ECABC92 FOREIGN KEY (editeur_id_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE edition ADD CONSTRAINT FK_A891181FEC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B5EC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B575F8742E FOREIGN KEY (auteur_id_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9EEC470631 FOREIGN KEY (livre_id_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9EC2428192 FOREIGN KEY (genre_id_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biblioteque DROP FOREIGN KEY FK_669942FDEC470631');
        $this->addSql('ALTER TABLE biblioteque DROP FOREIGN KEY FK_669942FD9D86650F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCEC470631');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9D86650F');
        $this->addSql('ALTER TABLE edition DROP FOREIGN KEY FK_A891181F2ECABC92');
        $this->addSql('ALTER TABLE edition DROP FOREIGN KEY FK_A891181FEC470631');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B5EC470631');
        $this->addSql('ALTER TABLE livre_auteur DROP FOREIGN KEY FK_A11876B575F8742E');
        $this->addSql('ALTER TABLE livre_genre DROP FOREIGN KEY FK_1053AB9EEC470631');
        $this->addSql('ALTER TABLE livre_genre DROP FOREIGN KEY FK_1053AB9EC2428192');
        $this->addSql('DROP TABLE biblioteque');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_auteur');
        $this->addSql('DROP TABLE livre_genre');
    }
}
