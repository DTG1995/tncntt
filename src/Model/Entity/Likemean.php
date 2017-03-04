<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Likemean Entity
 *
 * @property int $mean_id
 * @property int $user_id
 * @property int $islike
 *
 * @property \App\Model\Entity\Mean $mean
 * @property \App\Model\Entity\User $user
 */
class Likemean extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'mean_id' => false,
        'user_id' => false
    ];
}
