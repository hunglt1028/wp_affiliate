( function( api ) {

	// Extends our custom "affiliate-review" section.
	api.sectionConstructor['affiliate-review'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );