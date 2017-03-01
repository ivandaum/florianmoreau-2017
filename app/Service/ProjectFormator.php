<?php

namespace App\Service;


class ProjectFormator
{
    public function __construct()
    {
    }

    static public function formatAll($array)
    {

        $formated = [];
        foreach($array as $ar) {
            $formated[] = self::formatOne($ar);
        }

        return $formated;
    }


    static public function formatOne($project)
    {
        $formatedProject = array();
        $formatedProject['id'] = $project->ID;
        $formatedProject['title'] = $project->post_title;
        $formatedProject['category'] = get_the_category($project->ID)[0]->slug;
        $formatedProject['link'] = get_permalink($project->ID);
        $formatedProject['slug'] = $project->post_name;
        $formatedProject['description'] = $project->post_excerpt;
        $formatedProject['has_description'] = !empty($project->post_excerpt);
        $formatedProject['html_image'] = array(
            'full' => '<img src="' . $formatedProject['image']['full'] . '" class="img-background" />',
            'medium' => '<img src="' . $formatedProject['image']['medium'] . '" class="img-background" />',
            'small' => '<img src="' . $formatedProject['image']['small'] . '" class="img-background" />',
        );
        $formatedProject['github_link'] = get_post_meta($project->ID, GITHUB_LINK, true);
        $formatedProject['project_link'] = get_post_meta($project->ID, PROJECT_LINK, true);
        $formatedProject['color'] = get_post_meta($project->ID, PROJECT_COLOR, true) ? get_post_meta($project->ID, PROJECT_COLOR, true) : '#eeeeee';
        $formatedProject['content'] = $project->post_content;
        $formatedProject['has_content'] = !empty($project->post_content);
        $formatedProject['link_available'] = $formatedProject['project_link'] ? $formatedProject['project_link'] : $formatedProject['github_link'];
        $formatedProject['has_details'] = !empty($formatedProject['project_link']) || !empty($formatedProject['github_link']);
        $formatedProject['project_role'] = get_post_meta($project->ID, PROJECT_ROLE, true);
        $tags = wp_get_post_tags($project->ID);
        foreach ($tags as $tag) {
            $formatedProject['tags'][] = $tag->name;
        }

        return $formatedProject;
    }
}