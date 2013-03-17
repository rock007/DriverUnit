<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php 
 function navItemSelected($pg){
     global $pgname;
     
     if ($pg == $pgname){
     	//echo "active"; Don't echo here
     	return "active";
     }
  }
  ?>
  
  <div class="row-fluid">
	<div class="span3">
		<!--  
		<div class="sidebar-nav well">
          
		  <?php $this->widget('zii.widgets.CMenu', array(
			
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>'<h1>操作</h1>','items'=>$this->menu),
			),
			));?>			
			
		</div>
		-->
		
		<div class="well">
			
			<div id="accordion2" class="accordion">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                  	路线
                </a>
              </div>
              <div style="height: auto;" class="accordion-body in" id="collapseOne">
                <div class="accordion-inner">

            		<ul class="nav nav-list">
              			<li class="<?php echo navItemSelected('driverLine/index'); ?>"><a href="index.php?r=driverLine/index">路线列表</a></li>
              			<li class="<?php echo navItemSelected('driverLine/create'); ?>"><a href="index.php?r=driverLine/create">添加路线</a></li>
              			<li class="<?php echo navItemSelected('driverLine/admin'); ?>"><a href="index.php?r=driverLine/admin">管理路线</a></li>
            		</ul>

                </div>
              </div>
            </div>            
          </div>

			<div class="accordion-group">
              <div class="accordion-heading">
                <a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                  		司机
                </a>
              </div>
              <div style="height: auto;" class="accordion-body in" id="collapseThree">
                <div class="accordion-inner">
		    
		    <ul class="nav nav-list">
              <li class="<?php echo navItemSelected('index.php?r=driver/index'); ?>"><a href="index.php?r=DriverModel/index">司机列表</a></li>
              <li class="<?php echo navItemSelected('index.php?r=driver/create'); ?>"><a href="index.php?r=DriverModel/create">添加司机</a></li>
              <li class="<?php echo navItemSelected('index.php?r=driver/admin'); ?>"><a href="index.php?r=DriverModel/admin">管理司机</a></li>
            </ul>

                </div>
              </div>
            </div>
			
			</div>
			<br>
    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>