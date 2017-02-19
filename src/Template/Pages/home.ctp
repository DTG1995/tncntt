<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$this->assign('title','Trang chủ');
?>

<div class="home">
    <div class="row">
        <div class="form-group">
            <label class='col-md-1 hidden-xs hidden-sm ' for="sel1">Linh vuc:</label>
            <div class="col-md-4">
                <select class='form-control '  id="sel1">
                <option value="-1">Tat ca</option>
            <?php
                foreach ($categorys as $category) {
                ?>
                <option value=<?=$category->ID;?>> <?=$category->NAME;?></option>
                <?php
                }
                ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
</div>