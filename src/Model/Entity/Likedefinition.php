<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Likedefinition Entity
 *
 * @property int $definition_id
 * @property int $user_id
 * @property int $islike
 *
 * @property \App\Model\Entity\Definition $DEFINITIONS
 * @property \App\Model\Entity\User $User
 */
class Likedefinition extends Entity
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
        'IDDEFINITION' => false,
        'USER_ID' => false
    ];
}
