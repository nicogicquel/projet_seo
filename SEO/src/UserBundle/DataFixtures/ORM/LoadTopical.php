<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SeoBundle\Entity\Topical;

class LoadTopical implements FixtureInterface
{
	public function load (ObjectManager $manager)
	{
		

		$noms=['Adult/Arts','Adult/World','Arts','Arts/Architecture','Arts/Literature','Arts/Movies','Arts/Music','Arts/Performing Arts','Arts/Photography','Arts/Radio','Arts/Television','Business','Business/Agriculture and Forestry','Business/Arts and Entertainment','Business/Automotive','Business/Construction and Maintenance','Buisiness/Consumer Goods and Services','Business/Employment','Business/Financial Services','Business/Hospitality','Business/Investing','Business/News and Media','Business/Publishing and Printing','Business/Real Estate','Business/Small Business','Business/Textiles and Nonwomens','Business/Transport and Logistics','Computer','Computers/Consultants','Computers/Data Communications','Computers/Graphics','Computers/Internet','Computers/Internet/E-mail','Computers/Internet/On the Web','Computers/Internet/Searching','Computers/Internet/Web Design and Development','Computers/Open Source','Computers/Programming/Languages','Computers/Shopping','Computers/Software/Business','Computer/Software/Desktop Custom','Computer/Software/Freeware','Computer/Software/Internet','Games','Games/Gambling','Games/Video Games/Sports','Health','Health/Conditions and Diseases','Health/Nursing','Home/Cooking','Home/Gardening','News','News/Alternative','News/Media Industry','News/Newspaper','News/Weather','Recreation','Recreation/Autos','Recreation/Boating','Recreation/Climbing','Recreation/Collecting','Recreation/Food','Recreation/Motorcycles','recreation/Nudism','Recreation/Outdoors','Recreation/Theme Parks','Recreation/Travel','Reference/Education','Reference/Museums','Regional','Regional/Europe','Science/Agriculture','Science/Astronomy','Science/Biology','Sciences/Earth Sciences','Science/Social Sciences','Shopping/Antique and Collectibles','Shopping/Pets','Society','Society/Disabled','Society/Folklore','Society/Government','Society/History','Society/Law','Society/Organizations','Society/People','Society/Philosophy','Society/Politics','Society/Religion and Spirituality','Society/Subcultures','Sports','Sports/Basketball','Sports/Cycling','Sports/Equestrian','Sports/Golf','Sports/Multi-Sports','Sports/Running','Sports/Soccer','Sports/Water Sports','World/Français'];
		foreach ($noms as $nom) { 
			$topical = new Topical();
			$topical->setNom($nom);
			$manager->persist($topical);

		}
		$manager->flush();
	}

}