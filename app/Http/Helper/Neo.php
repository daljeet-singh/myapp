<?php
class Neo {

    public static function addMenuLink( $controller = 'dashboard', $action = 'index', $param = false ) {
        return '';
    }

    public static function setStatus( $status = 0, $id = '', $allowed = true, $controller = '', $action = 'setStatus' ) {
        $btnClass = "btn-danger";
        $iconClass = "md-close";
        if( $status == 1 ) {
            $btnClass = "bgm-lightgreen";
            $iconClass = "md-check";
        }
        if( $allowed ) $btnClass .= " setStatus";
        $btn = "<button data-href=\"/" . $controller . "/" . $action . "/\" rel=" . $status . " id=" . $id . " class=\"btn " . $btnClass . " btn-icon waves-effect waves-button waves-float\"><i id = \"" . "icon-" . $id . "\" class=\"md " . $iconClass . "\"></i></button>";
        return $btn;
    }

}