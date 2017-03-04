<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commentdefinition Entity
 *
 * @property int $id
 * @property string $content
 * @property \Cake\I18n\Time $created
 * @property int $commentdefinition_id
 * @property int $definition_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Commentdefinition[] $commentdefinitions
 * @property \App\Model\Entity\Definition $definition
 * @property \App\Model\Entity\User $user
 */
class Commentdefinition extends Entity
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
        'id' => false
    ];
}
