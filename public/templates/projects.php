<div class="home container">
    <div class="section-container">
        <div class="content-container projects-list">
            <?php foreach($projects as $project): ?>
                <?php require(TEMPLATES_PATH . 'components/project-card.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
