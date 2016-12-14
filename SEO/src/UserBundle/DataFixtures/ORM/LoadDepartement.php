<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Departement;

class LoadDepartement implements FixtureInterface
{
    public function load (ObjectManager $manager)
    {
        

        $noms=['Ain','Aisne','Allier','Hautes-Alpes','Alpes-de-Haute-Provence','Alpes-Maritimes','Ardèche','Ardennes','Ariège','Aube','Aude','Aveyron','Bouches-du-Rhône','Calvados',
'Cantal','Charente','Charente-Maritime','Cher','Corrèze','Corse-du-sud','Haute-corse','Côte-d\'or','Côtes-d\'armor','Creuse','Dordogne','Doubs','Drôme',
'Eure','Eure-et-Loir','Finistère','Gard','Haute-Garonne','Gers','Gironde','Hérault','Ile-et-Vilaine','Indre','Indre-et-Loire','Isère','Jura','Landes',
'Loir-et-Cher','Loire','Haute-Loire','Loire-Atlantique','Loiret','Lot','Lot-et-Garonne','Lozère','Maine-et-Loire','Manche','Marne','Haute-Marne','Mayenne',
'Meurthe-et-Moselle','Meuse','Morbihan','Moselle','Nièvre','Nord','Oise','Orne','Pas-de-Calais','Puy-de-Dôme','Pyrénées-Atlantiques','Hautes-Pyrénées','Pyrénées-Orientales',
'Bas-Rhin','Haut-Rhin','Rhône','Haute-Saône','Saône-et-Loire','Sarthe','Savoie','Haute-Savoie','Paris','Seine-Maritime','Seine-et-Marne','Yvelines','Deux-Sèvres',
'Somme','Tarn','Tarn-et-Garonne','Var','Vaucluse','Vendée','Vienne','Haute-Vienne','Vosges','Yonne','Territoire de Belfort','Essonne','Hauts-de-Seine','Seine-Saint-Denis',
'Val-de-Marne','Val-d\'oise','Mayotte','Guadeloupe','Guyane','Martinique','Réunion','All'];

        $code=['01', '02', '03', '05', '04', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '2a', '2b', '21', '22', '23', '24', 
'25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', 
'50', '51', '52', '53', '54', '55', '56', '57', '58',  '59','60', '61', '62', '63', '64', '65', '67','66', '68', '69', '70', '71', '72', '73', '74', 
'75', '76', '77', '78', '79', '80', '81','82', '83', '84', '85', '86', '88', '87','89', '90', '91', '92', '93', '94', '95', '976', '971', '973', '972', 
'974', '00'];

$departements=[];
        for($i=0;$i<count($noms);$i++)
        {
            $departements[$i] = new Departement();
            $departements[$i]->setNom($noms[$i]);
            $departements[$i]->setCode($code[$i]);
        
            $manager->persist($departements[$i]);
        }
        $manager->flush();
    }

}