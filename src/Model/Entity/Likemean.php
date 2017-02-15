<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Likemean Entity
 *
 * @property int $IDMEAN
 * @property string $EMAIL
 * @property int $ISLIKE
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
        'IDMEAN' => false,
        'EMAIL' => false
    ];
}
