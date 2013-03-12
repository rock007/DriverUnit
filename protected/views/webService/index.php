<?php $this->pageTitle=Yii::app()->name; ?>

<h2>当前所有接口</h2>
<p>
为了调试方便
所有请求采用GET方式，返回结果为json格式，返回失败，结果里有描述！示
</p>

<?php foreach($nav  as $item): ?>

<?php echo $item['desc']; ?>:
<a href="index.php?r=webservice/<?php echo $item['name']; ?>"> <?php echo $item['name']; ?></a> 

<br>
<?php endforeach; ?>


