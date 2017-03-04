<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commentmean Entity
 *
 * @property int $id
 * @property string $content
 * @property \Cake\I18n\Time $created
 * @property int $commentmean_id
 * @property int $mean_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Commentmean[] $commentmeans
 * @property \App\Model\Entity\Mean $mean
 * @property \App\Model\Entity\User $user
 */
class Commentmean extends Entity
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
