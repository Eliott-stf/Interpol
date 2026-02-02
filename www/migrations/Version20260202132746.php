<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260202132746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE birth_place (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE charge (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE criminal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, lastname VARCHAR(150) NOT NULL, birth_date DATETIME NOT NULL, height INT DEFAULT NULL, weight INT DEFAULT NULL, is_captured TINYINT NOT NULL, feature LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, hair_color_id INT DEFAULT NULL, eyes_color_id INT DEFAULT NULL, skin_color_id INT DEFAULT NULL, gender_id INT DEFAULT NULL, birth_place_id INT DEFAULT NULL, media_id INT DEFAULT NULL, INDEX IDX_326D7D6B8345DCB5 (hair_color_id), INDEX IDX_326D7D6B2BA5DE30 (eyes_color_id), INDEX IDX_326D7D6B72E4CCB (skin_color_id), INDEX IDX_326D7D6B708A0E0 (gender_id), INDEX IDX_326D7D6BB4BB6BBC (birth_place_id), UNIQUE INDEX UNIQ_326D7D6BEA9FDD75 (media_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE criminal_nationality (criminal_id INT NOT NULL, nationality_id INT NOT NULL, INDEX IDX_9CD089E88B51FB9D (criminal_id), INDEX IDX_9CD089E81C9DA55 (nationality_id), PRIMARY KEY (criminal_id, nationality_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE criminal_charge (criminal_id INT NOT NULL, charge_id INT NOT NULL, INDEX IDX_A9D5C6618B51FB9D (criminal_id), INDEX IDX_A9D5C66155284914 (charge_id), PRIMARY KEY (criminal_id, charge_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE criminal_spoken_language (criminal_id INT NOT NULL, spoken_language_id INT NOT NULL, INDEX IDX_1070A7B88B51FB9D (criminal_id), INDEX IDX_1070A7B850D2B87B (spoken_language_id), PRIMARY KEY (criminal_id, spoken_language_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE eyes_color (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE hair_color (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE nationality (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, content LONGTEXT NOT NULL, user_id INT DEFAULT NULL, criminal_id INT DEFAULT NULL, INDEX IDX_C42F7784A76ED395 (user_id), INDEX IDX_C42F77848B51FB9D (criminal_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE skin_color (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE spoken_language (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(100) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(150) NOT NULL, lastname VARCHAR(150) NOT NULL, phone_number VARCHAR(30) DEFAULT NULL, identity_number VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_active TINYINT NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6B8345DCB5 FOREIGN KEY (hair_color_id) REFERENCES hair_color (id)');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6B2BA5DE30 FOREIGN KEY (eyes_color_id) REFERENCES eyes_color (id)');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6B72E4CCB FOREIGN KEY (skin_color_id) REFERENCES skin_color (id)');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6B708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6BB4BB6BBC FOREIGN KEY (birth_place_id) REFERENCES birth_place (id)');
        $this->addSql('ALTER TABLE criminal ADD CONSTRAINT FK_326D7D6BEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE criminal_nationality ADD CONSTRAINT FK_9CD089E88B51FB9D FOREIGN KEY (criminal_id) REFERENCES criminal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE criminal_nationality ADD CONSTRAINT FK_9CD089E81C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE criminal_charge ADD CONSTRAINT FK_A9D5C6618B51FB9D FOREIGN KEY (criminal_id) REFERENCES criminal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE criminal_charge ADD CONSTRAINT FK_A9D5C66155284914 FOREIGN KEY (charge_id) REFERENCES charge (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE criminal_spoken_language ADD CONSTRAINT FK_1070A7B88B51FB9D FOREIGN KEY (criminal_id) REFERENCES criminal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE criminal_spoken_language ADD CONSTRAINT FK_1070A7B850D2B87B FOREIGN KEY (spoken_language_id) REFERENCES spoken_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77848B51FB9D FOREIGN KEY (criminal_id) REFERENCES criminal (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6B8345DCB5');
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6B2BA5DE30');
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6B72E4CCB');
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6B708A0E0');
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6BB4BB6BBC');
        $this->addSql('ALTER TABLE criminal DROP FOREIGN KEY FK_326D7D6BEA9FDD75');
        $this->addSql('ALTER TABLE criminal_nationality DROP FOREIGN KEY FK_9CD089E88B51FB9D');
        $this->addSql('ALTER TABLE criminal_nationality DROP FOREIGN KEY FK_9CD089E81C9DA55');
        $this->addSql('ALTER TABLE criminal_charge DROP FOREIGN KEY FK_A9D5C6618B51FB9D');
        $this->addSql('ALTER TABLE criminal_charge DROP FOREIGN KEY FK_A9D5C66155284914');
        $this->addSql('ALTER TABLE criminal_spoken_language DROP FOREIGN KEY FK_1070A7B88B51FB9D');
        $this->addSql('ALTER TABLE criminal_spoken_language DROP FOREIGN KEY FK_1070A7B850D2B87B');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784A76ED395');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77848B51FB9D');
        $this->addSql('DROP TABLE birth_place');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE criminal');
        $this->addSql('DROP TABLE criminal_nationality');
        $this->addSql('DROP TABLE criminal_charge');
        $this->addSql('DROP TABLE criminal_spoken_language');
        $this->addSql('DROP TABLE eyes_color');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE hair_color');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE nationality');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE skin_color');
        $this->addSql('DROP TABLE spoken_language');
        $this->addSql('DROP TABLE user');
    }
}
