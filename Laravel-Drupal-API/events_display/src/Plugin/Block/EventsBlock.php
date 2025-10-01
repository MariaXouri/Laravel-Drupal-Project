<?php

namespace Drupal\events_display\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\ClientInterface;


class EventsBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  public function __construct(array $configuration, $plugin_definition,  $plugin_id, ClientInterface $http_client) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->httpClient = $http_client;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $configuration,
      $plugin_definition,
      $container->get('http_client')
    );
  }

  public function build() {
    $items = [];
    $endpoint = 'http://127.0.0.1:8000/api/upcoming_events'; 

    try {
      $res = $this->httpClient->request('GET', $endpoint, ['timeout' => 5]);
      if ($res->getStatusCode() === 200) {
        $data = json_decode($res->getBody()->getContents(), true);

        $events = $data['upcoming_events'] ?? [];
        $events = array_slice($events, 0, 5);

        foreach ($events as $event) {
          $title = $event['title'] ?? 'Untitled';
          $start = $event['start_date'] ?? null;

        
          $line = $title;
          if (!empty($start)) {
            $line .= ' — ' . $start;
          }
          $items[] = [
            '#markup' => $line,
          ];
        }
      }
      else {
        $items[] = ['#markup' => $this->t('Failed to load events (HTTP @code).', ['@code' => $res->getStatusCode()])];

   }
    }

    catch (\Throwable $e) {
  
    }

    if (!($items)) {
      $items[] = ['#markup' => $this->t('No upcoming events.')];
    }

    return [
      '#theme' => 'item_list',
      '#title' => $this->t('Upcoming events'),
      '#items' => $items,
      '#cache' => [
        'max-age' => 200, 
      ],
    ];
  }

}
