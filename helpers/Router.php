<?php
class Router
{

    private $controller = controller_default;
    private $method = action_default;

    public function __construct()
    {

        $url = $this->catchUrl();

        $this->controller = !empty($url[0]) ? $url[0] : controller_default;

        if (!file_exists(__DIR__ . "/../controllers/" . $this->controller . "Controller.php")) {
            require_once "./controllers/ErrorController.php";
            $error = new ErrorController;
            $error->index();
            die();
        }


        $this->controller = $this->controller . "Controller";
        require_once "./controllers/" . $this->controller . ".php";

        $this->controller = new $this->controller;

        $this->method = !empty($url[1]) ? $url[1] : action_default;

        if (!method_exists($url[0] . "Controller", $this->method)) {
            if ($this->method !== action_default) {
                require_once "./controllers/ErrorController.php";
                $error = new ErrorController;
                $error->index();
                die();
            }
        }

        ob_start();
        $action = $this->method;
        $this->controller->$action();
        $print = ob_get_clean();
        require_once "./views/layouts/header.php";
        echo $print;
        require_once "./views/layouts/footer.php";
    }

    public  function catchUrl()
    {

        $url = isset($_GET['url']) ? $_GET['url'] : "";
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode("/", $url);
    }
}
