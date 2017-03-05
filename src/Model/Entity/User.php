<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\I18n\Time;
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
 * @property \App\Model\Entity\Definition[] $definitions
 * @property \App\Model\Entity\Likedefinition[] $likedefinitions
 * @property \App\Model\Entity\Likemean[] $likemeans
 * @property \App\Model\Entity\Mean[] $means
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
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password)
    {
        return(new DefaultPasswordHasher)->hash($password);
    }
    protected function _setIsadmin($isadmin){
        if($isadmin==null)
            return(0);
        return $isadmin;
    }
    protected function _setActive($active){
        if($active==null)
            return(0);
        return $active;
    }
    protected function _setLast_login($last_login){
        if($last_login==null)
            return(Time::now());
        return $last_login;
    }
    protected function _setStatus($status){
        if($status==null)
            return(0);
        return $status;
    }
}
