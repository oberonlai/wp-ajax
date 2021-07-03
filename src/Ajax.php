<?php

namespace ODS;

class Ajax extends AbstractAjax {

	public function __construct( $act ) {
		$this->action = $act;
	}

    public function addJs(){
        wp_register_script( $this->action.'_script', 'assets/dist/js/photo-classify.js', array('jquery'), null, false );
		wp_localize_script( $this->action.'_script', $this->action.'_param', array(
			'ajax_url'       => BTP_Photo_Delete::url(),
			'ajax_nonce'     => wp_create_nonce('photo_classify'),
			'ajax_redirect'  => get_the_permalink( $_GET['postId'] ),
			'post_id'        => $_GET['postId'],
		) );
		wp_enqueue_script( 'btp_photo_classify_script' );
    }

	protected function run() {
		$this->JSONResponse( 'nice' );
	}
}
