@extends('Layouts.default')
@section('content')
    <div class="block-header">
        <h2>Privileges</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Add a Privilege to Role</h2>
        </div>
        <div class="card-body card-padding">            
            <div class="row">
                {!! Form::open(['route' => 'roles.privileges.store']) !!}
                    <div class="form-group fg-line">
                        {!! Form::label('role_id', 'Role' ) !!}
                        <div class="form-group">
                            <div class="fg-line">
                                <div class="select">
                                    {!! Form::select('role_id', $roles, null, ['class' => 'form-control'] ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group fg-line" id="controllersList">
                        @include('Roles.createPrivileges')
                    </div>
                    {!! Form::button('Submit', ['type' => 'submit', 'class' => 'btn bgm-cyan btn-sm m-t-10 waves-effect waves-button waves-float' ]) !!}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@stop
@section('footer')
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('body').on( 'click', '.privilege-select-checkbox', function() {
            var id = 'hidden-' + jQuery(this).attr('id');
            if ( jQuery(this).is(':checked') ) {
                jQuery('#'+id).val(1);
            } else {
                jQuery('#'+id).val(0);
            }
        });

        jQuery('body').on( 'click', '.selectAll', function() {
            var id = jQuery(this).attr('id');
            if ( jQuery(this).is(':checked') ) {
                jQuery('.'+id + '-actions').prop('checked', true);
                jQuery('.'+id + '-actions-hidden').val(1);
            } else {
                jQuery('.'+id + '-actions').prop('checked', false);
                jQuery('.'+id + '-actions-hidden').val(0);
            }
        });

        jQuery('#role_id').change(function() {
            var roleId = jQuery(this).val();
            var setUrl = "/roles/getPrivileges/" + roleId;
            jQuery.ajax({
                type: "GET",
                url: setUrl,
                success: function(data) {
                    jQuery('#controllersList').empty().html(data);
                }
            });
        });
    });
</script>
@stop