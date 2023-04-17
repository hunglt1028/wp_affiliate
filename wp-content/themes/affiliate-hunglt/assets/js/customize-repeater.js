( function( $, api ) {
 
    api.controlConstructor['repeater'] = api.Control.extend( {
        ready: function() {
            var control = this,
                addNew  = control.container.find( '.repeater-add-new' ),
                list    = control.container.find( '.repeater-list' ),
                inputId = control.id + '-repeater-input',
                count   = 0;
 
            addNew.on( 'click', function( e ) {
                e.preventDefault();
                count++;
 
                var newInput = $( '<div class="repeater-input-wrapper">' );
                newInput.append( '<input type="text" name="' + inputId + '[' + count + ']" value="" />' );
                newInput.append( '<button class="repeater-input-remove button button-secondary">' + control.params.delete_label + '</button>' );
 
                list.append( newInput );
            } );
 
            list.on( 'click', '.repeater-input-remove', function() {
                $( this ).parent( '.repeater-input-wrapper' ).remove();
            } );
        }
    } );
 
} )( jQuery, wp.customize );