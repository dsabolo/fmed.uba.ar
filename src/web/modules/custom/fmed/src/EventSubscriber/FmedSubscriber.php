<?php
namespace Drupal\fmed\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Drupal\Core\Url;
use Drupal\node\Entity\Node;
use Drupal\Component\Utility\Unicode;


/**
* Manejador de eventos
*/



class FmedSubscriber implements EventSubscriberInterface {

  private $redirectCode = 301;

  public function fmedCheckUser(GetResponseEvent $event) {

    $acceso= false;
    $checkeable = false;
    $current_path = \Drupal::service('path.current')->getPath();
    $path_args = explode('/', $current_path);


    if(@$path_args[1]=='node' && (@$path_args[3]=="edit" || @$path_args[3]=="delete" ) ){

      $node = \Drupal::routeMatch()->getParameter('node');
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());

      if(isset($node->field_publicar)){ // Lo usa pagina Dpto o Catefra
        $checkeable = true;
        $catedrasPermitidas   = $user->field_acceso_a_catedras->getValue();
        $nodeTerm = $node->field_publicar->getValue();
        $nodeTerm = $nodeTerm[0]['target_id'];
        if(@count($catedrasPermitidas)>0){
          foreach($catedrasPermitidas as $item){
            if($item['target_id']==$nodeTerm){
              $acceso=true;
            }
          }
        }
      }

      if(isset($node->field_visible)){  // Lo usa pagina Carrera
        $checkeable = true;
        $carrerasPermitidas   = $user->field_acceso_a_carreras->getValue();
        $nodeTerm = $node->field_visible->getValue();
        $nodeTerm = $nodeTerm[0]['target_id'];
        if(@count($carrerasPermitidas)>0){
          foreach($carrerasPermitidas as $item){
            if($item['target_id']==$nodeTerm){
              $acceso=true;
            }
          }
        }
      }

      if(isset($node->field_publica_en_seccion)){ // Lo usa pagina Interna
        $checkeable = true;
        $seccionesPermitidas  = $user->field_acceso_a_seccion->getValue();
        $nodeTerm = $node->field_publica_en_seccion->getValue();
        $nodeTerm = $nodeTerm[0]['target_id'];
        if(@count($seccionesPermitidas)>0){
          foreach($seccionesPermitidas as $item){
            if($item['target_id']==$nodeTerm){
              $acceso=true;
            }
          }
        }
      }

      if ($checkeable && !$acceso ) {

        drupal_set_message(t('Usted no tiene acceso para administrar el contenido de este espacio. Si usted quiere administrarlo, solicite permisos en el departamento de informática.'), 'error', true);
        $response = new RedirectResponse('/', $this->redirectCode);
        $response->send();
        exit(0);
      }

    }

  }

  /**
   * Listen to kernel.request events and call fmedCheckUser.
   * {@inheritdoc}
   * @return array Event names to listen to (key) and methods to call (value)
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('fmedCheckUser');
    return $events;
  }
}
