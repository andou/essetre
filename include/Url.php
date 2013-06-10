<?php

class Url {

    private $skin_path;
    private $bucket_name;
    private $bucket_url_prefix;
    private $base_path;

    public function __construct($config) {
        if (!$config['bucket-name'] || !$config['bucket-url-prefix']) {
            die('Please set bucket-name and bucket-url-prefixin config.php');
        }

        $this->bucket_name = $config['bucket-name'];
        $this->bucket_url_prefix = $config['bucket-url-prefix'];
        $this->skin_path = (isset($config['skin-path']) && !is_null($config['skin-path'])) ? $config['skin-path'] : "";
        $this->base_path = (isset($config['base-path']) && !is_null($config['base-path'])) ? $config['base-path'] : "";
    }

    public function getSkinResource($resource) {
        return $this->base_path . $this->skin_path . $resource;
    }

    public function getUrl($path) {
        
    }

}
