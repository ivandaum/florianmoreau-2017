<div class="project-card">
    <a href="<?= $project['link'] ?>" class="project-card_content">
        <div class="project-card_arrow"></div>
        <div class="project-card_cover">
            <div class="image" style="background-image: url(<?= $project['image']['medium'] ?>)"></div>
        </div>
        <h2 class="project-card_title"><?= $project['title'] ?></h2>
        <p class="project-card_description"><?= $project['description'] ?></p>
    </a>
</div>