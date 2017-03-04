<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Definition Entity
 *
 * @property int $id
 * @property int $word_id
 * @property string $define
 * @property int $user_id
 * @property int $contribute
 * @property int $category_id
 *
 * @property \App\Model\Entity\Word $WORDS
 * @property \App\Model\Entity\User $User
 * @property \App\Model\Entity\Commentdefinition[] $commentdefinitions
 * @property \App\Model\Entity\Likedefinition[] $likedefinitions
 */
class Definition extends Entity
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
        'ID' => false
    ];
}
