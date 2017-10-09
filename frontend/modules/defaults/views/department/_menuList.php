<?php 
    use yii\helpers\Url;
    $menu = Yii::$app->controller->id;
?>
<div class="panel-body">
    <label class="radio">
        <input <?php if($menu == 'department') { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/department']); ?>">Department</a></span></label>
        
        <label class="radio">
        <input <?php if($menu == 4) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/sub-department']); ?>">Subdepartment</a></span></label>
        
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/company']); ?>">Company</a></span></label>
    
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/project-location']); ?>">Project Location</a></span></label>
    
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/project-status']); ?>">Project Status</a></span></label>
    
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/defect-type']); ?>">Defect Type</a></span></label>
    
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/defect-status']); ?>">Defect Status</a></span></label>
    
        <label class="radio">
        <input <?php if($menu == 2) { ?> checked="" <?php } ?> name="optionsRadios1" type="radio" value="option1">
        <span><a href="<?php echo Url::toRoute(['defaults/settings']); ?>">Settings</a></span></label>    
</div>