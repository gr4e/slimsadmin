<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $page = array(), $return = FALSE)
    {
        if($return)
        {
            $content  = $this->view('templates/header', $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('templates/footer', $return);

            return $content;
        }
        else
        {
            $this->view('templates/header', $page);
            $this->view($template_name, $vars);
            $this->view('templates/footer');
        }
    }


    public function disable_modules($module_ass = array(), $role)
    {
        $modules = array(
          'admin' => 'hidemodule',
          'acquisition'  => 'hidemodule',
          'holdings'  => 'hidemodule',
          'circulation'  => 'hidemodule',
          'accounts' => 'hidemodule',
          'others' => 'hidemodule'
        );

        $mods = $module_ass;
        foreach($mods as $mod)
        {
          switch($mod){
            case 1:
              $modules['admin'] = '';
              $modules['others'] = '';
              break;
            case 2:
              $modules['acquisition'] = '';
              break;
            case 3:
              $modules['holdings'] = '';
              break;
            case 4:
              $modules['circulation'] = '';
              break;
            default:
              break;
          }
        }

        if($role == 1 || $role == 2)
        {
          $modules['admin'] = '';
          $modules['accounts'] = '';
        }

        return $modules;
    }
}
?>
