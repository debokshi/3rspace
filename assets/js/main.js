( function () {
	'use strict';

	/* ---------------------------------------------- */
	/* Mobile nav toggle                                */
	/* ---------------------------------------------- */
	var navToggle = document.querySelector( '.nav-toggle' );
	var navMenu = document.getElementById( 'primary-menu' );

	if ( navToggle && navMenu ) {
		navToggle.addEventListener( 'click', function () {
			var isOpen = navMenu.classList.toggle( 'is-open' );
			navToggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
		} );
	}

	/* ---------------------------------------------- */
	/* Apply modal                                      */
	/* ---------------------------------------------- */
	var modal = document.getElementById( 'apply-modal' );
	var lastFocused = null;

	function openModal() {
		if ( ! modal ) {
			return;
		}
		lastFocused = document.activeElement;
		modal.classList.add( 'is-open' );
		document.body.classList.add( 'modal-open' );
		var dialog = modal.querySelector( '.modal' );
		if ( dialog ) {
			dialog.focus();
		}
		document.addEventListener( 'keydown', onKeydown );
	}

	function closeModal() {
		if ( ! modal ) {
			return;
		}
		modal.classList.remove( 'is-open' );
		document.body.classList.remove( 'modal-open' );
		document.removeEventListener( 'keydown', onKeydown );
		if ( lastFocused && typeof lastFocused.focus === 'function' ) {
			lastFocused.focus();
		}
	}

	function onKeydown( event ) {
		if ( 'Escape' === event.key ) {
			closeModal();
		}
	}

	document.querySelectorAll( '.js-open-apply-modal' ).forEach( function ( trigger ) {
		trigger.addEventListener( 'click', openModal );
	} );

	if ( modal ) {
		modal.addEventListener( 'click', function ( event ) {
			if ( event.target === modal ) {
				closeModal();
			}
		} );
		modal.querySelectorAll( '[data-modal-close]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', closeModal );
		} );
	}

	/* ---------------------------------------------- */
	/* AJAX form submission (apply + contact)           */
	/* ---------------------------------------------- */
	function showNote( form, message, isError ) {
		var note = form.querySelector( '[data-form-note]' );
		if ( ! note ) {
			return;
		}
		note.textContent = message;
		note.classList.remove( 'form-note--success', 'form-note--error' );
		note.classList.add( isError ? 'form-note--error' : 'form-note--success' );
		note.classList.add( 'is-visible' );
	}

	function hideNote( form ) {
		var note = form.querySelector( '[data-form-note]' );
		if ( note ) {
			note.classList.remove( 'is-visible' );
		}
	}

	function submitForm( form, action, nonce, onSuccess ) {
		var submitBtn = form.querySelector( 'button[type="submit"]' );
		var data = new FormData( form );
		data.append( 'action', action );
		data.append( 'nonce', nonce );

		hideNote( form );
		if ( submitBtn ) {
			submitBtn.disabled = true;
		}

		fetch( window.TRS.ajaxUrl, {
			method: 'POST',
			credentials: 'same-origin',
			body: data,
		} )
			.then( function ( response ) {
				return response.json().then( function ( json ) {
					return { ok: response.ok, json: json };
				} );
			} )
			.then( function ( result ) {
				var payload = result.json && result.json.data ? result.json.data : {};
				var message = payload.message || ( result.json && result.json.success
					? 'Thanks — we received your submission.'
					: 'Something went wrong. Please try again.' );

				if ( result.json && result.json.success ) {
					if ( onSuccess ) {
						onSuccess( message );
					} else {
						showNote( form, message, false );
						form.reset();
					}
				} else {
					showNote( form, message, true );
				}
			} )
			.catch( function () {
				showNote( form, 'Network error — please check your connection and try again.', true );
			} )
			.finally( function () {
				if ( submitBtn ) {
					submitBtn.disabled = false;
				}
			} );
	}

	var applyForm = document.getElementById( 'apply-form' );
	if ( applyForm && window.TRS ) {
		applyForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			submitForm( applyForm, 'trs_apply_submit', window.TRS.applyNonce, function ( message ) {
				var successEl = modal.querySelector( '[data-modal-success]' );
				var successMsg = modal.querySelector( '[data-modal-success-message]' );
				if ( successMsg ) {
					successMsg.textContent = message;
				}
				applyForm.style.display = 'none';
				if ( successEl ) {
					successEl.classList.add( 'is-visible' );
				}
			} );
		} );
	}

	var contactForm = document.getElementById( 'contact-form' );
	if ( contactForm && window.TRS ) {
		contactForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			submitForm( contactForm, 'trs_contact_submit', window.TRS.contactNonce );
		} );
	}
} )();
