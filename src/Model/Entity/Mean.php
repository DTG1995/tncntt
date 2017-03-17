<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mean Entity
 *
 * @property int $id
 * @property int $word_id
 * @property string $mean
 * @property int $contribute
 * @property int $user_id
 * @property int $category_id
 * @property string $author
 * @property bool $active
 *
 * @property \App\Model\Entity\Word $word
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Commentmean[] $commentmeans
 * @property \App\Model\Entity\Likemean[] $likemeans
 */
class Mean extends Entity
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
