<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commentmean Entity
 *
 * @property int $ID
 * @property string $CONTENT
 * @property \Cake\I18n\Time $CREATED
 * @property int $IDPARENT
 * @property int $IDMEANS
 * @property int $ACCOUNT
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
        'ID' => false
    ];
}
