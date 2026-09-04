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
	/* Modals (Apply, Trial booking — any number)       */
	/* ---------------------------------------------- */
	var lastFocused = null;
	var openOverlay = null;

	function openModal( overlay ) {
		if ( ! overlay ) {
			return;
		}
		lastFocused = document.activeElement;
		openOverlay = overlay;
		overlay.classList.add( 'is-open' );
		document.body.classList.add( 'modal-open' );
		var dialog = overlay.querySelector( '.modal' );
		if ( dialog ) {
			dialog.focus();
		}
		document.addEventListener( 'keydown', onKeydown );
	}

	function closeModal( overlay ) {
		overlay = overlay || openOverlay;
		if ( ! overlay ) {
			return;
		}
		overlay.classList.remove( 'is-open' );
		document.body.classList.remove( 'modal-open' );
		document.removeEventListener( 'keydown', onKeydown );
		if ( lastFocused && typeof lastFocused.focus === 'function' ) {
			lastFocused.focus();
		}
		openOverlay = null;
	}

	function onKeydown( event ) {
		if ( 'Escape' === event.key ) {
			closeModal();
		}
	}

	document.querySelectorAll( '.js-open-apply-modal' ).forEach( function ( trigger ) {
		trigger.addEventListener( 'click', function () {
			openModal( document.getElementById( 'apply-modal' ) );
		} );
	} );

	document.querySelectorAll( '.js-open-trial-modal' ).forEach( function ( trigger ) {
		trigger.addEventListener( 'click', function () {
			openModal( document.getElementById( 'trial-modal' ) );
		} );
	} );

	document.querySelectorAll( '.modal-overlay' ).forEach( function ( overlay ) {
		overlay.addEventListener( 'click', function ( event ) {
			if ( event.target === overlay ) {
				closeModal( overlay );
			}
		} );
		overlay.querySelectorAll( '[data-modal-close]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				closeModal( overlay );
			} );
		} );
	} );

	/* ---------------------------------------------- */
	/* AJAX form submission (trial booking + contact)   */
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

	function onModalFormSuccess( form, message ) {
		var overlay = form.closest( '.modal-overlay' );
		if ( ! overlay ) {
			return;
		}
		var successEl = overlay.querySelector( '[data-modal-success]' );
		var successMsg = overlay.querySelector( '[data-modal-success-message]' );
		if ( successMsg ) {
			successMsg.textContent = message;
		}
		form.style.display = 'none';
		if ( successEl ) {
			successEl.classList.add( 'is-visible' );
		}
	}

	var applyForm = document.getElementById( 'apply-form' );
	if ( applyForm && window.TRS ) {
		applyForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			submitForm( applyForm, 'trs_apply_submit', window.TRS.applyNonce, function ( message ) {
				onModalFormSuccess( applyForm, message );
			} );
		} );
	}

	var trialForm = document.getElementById( 'trial-form' );
	if ( trialForm && window.TRS ) {
		trialForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			submitForm( trialForm, 'trs_trial_submit', window.TRS.trialNonce, function ( message ) {
				onModalFormSuccess( trialForm, message );
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
