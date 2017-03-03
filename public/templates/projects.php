<div class="home container">
    <div class="section-container">
        <div  class="section-container-title moved-by-navbar">
            <h1 class="<?php echo count($title) > 1 ? 'double' : ''; ?>">
                <?php foreach($title as $t): ?>
                <span><?= $t ?></span>
                <?php endforeach; ?>
            </h1>
        </div>
        <div class="content-container projects-list moved-by-navbar">
            <?php foreach($projects as $project): ?>
                <?php require(TEMPLATES_PATH . 'components/project-card.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
