@foreach( $controllers as $controller => $actions )
    <?php
        $allowedActions = array();
        $allAllowed = false;
        if( isset( $privileges[$controller] ) ) {
            if( in_array( 'allactions', $privileges[$controller] ) )  {
                $allowedActions = $actions;
                $allAllowed = true;
            }
            else $allowedActions = $privileges[$controller];
        }
    ?>
    <p class="c-black f-500 m-b-20 m-t-20">
        <label class="checkbox checkbox-inline">
            <input class="selectAll" id="{{ $controller }}" type="checkbox" name="{{ $controller }}" <?php if( $allAllowed ) { ?> checked <?php } ?> >
            <i class="input-helper"></i>
        </label>
        {{ $controller }}
    </p>
    @foreach( $actions as $action )
        <label class="checkbox checkbox-inline">
            <input id="{{ $controller . '-' . $action }}" name="privileges[{{ $controller . '-' . $action }}]" type="checkbox" value="1" <?php if( in_array( $action, $allowedActions ) ) { ?> checked <?php } ?> class="privilege-select-checkbox {{ $controller . '-actions' }}" >
            <i class="input-helper"></i>    
            {{ $action }}
        </label>
        <input class="{{ $controller . '-actions-hidden' }}" id="hidden-{{ $controller . '-' . $action }}" name="privileges[{{ $controller . '-' . $action }}]" type="hidden" <?php if( in_array( $action, $allowedActions ) ) { ?> value="1" <?php } else { ?> value="0" <?php } ?> >
    @endforeach
@endforeach