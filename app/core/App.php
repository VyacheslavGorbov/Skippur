<?php

    class App
    {
        
        var $controller = 'HomeController';
        var $method = 'index';
        var $params = [];

        public function __construct() 
        {
            $url = $this->parseUrl();

            if(isset($url[0]) && file_exists('app/controllers/' . $url[0] . 'Controller.php'))
            {
                $this->controller = $url[0] . 'Controller';
                unset($url[0]);
            }

            require_once 'app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller();

            if(isset($url[1]) && method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }

            //redirectFilters
            if($redirectUrl = self::redirectFilters($this->controller, $this->method)){
                header("location:$redirectUrl");
                return;
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
            //var_dump($url);
        }

        private function parseUrl()
        {
            if (isset($_GET['url']))
            {
                return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }

        }

        private static function LoginFilter(){
            if($_SESSION['user_id'] == null){
                return '/Home/Login';
            }else{
                return false;
            }
        }

        private static function EmployeeFilter(){
            if($_SESSION['employee_id'] == null){
                return '/Home/employeeLogin';
            }else{
                return false;
            }

        }
        private static function redirectFilters($class, $method){
            $reflection = new ReflectionClass($class);

            $classDocComment = $reflection->getDocComment();
            $methodDocComment = $reflection->getMethod($method)->getDocComment();

            $classFilters = self::getFiltersFromAnnotations($classDocComment);
            $methodFilters = self::getFiltersFromAnnotations($methodDocComment);

            $filters = array_values(array_filter(array_merge($classFilters, $methodFilters)));

            $redirect = self::runFilters($filters);

            return $redirect;

        }

        private static function getFiltersFromAnnotations($docComment){
            preg_match('/@accessFilter:{(?<content>.+)}/i', $docComment, $content);
            $content = (isset($content['content'])?$content['content']:'');
            $content = explode(',', str_replace(' ', '', $content));
            return $content; 
        }

        private static function runfilters($filters){
            $redirect = false;
            $max = count($filters);
            $i = 0;
            while(!$redirect && $i < $max){
                if(method_exists('App', $filters[$i])){
                    $redirect = self::{$filters[$i]}();
                }
                else{
                    throw new Exception("No policy named $filters[$i]");
                }
                $i++;
                
            }
            return $redirect;
        }
    }
?>