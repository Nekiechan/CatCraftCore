<?php
namespace neko\catcore\CatCoreEvent;

class ConfigEvent extends PluginEvent {
public function makeDir(){
        @mkdir($this->dataPath());
        @mkdir($this->dataPath()."players/");
        @mkdir($this->dataPath()."scoring/");
}
}
