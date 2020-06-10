<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ActivityFixtures extends Fixture
{
    const ACTIVITIES = [
        'Coaching' => [
            'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
     voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non 
     provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. 
     Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est 
     eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
     assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum 
     necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque 
     earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur
     aut perferendis doloribus asperiores repellat.',
            'pictogram' => 'build/white_haltere.svg',
            'picture' => 'http://formation.naveilhan.com/fixtures/activity1.jpg',
            'focus' => 1
        ],
    ];


        /*'Team training',
        'Coaching à distance'
    ];


     const PICTOGRAMS = [
         '',
         'white_distance-coaching.svg',
         'white_team.svg'
     ];
        */


    public function load(ObjectManager $manager)
    {
        foreach (self::ACTIVITIES as $name => $data) {
            $activity = new Activity();
            $activity->setTitle($name);
            $activity->setDescription($data['description']);
            $activity->setPictogram($data['pictogram']);
            $activity->setPicture($data['picture']);
            $activity->setFocus($data['focus']);
            $manager->persist($activity);
        }
        $manager->flush();
    }
}
