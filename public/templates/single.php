<div class="single container moved-by-navbar">
    <div class="section-container ">

        <div class="title content-container">
            <h1><?= $project['title'] ?></h1>
        </div>
        <div class="single-content content-container">
            <p class="project-year"><?= $project['date_year'] ?></p>
            <div class="single-content-cover">
                <img src="<?= $project['image']['medium'] ?>" alt="">
            </div>
            <div class="single-content-text">
                <?php if($project['has_content']): ?>
                    <?= $project['content'] ?>
                <?php endif; ?>
            </div>
            <button class="to-top">Top</button>
        </div>

        <div class="back-category">
            <a href="<?= home_url($category->slug) ?>"><?= $category->cat_name ?></a>
        </div>
    </div>


    <div class="single-background">

    </div>
</div>