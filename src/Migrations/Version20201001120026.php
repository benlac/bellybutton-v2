<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001120026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, name_agency VARCHAR(180) NOT NULL, id_default_contact INT NOT NULL, name_contact VARCHAR(255) NOT NULL, id_contact INT NOT NULL, UNIQUE INDEX UNIQ_70C0C6E676B855AB (name_agency), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_contact (id INT AUTO_INCREMENT NOT NULL, mail_pro VARCHAR(180) NOT NULL, phone_number INT NOT NULL, postal_adress VARCHAR(500) NOT NULL, num_whats_app INT NOT NULL, prefered_contact VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_CEA7CFA677AFF995 (mail_pro), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performance (id INT AUTO_INCREMENT NOT NULL, id_stats_yt INT NOT NULL, id_stats_ig INT NOT NULL, id_stats_tw INT NOT NULL, id_stats_tk INT NOT NULL, audience_categorie INT NOT NULL, status INT NOT NULL, sector INT NOT NULL, margin INT NOT NULL, picture_large VARCHAR(255) NOT NULL, picture_small VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats_igrepository (id_stats_ig INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_stats_ig)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE id_stats_yt (id_stats_yt INT AUTO_INCREMENT NOT NULL, like_yt INT NOT NULL, dislike_yt INT NOT NULL, view_yt INT NOT NULL, nb_vid7_yt INT NOT NULL, nb_vid37_yt INT NOT NULL, nb_abo_yt INT NOT NULL, nb_coms_yt INT NOT NULL, id_audience INT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id_stats_yt)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE agency');
        $this->addSql('DROP TABLE info_contact');
        $this->addSql('DROP TABLE performance');
        $this->addSql('DROP TABLE stats_igrepository');
        $this->addSql('DROP TABLE id_stats_yt');
    }
}
