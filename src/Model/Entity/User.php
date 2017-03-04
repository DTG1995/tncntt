<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $namedisplay
 * @property string $password
 * @property bool $isadmin
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $last_login
 * @property int $status
 * @property bool $active
 *
 * @property \App\Model\Entity\Commentdefinition[] $commentdefinitions
 * @property \App\Model\Entity\Commentmean[] $commentmeans
 * @property \App\Model\Entity\Likedefinition[] $likedefinitions
 * @property \App\Model\Entity\Likemean[] $likemeans
 * @property \App\Model\Entity\Mean[] $means
 * @property \App\Model\Entity\Definition[] $definitions
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
