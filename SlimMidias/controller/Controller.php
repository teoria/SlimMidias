<?php

Class Controller extends \Slim\Slim
{
	protected $data;

	public function __construct()
	{

        $logger = new \Flynsarmy\SlimMonolog\Log\MonologWriter(array(
            'handlers' => array(
                new \Monolog\Handler\StreamHandler('./logs/'.date('Y-m-d').'.log'),
            ),
        ));
        $path = VIEW_PATH;
        $settings = array(
            'view' => new \Slim\Views\Twig(),
            'debug' => true,
            'templates.path' => $path,
            'log.writer' => $logger

        );

		parent::__construct($settings);
	}


    public function render($name, $data = array(), $status = null) {

        if (strpos($name, ".php") === false) {
            $name = $name . ".php";
        }

        if ( isset( $_SESSION['slim.flash'] ) ) {
            $data['flash'] = $_SESSION['slim.flash'];
            $_SESSION['slim.flash'] = null;
        }
        $data['path'] = $_SESSION['path'];

        parent::render($name, $data, $status);
    }


    public function redirect($target = '/') {

        header("Location: $target");
    }


    public function flash($key, $value) {

        if (! isset( $_SESSION['slim.flash'] ) ) {
            $_SESSION['slim.flash'] = array();
        }
        $_SESSION['slim.flash'][$key] = $value;


    }


    public function json_encode($data){
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($data, 'json');

        return $jsonContent;

    }


    public function json_decode($data_json, $tipo){
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $object = $serializer->deserialize($data_json, $tipo, 'json');

        return $object;

    }

}

