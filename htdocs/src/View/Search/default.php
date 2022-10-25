We found <?php echo count($this->searchResult); ?> items for your query '<?php echo $this->searchQuery; ?>'

<hr />

<ul>
<?php foreach($this->searchResult as $item): ?>
    <li><?php echo $item; ?></li>
<?php endforeach; ?> 
</ul>