<?php

namespace Drupal\front_news\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class FrontNewsController extends ControllerBase {

  public function frontPage() {
    // Most Recent Article - Left Column
    $query = \Drupal::entityQuery('node')
      ->accessCheck(TRUE)
      ->condition('status', 1)
      ->condition('field_featured', 1)
      ->condition('type', 'article')
      ->sort('created', 'DESC')
      ->range(0, 1);

      $nids = $query->execute();

    //Checks if there is an article
      $featured_render = [];
        if (!empty($nids)) {
          $node = Node::load(reset($nids));
          $featured_render = \Drupal::entityTypeManager()
            ->getViewBuilder('node')
            ->view($node, 'teaser'); 
        }
      //URL
       $request  =  \Drupal::request();
       $feedUrl = $request->getBasePath() . '/api/news';

    return [

      '#featured' => $featured_render,
      '#theme'    => 'front_news_page',
      '#attached' => [
        'library' => ['front_news/front_news'],
        'drupalSettings' => [
          'front_news' => [
            'feedUrl' => $feedUrl,
          ],
        ],
        ],
      ];
  }

}
