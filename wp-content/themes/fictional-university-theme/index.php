<?php
function firstFunction($name, $color)
{
    echo "<p>Hi, my name is $name and my favourite color is $color.</p>";
}
firstFunction("John", 'red');
firstFunction('Jane', 'blue');
?>
<h1>
    <?php bloginfo('name'); ?>
</h1>
<p>
    <?php bloginfo('description') ?>
</p>

<?php
$myName = "Saijeet"
    ?>

<p>Hi, my name is
    <?php echo $myName ?>
</p>

<?php
$name = array('Brad', "John", 'Jane', 'Rocky');
$count = 0;
while ($count < count($name)) {
    echo "<li>Ji, my name is $name[$count]</li>";
    $count++;
}
?>