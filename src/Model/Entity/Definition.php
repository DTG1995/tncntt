<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Definition Entity
 *
 * @property int $ID
 * @property int $WORDS_ID
 * @property string $DEFINE
 * @property int $USERS_ID
 * @property int $CONTRIBUTE
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
