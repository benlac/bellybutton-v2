<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001124844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE audience_type (id_audience INT AUTO_INCREMENT NOT NULL, country1 VARCHAR(255) NOT NULL, country2 VARCHAR(255) NOT NULL, country3 VARCHAR(255) NOT NULL, world INT NOT NULL, share_h INT NOT NULL, PRIMARY KEY(id_audience)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_ig (id_stats_ig INT AUTO_INCREMENT NOT NULL, like_ig INT NOT NULL, nbr_coms_ig INT NOT NULL, nbr_abo_ig INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_ig)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_tk (id_stats_tk INT AUTO_INCREMENT NOT NULL, nbr_like_tk INT NOT NULL, nbr_abo_tk INT NOT NULL, nbr_coms_tk INT NOT NULL, nbr_vues_tk INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_tk)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_tw (id_stats_tw INT AUTO_INCREMENT NOT NULL, average_view_tw INT NOT NULL, nbr_abo_tw INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_tw)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_yt (id_stats_yt INT AUTO_INCREMENT NOT NULL, estimations_yt INT NOT NULL, like_yt INT NOT NULL, dislike_yt INT NOT NULL, view_yt INT NOT NULL, nb_vid7_yt INT NOT NULL, nb_vid37_yt INT NOT NULL, nb_abo_yt INT NOT NULL, nb_coms_yt INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_yt)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE id_stats_yt');
        $this->addSql('DROP TABLE stats_igrepository');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE id_stats_yt (id_stats_yt INT AUTO_INCREMENT NOT NULL, like_yt INT NOT NULL, dislike_yt INT NOT NULL, view_yt INT NOT NULL, nb_vid7_yt INT NOT NULL, nb_vid37_yt INT NOT NULL, nb_abo_yt INT NOT NULL, nb_coms_yt INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_yt)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stats_igrepository (id_stats_ig INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_stats_ig)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE audience_type');
        $this->addSql('DROP TABLE stats_ig');
        $this->addSql('DROP TABLE stats_tk');
        $this->addSql('DROP TABLE stats_tw');
        $this->addSql('DROP TABLE stats_yt');
    }
}
